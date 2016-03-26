<?php
/**
* 拆书包model
* @date: 2016-1-28
* @author: efan
*/
class PackageModel extends Model{
	
	/**
	 * 取拆书包列表
	 * @param $pb_id 共读id
	 */
	public function getPackageList($pb_id) {
		//取此书的指定时间的拆书包
		return M('BookPack')->where('pb_id='.$pb_id.' and pub_time < now()')->order('pub_time desc')->select();
	}
	
	/**
	* 拆书包详情
	* @param $id 
	* @date 2016-2-2
	* @return:
	*/
	public function getPackageInfo($id) {
		return M('BookPack')->where('id='.$id)->find();
	}
	/**
	* 根据时间来取出相应时间段的共读书
	* @param $time 时间 
	* @param $is_need_cover 是否需要封面
	* @date 2016-2-2
	* @return:
	*/
	public function getTimeBook($time, $is_need_cover=0) {
		$pb=new PlanBookModel();
		$pb_list=$pb->getTimePlanBook($time);
		if ($is_need_cover) {
			foreach ($pb_list as $v) {
				$book_arr[]=$v['book_id'];
			}
			$book=new BookModel();
			$book_list=$book->getBookInfo($book_arr);
			foreach ($pb_list as $k=>$b) {
				$pb_list[$k]['book_cover']=$book_list[$b['book_id']]['cover'];
			}
		}
		return $pb_list;
	}
	/**
	* 根据当前时间判断是哪个拆书包，取book_pack_id
	* @param $plan_book_id  共读计划id
	* @date 2016-2-4
	* @return:id--拆书包id
	*/
	public function getPackIdByTime($plan_book_id) {
		$time_type=1;
		if (time() > strtotime(date('Y-m-d' ).PMINTIME) ) {	//大约17点说明是下午排行
			$time_type=2;
		} 
		//只会得到    当天    早或晚读   拆书包id
		$sql="select id,time_type from rw_book_pack where date_format(pub_time,'%Y-%m-%d')=current_date() and time_type=$time_type";
		$pack_list=M()->query($sql);
		
		return $pack_list[0];
	}
	
	/**
	* 是否签到
	* @param $id
	* @param $user_id
	* @date 2016-2-2
	* @return:
	*/
	public function isCheckIn($pack_id, $user_id) {  
		$is=M('BookPackCheck')->where("pack_id=$pack_id and user_id=$user_id")->find();
		if ($is) {
			return true;
		}
		return false;
	}
	/**
	* 用户对某一本书的签到情况
	* @param $user_id	用户id 
	* @param $pb_id 	plan_book的共读id
	* @date 2016-3-8
	* @return:
	*/
	public function getUserBookCheck($user_id, $pb_id) {
		return M('BookPackCheck')->field('pack_id')->where('user_id='.$user_id.' and pb_id='.$pb_id)->select();
	}
	/**
	* 签到
	* @param $id 拆书包id
	* @param $plan_book_id 共读id
	* @param $user_id
	* @date 2016-2-2
	* @return:
	*/
	public function checkAdd($id, $plan_book_id, $user_id) {
		$data = array(
			'pack_id' =>$id,
			'pb_id' =>$plan_book_id,
			'user_id' =>$user_id,
			'create_time' =>date('Y-m-d H:i:s')
		);
		M('BookPackCheck')->add($data);
	}
	/**
	* 每天的签到时间排行
	* @param $pack_id
	* @date 2016-2-4
	* @return:
	*/
	public function getPackCheckTimeSort($pack_id) {
		$list=array();
		$redis=new RedisModel();
		if ($redis->isConnect() !==false) {
			$list=$redis->getCheckData($pack_id);
		}else {
			$list=$this->packDayCheck($pack_id);
		}
		
		foreach ($list as $u) {
			$arr[]=$u['user_id'];
		}
		$user=new UserModel();
		$user_list=$user->getUserInfo($arr);
		foreach ($list as $k=>$v) {
			$list[$k]['user_data']=$user_list[$v['user_id']];
		}
		return $list;
	}
	/**
	* 
	* @param $pack_id
	* @date 2016-3-21
	* @return:
	*/
	public function packDayCheck($pack_id) {
		return M('BookPackCheck')->field('user_id,create_time')->where('pack_id='.$pack_id.' AND DATE_FORMAT(create_time,"%Y-%m-%d")=CURRENT_DATE()')->order('create_time asc')->limit(0,50)->select();
//		echo M('BookPackCheck')->getLastSql();exit;
	}
	/**
	* 取出当前用户对pack_id签到中的排名
	* @param $pack_id 
	* @param $user_id 
	* @date 2016-2-4
	* @return:排名数 28
	*/
	public function getMeCheckSort($pack_id, $user_id) {
		$pack=M('BookPackCheck');
		$user=new UserModel();
		
		$user_data=$user->getUserInfo(array($user_id));
		//取当前用户的签到时间
		$me_time=$pack->where("pack_id=$pack_id and user_id=$user_id")->getField('create_time');
		//取比此时间早的用户数
		$user_count=$pack->where('pack_id='.$pack_id.' and create_time <="'.$me_time.'"')->count();
		
		return array(
				'paiming' =>$user_count +1,
				array('user_id'=>$user_id, 'r'=>$me_time, 'user_data'=>$user_data[$user_id]),
		);
	}
	
	/**
	* 总签到次数排行
	* @date 2016-2-4
	* @return:
	*/
	public function getAllCheckCount() {
		$list=array();
		$redis=new RedisModel();
		if ($redis->isConnect() !== false) {		//尝试连接redis
			$list=$redis->getCheckSumData();
		} else {
			$list=M('BookPackCheck')->field('user_id, count(user_id) as r')->group('user_id')->order('r desc')->limit(0,50)->select();
		}
		//$list=M('BookPackCheck')->field('user_id, count(user_id) as r')->group('user_id')->order('r desc')->limit(0,50)->select();
		
		foreach ($list as $u) { 
			$arr[]=$u['user_id'];
		}
		$user=new UserModel();
		$user_list=$user->getUserInfo($arr);
		foreach ($list as $k=>$v) {
			$list[$k]['user_data']=$user_list[$v['user_id']];
		}
		return $list;
	}
	/**
	* 当前用户在总签到数的排名
	* @param $user_id 
	* @date 2016-2-4
	* @return:
	*/
	public function getMeCheckSumCount($user_id) {
		$pai=$check_sum=0;
		$user=new UserModel();
		$check_sum=$this->getUserCheckCount($user_id);		//用户的总签到数
		if (empty($check_sum)) return false;
		//取自己的签到次数的排名
		$sql="select count(*) as s from rw_book_pack_check group by user_id having s > $check_sum";
		$paiming=M()->query($sql);
		$pai=count($paiming) + 1;
		
		//组合 和总排行的数据结构一致
		$user_data=$user->getUserInfo(array($user_id));
		return array(
				'paiming' =>$pai,
				array('user_id'=>$user_id, 'r'=>"$check_sum", 'user_data'=>$user_data[$user_id]),
		);
	}
	/**
	* 一个人的签到次数
	* 每个用户签到次数在一段时间内是固定的，可以在每次用户签到时更新redis里的哈希值
	* @param $user_id
	* @date 2016-2-4
	* @return:
	*/
	public function getUserCheckCount($user_id) {
		$count=M('BookPackCheck')->where('user_id='.$user_id)->count();
		return (int)$count; 
	}
	
}
