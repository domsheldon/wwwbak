<?php
/**
 * Description of LoginAction
 * @author  efan
 * @name    登录类
 */
import('@.Service.UserService');
class MobileLoginAction extends Action{
	
	public $login;
	public $phone;
	public $data;
	public $version;
	
	public function __construct(){
		$this->login=new LoginModel();
		$this->phone=$this->_post('phone');
		//默认版本号
		if(!empty($this->phone)){
			if(!checkphone($this->phone)){
	        	$this->ajaxReturn('10001','手机格式错误');
	        }
		}
	}
	/**
	* 是否显示手机号登录
	* @date 2016-2-15
	* @return:
	*/
	public function showPhone() {
		$is_pass='1';
		if ($this->_post('soft') =='1.0.2') {
			$is_pass='0';
		}
		$this->data['is_pass']=$is_pass;//判断ios是否审核通过,2016.2.15定的审核通过后不显示手机号登录
		$this->ajaxReturn();
	}
	//发送验证码
	public function send_msg() {
		$sms=new SmsModel();
		$res = $sms->post_sms_by_mobile($this->phone);
		
		if ($res) {
			$this->ajaxReturn();
		}else {
			//请求频繁
			$this->ajaxReturn('10000','请求失败');
		}
	}
	//返回中间部分，域名什么的后面拼
	private function upload_avatar(){
		//上传头像
		$bucket='fengwo-avatar';
		$fold='readwith/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename[0];
	}
	/**
	* 判断验证码是否正确
	* @date 2015-12-4
	* @return:
	*/
	public function checkCode() {
		$code=$this->_post('code');
		if (strlen($code)!=6) {
    		$this->ajaxReturn('10008','参数有误');
    	}
    	$sms = new SmsModel();
    	$res = $sms->check_mobile_code($this->phone, $code);		//检查验证码是否过期
    	if ($res[0]) {
    		$user=new UserService();
    		$user_data=$user->login($this->phone, 'mobile');
    	
    		$this->data['user_data'] = $user_data;
    		$this->ajaxReturn();
    	}
		$this->ajaxReturn('0', '验证码错误');
	}
    
    /**
    * 第三方登录，微信、QQ、微博
    */
    public function thirdEntry() {
    	$type=$this->_post('type');
    	$third_id=$this->_post('third_id');
    	$union_id=$this->_post('union_id');
    	if ( ($type =='weixin' && empty($union_id)) || empty($third_id)) {
    		$this->ajaxReturn('0', '未获取到第三方信息');
    	}
    	$user=new UserService();
    	$user_data=$user->login($third_id, $type, $union_id);
    	//三方绑定信息
    	$bind_info=$user->getBind($user_data['user_id']);
    	$bind['wx']=$bind['qq']=$bind['weibo']='0';
    	if ($bind_info['open_id2']) {
    		$bind['wx']='1';
    	}
    	if ($bind_info['qq_id']) {
    		$bind['qq']='1';
    	}
    	if ($bind_info['weibo_id']) {
    		$bind['weibo']='1';
    	}
    	$this->data['user_data'] = $user_data;
    	$this->data['bind']=$bind;
    	$this->ajaxReturn();
    }
    
	/**
	* 信息返回
	* @param $code  
	* @param $msg  
	* @return:json
	*/
	public function ajaxReturn($code='1',$msg='成功') {
		$this->data['code']=$code;
		$this->data['msg']=$msg;
		header('Content-Type:application/json; charset=utf-8');
		return exit(json_encode($this->data));
	}

}

