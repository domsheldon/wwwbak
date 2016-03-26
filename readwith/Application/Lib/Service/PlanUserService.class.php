<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/2/3
 * Time: 16:44
 */
class PlanUserService
{
    public function joinPlan($uid,$gd_id=1){
        $plan = new PlanUserModel();
        $res = $plan->isPlanUser($uid);
        if(empty($res)) {
            $plan->addPlanUser($uid,$gd_id);
        }
    }

    public function quitPlan($uid,$gd_id=1){
        $plan = new PlanUserModel();
        $plan->delPlanUser($uid);
    }

    public function isPlanUser($uid){
        $plan = new PlanUserModel();
        return $plan->isPlanUser($uid);
    }
}
