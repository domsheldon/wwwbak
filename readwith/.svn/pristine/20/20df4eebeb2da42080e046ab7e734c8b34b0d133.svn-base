<?php
/**
* 用户业务逻辑层
* @date: 2015-11-17
* @author: efan
* @version:1.0.0
*/
import('@.Service.NoteService');
class UserService {
	
	/**
	* 手机号和验证码登录
	* @param $value  手机号，第三方的id
	* @param $type	类型：mobile、qq、weixin、weibo
	* @param $union_id 微信登录的专门传微信的union_id为了和公众号的数据打通，其他类型不用传
	* @date 2016-2-1
	* @return:
	*/
	public function login($value, $type='mobile', $union_id='') {
		$user =new UserModel();
		$login =new LoginModel();
		
		if ($type =='weixin') {
			$user_id=$login->check_mobile($union_id, $type);	//检查union_id是否注册过
			//有可能是在公众号的用户，需要更新open_id2
			$login->set_open_id2($user_id, $value);
		}else {
			$user_id=$login->check_mobile($value, $type);		//检查是否注册过
		}
		if ($user_id == false) {
			if ($type =='mobile') {			
				$user_id = $login->register($value);			//注册生成帐号
			}else {
				$user_id = $login->third_register($type, $value, $union_id);//注册生成帐号
			}
			//加入共读表plan_user
			$pu=new PlanUserModel();
			$pu->addPlanUser($user_id);
		} 
		//返回用户信息
		$info=$user->getUserInfo(array($user_id), '*');
		return $info[$user_id];
	
	}
	
