<?php

/**
 * 后台动态列表
 * @date: 2015-12-7
 * @author: zhouyi
 * @version:1.0.0
 */
class AddTaskTableAction extends WebCommonAction
{
    //新增活跃用户数图
    public function index()
    {
        $this->isLogin();
        $count = new CountModel();

        if($this->isPost()){
            //选取时间范围用户列表
            $start_time = $this->_post('start');
            $end_time = $this->_post('end');
            $task_info = $count->SelectTaskInfo($start_time,$end_time);
            cookie('start', $start_time,3600);
            cookie('end', $end_time,3600);
            $this->assign('task_info',$task_info);
        }
        else{
            //缺省今天新增用户
            $task_info = $count->TodayTaskInfo();
            $this->assign('task_info',$task_info);
        }

        $start = cookie('start');
        $end = cookie('end');
        $this->assign('start',$start);
        $this->assign('end',$end);

        //所有用户列表
        $all = $count->AllTaskInfo();
        $this->assign('all',$all);
        $this->display();
    }

    public function search()
    {

        $count = new CountModel();
        //缺省今天新增用户

        echo 999;die();
    }
}