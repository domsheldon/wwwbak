<?php
/**
* 消息业务逻辑
* @date: 2015-11-23
* @author: efan
* @version:1.0.0
*/
import('@.Model.UserModel');
class NotifyService {
	
	private $notify_type=array('digg','comment','apply');//动态点赞通知，评论通知，申请群组通知
	public $notify_content=array();
	
	
	//给未收到消息的用户重新推送
	public function push_user_notify($user_id,$cid){
		$notify_list=M('Notify')->where('notify_user_id='.$user_id.' and is_push!=2')->select();
		$push=new PushAction();
		foreach ($notify_list as $value){
			$content=json_decode($value['notify_content'],true);
			$content['nid']=$value['notify_id'];
			$message=json_encode($content);
			$push->push_notify($cid, $message);
		}
	}
	
	/**
	 * 问题评论、回复通知
	 * 1、对楼主评论，通知动态者
	 * 2、对评论的人回复，只通知被回复的评论者
	 * 
	 * @param $id 动态id
	 * @param $user_id 当前评论的用户id
	 * @param $notify_user_id 被通知者（A发动态，B评论，C回复了B,则B即reply_user_id）
	 * @param $comment_content 评论内容
	 */
	public function comment_notify($id, $user_id, $notify_user_id, $comment_content) {
		if (empty($notify_user_id)) return true;//防止拆书包的评论不发通知
		//组织通知内容
		$user=new UserModel();
		$user_info = $user->getUserInfo(array($user_id));			//取当前用户的头像、名字
		$title=$this->getContent($id);
		
		$time = date('Y-m-d H:i:s');
		//组合具体的推送消息
		$data['id']				= $id;
		$data['notify_user_id']	= $notify_user_id;
		$data['source']			= 'comment';	//评论
		$data['name']			= $user_info[$user_id]['name'];
		$data['avatar']			= $user_info[$user_id]['avatar'];
		$data['sex']			= $user_info[$user_id]['sex'];
		$data['right']			= $title;
		$data['content']		= $comment_content;
		$data['create_time']	= "$time";
		
		$push_content = $user_info[$user_id]['name'].'：'.$comment_content;  	//头部推送内容
		$push_content = csubstr($push_content,0,'15');				//对头部推送的截取15个字符
		$this->pushNotify($notify_user_id, $data, $push_content);
	}
	
	/**
	 * 赞动态通知
	 * 文章、感悟显示内容前20个字；上架书显示图片
	 * @param $index_id 动态id
	 * @param $user_id 
	 * @param $lib_id
	 */
	public function digg_notify ($id, $user_id, $notify_user_id) {
		if (empty($notify_user_id)) return true;//防止拆书包的评论不发通知
		
		//组织通知内容
		$user=new UserModel();
		
		$user_info = $user->getUserInfo(array($user_id));		//取当前用户的头像、名字
		
		$title=$this->getContent($id);
		$time = date('Y-m-d H:i:s');
		$data['id']				= $id;
		$data['notify_user_id']	= $notify_user_id;
		$data['name']			= $user_info[$user_id]['name'];
		$data['avatar']			= $user_info[$user_id]['avatar'];
		$data['sex']			= $user_info[$user_id]['sex'];
		$data['right']			= $title;
		$data['content']		= '';
		$data['source']			= 'digg';
		$data['create_time']	= "$time";
		
		//推送
		$push_content = $user_info[$user_id]['name'].'赞了你的动态';
		$this->pushNotify($notify_user_id, $data, $push_content);
	}
	
	
	/**
	* 获取右侧显示文字 还是图片
	* @param $note_id 
	* @date 2015-11-23
	* @return:
	*/
	private function getContent($note_id) {
		$title=M('Note')->where('id='.$note_id)->getField('title');
		return $title;
		//是上架书的动态 取动态的书籍封面
//		$cover=M('Book')->where('book_id='.$book_id)->getField('cover');
//		return $cover;
	}
	
	//设置通知内容,是个数组
	private function set_data($data){
		$this->notify_content=$data;
	}
	
	/**
	 * 推送
	 * @param int 	$user_id		被通知者id
	 * @param array $notify_arr 	推送内容数组
	 * @param string $push_content 	手机推送顶部显示内容
	 */
	private function pushNotify($notify_user_id, $notify_arr, $push_content) {
	    //取被通知者的cid
		$cid = M('UserClient')->field('client_id,os_type')->where('user_id='.$notify_user_id)->find();
		if (!empty($cid)) {
			$push = new PushAction();
			$message = json_encode($notify_arr);
			$os_arr= array('ios','andriod');
			$res=$push->push_notify($cid['client_id'], $message, $push_content, $os_arr[$cid['os_type']]);
			return $res;
		}
	}
	/**
	* 设置消息为推送成功
	* @param $notify_id 消息id 
	* @return:
	*/
	public function set_push($notify_id) {
		return M('Notify')->where('notify_id='.$notify_id)->setField('is_push','2');
	}
}