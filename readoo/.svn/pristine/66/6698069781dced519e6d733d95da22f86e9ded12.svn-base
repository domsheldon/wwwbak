<?php
/**
* 点赞逻辑
* @date: 2015-12-17
* @author: efan
* @version:1.0.0
*/
import('@.Model.NoteDiggModel');
import('@.Model.NoteDayModel');

class DiggService {
	
	/**
	 * 点赞
	 * @param  $sessionid  $_COOKIE['PHPSESSID']
	 * @param  $user_agent sever里的浏览器信息
	 * @param  $client_ip  客户端请求ip
	 */
	public function diggNote($task_id, $note_id, $user_data) {
		$digg=new NoteDiggModel();
		$day=new NoteDayModel(); 
		
		//先判断note_id当天有无点赞数据
		$dayInfo = $day->isDigg($note_id);
		if ($dayInfo) {
			$day->setDiggCount($dayInfo['id']);
		} else {
			$digg_data= array(
				'sessionid' => $user_data['sessionid'],
				'user_agent' => $user_data['user_agent'],
				'user_agent' => $user_data['client_ip'],
			);
			$digg->add($digg_data);
		}
		//对总数的task的点赞数+1
		M('Task')->where('id='.$task_id)->setInc('digg_count');
		
//		return $this->return_info(true, '');
	}
	

}