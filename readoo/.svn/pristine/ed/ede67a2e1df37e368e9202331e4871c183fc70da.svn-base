<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2015/11/27
 * Time: 11:21
 */
class TaskModel extends Model
{
    private $task;
    public function __construct(){
        $this->task=M('Task');
    }

    public function addTask($data){
        $data['create_time']=date('Y-m-d H:i:s');
        return M('Task')->add($data);
    }
    /**
    * 取用户在读的task_id
    * @param $user_id 用户id
    * @date 2015-12-18
    * @return:$task_list
    */
    public function getTaskByUser($user_id) {
    	$sql='SELECT t.*,b.`large_cover` as cover 
				FROM ys_task t,ys_book b  
				WHERE b.`book_id`=t.`book_id` AND t.`user_id`='.$user_id.' AND t.`is_end`=0 order by t.create_time asc';
    	return M()->query($sql);
    }
    /**
    * 判断用户是否有在读的书
    * @param $user_id 
    * @date 2015-12-3
    * @return:
    */
    public function readingCount($user_id) {
    	return M('Task')->where('is_end=0 and user_id='.$user_id)->count();
    }
    /**
    * 判断用户是否读过此书
    * @param $user_id 
    * @param $book_id 
    * @date 2015-12-3
    * @return:
    */
    public function bookIsRead($user_id, $book_id) {
    	return M('Task')->where("book_id=$book_id and user_id=$user_id")->find();
    }
    
	/**
	* 计划列表
	* @date 2015-11-27
	* @return:
	*/
	public function getUserPlanList($user_id) {
		$sql='select a.id as task_id,a.digg_count,a.is_end,a.plan_day,b.title as book_name,b.cover 
		from ys_task as a,ys_book as b 
		where a.book_id=b.book_id and a.user_id='.$user_id.' order by a.is_end asc,a.create_time desc';
		return M()->query($sql);
	}
	
    /**
    * 当前读到第几步
    * @param $task_id 
    * @date 2015-11-27
    * @return: int $had_day
    */
    public function taskCurStep($task_id) {
    	$sql = 'select count(*) as had_day from ys_task_detail where content!="" and task_id = '.$task_id;
        $res=M()->query($sql);
        return $res[0]['had_day'];
    }
    
 	public function delTask($task_id){
		M('Task')->where('id='.$task_id)->delete();	
		M('TaskDetail')->where('task_id='.$task_id)->delete();	
    }
    /**
    * 返回用户此任务的总字数
    * @param $task_id 
    * @date 2015-12-4
    * @return: int $count
    */
    public function getTaskWordCount($task_id) {
    	$task_arr=M('TaskDetail')->field('content')->where('task_id='.$task_id)->select();
    	$count=0;
    	foreach ($task_arr as $v) {
    		$count += mb_strlen( trim($v['content']),'utf-8' );
    	}
    	return $count;
    }
    /**
    * 设为完成状态
    * @param $task_id
    * @date 2015-12-9
    * @return:
    */
    public function setEndTask($task_id) {
    	$end_data = array('is_end'=>1, 'end_time'=>date('Y-m-d H:i:s'));
    	M('Task')->where('id='.$task_id)->save($end_data);
    }
    /**
    * plan_day -1
    * @param $task_id 
    * @date 2015-12-9
    * @return:
    */
    public function setDecPlanDay($task_id) {
    	M('Task')->where('id='.$task_id)->setDec('plan_day');
    }
    
    /**
    * 返回任务所读书籍信息
    * @param $task_id_str 
    * @date 2015-12-18
    * @return:
    */
    public function getTaskBookList($task_id_str) {
    	$sql="SELECT b.`cover`,b.`title`,t.id FROM ys_book b,ys_task t WHERE b.`book_id`=t.`book_id` AND t.`id` IN ($task_id_str)";
		$list=M()->query($sql);
		foreach ($list as $v) {
			$result[$v['id']]['cover'] = $v['cover'];		
			$result[$v['id']]['title'] = $v['title'];		
		}
		return $result;
    }
    /**
    * 设置任务数据
    * @param $task_id 
    * @param $task_data 
    * @date 2015-12-18
    * @return:
    */
    public function setTaskData($task_id,$task_data) {
    	return M('Task')->where('id='.$task_id)->save($task_data);
    }
    /**
    * 任务详情
    * @param $task_id 
    * @date 2015-12-18
    * @return:
    */
    public function getTaskInfo($task_id) {
    	return M('Task')->where('id='.$task_id)->find();
    }
    /**
    * 根据task_id取字段
    * @param $task_id 任务id
    * @param $field 要获取的字段 
    * @date 2015-12-29
    * @return: $book_id
    */
    public function getByTaskId($task_id,$field) {
    	return M('Task')->where('id='.$task_id)->getField($field);
    }
}