<?php

/**
 * 后台动态列表
 * @date: 2015-12-7
 * @author: zhouyi
 * @version:1.0.0
 */
class DataChartAction extends Action
{
    //新增活跃用户数图
    public function new_active_user_chart()
    {
        $this->display();
    }

    //新增任务数图
    public function new_task_chart()
    {
        $this->display();
    }

    //笔记发布数图
    public function release_note_chart()
    {
        $this->display();
    }

    //用户反馈吐槽数图
    public function feedback_chart()
    {
        $this->display();
    }

    //获取当年新增用户量
    public function statYearUser(){
        $month = date('Y-m',time());
        $count_model = new CountModel();
        $result = $count_model->CountYearUser($month);
        $sum_year_user = $result[0]['num'];
        $this->assign('sum_year_user',$sum_year_user);
    }
}