<?php
/**
 * 拆书包业务逻辑层
 * @date: 2016-1-13
 * @author: efan
 * @version:1.0.0
 */
class BookPackageService{
   
	/**
    * 拆书包详情
    * @param $bp_id 
    * @param $user_id 
    * @date 2016-2-3
    * @return:
    */
    public function getPackInfo($bp_id, $user_id) {
    	$pack=new PackageModel();
    	$pu=new PlanUserModel();
    	
    	//判断当前用户是否加入共读计划
//    	$is_add=$pu->isPlanUser($user_id);
//    	if (empty($is_add)) {		//是否加入共读计划，未加入不能查看拆书包
//    		return false;
//    	}
		CommonModel::addFieldCount('BookPack', 'id='.$bp_id, 'read_count');
    	$info=$pack->getPackageInfo($bp_id);
    	
		$info['is_digg']=$info['is_qian']='0';
		$is_qian=$pack->isCheckIn($bp_id, $user_id);	//判断当前用户是否签到
		
		$digg=new DiggModel('BookPack', 'bp_id');
		$is_digg=$digg->isDigg($bp_id, $user_id);		//判断当前用户是否点赞
		
		if ($is_digg) $info['is_digg']='1';
		if ($is_qian) $info['is_qian']='1';
		return $info;
    }
	/**
	* 签到
	* @param $bp_id
	* @param $user_id
	* @date 2016-2-2
	* @return:
	*/
	public function userCheckIn($bp_id, $plan_book_id, $user_id) {
		$pack=new PackageModel();
		$info=$pack->getPackageInfo($bp_id);
		
		//不是当天的拆书包不能签到
		if (date('Ymd') != date('Ymd',strtotime($info['pub_time'])) ) {
			return $this->return_info(false, 'time_error');
		}
		$time=time();
		
		$amin_time = strtotime(date('Y-m-d ').AMINTIME);
		$amax_time = strtotime(date('Y-m-d ').AMAXTIME);
		$pmin_time = strtotime(date('Y-m-d ').PMINTIME);
		//判断拆书包是早读还是晚读
		//判断当前时间是否可签到，早读打卡时间为早7:00至13：00 ,晚读打卡时间为17：00至24：00
		if ($info['time_type'] =='1') {
			if($time < $amin_time || $time > $amax_time){
				return $this->return_info(false, 'atime_error');
			}
		} else {
			if($time < $pmin_time){
				return $this->return_info(false, 'ptime_error');
			}
		}
		//判断当前用户是否签过到
		if ($pack->isCheckIn($bp_id, $user_id) ){
			return $this->return_info(false, 'had_check');
		}
		//判断当前拆书包是否可签到
		$end_time=M('PlanBook')->where('id='.$plan_book_id)->getField('end_time');
		if ($time > strtotime($end_time)) {
			return $this->return_info(false, 'plan_book_outdate');
		}
		$pack->checkAdd($bp_id, $plan_book_id, $user_id);
		
		//发订阅，加相应的积分
		$redis=new RedisModel();
		$redis->groupRankMsg($user_id, 'check');
		
		return $this->return_info(true, 'check_success');
	}
    
    /**
    * 获取一本书的拆书包列表
    * @param $pb_id 计划的id
    * @date 2016-1-28
    * @return:
    */
    public function getPackageList($pb_id,$user_id) {
    	$bp =new PackageModel();
    	$package_list=$bp->getPackageList($pb_id);		//拆书包列表
  		$pack_check_list=$bp->getUserBookCheck($user_id, $pb_id);//签到的拆书包
    	foreach ($pack_check_list as $v) {
    		$arr[]=$v['pack_id'];
    	}
    	
    	return array('list'=>$package_list, 'check'=>$arr);
    }
    
	//返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }
}