<?php
/**
 * Description of LoginAction
 * @author  efan
 * @name    登录类
 */
class MobileLoginAction extends Action{
	
	public $login;
	public $phone;
	public $data;
	public $version;//版本号
	
	public function __construct(){
		$this->login=new LoginModel();
		$this->phone=$this->_post('phone');
		//默认版本号
		$this->version=$this->_post('version');
		if(!empty($this->phone)){
			if(!checkphone($this->phone)){
	        	$this->ajaxReturn('10001','手机格式错误');
	        }
		}
	}
	/**
	* 判断邀请码是否可以使用
	* @date 2015-12-7
	* @return:
	*/
	public function checkYqcode() {
		$yqcode=$this->_post('yqcode');
		//和静态的200个数据判断是不是有这个邀请码
		$yqinfo=M('Yqcode')->where("yqcode='$yqcode' and is_delete=0")->find();
		if(empty($yqinfo)){
			$this->ajaxReturn('0','邀请码无效');
		}
		
		$this->ajaxReturn();
	}
	/**
	* 注册发送验证码接口（第三方绑定手机时发的验证码）
	*/
	public function sign_send_msg () {
		//是否存在此手机号 
    	$is_exists=$this->login->check_mobile($this->phone);
    	if($is_exists[0]){
    		$uid=$is_exists[0];
    		$this->data['uid']=$uid;
    		$this->ajaxReturn('10006','手机号已存在');
    	}
        $this->send_msg();
	}
	/**
	* 忘记密码时发验证码
	*/
	public function uppwd_send_msg() {
		//是否存在此手机号 
    	$is_exists=$this->login->check_mobile($this->phone);
    	if(!$is_exists[0]){
    		$this->ajaxReturn('10007','手机号不存在');
    	}
    	$this->send_msg();
	}
	//发送验证码
	private function send_msg(){
//		$sms=new SmshxsModel();
		$sms=new SmsModel();
		$res = $sms->post_sms_by_mobile($this->phone);
		
//		$is_time=$sms->isTime($this->phone);
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
		$fold='readoo/'.date('Ymd');
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
    	//验证验证码和是否过期，10分钟的有效期
//		$sms=new SmshxsModel();

		/**********add by qyluo修改短信发送方式***************/
		$sms = new SmsModel();
		$res = $sms->check_mobile_code($this->phone, $code);
//		$this->ajaxReturn($res[0],$res[1]);
		/********************end*******************************/

		//$is_check=$sms->checkCode($this->phone, $code);
		if ($res) {
			$this->ajaxReturn();
		} else {
    		$this->ajaxReturn('10004','验证码错误');
		}
	}
    /**
    * app注册
    * 手机注册，验证码和密码一起发送过来
    */
    public function app_sign() {
    	$pwd 	= $this->_post('pwd');
    	$name 	= $this->_post('name');
    	$sex 	= $this->_post('sex');
    	$avatar = 'readoo.png';
    	if (!empty($_FILES['img'])) {
			$avatar = $this->upload_avatar();
		}
    	$this->check_pwd($pwd);
    	//是否存在此手机号 
    	$is_exists=$this->login->check_mobile($this->phone);
    	if($is_exists[0]){
    		$this->ajaxReturn('10006','手机号已存在');
    	}
    	//注册返回uid
    	$res_login=$this->login->register($this->phone, $pwd, $name, $sex, $avatar);
    	if ($res_login[0]) {
    		$user_id=$res_login[0];
    		$this->data['uid']=$user_id;
    		
			$this->data['data']=UserModel::getUserInfo($user_id, '*');
    		$this->ajaxReturn();
    	}else{
    		$this->ajaxReturn('0','请求失败');
    	}
    	
    }
    /**
    * app手机号登录
    * 返回格式：成功时array('user_id'=>'','is_full'=>'')信息是否完整
    */
    public function app_entry() {
    	$pwd=$this->_post('pwd');
    	$this->check_pwd($pwd);
    	//是否存在此手机号 
    	$is_exists=$this->login->check_mobile($this->phone);
    	if(!$is_exists[0]){
    		$this->ajaxReturn('10006','手机号不存在');
    	}
    	$res=$this->login->login($this->phone, $pwd);
    	if($res[0]){
    		$user_id=(int)$res[0];
    		$this->data['uid']=$user_id;
    		$login_time=$this->login->get_last_login_time($user_id);
    		$this->data['login_time']=$login_time ? $login_time :'0';
    		
			$this->data['user_info']=UserModel::getUserInfo($user_id,'*');
    		$this->ajaxReturn();
    	}else{
    		$this->ajaxReturn('10010','密码错误');
    	}
    }
   
    /**
    * 忘记密码,判断是否存在此手机号，然后验证手机号，发送
    * @param newpwd 新密码 
    */
    public function up_pwd() {
    	$code=$this->_post('code');
    	
    	$is_exists=$this->login->check_mobile($this->phone);
    	if(strlen($code)!=6){
    		$this->ajaxReturn('10008','参数有误');
    	}
    	if(!$is_exists[0]){
    		$this->ajaxReturn('10007','手机号不存在','error');
    	}
//    	$sms=new SmshxsModel();
//		$is_check=$sms->checkCode($this->phone, $code);

		/************************修改短信发送版本*******************/
		$sms = new SmsModel();
		$res = $sms->check_mobile_code($this->phone, $code);
		$is_check = $res[0];
		/************************end*******************/

//		if ($is_check ==1) {
		if ($is_check) {
			//清空session里的手机号和时间
			session_unset();
			session_destroy();
			//给手机号发送原密码
			$passwd = M('UserInfo')->where('user_id='.$is_exists[0])->getField('password');
			$pwd = auth_code($passwd, 'DECODE', MY_SUPER_KEY);
			//$send_msg='尊敬的用户，有书为您找回密码'.$pwd;
			//天翼平台无法发送自定义短信，暂时先使用hxs
			//$sms1=new SmshxsModel();
			//$sms1->send_sms($this->phone, $send_msg);
	    	$this->data['pwd']=$pwd;
	    	$this->ajaxReturn();
		}
    	elseif ($is_check == -1) {
    		$this->ajaxReturn('10003','验证码失效');
    	} else {
    		$this->ajaxReturn('10004','验证码错误');
    	}
    }
	/**
	* 检验密码,一个汉字一个字符
	*/
	public function check_pwd($pwd) {
		//特殊字符&和' "传过来后都是3 4个的字符
		if(!utf8_Length($pwd, 6, 36)){
    		$this->ajaxReturn('10005','密码格式错误');
    	}
    	//检验密码只能为数字和字母
//    	if(!preg_str_num($pwd)){
//    		$this->ajaxReturn('10005','密码格式错误');
//    	}
    	return true;
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

