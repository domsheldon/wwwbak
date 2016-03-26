<?php
/**
* 后台动态列表
* @date: 2015-12-7
* @author: zhouyi
* @version:1.0.0
*/
class FeedBackAction extends WebCommonAction{


	//动态首页
	public function index() {
		$this->isLogin();
		$msginfo = M('Msg')->select();
		$this->assign('msginfo',$msginfo);
		$this->display();
	}

}