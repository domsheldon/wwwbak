<?php
/**
* 引用的是第三方个推应用
* @date: 2014-12-23
* @author: efan
* @version:1.0.0
*/

vendor('GeTui.IGt','','.Push.php');

class PushAction extends Action {
	
	//有书产品的相关id
	private $app_id='b1VjTCCykZAsLaiqqsTmp3';
	private $app_key='Apdv8m0zll75G1cGdTx3u4';
	private $app_secret='KyUd7vby0c7dkdSg8uAKK';
	private $master_secret='EzFepqgZ3f5NScpAK5Lnp';
	private $host='http://sdk.open.api.igexin.com/apiex.htm';
	
	
	/**
	 * 单推接口案例
	 * @param $content  2048中/英字符
	 * @param $push_content  顶部push显示内容
	 */
	public function push_notify($cid,$content,$push_content, $os_type='ios'){
	    $igt = new IGeTui($this->host, $this->app_key, $this->master_secret);
		//消息模版：
	    if ($os_type == 'ios') { 
	   		$template=$this->IGtTransmissionTemplateDemo($content, $push_content);
	    }else {
	   		$template=$this->IGtNotificationTemplateDemo($content, $push_content);
	    }
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
	private function IGtTransmissionTemplateDemo($content,$push_title){
	    $template =  new IGtTransmissionTemplate();
	    //应用appid
	    $template->set_appId($this->app_id);
	    //应用appkey
	    $template->set_appkey($this->app_key);
	    //透传消息类型
	    $template->set_transmissionType(2);
	    //透传内容2048中/英字符
	    $template->set_transmissionContent($content);
	    
	    $template->set_pushInfo("查看","1", $push_title, "sound");
	    return $template;
	}
	//推送通知模版
	private function IGtNotificationTemplateDemo($content,$push_title){
	    $template =  new IGtNotificationTemplate();
	    $template->set_appId($this->app_id);                      //应用appid
	    $template->set_appkey($this->app_key);                    //应用appkey
	    $template->set_transmissionType(1);               //透传消息类型
	    $template->set_transmissionContent($content);   //透传内容
	    $template->set_title("Readoo");                     //通知栏标题
	    $template->set_text($push_title);        		//通知栏内容
	    $template->set_logo("ic_launcher.png");                  //通知栏logo
	    $template->set_logoURL(); 						//通知栏logo链接
	    $template->set_isRing(true);                      //是否响铃
	    $template->set_isVibrate(false);                   //是否震动
	    $template->set_isClearable(true);                 //通知栏是否可清除
	    return $template;
	}
	/**
	 * 给一个cid列表推送消息
	 * @param array		$cid_arr client_id数组
	 * @param string	$json_data 推送内容,json字符串，格式
	 * @param string	$os_type android,ios系统
	 */
	public function pushMessageToCid($cid_arr, $json_data, $push_title, $os_type){
		if(is_array($cid_arr)){
			$targetList=array();
			foreach ($cid_arr as $cid){
				//接收方数组  
			    $target1 = new IGtTarget();
			    $target1->set_appId($this->app_id);
			    $target1->set_clientId($cid);
			    $targetList[] = $target1;
			}
		    return $this->pushMessageToList($json_data, $push_title, $targetList, $os_type);
		}
	}
	/**
	 * 向一个cid列表推送
	 * @param string	$content 	推送内容
	 * @param array 	$targetList 接收方
	 * @param string	$os_type android,ios系统的推送用不同模版
	 */
	private function pushMessageToList($content,$push_title, $targetList, $os_type){
	    putenv("needDetails=true");
	    $igt = new IGeTui($this->host, $this->app_key, $this->master_secret);
	    //消息模版：
	    if ($os_type == 'ios') {
	   		$template=$this->IGtTransmissionTemplateDemo($content, $push_title);
	    }else {
	   		$template=$this->IGtNotificationTemplateDemo($content,$push_title);
	    }
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