<?php
/**
* 后台动态列表
* @date: 2015-12-7
* @author: zhouyi
* @version:1.0.0
*/
class DataListAction extends WebCommonAction{
	
	//动态首页
	public function book_task_list() {
		$this->isLogin();
		$this->display();
	}

	public function send() {
		$user = new UserModel();
		$arr_user = $user->getClientId();
		$cid = array();
		foreach($arr_user as $value){
			$cid[]=$value['client_id'];
		}

		if($this->isPost()){
			$message = $this->_post('message');

			$push = new PushAction();
			$msg = $push->pushMessageToCid($cid,$message);
		}

		$this->display();
	}
}