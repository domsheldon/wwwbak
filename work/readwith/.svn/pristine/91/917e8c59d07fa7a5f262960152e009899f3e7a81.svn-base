<?php
/**
* 话题
* @date: 2016-2-25
* @author: efan
*/
import('@.Service.CheckService');
import('@.Service.TopicService');
import('@.Service.NoteService');
class TopicAction extends WebCommonAction {

	private $check;
	public function __construct() {
		parent::__construct();
		$this->check=new CheckService($this->uid);
	}
	
	/**
	* 热门话题列表，显示
	* @date: 2016-2-25
	*/
	public function getTopicList() {
		$page=$this->_post('page')?$this->_post('page'):'1';
		$limit=10;
		$offset=($page-1)*$limit;
		
		$topic=new TopicService();
		$list=$topic->getHotTopic('*', $offset, $limit);
		
		$this->data['data']=$list ? $list : array();
		$this->ajaxReturn();
	}
	/**
	* 话题详情
	* @date 2016-2-25
	*/
	public function getTopicInfo() {
		$title=$this->_post('title');
		$page=$this->_post('page')?$this->_post('page'):'1';	//话题下随笔的分页
		$limit=10;
		$offset=($page-1)*$limit;
		
		$topic=new TopicService();
		$data=$topic->getTopicInfo($this->uid, $title, $offset, $limit);
		$this->data['data']=$data;
		$this->ajaxReturn();
	}
}