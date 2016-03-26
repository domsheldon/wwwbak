<?php
/**
* 后台动态列表
* @date: 2015-12-7
* @author: zhouyi
* @version:1.0.0
*/
class SendmsgAction extends WebCommonAction{
	
	//动态首页
	public function index() {
		$this->isLogin();
		$this->display();
//		$cookie_username = cookie('user_name');
//		$session_username = session('user_name');
//		$backenduser = M('BackendUser');
//		$res_cookie = $backenduser->where("user_name = '$cookie_username'")->find();
//		$res_session = $backenduser->where("user_name = '$session_username'")->find();
//
//		if (empty($res_cookie)&&empty($res_session)) {
//			$this->redirect('/Admin/Login/index');
//		} else {
//
//
//		}
	}
	//返回中间部分，域名什么的后面拼
	public function upload_avatar(){
		//上传头像
		$bucket='fengwo-avatar';
		$fold='ad/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket,$fold);
		return $filename[0];
	}
	public function send() {
		if($this->isPost()){
			$push_title=$this->_post('title');
			$content=$this->_post('content');
			$href=$this->_post('href')? $this->_post('href') : '';
			$title = $this->_post('title');
			if(empty($content)){
				$this->error('需填推送内容');
			}
			$image='';
			if($_FILES['img']){
				$image=$this->upload_avatar();
			}
			//测试字段
			$data['image']=$image;
			$data['content']=$content;
			$data['href']=$href;
			$data['title']=$push_title;
			$data['create_time']=time();
			M('AdminPush')->add($data);
			//取需要推送的cid
			$where='';
			$client_list=M('UserClient')->field('client_id as cid')->where($where)->select();
			foreach ($client_list as $c) {
				$cid_arr[]=$c['cid'];
			}
			
			$push=new PushAction();
			$data['image']=OSS_AVATAR.$image;
			$push_message=json_encode($data);
			$res=$push->pushMessageToCid($cid_arr, $push_message, $push_title);
			if($res){
				$this->success('success');
				echo  "<script> alert('success');parent.location.href='/Admin/Sendmsg/index'; </script>";
			}
			else{
				echo  "<script> alert('failed');parent.location.href='/Admin/Sendmsg/index'; </script>";
			}
		}else{
			$this->display();
		}
	}
	
}