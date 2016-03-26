<?php
import('@.ORG.Net.Http');
class TestAction extends Action {
	//生成底图+二维码图的链接地址
	public function getImg() {
		if ($this->isPost()) {
			vendor('phpqrcode.phpqrcode','','.php');
			//根据传过来的群名生成二维码，编成一个url,
			$group_name=trim($this->_post('name'));
			if ($group_name) {
				$group_id=M('Group')->where("group_name='".$group_name."'")->getField('id');
				$s=base64_encode($group_id);
				$url="http://zaia.fengwo.com/wechat/readlist?msg=joingroup&token=$s";		//二维码里的内容封装的是微信的地址，才能获取的用户信息
				
				QRcode::png($url, 'qrcode.png', 2, 5);	//生成二维码
				
				//把小图和底图拼到一起，给ajax返回图片地址
				//header("Cache-Control: no-cache, must-reva lidate"); 
				//header("Pragma: no-cache"); 
				echo 'http://'.$_SERVER['HTTP_HOST'].'/setimg';
				exit;
			}
		}
		$this->display('/WeChat/group_img');
	}
	/**
	 * 二维码和底图拼接，直接返回图片 
	 */
	public function setImg() {
		header('Content-Type:image/png');
		//步骤：加载底图的画布；加载头像的小图（固定的oss格式图片）
		$im=imagecreatefrompng('join.png');//底图;
		$sim=imagecreatefrompng('qrcode.png');	//小图
		$red = imagecolorallocate($im, 255, 0, 0);
		
		//imagestring($im, 3, 0, 0, 'hello', $red);
		imagecopy($im, $sim, 80, 970, 0, 0, 235, 235);		//小图拷贝到底图上
		
		imagepng($im);
		imagedestroy($im);
		imagedestroy($sim);
	}

	public function downUp() {
		$url='http://wx.qlogo.cn/mmopen/PiajxSqBRaELDDxiaszNkosnr2shF6w4YgaWUUzvDnY7wTeadgFM9lJu6rtrKgMibmZPZ3BCiae39fqNoveeNBlEl5nuiaYOpRQjnxuTPYj5y1Sw/0';
		$local='./downup/56aa117d4a7c1.jpg';
		unlink($local);
		//Http::curlDownload($url, $local);
		//$cover=$this->book_upload_cover($local);
	} 
	/**
	 * 给OSS上传图书封面
	 * @param string $dir 本地图片路径
	 * @param string $dir oss上存储的名字
	 */
	private function book_upload_cover($filename){
		//上传头像
		$bucket='fengwo-avatar';
		$object='readwith/'.date('Ymd');
		$oss=new OssAction();
		$file=$oss->oss_upload_file($bucket,$object,$filename);
		return $file;		
	}
	public function test() {
		echo system('cmd.exe /c e:\\123.bat',$status);
		exit();		
		$this->display('/Index/uedit');
	}
	public function upimg(){
		$CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("config.json")), true);
		$action = $_GET['action'];
		if ($action =='config'){
        	$result =  json_encode($CONFIG);
       		echo $result;exit;
		} else {
			$img=$this->upload_img();
			$img_src=OSS_COVER. $img;
			
			echo json_encode(array(
				"state" => 'SUCCESS',
	            "url" => $img_src,
	            "title" => $img_src,
	            "original" => $img,
	            "type" => '.jpg',
	            "size" => '20'
			));
		}
	}
	//返回中间部分，域名什么的后面拼
	private function upload_img(){
		//上传头像
		$bucket='avatar';
		$fold='readwith/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename[0];
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
