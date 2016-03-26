<?php
/**
* 引用的是第三方个推应用
* @date: 2014-12-23
* @author: efan
* @version:1.0.0
*/

vendor('GeTui.IGt','','.Push.php');

class Push{
	
	//有书产品的相关id
	private $app_id='OUhH7lRzjz7h0LMh6oO0c4';
	private $app_key='abM9lF2O528cDCjLUdAOR3';
	private $app_secret='13Jv5503lSAFWDE9mpkgG3';
	private $master_secret='lSYgqynCEy6wUEeAT7ZjY8';
	private $host='http://sdk.open.api.igexin.com/apiex.htm';
//	private $cid='efa444fb11603caeb918341d450ef9ac';
//	private $cid='5a4c0dc56fe92deb9a5e7f5a69a348be';
	
	
	/**
	 * 单推接口案例
	 * @param $content  2048中/英字符
	 * @param $type  通知的类型，主要是ios通知栏的推送显示不同内容
	 */
	public function push_notify($cid,$content,$type){
	    $igt = new IGeTui($this->host, $this->app_key, $this->master_secret);
	    //消息模版：
	    $template = $this->IGtTransmissionTemplateDemo($content,$type);
	
	    //个推信息体
		$message = new IGtSingleMessage();
	
		$message->set_isOffline(true);//是否离线
		$message->set_offlineExpireTime(3600*12*1000);//离线时间
		$message->set_data($template);//设置推送消息类型
//		$message->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
		//接收方
		$target = new IGtTarget();
		$target->set_appId($this->app_id);
		$target->set_clientId($cid);
		
		$rep = $igt->pushMessageToSingle($message,$target);
		if($rep['result'] == 'ok'){
			return true;
		}else{
			return false;
		}
	}
	//透传功能模板
	private function IGtTransmissionTemplateDemo($content,$type){
	    $template =  new IGtTransmissionTemplate();
	    //应用appid
	    $template->set_appId($this->app_id);
	    //应用appkey
	    $template->set_appkey($this->app_key);
	    //透传消息类型
	    $template->set_transmissionType(2);
	    //透传内容2048中/英字符
	    $template->set_transmissionContent($content);
	    switch ($type){
	    	case 'apply':
		    	$template->set_pushInfo("查看","1","有条新通知","sound");
		    	break;
	    	case 'digg':
		    	$template->set_pushInfo("查看","1","有书友赞了您","sound");
		    	break;
	    	case 'comment':
		    	$template->set_pushInfo("查看","1","有条新评论","sound");
		    	break;
	    	case 'friend':
		    	$template->set_pushInfo("查看","1","有条好友申请","sound");
		    	break;
		    default:
		    	$template->set_pushInfo("查看","1","读书就是站在别人的肩膀上看世界，你会看的更远。亲爱的，不要忘记读书哟！","sound");
	    }
	    return $template;
	}
	/**
	 * 给一个cid列表推送消息
	 * @param array		$cid_arr client_id数组
	 * @param string	$content 推送内容,json字符串，格式
	 */
	public function pushMessageToCid($cid_arr, $content){
		if(is_array($cid_arr)){
			$targetList=array();
			foreach ($cid_arr as $cid){
				//接收方数组  
			    $target1 = new IGtTarget();
			    $target1->set_appId($this->app_id);
			    $target1->set_clientId($cid['cid']);
			    $targetList[] = $target1;
			}
		    return $this->pushMessageToList($content, $targetList);
		}
	}
	/**
	 * 向一个cid列表推送
	 * @param string	$content 	推送内容
	 * @param array 	$targetList 接收方
	 */
	private function pushMessageToList($content,$targetList){
	    putenv("needDetails=true");
	    $igt = new IGeTui($this->host, $this->app_key, $this->master_secret);
	    //消息模版：
	   	$template=$this->IGtTransmissionTemplateDemo($content);
	   	
	    //个推信息体，用应用列表推送的类
	    $message =new IGtListMessage();
	    $message->set_isOffline(true);//是否离线
	    $message->set_offlineExpireTime(3600*12*1000);//离线时间
	    $message->set_data($template);//设置推送消息类型
//	    $message->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
	    $contentId = $igt->getContentId($message);
	    $rep = $igt->pushMessageToList($contentId, $targetList);
		if($rep['result'] == 'ok'){
			return true;
		}else{
			return false;
		}
	}
	
	public function getUserStatus() {
	    $igt = new IGeTui($this->host,$this->app_key,$this->master_secret);
	    $rep = $igt->getClientIdStatus($this->app_id,$this->cid);
	    var_dump($rep);
	    echo ("");
	}
}