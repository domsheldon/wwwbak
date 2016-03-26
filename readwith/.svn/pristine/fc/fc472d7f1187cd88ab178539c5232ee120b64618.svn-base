<?php
/**
* 消息model
* @date: 2014-12-24
* @author: efan
* @version:1.0.0
*/
class NotifyModel extends Model {
	
	private $notify_type=array('friend','comment','apply');//分加好友类型的通知，评论类型的通知，申请类型的通知
	public $notify_content=array();
	
	//设置通知内容,是个数组
	public function set_data($data){
		$this->notify_content=$data;
	}
	
	/**
	 * 存储推送给用户的消息
	 * @param int $user_id			当前登录用户
	 * @param int $notify_user_id 	被通知的用户
	 * @param int $notify_type 		通知类型  apply,digg,comment,friend
	 */
	public function save_notify($user_id,$notify_user_id, $notify_type) {
		$notify=M('Notify');
		
		//组合给表里的content
		if(empty($this->notify_content)){
			return false;
		}
		$content=$this->notify_content;
		
		$data['user_id'] = $user_id;
	    $data['notify_user_id'] = $notify_user_id;
	    $data['notify_type'] = $notify_type;
	    $data['notify_content'] = json_encode($content);
	    $data['is_push'] = '0';
	    $data['create_time'] = date('Y-m-d H:i:s');
	    $notify_id=$notify->add($data);
		
	    //推送内容,先查看是否有notify_user_id 有无cid，有则推送，无则保存
		$cid=UserModel::get_client_id($notify_user_id);
		if(!empty($cid)){
			$push=new PushAction();
			//推送的内容比表里存的json多个消息id
			$content['nid']="$notify_id";
			$message=json_encode($content);
			
			$res=$push->push_notify($cid, $message, $notify_type);
			if($res){
				$notify->where('notify_id='.$notify_id)->setField('is_push', '1');
			}
		}
	}
	
	/**
	* 后台全局推送
	* @param $text 推送纯文本 
	* @param $url  推送链接 
	* @param $image  推送图片
	* @param $title  推送标题  
	* @return:array
	*/
	public function push_admin_notify($text,$url='',$title='',$image='') {
		$data['content']=$text;
		$data['img']=$image;
		$data['href']=$url;
		$time=date('Y-m-d H:i:s');
		$data['create_time']="$time";
		
		return $data;
	}
	
	
	
}