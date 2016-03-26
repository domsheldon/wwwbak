<?php
/**
* 话题
* @date: 2016-2-25
* @author: efan
*/
class TopicService {

	
	/**
	* 加入话题表
	* @date: 2016-2-25
	*/
	public function addTopic($user_id,$title) {
		$topic=new TopicModel();
		$topic_id=$topic->titleIsExists($user_id, $title);
		//话题参加人数+1
		CommonModel::addFieldCount('topic', 'id='.$topic_id, 'join_nums');
		return $topic_id;
	}
	/**
	* 取最热的3个话题
	* @param $field 取表里的哪个字段
	* @date 2016-2-25
	* @return:
	*/
	public function getHotTopic($field='topic_title', $offset=0, $limit=3) {
		$topic=new TopicModel();
		$list=$topic->getTopicList($field, $offset, $limit);
		return $list;
	}
	
	/**
	* 话题详情
	* @param $title 
	* @date 2016-2-25
	* @return:
	*/
	public function getTopicInfo($user_id, $title, $offset, $limit) {
		$topic=new TopicModel();
		$note=new NoteService();
		$topic_info=array();
		if ($offset ==0) {
			$topic_info=$topic->getTopicByTitle($title);		//话题详情
		}
		$where="content like '%#$title#%'";					//相关话题的随笔列表
		$note_list=$note->getNoteList($user_id, $where, '', '', $offset, $limit);		
		
		$topic_info['list'] =$note_list ? $note_list : array();
		return $topic_info;
	}
}