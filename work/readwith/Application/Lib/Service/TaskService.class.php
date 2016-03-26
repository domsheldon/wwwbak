<?php
/**
* 计划业务逻辑层
* @date: 2015-11-27
* @author: efan
* @version:1.0.0
*/

class TaskService {

	/**
	* 生成计划
	* @param $user_id 
	* @param $book_id
	* @param $plan_day 计划读完的天数,在读时
	* @param $is_end  
	* @date 2015-11-27
	* @return:
	*/
	public function createTask($user_id, $book_id, $is_end, $plan_day=0) {
		$task=new TaskModel();

		$reading_count= $task->readingCount($user_id);		//在读数量不超过3本
		//已经读完的书添加不限制，需要加入对is_end的判断
		if (($reading_count >= 3) && ($is_end == 0)) {
			return $this->return_info(false, 'reading_one');
		}
		$is_read=$task->bookIsRead($user_id, $book_id);		//判断是否读过此书
		if ($is_read) {
			return $this->return_info(false, 'had_read');
		}
		$info=M('Book')->field('title,pages')->where('book_id='.$book_id)->find();
		$data = array(
			'user_id' 	=> $user_id,
			'book_id' 	=> $book_id,
			'book_name' => $info['title'],
			'pages' 	=> $info['pages'],
			'current_page' => 1,
			'plan_day' 	=> $plan_day,
			'is_end' 	=> $is_end,
		);
		
		$task_id=$task->addTask($data);			//生成任务
		
		
		return $this->return_info($task_id, 'add_plan');
	}
	/**
	* 用户的计划列表
	* @param $user_id 
	* @date 2015-11-27
	* @return:
	*/
	public function getUserPlan($user_id) {
		$task=new TaskModel();
		$note=new NoteModel();
		
		$list=$task->getUserPlanList($user_id);
		if ($list) {
			foreach ($list as $k=>$v) {
				$list[$k]['note_id']='0';
				if ($v['is_end'] == 0) {							//默认数据第一条是在读的书
					$had_day = $task->taskCurStep($v['task_id']);	//取在读的书剩余天数
					if ($had_day) {						//如果开始读了算倒记天数
						$left_day = $v['plan_day'] - $had_day;
						$list[$k]['plan_day'] = "$left_day";
					}
				}else {		//已读的查note_id
					if ($note_id=$note->getNoteIdByTask($v['task_id']) ){
						$list[$k]['note_id']=$note_id;
					}
				}
			}
		}
		return $this->return_info($list, 'plan_list');
	}
	/**
	* day列表
	* @param $user_id 
	* @param $task_id  已读的task_id
	* @date 2015-11-27
	* @return:
	
	public function getTaskDetail($user_id, $task_id=0) {
		$task_detail=new TaskDetailModel();
		$task=new TaskModel();
		$had_day=0;
		
		if (empty($task_id) ) {				//说明是在读的计划
			//先取出当前用户在读的任务id
			$task_id=$task->getTaskIdByUser($user_id);
			$had_day=$task->taskCurStep($task_id);					//返回读到第几天
		}
		$info=$task_detail->getTaskDetail($task_id);				//返回day列表
		
		return $this->return_info(array('info'=>$info, 'now_day'=>$had_day), 'plan_list');	
	}*/
	
