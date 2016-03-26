<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/1/21
 * Time: 15:03
 */
class PlanUserModel extends Model
{
    /**
     * @param $user_id
     */
    public function isPlanUser($user_id){
        $plan_user = M("PlanUser");
        return $plan_user->where("user_id = '$user_id' and gd_id = 1")->find();
    }

    /**
     * 加入共读计划
     */
    public function addPlanUser($user_id,$plan_id=1){
        $create_time=date('Y-m-d H:i:s');
        $plan_user = M("PlanUser");
        $res = $plan_user->where("user_id ='$user_id' and gd_id = 1")->find();
        if(!isset($res)){
            $plan_user->add(array('user_id'=>$user_id,'gd_id'=>'1','create_time'=>$create_time));
        }
    }

    /**
     * 退出共读计划
     */
    public function delPlanUser($user_id){
        $plan_user = M("PlanUser");
        $plan_user->where("user_id ='$user_id' and gd_id = 1")->delete();
    }
	/**
	* 加入计划的总数
	* @date 2016-2-4
	* @return:
	*/
	public function planUserSum() {
		return M('PlanUser')->count();
	}
}