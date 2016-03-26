<?php
/**
* 共读计划相关操作
* @date: 2016-1-28
* @author: efan
* @version:1.0.0
*/
class PlanBookModel extends Model {
	
	
	/**
	* 取当前周的书
	* @date 2016-1-28
	* @return:
	*/
	public function getNowPlanBook($time='') {
		$info = array();
		//取当前时间所在周的共读书
		$where='start_time <=current_date() and end_time >=current_date()';
		$info=M('PlanBook')->where($where)->find();
		
		return $info;
	}
	/**
	* 取给定的时间date之前读的书
	* @param $time 
	* @date 2016-2-17
	* @return:
	*/
	public function getTimePlanBook($time) {
		$pb_list=array();
		$where="(start_time <= '$time' and end_time >= '$time') or (start_time >='$time' and start_time <=current_date())";
		$field='id,book_id,book_title,start_time,end_time';
		$pb_list=M('PlanBook')->field($field)->where($where)->order('start_time desc')->select();
		return $pb_list;
	}
	
	/**
	* 取gd_id=1的共读图书列表
	* @date 2016-3-2
	* @return:
	*/
	public function getPlanBook() {
		return M('PlanBook')->field('book_id,book_title')->order('end_time desc')->select();
	}
}