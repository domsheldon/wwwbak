<?php

class TestAction extends Action {
	
	public function test() {
		echo '<pre/>';print_r($_SERVER);exit;
		var_dump($_FILES);
	}
	public function makeCode() {
		
		$yq=M('Yqcode');
		for ($m=0; $m<500; $m++) {
			$str='';
			for ($i=0; $i <6; $i++) {
				$str.=rand(0, 9);
			}
			$yq->add(array('yqcode'=>$str));
		}
	}
	public function makeDate() {
		$date=M('dic_date');
		for ($i=0;$i<300;$i++) {
			$data['days']=date('Y-m-d',strtotime('2016-7-26') + $i*24*3600);
			$date->add($data);
		}
		
	} 
	
	
	public function push() {
		echo strtotime('2015-12-05');exit;
		$cid ='92e27c1a3caa850da7d631554dde8051';
//		$cid1='75c6342d7d373aedf95549f81d8b513f';
		$data['content'] ='test';
		$data['href'] ='http://www.baidu.com';
		$data['img'] ='http://avatarimg.fengwo.com/default.png';
		$data['create_time']=time();
		$push_message = json_encode($data);
		echo $push_message;exit;
		//推送
		$push=new PushAction();
		$res=$push->push_notify($cid, $push_message, 'test notify');
		var_dump($res);
	} 
}