	/**
	* 计划删除
	* @param $task_id
	* @date 2015-11-27
	* @return:
	*/
	public function delTask($task_id) {
		$task=new TaskModel();
		$task->delTask($task_id);
	}
	/**
	* 更新计划
	* @param $user_id 用户id
	* @param $plan_id task_detail里的主键，最后一天的计划要把任务设为完成
	* @param $content 笔记
	* @param $is_end 是否最后一天的计划
	* @date 2015-11-27
	* @return:
	*/
	public function updateTask($user_id,$plan_id,$content,$is_end=0) {
		$task_detail = new TaskDetailModel();
		$taskM = new TaskModel();
		$task = M('Task');
		$task_id = M('TaskDetail')->where('id='.$plan_id)->getField('task_id');
		//检测是否是计划发布者
		$ori_user=$task->where('id='.$task_id)->getField('user_id');
		
		if ($ori_user != $user_id) {
			return $this->return_info(false, 'user_error');
		}
		$data['content'] = $content;
		$task_detail->updateTaskDetail($plan_id, $data);
		if ($is_end) {
			$taskM->setEndTask($task_id);		//计划设为完成
		}
		//取总字数
		$count=$taskM->getTaskWordCount($task_id);
		return $this->return_info($count, 'success');
	}
	/**
	* 多个detail一起编辑保存
	* @param $detail_id_arr id
	* @date 2015-12-9
	* @return:
	*/
	public function saveDetailList($data_arr) {
		$detail=M('TaskDetail');
		foreach ($data_arr as $v) {
			$data=array('content'=>$v['content'],'update_time'=>date('Y-m-d H:i:s',time()));
			$detail->where('id='.$v['plan_id'])->save($data);
		}
	}
	/**
	* 每天任务详情
	* @param $plan_id 
	* @date 2015-12-1
	* @return:
	*/
	public function dayDetail($plan_id) {
		return M('TaskDetail')->where('id='.$plan_id)->find();
	}
	/**
	* 删除未写的任务Day
	* @param $detail_id 
	* @param $is_end 1是删除最后一天 
	* @date 2015-12-9
	* @return:
	*/
	public function delDetail($detail_id, $is_end=0) {
		$task=new TaskModel();
		$task_detail = new TaskDetailModel();
		$detail=M('TaskDetail');
		
		$task_id = $task_detail->getTaskId($detail_id);			//取出task_id
		$detail_list = $detail->field('id as plan_id,page_num,title')->where('task_id='.$task_id)->select();
		
		$count = count($detail_list);				//原定计划天数
		$sum_page = $detail_list[$count-1]['page_num'];//总页数
		
		$had_day = $task->taskCurStep($task_id);	//已读天数
		$had_page = $detail_list[$had_day-1]['page_num'];//已读页数
		
		$left_day = $count - $had_day - 1;				//剩余天数
		$pj=intval( ($sum_page - $had_page) / $left_day); //剩余每天该读的页数
		
		$task_detail->delDetail($detail_list[$count-1]['plan_id']);	//删除最新的
		unset($detail_list[$count-1]);
		$task->setDecPlanDay($task_id);							//plan_day-1
		
		
		for ($i=1; $i<=$left_day; $i++) {			//更新剩余的天数该读的页数
			$page_num = $had_page + ($i*$pj);		//该读页数
			$id=$detail_list[$had_day-1+$i]['plan_id'];	//要修改的id
			
			$detail_list[$had_day-1+$i]['page_num']="$page_num";//重新组合数据为了给客户端返回
			$detail->where('id='.$id)->setField('page_num', $page_num);
		}
		
		if ($is_end) {								//最后一天更新为完成状态
			$task->setEndTask($task_id);
		}
		//取总字数
		$word_count=$task->getTaskWordCount($task_id);
		$res=array(
			'data'	=>	$detail_list, 
			'word_count'=>	$word_count,
			'now_day'	=>	$had_day,
		);
		return $res;
	}
	
	/**
	* 点赞排行榜列表
	* @param $limit 默认显示5条
	* @date 2015-12-17
	* @return:
	*/
	public function diggOrder($limit=5) {
		$day=new NoteDayModel();
		$task=new TaskModel();
		
		$list=$day->weekOrder();			//周排行
		if ($list) {
			foreach ($list as $v) {
				$arr[]=$v['task_id'];
			}
			$task_str=implode(',', $arr);
			$book_list=$task->getTaskBookList($task_str);	//获取书籍信息
			
			foreach ($list as $k=>$v) {
				$list[$k]['cover']=$book_list[$v['task_id']]['cover'];
				$list[$k]['title']=$book_list[$v['task_id']]['title'];
			}
		}
		return $this->return_info($list, 'list');
	}
	/**
	* 签到更新在读页数
	* @param $task_id
	* @param $current_page
	* @date 2015-12-18
	* @return:
	*/
	public function setCurrentPage($task_id,$current_page) {

		$task = new TaskModel();
		$detail = new TaskDetailModel();
		
		$task_info=$task->getTaskInfo($task_id);			//取书总页数
		if ($task_info['is_end'] != 0) {
			return $this->return_info(false, 'had_complete');
		}
		$res=$detail->isUpCurrentPage($task_id);			//先判断当天有无签到
		$day_num=$current_page - $task_info['current_page'];//取得当天读了多少页
		$detail_data = array (
			'task_id' => $task_id,
			'page_num'=> $current_page,
			'update_time'=> date('Y-m-d H:i:s'),
		);

		if ($res) {
			//当天不是第一次更新页数
			$detail->setDetail($res[0]['id'],$detail_data);	//有值则直接更新页数
			$detail->updateDetailPageNum($res[0]['id'],$day_num);//更新当天读的总页数
		} else {
			//当天第一次更新页数
			$detail_data['day_num']=$day_num;
			$detail->addTaskDetail($detail_data);
		}
		$task->setTaskData($task_id, array('current_page'=>$current_page));//更新任务的当前读页码
		
		if ($current_page > $task_info['pages']) {			//若当前页数>总页数直接设为完成
			$task->setEndTask($task_id);
			return $this->return_info(true, 'end');
		}
		return $this->return_info(true, 'success');
	}
	/**
	* 中间index
	* @param  
	* @date 2015-12-18
	* @return:
	*/
	public function getTaskIndex($user_id) {
		$task = new TaskModel();
		$detail = new TaskDetailModel();
		$task_list = $task->getTaskByUser($user_id);
		
		if ($task_list) {
			foreach ($task_list as $k=>$v) {
				$detail_list = $detail->getDetailList($v['id']);
				if($detail_list){
					$task_list[$k]['detail'] = $detail_list;
				}
			}
		}
		return $this->return_info($task_list, 'success');
	}
	//返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }
}