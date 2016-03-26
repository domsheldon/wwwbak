<?php
/**
* app接口加密的公共方法，变量用_，方法用驼峰命名
* @date: 2014-8-7
* @author: efan
* @version:1.0.0
*/
class WebCommonAction extends Action {
	
	private $key = '!234567899@dalaba.com';
	public $uid;
	public $data;
	
	public function __construct() { 
		parent::__construct();
		//地址
		$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		//uid
		$this->uid=$_POST['user_id'] ? $_POST['user_id'] : '1';
		//==则判断uid
		if(!check($this->uid)){
			$this->ajaxReturn('10005','uid错误','error');
		}
		//客户端的token
		$token=$_POST['token']?$_POST['token']:'';
		unset($_POST['token']);
		//参数array
		$param=$_POST;
		//生成服务端的token
		$private_token=$this->get_token($this->uid);
		$web_token=$this->generateVerfyCode($url, $param, $private_token);

		//相比较，!=则报错
//		if($web_token != $token){
//			$this->ajaxReturn('0','token error');
//		}
	}
	
	
	/**
     * 通过对url和参数加密生成VerfyCode，例如获取用户的feed的url是
     * http://www.test.com/api/home/feed/count/1/page/20/id/1
     * 
     *  api url为 http://www.test.com/api/home/feed/
     * 传递的参数为 param=array("id"=>1,"page"=>20,"count"=>1)
     * 
     * app在传递给服务器的参数中，加上使用generateVerfyCode生成的VerfyCode，
     * 所以发送给服务器的url应为
     * http://www.test.com/api/home/feed/count/1/page/20/id/1/verifycode/95aa9066d5801815a57bbe537280406b5516cb2a
     * 
     * 服务器根据这个url和参数用同样的算法生成VerfyCode，
     * 对比app传过来的VerfyCode和服务器生成的VerfyCode，就知道url在传输的过程中是否有被改动
     * 
     * @param $apiUrl api的url
     * @param $param url中附带的参数
     * @param $token 根据id获取的私钥
     */
    private function generateVerfyCode($apiUrl, $param, $token) {

        $params_data = "http://";
        $params_data.=$apiUrl;

        ksort($param);
        foreach ($param as $key => $value) {
            $params_data = $params_data .'/'. $key .'/'. $value;
        }
        $params_data = $params_data . $token;
        return md5($params_data);
    }

    private function get_token($id) {
        return md5($id . '_' . $this->key);
    }
	
	/**
	* 信息返回
	* @param $code  
	* @param $msg  
	* @return:json
	*/
	public function ajaxReturn($code='1',$msg='success') {
		$this->data['code']=$code;
		$this->data['msg']=$msg;
		$str=json_encode($this->data);
		//$result=str_replace('null', '""', $str);
		header('Content-Type:application/json; charset=utf-8');
		return exit($str);
	}

}