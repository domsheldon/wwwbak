<?php

import('@.Service.PlanBookService');
import('@.Service.PlanUserService');
class PlanBookAction extends WebCommonAction {
	
    /**
     * 共读书单列表
     */
    public function planBookList(){
        $plan = new PlanBookService();
        $uid = $this->uid;
        $list = $plan->getPlanBook();
        if(!empty($uid)){
            if($list == null){
                $list = array();
            }
            $this->data['data'] = $list;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','共读书单列表无效');
        }
    }

    public function planInfo(){
        $uid = $this->_get('uid');
        $service = new PlanUserService();
        $res = $service->isPlanUser($uid);
        if(empty($res)){
            //未加入，则标识为0
            $flag = 0;
        }else{
            $flag = 1;
        }
        $this->assign('is_join',$flag);
        $this->assign('user_id',$uid);
        $this->display();
    }

    /**
     * 加入共读计划
     * 暂时共读id为默认为1
     */
    public function joinPlan(){
        $uid = $this->_get('uid');
        $service = new PlanUserService();
        //如果没有加入共读计划，则直接加入
        $service->joinPlan($uid);
    }

    /**
     * 退出共读计划
     * 暂时共读id为默认为1
     */
    public function quitPlan(){
        $uid = $this->_get('uid');
        $service = new PlanUserService();
        //如果没有加入共读计划，则直接加入
        $service->quitPlan($uid);
    }

    /**
     * 帮助页
     */
    public function help(){
        $this->display();
    }
}