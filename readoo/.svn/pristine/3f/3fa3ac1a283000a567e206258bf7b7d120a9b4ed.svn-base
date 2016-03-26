<?php
/**
* 文章每天的赞数量
* @date: 2015-12-17
* @author: efan
* @version:1.0.0
*/
class NoteDayModel extends Model {
	
	/**
	* 当天是否点过赞
	* @param $note_id 
	* @date 2015-12-17
	* @return:
	*/
	public function isDigg($note_id) {
		$now_day = date('Ymd', time());
		return M('NotesDay')->where('note_id='.$note_id.' and date_format("%Y%m%d",create_time)='.$now_day)->find();
	}
	
	/**
	* 给当天的文章点赞数+1
	* @param $day_id 主键
	* @date 2015-12-17
	* @return:
	*/
	public function setDiggCount($day_id, $step=1) {
		M('NotesDay')->where('id='.$day_id)->setInc($day_id, $step);
	}
	//生成note当天的记录
	public function addData($task_id, $note_id) {
		$data = array(
			'task_id' => $task_id,
			'note_id' => $note_id,
			'day_digg_count' => 1,
			'create_time' => date('Y-m-d H:i:s', time()),
		);
		M('NotesDay')->add($data);
	}
	
	/**
	* 周排行列表
	* @date 2015-12-17
	* @return:
	*/
	public function weekOrder() {
		$day_time=strtotime(date('Y-m-d',time()) );
		$max_time=date('Y-m-d', $day_time);
		$min_time=date('Y-m-d', $day_time - 6*24*3600);
		
		$sql='select sum(day_digg_count) as digg_count,task_id,note_id from ys_notes_day 
				where create_time between "'.$min_time.'" and "'.$max_time.'" 
				group by task_id ORDER BY digg_count DESC LIMIT 5';		
		
		return M()->query($sql);
	}
}