	/**
	* 个人中心保存
	* @param $name 
	* @param $data = array();
	* @date 2015-11-20
	* @return:
	*/
	public function saveUserInfo($user_id,$data) {
		$user=new UserModel();
		$res=$user->saveUserInfo($user_id, $data);
		$info=$user->getUserInfo(array($user_id), '*');
		return $info[$user_id];
	}
	/**
	* 他人主页
	* @param $user_id
	* @param $ta_user_id
	* @date 2016-1-29
	* @return:
	*/
	public function getUserData($user_id,$ta_user_id, $offset,$limit) {
		$user=new UserModel();
		$note=new NoteService();
		//用户信息
		$user_field='user_id,name,avatar,sex,job,province,city,intro';
		$info=$user->getUserInfo(array($ta_user_id), $user_field);
		
		//ta的随笔列表
		$where ='is_pub=0 and user_id='.$ta_user_id;
		$list=$note->getNoteList($user_id, $where, 'ta_note', $ta_user_id, $offset, $limit);
		$user_info['user_data']=$info[$ta_user_id];
		
		$user_info['data'] = $list ? $list :array();
		return $user_info;
	}
	/**
	* 我的收藏、我的随笔
	* @param $user_id
	* @param $type
	* @date 2016-1-29
	* @return:
	*/
	public function getUserNote($user_id,$type, $offset,$limit) {
		$user=new UserModel();
		$noteM=new NoteModel();
		$noteS=new NoteService();
		$list=array();
		
		if ($type =='me'){
			//我的随笔列表
			$where ='user_id='.$user_id;
			$list=$noteS->getNoteList($user_id, $where, '', $user_id, $offset, $limit);
		}else {
			$note_id_str=$noteM->getUserFavNote($user_id, $offset, $limit);
			if ($note_id_str) {
				$where="is_pub=0 and id in($note_id_str)";
				$list=$noteS->getNoteList($user_id, $where, '', $user_id, $offset, $limit);
			}
		}
		
		return $list;
	}
	/**
	* 用户注册以来的共读历程
	* @param $user_id 
	* @date 2016-2-1
	* @return:
	*/
	public function getUserReadBooks($user_id) {
		$user=new UserModel();
		$list=$user->getUserRead($user_id);	//取书籍、开始、结束时间
		foreach ($list as $v) {
			$arr[]=$v['id'];
			$book_arr[]=$v['book_id'];
		}
		$pb_str=implode(',', $arr);
		$book_str=implode(',', $book_arr);
		//取这些书的签到次数、随笔数
		$check_sql="select pb_id,count(*) as c from rw_book_pack_check where user_id=$user_id and pb_id in($pb_str) group by pb_id";
		$book_sql="select book_id,count(book_id) as c from rw_note where user_id=$user_id and book_id in($book_str) group by book_id";
		$check_data=M()->query($check_sql);
		$note_data=M()->query($book_sql);
		foreach ($list as $k=>$v) {
			$list[$k]['check_sum'] = $list[$k]['note_sum'] = '0';
			foreach ($check_data as $c) {
				if ($v['id'] == $c['pb_id']) {
					$list[$k]['check_sum']=$c['c'];
				}
			}
			foreach ($note_data as $n) {
				if ($v['book_id'] == $n['book_id']) {
					$list[$k]['note_sum']=$n['c'];
				}
			}
		}
		return $list;
	}
	/**
	* 读完的书，签到次数，随笔条数
	* @param $user_id 
	* @date 2016-2-4
	* @return:
	*/
	public function getUserChengJiu($user_id) {
		$pack=new PackageModel();
		$note=new NoteModel();
		$puser=new PlanUserModel();
		$user=new UserModel();
		//加入计划多少天
		$info=$user->getUserInfo(array($user_id), 'user_id,create_time');
		$sum_date=round( (time()-strtotime($info[$user_id]['create_time']) )/(24*3600) );//当前时间-注册时间得到的秒数  除以24*3600s
		$sum['sum_date']="$sum_date";
		//读完的书
		$list=$this->getUserReadBooks($user_id);
		$sum['book_sum']=''.count($list);		//为了返回的结果是字符串
		//签到次数
		$sum['qd_sum']=$pack->getUserCheckCount($user_id);
		//随笔条数
		$sum['note_sum']=$note->getUserNoteCount($user_id);
		
		//取加入计划的总人数
		$puser_sum=$puser->planUserSum();
		//共plan_user个书友
		$sum['shuyou']="$puser_sum";
		//领先全国，签到总数的排序/总的签到人数
		$me=$pack->getMeCheckSumCount($user_id);		//我的总签到数
		$s=0;
		if ($me['paiming']) {
			$b=$me['paiming']/$puser_sum;
			$s=1-$b;
		}
		$baifenbi=round($s*100);
		$sum['bfb']="$baifenbi";
		return $sum;
	}
	/**
	* 我的成就排行
	* @param $user_id
	* @param $type  now今日排行签到时间，sum总排行签到次数
	* @date 2016-2-4
	* @return:
	*/
	public function getUserSort($user_id, $type='now') {
		$pack=new PackageModel();
		
		if ($type=='now') {	//今日排行
			$plan=new PlanBookModel();
			
			$plan_info=$plan->getNowPlanBook();					//取今日共读的书id
			$plan_book_id = $plan_info['id'];
			
			$pack_info=$pack->getPackIdByTime($plan_book_id);	//取今日早/晚读的pack_id
			$pack_id=$pack_info['id'];
			 
			$is_check=$pack->isCheckIn($pack_id, $user_id);		//今日是否签到
			if (empty($is_check)) {										
				return $pack_info['time_type'].'no_check';		//未签到直接返回
			}
			
			$time_sort=$pack->getPackCheckTimeSort($pack_id);	//取今日排行前50人，先从redis里取
			if (empty($time_sort)) return;						//无数据直接返回
			
			$me=$pack->getMeCheckSort($pack_id, $user_id);		//取当前用户排名、数据
			array_unshift($time_sort, $me[0]);					//插入到排行列表的第一个
			
			return array('paihang'=>$me['paiming'], 'list'=>$time_sort);
		} 
		else {	//总排行
			$me=$pack->getMeCheckSumCount($user_id);			//取当前用户的总签到数
			
			if (empty($me)) return;
			$list=$pack->getAllCheckCount();
			if (empty($list)) return;		//空数据则不返回
			
			array_unshift($list, $me[0]);		//插入到排行列表的第一个
			
			return array('paihang'=>$me['paiming'], 'list'=>$list);
		}
	}
	/**
	* 第三方绑定-----必须留一个第3方帐号
	* @param $user_id
	* @param $third_id
	* @param $type
	* @param $union_id 微信的union_id
	* @date 2016-3-14
	* @return:
	*/
	public function thirdBind($user_id, $third_id, $type, $union_id='') {
		$login=M('UserLogin');
		
		//定义要更新的字段名
		$field=$type.'_id';
		if ($type =='wx') {
			$field='open_id2';
			$data['union_id']=$union_id;
		}
		
		if ($third_id) {				//绑定操作
			//检查第三方号是否绑定过
			$is_bind=$login->where("$field='".$third_id."'")->find();
			
			//检查是否是本人操作、是否被绑定过
			if ($is_bind && $user_id!=$is_bind['user_id']) {
				return false;
			}
		} else {						//解绑操作
			$is_bind=$login->where('user_id='.$user_id)->find();
			//三方账户必须留一个，解绑， 把相应字段置空,
			if ($type =='qq' && ($is_bind['open_id2'] || $is_bind['weibo_id'])) {
				$third_id='';
			}
			elseif ($type =='wx' && ($is_bind['qq_id'] || $is_bind['weibo_id'])) {
				$third_id='';
			}
			elseif ($type =='weibo' && ($is_bind['open_id2'] || $is_bind['qq_id'])) {
				$third_id='';
			}else {
				return false;
			}
		}
		//组合保存字段
		$data[$field] =$third_id;
		
		$res=$login->where('user_id='.$user_id)->save($data);
		return $third_id;
	}
	/**
	* 三方绑定信息
	* @param $user_id
	* @date 2016-3-16
	* @return:
	*/
	public function getBind($user_id) {
		return M('UserLogin')->where('user_id='.$user_id)->find();
	}
	/**
	* 用户留言
	* @param $user_id
	* @param $content
	* @param $phone
	* @param $lianxi
	* @date 2015-11-27
	* @return:
	*/
	public function saveMsg($user_id,$content,$phone,$lianxi,$img) {
		$data=array(
			'user_id'=>$user_id,
			'content'=>$content,
			'phone'=>$phone,
			'lianxi'=>$lianxi,
			'img'=>$img,
			'create_time'=>date('Y-m-d H:i:s'),
		);
		$user=new UserModel();
		$user->saveMsg($data);
	}
	/**
	* 用户设置提醒时间
	* @param $data
	* @date 2015-11-30
	* @return:
	*/
	public function setUserTime($user_id, $atime, $ptime, $is_tishi) {
		if($atime) $data['atime']=$atime;
		if($ptime) $data['ptime']=$ptime;
		$data['user_id']=$user_id;
		$data['is_tishi']=$is_tishi;
		if ($this->getUserTime($user_id) ){
			M('UserTime')->where('user_id='.$user_id)->save($data);
		}else {
			M('UserTime')->add($data);
		}
	}
	/**
	* 用户是否设置提醒时间
	* @param $user_id 
	* @date 2016-2-3
	* @return:
	*/
	public function getUserTime($user_id) {
		return M('UserTime')->where('user_id='.$user_id)->find();
	}
	/**
	 * 存储第三方个推的clientId和本应用的uid关联
	 * @param $user_id 用户id
	 * @param $client_id 客户端的client_id
	 * @param $os_type 客户端系统 0ios,1android
	 */
	public function save_client($user_id,$client_id, $os_type){
		//存储时先删除掉相同的client_id
		$client=M('UserClient');
		$client->where('user_id='.$user_id)->delete();
		$client->where('client_id="'.$client_id.'"')->delete();
		$data['user_id']	=$user_id;
		$data['client_id']	=$client_id;
		$data['os_type']	=$os_type ? 1 : 0;
		$data['create_time']=time();
		$res=$client->add($data);
		
		return true;
	}
	
	/**
	* 清除cid
	* @param $user_id 用户id
	* @param $client_id 客户端的client_id
	*/
	public function delete($user_id,$client_id) {
		M('UserClient')->where('user_id='.$user_id.' and client_id="'.$client_id.'"' )->delete();
	}
	/**
	* 记录用户日志
	* @param $user_id
	* @param $operation_id
	* @param $oper_desc
	* @date 2015-12-9
	* @return:
	*/
	public function addUserLog($user_id, $operation_id, $oper_desc) {
		$data= array(
			'user_id' => $user_id,
			'operation_id' => $operation_id,
			'operation_desc' => $oper_desc,
			'create_time' => date('Y-m-d H:i:s'),
		);
		$user=new UserModel();
		$user->addLog($data);
	}
}