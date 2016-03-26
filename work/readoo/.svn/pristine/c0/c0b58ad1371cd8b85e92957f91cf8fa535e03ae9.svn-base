<?php
/**
* 文章model
* @date: 2015-12-17
* @author: efan
* @version:1.0.0
*/
class NoteModel extends Model {
	
	/**
	* 根据task_id取note_id
	* @param $task_id 
	* @date 2015-12-25
	* @return:
	*/
	public function getNoteIdByTask($task_id) {
		return M('TaskNotes')->where('task_id='.$task_id)->getField('id');
	}
	/**
	* 新增笔记
	* @param $data 
	* @date 2015-12-22
	* @return:
	*/
	public function setNoteAdd($data) {
		$data['update_time'] = date('Y-m-d H:i:s');
		return M('TaskNotes')->add($data);
	}
	
	/**
	* 编辑笔记
	* @param $data 
	* @param $note_id 
	* @date 2015-12-22
	* @return:
	*/
	public function setNoteUpdate($data,$note_id) {
		$data['update_time'] = date('Y-m-d H:i:s');
		return M('TaskNotes')->where('id='.$note_id)->save($data);
	}
	
	//笔记详情
	public function getNoteInfo($note_id) {
		$sql="SELECT CONCAT('".OSS_AVATAR."',u.`avatar`,'".OSS_AVATAR_RULE."') AS avatar,u.`name`,n.id as note_id,n.`title`,n.`content`,n.update_time 
				FROM ys_user_info u,ys_task_notes n 
				WHERE u.`user_id`=n.user_id AND n.id= ".$note_id;
		
		return M()->query($sql);
	}
	/**
	* 随手记列表
	* @param $task_id 
	* @date 2015-12-21
	* @return:
	*/
	public function ssjList($task_id) {
		return M('TaskDigest')->where('task_id='.$task_id)->select();
	}
	/**
	* 生成书摘记录
	* @param $data 
	* @date 2015-12-21
	* @return:id
	*/
	public function addDigestData($data) {
		$data['update_time']=date('Y-m-d H:i:s');
		return M('TaskDigest')->add($data);
	}
	/**
	* 随手记删除
	* @param $ssj_id
	* @date 2015-12-21
	* @return:id
	*/
	public function ssjDel($ssj_id) {
		return M('TaskDigest')->where('id='.$ssj_id)->setField('is_delete','1');
	}

	/**
	 * 随手记同步
	 * @param $update_time
	 * @date 2016-1-6
	 * @return
	 */
	public function ssjSync($task_id,$update_time) {
		$model = M('TaskDigest');
		$res = $model->where("task_id='".$task_id."' AND update_time<'".$update_time."'")->order('update_time desc')->limit(10)->field(array('id'=>'ssj_id','task_id','type','content',"concat('".OSS_COVER."',url)"=>'url','flag','review_id','second'=>'miao','update_time'))->select();

		return $res;
	}

}