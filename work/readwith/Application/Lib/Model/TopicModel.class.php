<?php
/**
* 话题model
* @date: 2016-2-25
* @author: efan
*/
class TopicModel extends Model {

	
	/**
	* 入库表
	* @date: 2016-2-25
	* @return $topic_id
	*/
	public function addTopic($user_id, $title) {
		$data = array(
			'user_id'=>$user_id,
			'topic_title'=>$title,
			'join_nums'=>1,
			'create_time'=>date('Y-m-d H:i:S')
		);
		return M('Topic')->add($data);
	}
	/**
	* 话题是否存在
	* @param $user_id
	* @param $title
	* @date 2016-2-25
	* @return: $topic_id
	*/
	public function titleIsExists($user_id, $title) {
		return M('Topic')->where("user_id=$user_id and topic_title='$title'")->getField('id');
	}
	/**
	* 根据topic_title减少参加人数
	* @param $title 
	* @date 2016-2-26
	*/
	public function decJoinNums($title) {
		M('Topic')->where("topic_title='$title'")->setDec('join_nums');
	}
	
	/*******topic表的话题名不存##**********/
	/**
	* 话题列表 
	* @date 2016-2-25
	* @return:
	*/
	public function getTopicList($field, $offset, $limit) {
		$list=M('Topic')->field($field)->order('join_nums desc')->limit($offset, $limit)->select();
		foreach ($list as $k=>$v) {
			$list[$k]['topic_title']='#'.$v['topic_title'].'#';
		}
		return $list;
	}
	
	//like取出话题详情
	public function getTopicByTitle($title) {
		$info=M('Topic')->where("topic_title like '%$title%'")->find();
		$info['topic_title']='#'.$info['topic_title'].'#';
		return $info;
	} 
}