<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2015/11/27
 * Time: 11:21
 */
class TaskDetailModel extends Model
{
    /**
     * 添加任务细节
     * @param $data
     */
    public function addTaskDetail($data){
		M('TaskDetail')->add($data);
    }

    /**
     * 更新读书笔记
     * @param $id
     * @param $data
     */
	public function updateTaskDetail($id,$data){
        $data['update_time']=date('Y-m-d H:i:s');
		M('TaskDetail')->where('id='.$id)->save($data);
    }
    /**
    * 计划详情
    * @param $task_id 
    * @date 2015-11-27
    * @return:mixd
    */
    public function getTaskDetail($task_id) {
    	return M('TaskDetail')->field("id as plan_id,page_num,task_id,title,content,DATE_FORMAT(`update_time`,'%Y-%m-%d %H:%i') AS update_time")->where('task_id='.$task_id)->order('plan_id asc')->select();
    }
    
    /**
    * 取计划的用户id
    * @param $id 
    * @date 2015-11-27
    * @return:
    */
    public function getPlanUser($id) {
    	$sql="select user_id from ys_task where id=(select task_id from ys_task_detail where id=$id)";
    	return M()->query($sql);
    }
    /**
    * 函数用途描述
    * @param $detail_id 
    * @date 2015-12-9
    * @return:
    */
    public function delDetail($detail_id) {
    	M('TaskDetail')->where('id='.$detail_id)->delete();
    }
    /**
    * 取出此计划的最后一天
    * @param $task_id 
    * @date 2015-12-9
    * @return:
    */
    public function getLastDetail($task_id) {
    	return M('TaskDetail')->field('id,page_num')->where('task_id='.$task_id)->order('id desc')->limit(1)->find();
    }
   	/**
   	* 根据detail_id取出task_id
   	* @param $detail_id 
   	* @date 2015-12-9
   	* @return: $task_id
   	*/
   	public function getTaskId($detail_id) {
   		return M('TaskDetail')->where('id='.$detail_id)->getField('task_id');
   	}
   	/**
   	* 根据detail_id设置字段
   	* @param $detail_id 
   	* @date 2015-12-9
   	* @return: 
   	*/
   	public function setDetail($detail_id,$data) {
   		return M('TaskDetail')->where('id='.$detail_id)->save($data);
   	}

	/**
	 * 当天多次签到，每次更新读取的总页数
	 */
	public function updateDetailPageNum($detail_id,$day_num){
		M('TaskDetail')->where('id='.$detail_id)->setInc('day_num', $day_num);
	}
   	
   	/**
   	* 当天是否更新了在读页数
   	* @param $task_id 
   	* @date 2015-12-18
   	* @return:
   	*/
   	public function isUpCurrentPage($task_id) {
   		$sql="select * from ys_task_detail where date_format(update_time,'%Y%m%d')='".date('Ymd',time())
			."' AND task_id=".$task_id;
   		return M()->query($sql);
   	}
   	/**
   	* 根据task_id取detail列表
   	* @param $task_id 
   	* @date 2015-12-18
   	* @return:
   	*/
   	public function getDetailList($task_id) {
   		return M('TaskDetail')->field("page_num,day_num,date_format(update_time,'%Y-%m-%d') as update_time")->where('task_id='.$task_id)->select();
   		
   	}
}