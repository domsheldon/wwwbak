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
		//组织通知内容
		$user_info = UserModel::getUserInfo($user_id);			//取当前用户的头像、名字
		
		$time=time();
		//组合具体的推送消息
		$data['id']				= $id;
		$data['source']			= 2;	//评论
		$data['name']			= $user_info['name'];
		$data['avatar']			= $user_info['avatar'];
		$data['content']		= $comment_content;
		$data['create_time']	= "$time";
		
		$push_content = $user_info['name'].'：'.$comment_content;  	//头部推送内容
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
	public function digg_notify ($note_id,$user_id,$lib_id) {
		//组织通知内容
		$user_info =  UserModel::getUserInfo($user_id);			//取当前用户的头像、名字
		$note_info = $this->getContent ($note_id);			//取被通知者、右侧显示
		
		$time = time();
		$data['id']				= $note_id;
		$data['lib_id']			= $lib_id;
		$data['notify_user_id']	= (int)$note_info['user_id'];
		$data['name']			= $user_info['name'];
		$data['avatar']			= $user_info['avatar'];
		$data['type']			= 'digg';
		$data['cover']			= trim($note_info['cover']);
		$data['content']		= trim($note_info['content']);
		$data['create_time']	= "$time";
		
		//推送
		$push_content = $user_info['name'].'赞了你的动态';
		$this->pushNotify($note_info['user_id'], $data, $push_content);
	}
	
	/**
	* 申请加入群组, 通知群主
	* @param $apply_user_id  申请用户id
	* @param $lib_id 		 群组id
	* @param $apply_content 申请加入理由
	* @date 2015-11-23
	* @return:
	*/
	public function applyLibrary($apply_user_id, $lib_id, $apply_content) {
		//组织通知内容
		$user_info =  UserModel::getUserInfo($apply_user_id);			//取当前用户的头像、名字
		$notify_user_id=M('Library')->where('lib_id='.$lib_id)->getField('user_id');	//取群主
		
		$time = time();
		$data['lib_id']			= $lib_id;
		$data['notify_user_id']	= (int)$notify_user_id;
		$data['name']			= $user_info['name'];
		$data['avatar']			= $user_info['avatar'];
		$data['type']			= 'apply';
		$data['notify_content']	= $apply_content;
		$data['create_time']	= "$time";
		
		//推送
		$push_content = $user_info['name'].'申请加入群组';
		$this->pushNotify($notify_user_id, $data, $push_content);
	}
	/**
	* 获取右侧显示文字 还是图片
	* @param $note_id 
	* @date 2015-11-23
	* @return:
	*/
	private function getContent ($note_id) {
		$note_info=M('Note')->field('user_id,content,book_id,type')->where('note_id='.$note_id)->find();
		$note_info['content']= csubstr($note_info['content'], 0, '20');
		if ($note_info['type'] != 'book') {
			return $note_info;
		}
		//是上架书的动态 取动态的书籍封面
		$note_info['cover']=M('Book')->where('book_id='.$note_info['book_id'])->getField('cover');
		return $note_info;
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