<?php
/**
* 其他业务逻辑
* @date: 2016-1-28
* @author: efan
*/
class OtherService {
	
	/**
	* banner条数据
	* @date: 2016-1-28
	*/
	public function getBannerData() {
		$m=new OtherModel();
		return $m->getActionConfig('banner');
	}
	
	/**
	* 配置信息数据
	* @date 2016-2-3
	* alert 强弹窗
	* topic #话题#
	* act_topic 1.0.3(包含)版本之前的随笔详情
	* act_note 提示写笔记
	* @return:
	*/
	public function getConfigData() {
		$m=new OtherModel();
		//先取强弹窗的数据
		if ($alert_data = $m->getActionConfig('alert')) {
			return $alert_data[0];
		}
		//无弹窗则取话题的数据
		if ($alert_data = $m->getActionConfig('topic')) {
			return $alert_data[0];
		}
		//无话题则取随笔提醒的数据
		if ($topic_data = $m->getActionConfig('act_topic')) {
			return $topic_data[0];
		}
		//无随笔提醒则取提示写笔记的数据
		if ($note_data = $m->getActionConfig('act_note')) {
			return $note_data[0];
		}
	}
	
}