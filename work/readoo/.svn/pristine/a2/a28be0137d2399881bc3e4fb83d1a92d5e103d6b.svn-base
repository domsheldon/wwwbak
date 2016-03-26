<?php
/**
* 环信接口
* @date: 2014-9-24
* @author: efan
* @version:1.0.0
*/
class Easemob {
	
	//传给环信的用户名和密码
	public $easemob_name='';
	public $easemob_pwd='';
	private $url;
	private $uid;
	private $token;
	private $headers;
	
	public function __construct($uid){
		if($uid){
			$this->uid = $uid;
			$this->easemob_name= "$uid";//给环信的用户名是自己的id,必须是字符串
			$this->easemob_pwd=sha1($uid);//给环信的密码是sha1
		}
		$this->url='https://a1.easemob.com/'.ORG_NAME.'/'.ORG_APP_NAME;
		$this->token=$this->get_easemob_token();
		$this->headers=array(
    		'Content-Type:application/json',
    		'Authorization:Bearer '.$this->token,		
    	);
	}
	public function get_easemob(){
		return array('username'=>$this->easemob_name,'password'=>$this->easemob_pwd);
	}
	
	//环信注册，单个
	public function easemob_register() {
		$url=$this->url.'/users';
		$postdata=array(
			'username'=>$this->easemob_name,
			'password'=>$this->easemob_pwd,
		);
		$data=json_encode($postdata);
    	$res_json=$this->curl_post($url,$data,$this->headers);
    	$res=json_decode($res_json,true);
    	//说明有误
    	if($res['error']){
    		return false;
    	}else{
    		return true;
    	}
	}
	
	//环新批量注册
	public function register_all($need_array){
		$url=$this->url.'/users';
		foreach ($need_array as $n){
			$postdata[]=array('username'=>"$n",'password'=>sha1($n));
		}
		$data=json_encode($postdata);
		$token=$this->get_easemob_token();
		//header头
    	$headers=array(
    		'Content-Type:application/json',
    		'Authorization:Bearer '.$token,		
    	);
    	$res_json=$this->curl_post($url,$data,$headers);
		$res=json_decode($res_json,true);
    	//说明有误
    	if($res['error']){
    		return false;
    	}else{
    		return true;
    	}
	}
	/**
	* 环信群组创建
	* @param $group_name 群组名
	* @param $group_desc 群组简介
	* @date 2015-10-22
	* @return: $group_id
	*/
	public function groupCreate($group_name,$group_desc) {
		$url=$this->url.'/chatgroups';
		$postdata=array(
			'groupname'=>$group_name,
			'desc'=>$group_desc,
			'public'=>true,//是否公开
			'maxusers'=>'500',//限制300成员数，默认是200
			'approval'=>false,//加入是否需要验证
			'owner'=> $this->uid, //群组管理员
		);
		$data=json_encode($postdata);
		
    	$res_json=$this->curl_post($url,$data,$this->headers);
    	$res=json_decode($res_json,true);
    	//说明有误
    	if($res['error']){
    		return false;
    	}else{
    		return $res['data']['groupid'];
    	}
	}
	/**
	* 环信批量加成员
	* @param unknowtype 
	* @date 2015-11-5
	* @return:
	*/
	public function groupAddUsers($groupid,$user_arr) {
		$url=$this->url."/chatgroups/$groupid/users";
		$data=json_encode($user_arr);
		print_r($this->headers);
		echo $data;
		echo '<br/>';
		echo $url;exit;
		$res=$this->curl_post($url, $data, $this->headers);
		var_dump($res);exit;
	}
	/**
	* 环信退出群组
	* @date 2015-10-22
	* @return:
	*/
	public function leaveGroup($groupid) {
		$url=$this->url."/chatgroups/$groupid/users/$this->uid";
		$res=$this->curl_delete($url, $this->headers);
		
	}
	//获取环信token
	private function get_easemob_token(){
		if ($_COOKIE['ease_token']) {
			return $_COOKIE['ease_token'];
		}
		$url=$this->url.'/token';
		$postdata=array(
			'grant_type'=>'client_credentials',
			'client_id'=>CLIENT_ID,
			'client_secret'=>CLIENT_SECRET,
		);
		$data=json_encode($postdata);
		//header头
    	$headers=array("Content-Type:application/json",);
		$res_json=$this->curl_post($url,$data);
		//转换成数组
		$res=json_decode($res_json,true);
		setcookie('ease_token', $res['access_token'], 7*3600);
		
		return $res['access_token'];
	}
	
	//cURL库抓网页,从一个链接上取数据(post方式)
    private function curl_post($url = '', $postdata = '',$headers) {
    	//设置curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
        
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
	//cURL库抓网页,从一个链接上取数据(delete方式)
    private function curl_delete($url, $header = 0) {
        $curl = curl_init ($url); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE ); // 对认证证书来源的检查
		curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, FALSE ); // 从证书中检查SSL加密算法是否存在
		curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header ); // 设置HTTP头
		curl_setopt ( $curl, CURLOPT_CUSTOMREQUEST, 'DELETE' );
		$result = curl_exec ( $curl ); // 执行操作
		curl_close ( $curl ); // 关闭CURL会话
		return $result;
    }
}