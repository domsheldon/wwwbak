<?php
/**
* 一些其余用的不多的model方法
* @date: 2016-2-3
* @author: efan
*/
class OtherModel extends Model {

	
	/**
	* 获取action_config不同配置的数据
	* alert强弹窗
	* act_topic话题讨论
	* act_note提示写笔记
	* banner广告
	* @date: 2016-2-3
	*/
	public function getActionConfig($action_type) {
		$where='';
		if ($action_type !='act_note') {
			$where='start_time <=current_date() and end_time >=current_date() and ';
		}
		$field='id,action_type,title,button,href,img,note_id';
		$alert_data=M('ActionConfig')->field($field)->where("$where action_type='$action_type'")->select();
		
		return $alert_data;
	}
}