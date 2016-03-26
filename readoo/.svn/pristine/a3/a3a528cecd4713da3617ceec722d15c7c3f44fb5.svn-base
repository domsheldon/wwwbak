<?php
/**
* 判断参数类
* @date: 2015-4-13
* @author: efan
* @version:1.0.0
*/
class CheckService{
	
	public function __construct($uid){
		if($uid == ADMIN_USER){
			$this->ajaxReturn('-1','还未登录');
		}
	}
	
	/**
	 * 判断id是否为数字 
	 * @param $id 	各类型id
	 */
	public function checkId($id) {
		if(!check($id)){
			$this->ajaxReturn('10001','error_id');
		}
		return true;
	}
	
	/**
	* 判断content
	* @param string $content 内容
	* @param string $length 内容长度 
	* @param string $is_empty 内容是否可以为空，默认可以为空，1不能为空
	* @param string $error_msg 提示语
	* @return:
	*/
	public function checkContent($content, $is_empty='', $length='140',$error_code='10041',$error_msg='内容有误') {
		if($is_empty && empty($content)){
			$this->ajaxReturn($error_code,$error_msg);
		}
		if(!empty($content) && !utf8_Length($content, 1, $length)){
			$this->ajaxReturn($error_code,$error_msg);
		}
	}
	/**
	* 判断关键字是否为空
	* @param unknowtype 
	* @return:
	*/
	public function checkKeyword($keyword,$type='') {
		if(empty($keyword)){
			$this->ajaxReturn('10048','关键字不能为空');
		}
		//code（有书号）类型要判断是不是8位
		if($type =='code'){
			if(strlen($keyword) != 6){
				$this->ajaxReturn('10049','有书号错误');
			}
		}
	}
	/**
	* ,分隔的字符串判断
	* @param $string 
	* @date 2015-10-16
	* @return:
	*/
	public function checkStrComma($string) {
		//,分隔
		$str_arr=explode(',', $string);
		$result=array_unique($str_arr);
		$str_count=count($result);
		if ($str_count >0 && $str_count <11) {
			//循环判断每个字符串的长度
			for ($i=0; $i<$str_count; $i++) {
				$len=strlen($result[$i]);
				if ($len >0 && $str_count <11) {
					return $result;
				}
			}
		}
		$this->ajaxReturn('10059','内容错误');
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
		header('Content-Type:application/json; charset=utf-8');
		return exit(json_encode($this->data));
	}
}