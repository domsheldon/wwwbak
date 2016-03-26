<?php
/**
* 读书笔记
* @date: 2015-10-13
* @author: efan
* @version:1.0.0
*/
import('@.Service.CheckService');
import('@.Service.NoteService');
import('@.Service.TopicService');
import('@.Service.BookPackageService');
class NoteAction extends WebCommonAction {
	
	private $check;
	public function __construct() {
		parent::__construct();
		$this->check=new CheckService($this->uid);
	}
	
	/**
	* 有书圈
	* @date 2016-1-28
	* @return:
	*/
	public function getNoteList() {
		$book_id=$this->_post('book_id');
		$order=$this->_post('order');		//hot热门
		$page=$this->_post('page')?$this->_post('page'):'1';
		$limit=10;
		$offset=($page-1)*$limit;
		
		$note=new NoteService();
		//根据书、最新、热门筛选
		$list=$note->getNoteIndex($this->uid, $book_id, $offset, $limit, $order);
		$this->data['data']=$list ? $list: array();
		$this->data['page']=$page;
		//取前3个热门话题
		$topic=new TopicService();
		$topic_list=$topic->getHotTopic();
		if ($topic_list) {
			$this->data['topic'][]=$topic_list[0]['topic_title'] ? $topic_list[0]['topic_title']:'';
			$this->data['topic'][]=$topic_list[1]['topic_title'] ? $topic_list[1]['topic_title']:'';
			$this->data['topic'][]=$topic_list[2]['topic_title'] ? $topic_list[2]['topic_title']: '';
		}
		$this->ajaxReturn();
	}
	/**
	* 笔记详情
	* @date 2015-10-13
	* @return:
	*/
	public function noteInfo() {
		$note_id=$this->_post('id');
		$type=$this->_post('type');
		$this->check->checkId($note_id);
		
		$note=new NoteService();
		$info=$note->getNoteInfo($note_id, $this->uid, $type);
		if ($info){
			$this->data['data']=$info;
			$this->ajaxReturn();
		} else {
			$this->ajaxReturn('0','笔记已删除');
		}
	}
	/**
	* 笔记保存
	* @return:
	*/
	public function noteSave() {
		$data['user_id']=$this->uid;
		$data['content']=html_entity_decode($this->_post('content') );
		$data['title']=trim(html_entity_decode($this->_post('title')));
		$data['book_id']=(int)$this->_post('book_id');
		$data['is_pub']=$this->_post('is_pub') ? $this->_post('is_pub') :0;
		$note_id=$this->_post('id');
		//笔记图片，最多9张
		$img_str='';
		if($_FILES['img']){
			$img=$this->upload_img();
			$data['img_str']=implode(',', $img);
		}
		//$this->check->checkId($data['book_id']);
//		$this->check->checkContent($data['title'], '1', '20');		//检查标题
		$this->check->checkContent($data['content'], '1', '5000');		//检查内容长度
		
		$note=new NoteService();
		$note_id=$note->noteSave($data, $note_id);
		if ($note_id) {
			$this->data['id']="$note_id";
			if ($img[0]) {
				$this->data['img']=OSS_COVER.$img[0].OSS_COVER_RULE;
			}
			$this->ajaxReturn();
		}else{
			$this->ajaxReturn('0','添加失败');
		}
	}
	//返回中间部分，域名什么的后面拼
	public function upload_img($user_id){
		//上传笔记
		$fold=OBJECT.'/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload(COVER_BUCKET,$fold);
		return $filename;
	}
	/**
	* 评论笔记、拆书包
	* @date 2015-10-13
	* @return:
	*/
	public function noteComment() {
		$id=$this->_post('id');
		$type=$this->_post('type')? $this->_post('type'): 'note'; //类型是笔记note、拆书包bp
		$this->check->checkId($id);
		
		$content=$this->_post('content');//评论内容
		$cid=$this->_post('cid')?$this->_post('cid'):0;//回复的评论id
		$comm_type=0;//默认是评论动态
		
		$this->check->checkContent($content,'1');
		if(!empty($cid)){
			$this->check->checkId($cid);
			$comm_type=1;
		}
		$note=new NoteService();
		
		$res=$note->commentAct($type, $id, $this->uid, $content, $comm_type, $cid);
		if($res){
			$this->data['cid']="$res";
			$this->ajaxReturn();
		}else{
			$this->ajaxReturn('0','评论失败');
		}
	}
	/**
	* 评论列表
	* @param  
	* @date 2016-2-1
	* @return:
	*/
	public function commentList() {
		$id=$this->_post('id');
		$page=$this->_post('page')?$this->_post('page'):'1';
		$type=$this->_post('type');
		$this->check->checkId($id);
		
		$limit=10;
		$offset=($page-1)*$limit;
		
		$note=new NoteService();
		$list=$note->getCommentList($type, $id, $offset, $limit);
		
		$this->data['data']=$list ? $list : array();
		$this->data['page']=$page;
		$this->ajaxReturn();
	}
	/**
	* 笔记、拆书包点赞
	* @date 2015-10-13
	* @return:
	*/
	public function noteDigg() {
		$note_id=$this->_post('id');	//笔记id，拆书包id
		$type=$this->_post('type')? $this->_post('type'): 'note';		//类型是笔记note、拆书包bp
		$act=$this->_post('act');		//取消赞、赞、赞列表
		$this->check->checkId($note_id);
		
		$note=new NoteService();
		$note->diggAct($note_id, $this->uid, $type, $act);
		$this->ajaxReturn();
	}
	/**
	* 点赞用户列表
	* @date 2016-1-29
	* @return:
	*/
	public function getDiggUser() {
		$note_id=$this->_post('id');
		$type=$this->_post('type');
		$this->check->checkId($note_id);
		
		$note=new NoteService();
		$list=$note->diggAct($note_id, $this->uid, $type, 'list');
		$this->data['data']=$list ? $list : array();
		$this->ajaxReturn();
	}
	/**
	* 查看评论对话
	* @date 2016-1-29
	* @return:
	*/
	public function commentTalk() {
		$id=$this->_post('id');
		$type=$this->_post('type');
		$cuser=$this->_post('cuser_id');
		$ruser=$this->_post('ruser_id');
		$this->check->checkId($cuser);
		$this->check->checkId($ruser);
		
		$note=new NoteService();
		$list=$note->getCommentTalk($type, $id, $cuser, $ruser);
		
		$this->data['talk_list']=$list['talk_list'] ? $list['talk_list'] : array();
		$this->data['meuser_data']=$list['meuser_data'] ? $list['meuser_data'] : array();
		$this->data['tauser_data']=$list['tauser_data'] ? $list['tauser_data'] : array();
		$this->ajaxReturn();
	}
	/**
	* 评论删除
	* @date 2016-2-1
	* @return:
	*/
	public function commentDel() {
		$cid=$this->_post('cid');
		$type=$this->_post('type');
		$this->check->checkId($cid);
		
		$note=new NoteService();
		$res=$note->commentDel($type, $this->uid, $cid);
		if ($res) {
			$this->ajaxReturn();
		} else {
			$this->ajaxReturn('0', '删除错误');
		}
	}
	/**
	* 笔记收藏
	* @date 2015-10-13
	* @return:
	*/
	public function noteFav() {
		$note_id=$this->_post('id');
		$this->check->checkId($note_id);
		
		$note=new NoteService();
		$res=$note->noteFav($note_id, $this->uid);
		if ($res=='cancel') {
			$this->ajaxReturn('2','取消成功');
		} else {
			$this->ajaxReturn();
		}
	}
	//笔记删除
	public function noteDel(){
		$note_id=$this->_post('id');
		$this->check->checkId($note_id);
		$note=new NoteService();
		$res=$note->noteDel($this->uid, $note_id);
		if($res){
			$this->ajaxReturn();
		}else{
			$this->ajaxReturn('0','删除失败');
		}
	}
	//笔记举报
	public function noteJubao(){
		$note_id=$this->_post('id');
		$this->check->checkId($note_id);
		
		$note=new NoteService();
		$res=$note->jubao($note_id, $this->uid);
		$this->ajaxReturn();
		
	}
}