<?php
/**
* 加群操作
* @date: 2016-3-15
* @author: efan
*/
class WeChatGroupService {

	/**
	* 加群动作
	* @param $user_id 
	* @param $group_id 
	* @date 2016-3-15
	* @return:boolean
	*/
	public function addGroup($user_id, $group_id) {
		$guser=M('GroupUser');
		
		//检查用户是否已加入群
		$is_add=$guser->where("user_id=$user_id and group_id=$group_id")->find();
		
		if ($is_add) return false;
		
		//一个用户可以对应多个群组
		$data = array(
			'user_id' =>$user_id,
			'group_id' =>$group_id,
			'create_time'=>date('Y-m-d H:i:s')
		);
		$guser->add($data);
		
		//相应的group_id的join_nums参与人数+1
		CommonModel::addFieldCount('Group', 'id='.$group_id, 'join_nums');
		
		//更新组内的用户数据
		$this->setAddGroupRedis($group_id, $user_id);
		return true;
	}
	//改成单一模式，redis长久连接
	public function newRedis() {
		$url='http://'.$_SERVER['HTTP_HOST'].'/error';
		try {
			$redis=new Redis();
			$redis->connect(REDIS_HOST, REDIS_PORT);
			if ($redis->ping()) {
				return $redis;
			}
			header('Location: '.$url);exit;
		} catch (Exception $e) {
			header('Location: '.$url);exit;
		}
	}
	/**
	* 用户加入群后 redis的更新  把此用户加入group_user_id的数据中
	* @param $group_id 
	* @param $user_id 
	* @date 2016-3-15
	* @return:
	*/
	public function setAddGroupRedis($group_id, $user_id) {
		$redis=$this->newRedis();
		
		//type_count值在说明已经加到群里
		if ($redis->hget(USERTYPECOUNT, $user_id)) {
			return true;	
		}
		
		//用户的签到数check_sum、书籍数book_sum、随笔数note_sum、集赞数digg_sum
		$cjson = array (
			'check_sum'=>0,
			'comment_sum'=>0,
			'digg_sum'=>0,
			'note_sum'=>0
		);
		$user=$redis->hget(USER, $user_id);
		if (empty($user)) {
			$json=M('UserInfo')->where('user_id='.$user_id)->find();
			$redis->hset(USER, $user_id, json_encode($json));
		}
		//生成user_type_count字段
		$redis->hset(USERTYPECOUNT, $user_id, json_encode($cjson));

		//加入组内排序
		//$redis->zadd(GROUPUSER.$group_id, 0, $user_id);		//默认得分为0
		//群加入群组排行
		//$redis->zadd(GROUPSORT, 0, $group_id);
	}
	/**
	* 用户排行
	* @param unknowtype 
	* @date 2016-3-15
	* @return:
	*/
	public function userRank($group_id, $user_id) {
		$redis=$this->newRedis();
		
		//根据得分由高->低排序
		/**
		 array
		  field(user_id) => score值
		 */
		$user_score=$redis->zrevrange(GROUPUSER.$group_id, 0, 100, 'withscores');
		//取这些用户的头像
		$user_score_arr=array();
		foreach ($user_score as $k=>$v) {
			$user_score_arr[$k]['score']=$v;				//得分
			$user_info=json_decode($redis->hget(USER, $k), true);//用户信息
			$user_score_arr[$k]['avatar']=OSS_AVATAR.$user_info['avatar'].OSS_AVATAR_RULE;
			$user_score_arr[$k]['name']=$user_info['name'];
			$user_score_arr[$k]['user_id']=$user_info['user_id'];
		}
		//我的排行、头像、名字、得分
		$pai=$redis->zrevrank(GROUPUSER.$group_id, $user_id);
		$user['pai']=$pai + 1;			//我的排名
		$user['score']=$redis->zscore(GROUPUSER.$group_id, $user_id);			//得分
		$user_info=json_decode($redis->hget(USER, $user_id), true);				//用户信息
		$user['avatar']=OSS_AVATAR.$user_info['avatar'].OSS_AVATAR_RULE;
		$user['name']=$user_info['name'];
		$user['user_id']=$user_info['user_id'];
		
		return array('user'=>$user, 'list'=>$user_score_arr);
	}
	/**
	* 群组排行
	* @date 2016-3-15
	* @return:
	*/
	public function groupRank($group_id) {
		$redis=$this->newRedis();
		//根据得分由高->低排序
		/**
		 array
		  field(user_id) => score值
		 */
		$group_score=$redis->zrevrange(GROUPSORT, 0, 100, 'withscores');	//排序列表
		foreach ($group_score as $k=>$v) {
			$arr[]=$k;
		}
		$str=implode(',', $arr);
		$list=M('Group')->field('id,group_name')->where("id in($str)")->select();
		foreach ($group_score as $k=>$v) {
			foreach ($list as $l) {
				if ($l['id'] == $k) {
					$group_score_arr[$k]['score']=$v;				//得分
					$group_score_arr[$k]['group_name']=$l['group_name'];
				}
			}
		}
		//排名、得分
		$group['pai']=$redis->zrevrank(GROUPSORT, $group_id)  + 1;		//群组排名，从0开始的
		$group['score']=$redis->zscore(GROUPSORT, $group_id);			//得分
		$group_sum=$redis->zcard(GROUPSORT);							//总群数
		
		return array('group'=>$group, 'list'=>$group_score_arr,'group_sum'=>$group_sum);
	}
	
	/**
	* 取当周的书籍信息
	* @date 2016-3-16
	* @return:
	*/
	public function getCurrentBook() {
		$pb=M('PlanBook');
		$count=$pb->count();		//第几期书籍
		$info=$pb->where("CURRENT_DATE()>= start_time AND CURRENT_DATE() <= end_time")->find();
		$info['num']=$count;
		$info['start_time']=date('Y.m.d', strtotime($info['start_time']));
		$info['end_time']=date('Y.m.d', strtotime($info['end_time']));
		
		return $info;
	}
	
	/**
	* 从redis里取出所有组的排名记录在数据库中
	* @date 2016-3-18
	* @return:
	*/
	public function saveGroupRank() {
		$redis=$this->newRedis();
		
		$max=$redis->zcard(GROUPSORT);//共多少个群
		$list=$redis->zrevrange(GROUPSORT, 0, $max, 'withscores');
		//$list_arr=json_decode($list, true);echo $list;echo '<pre>';print_r($list);exit;
		$data=array();
		foreach ($list as $k=>$v) {
			$arr['group_id']=$k;
			$arr['score']=$v;
			$arr['week']=date('Y-m-d', time() - 24*3600);
			$data[]=$arr;
		}

		$res=M('GroupSort')->addAll($data);
		if ($res) {
			$redis->del(GROUPSORT);
			$redis->del(USERTYPECOUNT);
			$redis->del($redis->keys(GROUPUSER.'*'));
		}
	}
}