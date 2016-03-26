<?php

/**
 * 后台动态列表
 * @date: 2015-12-7
 * @author: zhouyi
 * @version:1.0.0
 */
class TodayActiveUserTableAction extends WebCommonAction
{
    //新增活跃用户数图
    public function index()
    {
        $this->isLogin();
        $count = new CountModel();

        //缺省今天活跃用户
        $user_info = $count->TodayActiveUserInfo();
        $this->assign('user_info',$user_info);

        $this->display();
    }

    public function search()
    {

        $count = new CountModel();
        //缺省今天新增用户

        echo 999;die();
    }
}