<?php
/**
 * 共读书籍业务逻辑层
 * 主要返回action需要的结构和逻辑处理
 * @date: 2016-1-28
 * @author: efan
 * @version:1.0.0
 */
class PlanBookService{
	
	/**
	* 获取当前时间共读信息
	* @date 2016-1-28
	* @return:
	*/
	public function getNowPlanBook() {
		$book_data=array();
		$pb =new PlanBookModel();
		$pb_info=$pb->getNowPlanBook();			//取当前共读的书籍信息
		if ($pb_info) {
			$book_data=array(
				'pb_id' => $pb_info['id'], 
				'book_id' => $pb_info['book_id'], 
				'book_title' => $pb_info['book_title'],
				'book_cover' => $pb_info['book_cover']
			);
		}
		return $book_data;
	}
	/**
	* 取所有的共读书籍
	* @date 2016-3-2
	*/
	public function getPlanBook() {
		$pb =new PlanBookModel();
		return $pb->getPlanBook();
	}
   
}