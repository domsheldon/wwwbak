<?php

import('@.Service.PlanBookService');
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
}