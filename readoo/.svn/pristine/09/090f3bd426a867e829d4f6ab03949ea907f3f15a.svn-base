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
	    $data['create_time'] = time();
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
	* 后台全局推送
	* @param $text 推送纯文本 
	* @param $url  推送链接 
	* @param $image  推送图片
	* @param $title  推送标题  
	* @return:array
	*/
	public function push_admin_notify($text,$url='',$title='',$image='') {
		if($image){
			//预留字段
			$data['info']=array('title'=>'','avatar'=>$image);
		}
		$data['content']=$text;
		$data['feed_id']=$url;//为了和其他内容统一，用feed_id代替链接地址
		$data['type']='system';
		$data['notify_type']='text';//纯文本
		if($image){
			$data['notify_type']='text_image';//文本+图片
		}
		$time=time();
		$data['create_time']="$time";
		
		return $data;
	}
	//加好友的内容
	public function add_friend_notify($user_id,$notify_user_id, $apply_id){
		$username=UserModel::get_user_info($user_id);
		$data['info']=$username[$user_id];
		$data['content']='请求添加你为好友';
		$data['feed_id']=$apply_id;
		$data['type']='friend';
		$data['notify_type']='add';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	
	/**
	 * 同意加好友的内容
	 * @param $user_id 
	 */
	public function agree_friend_notify($user_id,$notify_user_id){
		$username=UserModel::get_user_info($user_id);
		$data['info']=$username[$user_id];
		$data['content']='同意加你为好友';
		$data['type']='friend';
		$data['notify_type']='agree';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	/**
	 * 评论动态的内容
	 * @param $index_id 动态id
	 * @param $user_id 
	 * @param $comm_type 0默认评论，1是回复 
	 * @param $notify_user_id 被评论的人（被通知的用户）
	 * @param $index_type 动态种类，feed动态评论，summary感悟评论, note读书笔记
	 */
	public function comment_notify($index_id,$user_id,$comm_type,$notify_user_id,$index_type){
		$get_data=$this->getCover($index_id, $index_type);
		$username=UserModel::get_user_info($user_id);
		$pre_con= $comm_type==0 ? '评论' : '回复';
		
		$time=time();
		$data['feed_id']		=$index_id;
		$data['cover']			=$get_data['cover'];
		$data['info']			=$username[$user_id];
		$data['content']		=$pre_con.'了您的'.$get_data['content'];
		$data['type']			='comment';
		$data['notify_type']	=$index_type;//评论通知下又分动态 、感悟
		$data['notify_user_id']	=$notify_user_id;
		$data['create_time']	="$time";
		
		$this->set_data($data);
	}
	/**
	 * 赞动态通知
	 * @param $index_id 动态id
	 * @param $user_id 
	 * @param $notify_user_id 被评论的人（被通知的用户）
	 * @param $type feed动态评论，summary感悟评论
	 */
	public function digg_notify($index_id,$user_id,$notify_user_id,$index_type){
		$get_data=$this->getCover($index_id, $index_type);
		
		$username=UserModel::get_user_info($user_id);
		$time=time();
		$data['feed_id']		=$index_id;
		$data['cover']			=$get_data['cover'];
		$data['info']			=$username[$user_id];
		$data['content']		='赞了您的'.$get_data['content'];
		$data['type']			='digg';
		$data['notify_type']	=$index_type;//分动态赞 、感悟赞
		$data['notify_user_id']	=$notify_user_id;
		$data['create_time']	="$time";
		
		$this->set_data($data);
	}
	/**
	* 根据id获取书籍cover
	* @param $index_id 动态id
	* @param $index_type 动态类型
	* @date 2015-10-26
	* @return:array('cover'=>, 'content'=>);
	*/
	private function getCover($index_id, $index_type) {
		switch ($index_type){
			case 'feed':
				$table='fw_feed';
				$content='漂流书';
				break;
			case 'summary':
				$table='fw_book_summary';
				$content='感悟心得';
				break;
			case 'wish':
				$table='fw_wish';
				$content='想读心愿';
				break;
			case 'note':
				$table='fw_note';
				$content='读书笔记';
				break;
		}
		$sql='select cover from fw_book where book_id=(select book_id from '.$table.' where '.$index_type.'_id='.$index_id.')';
		$book_cover=M()->query($sql);
		return array('cover'=>$book_cover[0]['cover'], 'content'=>$content);
	}
	/**
	 * 动态有申请的内容
	 * @param $user_id 
	 */
	public function apply_feed_notify($feed_id,$book_id,$notify_user_id){
		$book_title=M('Book')->where('book_id='.$book_id)->getField('title');
		$data['feed_id']=$feed_id;
		$data['content']='有书友申请你的《'.$book_title.'》一书，点击查看';
		$data['type']='apply';
		$data['notify_type']='feed_apply';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	
	/**
	 * 同意申请的内容
	 * @param $user_id 当前用户的
	 */
	public function agree_apply_notify($user_id,$feed_id,$book_id,$notify_user_id){
		$book_title=M('Book')->where('book_id='.$book_id)->getField('title');
		$data['user_id']=$user_id;
		$data['feed_id']=$feed_id;
		$data['content']='发布者已同意借阅《'.$book_title.'》，可以通过即时消息约定取书的时间地点。';
		$data['type']='apply';
		$data['notify_type']='agree_apply';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	/**
	 * 被拒绝申请的内容
	 * @param $user_id 当前用户的
	 */
	public function refuse_apply_notify($book_title,$feed_price,$notify_user_id){
		$data['content']='您申请的《'.$book_title.'》一书已借给他人';
		$data['type']='apply';
		$data['notify_type']='refuse_apply';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	/**
	 * 贡献者删除对申请者的通知
	 * @param $user_id 当前用户的
	 */
	public function del_feed_notify($book_title,$feed_price,$notify_user_id){
		$data['content']='您申请的《'.$book_title.'》一书已被下架';
		$data['type']='apply';
		$data['notify_type']='feed_del';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	/**
	 * 贡献者未处理自动被拒绝申请的内容
	 * @param $user_id 当前用户的
	 */
	public function auto_refuse_apply_notify($user_id,$book_title,$notify_user_id){
		$data['user_id']=$user_id;
		$data['content']='贡献者一周内未打理您申请的《'.$book_title.'》一书，去详情页可取消申请。';
		$data['type']='apply';
		$data['notify_type']='noact_apply';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	/**
	 * 申请者收到书，然后通知贡献者
	 * @param $user_id 当前用户的
	 */
	public function apply_get_notify($user_id,$book_id,$feed_price,$notify_user_id){
		$data['user_id']=$user_id;
		$book_title=M('Book')->where('book_id='.$book_id)->getField('title');
		$data['content']='对方已收到您的《'.$book_title.'》一书。';
		$data['type']='apply';
		$data['notify_type']='get_apply';
		$data['notify_user_id']=$notify_user_id;
		$time=time();
		$data['create_time']="$time";
		
		$this->set_data($data);
	}
	/**
	* 给心愿单里想要此书的用户发推送
	* @param $book_id 
	* @date 2015-8-20
	* @return:
	*/
	public function wish_book_notify($book_id,$feed_id) {
		
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