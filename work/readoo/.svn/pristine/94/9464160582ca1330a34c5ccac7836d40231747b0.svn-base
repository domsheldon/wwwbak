<?php
/**
* 互信通的短信验证码model
* 这个服务商的只需要个get方式就能发送
* @date: 2015-9-11
* @author: efan
* @version:1.0.0
*/
class SmshxsModel extends Model {
	
	private $sign = '【Readoo】'; // 应用签名，只是个字符串
	private $uid = 'zsht'; //互信通的uid
	private $pwd = 'zsht123456'; //互信通的密码
	private $mobile = ''; //要发送的手机号
	private $msg = ''; //要发送的内容
	private $dtime = ''; //时间为空即立即发送
	private $code = ''; //生成的6位验证码
	private $url = 'http://www.hxtsms.cn/api/get_send';
	
	/**
	* 发送验证码
	* @param $mobile 
	* @date 2015-9-11
	* @return:
	*/
	public function send_sms($mobile, $msg='') {
		$this->mobile=$mobile;
		if ($msg) {
			$this->msg=$msg.$this->sign;
		} else {
			$this->set_code();
			//存入session
			$this->save_session();
			$this->msg='尊敬的用户，您的验证码为'.$this->code.',本验证码10分钟内有效，感谢您使用'.$this->sign;
		}
		$param['uid'] = "uid=" . $this->uid;
        $param['pwd'] = "pwd=" . $this->pwd;
        $param['mobile'] = "mobile=" . $this->mobile;
        $param['msg'] = "msg=" . $this->msg;
        $param['dtime'] = "dtime=" . $this->dtime;
        $plaintext = implode("&", $param);
		$send_url=$this->url.'?'.$plaintext;
		
		$res=CommonModel::curl_get($send_url);
		if ($res ==0) 
			return true;
	}
	//生成6位的数字验证码
	private function set_code(){
		for ($i=0;$i<6;$i++) {
			$code.=rand(0, 9);
		}
		$this->code=$code;
	}
	//把当前时间和验证码存入session
	private function save_session() {
		session_start();
		//存入session
		$_SESSION[$this->mobile.'_code']=$this->code;
		$_SESSION[$this->mobile.'_time']=time();
	}
	
	//判断短信时间是否够60s
	public function isTime($mobile) {
		if ($_SESSION[$mobile.'_time']){
			if (time() - (int) $_SESSION[$mobile.'_time'] < 58) {
				return false;
			}
		}
		return true;
	}
	/**
	 * 判断手机号和验证码是否匹配
	 * @param  $mobile 手机号
	 * @param  $code 传过来的验证码
	 * @return 1 验证成功，0不匹配，-1验证码失效
	 */
	public function checkCode($mobile,$code) {
		session_start();
		if ($_SESSION[$mobile.'_code'] && (time() - (int)$_SESSION[$mobile.'_time'] < 600 )) {
			if ($code == $_SESSION[$mobile.'_code']) {
				//清空session里的手机号和时间
				session_unset();
				session_destroy();
				return 1;
			} else {
				return 0;
			}
		} else {
			return -1;
		}
	}
	
}