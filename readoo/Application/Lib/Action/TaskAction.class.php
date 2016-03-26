<?php
/**
* 计划
* @date: 2015-11-27
* @author: efan
* @version:1.0.0
*/
import('@.Service.TaskService');
import('@.Service.CheckService');
class TaskAction extends WebCommonAction {
	
	private $check; 	//checkService的实例	
	
	public function __construct(){
		parent::__construct();
		$this->check = new CheckService($this->uid);
	}
	
	/**
	* 生成阅读计划
	* @url m/add/plan
	* @date 2015-11-27
	* @return:
	*/
	public function createPlan() {
		$book_id = $this->_post('book_id');
		$plan_day = (int)$this->_post('plan_day');
		$is_end = $this->_post('is_end') ? $this->_post('is_end') : 0;
		$this->check->checkId($book_id);
		if (empty($is_end)) {
			$this->check->checkId($plan_day);
		}
		$task=new TaskService();
		$res=$task->createTask($this->uid, $book_id, $is_end, $plan_day);
		if ($res[0]) {
			$this->data['id'] = $res[0];
			$this->ajaxReturn();
		} elseif ($res['1'] == 'had_read') {
			$this->ajaxReturn('0', '此书已被添加');
		} else {
			$this->ajaxReturn('0', '在读书籍太多了');
		}
	}
	
	/**
	* 用户的计划列表(即书单列表)
	* @date 2015-11-27
	* @return:
	*/
	public function myPlan() {
		$task=new TaskService();
		$res=$task->getUserPlan($this->uid);
		$this->data['data'] =$res[0] ? $res[0] :array();
		$this->ajaxReturn();
	}
	/**
	* 计划详情  day列表，根据当前用户返回他在读的书
	* @url m/plan/detail
	* @date 2015-11-27
	* @return:
	*/
	public function dayList() {
		$task_id = $this->_post('id') ? $this->_post('id') : 0;
		if ($task_id) $this->check->checkId($task_id);
		
		$task=new TaskService();
		$res=$task->getTaskDetail ($this->uid, $task_id);
		$this->data['data'] =$res[0]['info'] ? $res[0]['info'] :array();
		$this->data['now_day'] =$res[0]['now_day'] ? $res[0]['now_day'] : '0';
		$this->ajaxReturn();
	}
	
	/**
	* 计划删除
	* @url m/del/plan
	* @date 2015-11-27
	* @return:
	*/
	public function delPlan() {
		$task_id=$this->_post('id');
		$this->check->checkId($task_id);
		
		$task=new TaskService();
		$task->delTask($task_id);
		$this->ajaxReturn();
	}
	/**
	* 签到更新页数
	* @url m/update/page
	* @date 2015-11-27
	* @return:
	*/
	public function updatePage() {
					
		$task_id	= $this->_post('task_id');			//任务id
		$current_page= $this->_post('page');			//当前读的页数
		
		$this->check->checkId($task_id);
		$this->check->checkId($current_page);
		
		$task=new TaskService();
		$res=$task->setCurrentPage($task_id, $current_page);
		if ($res[0]) {
			$this->ajaxReturn();
		} else {
			$this->ajaxReturn('0', '任务已完成');
		}
	}
	/**
	* 在读的任务统一编辑保存
	* @date 2015-12-9
	* @return:
	*/
	public function saveDayList() {
		$data=json_decode($_POST['data'],true);				//id(0=>,1=>)格式
		$task=new TaskService();
		$task->saveDetailList($data);
		$this->ajaxReturn();
	}
	/**
	* 每天的任务详情
	* @date 2015-12-1
	* @return:
	*/
	public function dayDetail() {
		$plan_id= $this->_post('plan_id');
		$this->check->checkId($plan_id);
		
		$task=new TaskService();
		$res=$task->dayDetail($plan_id);
		$this->data['data'] = $res ? $res :array();
		$this->ajaxReturn();
	}
	/**
	* 删除任务Day1
	* @date 2015-12-9
	* @return:
	*/
	public function delPlanDetail() {
		$detail_id= $this->_post('plan_id');
		$this->check->checkId($detail_id);
		$is_end = $this->_post('is_end') ? $this->_post('is_end'): '0';		//是否最后一天的计划
		
		$task=new TaskService();
		$res=$task->delDetail($detail_id, $is_end);
		$this->data['data'] = $res['data'] ? $res['data'] : array();
		$this->data['word_count'] = $res['word_count'] ? $res['word_count'] : 0;
		$this->data['now_day'] = $res['now_day'] ? $res['now_day'] : 0;
		$this->ajaxReturn();
	}
	
	/**
	* 排行榜
	* @date 2015-12-17
	* @return:
	*/
	public function paihang() {
		$is_open=1;
		$res = array();
		if ($is_open) {
			//周排行榜、默认前5个列表
			$task = new TaskService();
			$res=$task->diggOrder();
		}
		$this->data['data'] = $res[0] ? $res[0] : array();
		$this->ajaxReturn();
	}
	/**
	* 首页中间
	* @date 2015-12-18
	* @return:
	*/
	public function taskIndex() {
		$task = new TaskService();
		$res=$task->getTaskIndex($this->uid);
		if ($res[0]) $this->data['data'] = $res[0];
		
		$this->ajaxReturn();
	}
}