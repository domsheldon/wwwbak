<?php
/**
* 笔记、书摘业务层
* @date: 2015-12-18
* @author: efan
* @version:1.0.0
*/
import('@.Service.TaskService');
import('@.Service.BookService');
class NoteService {
	
	/**
	* 笔记保存
	* @param $data 
	* @param $note_id 笔记id
	* @date 2015-12-22
	* @return:
	*/
	public function noteAdd($data, $note_id=0) {
		$note=new NoteModel();
		
		if ($note_id) {
			$note->setNoteUpdate($data, $note_id);
			$res = $note_id;
		}else {
			$res=$note->setNoteAdd($data);
		}
		return $this->return_info($res, 'note_id');
	}
	/**
	* 笔记详情
	* @param $note_id 
	* @date 2015-12-18
	* @return:
	*/
	public function getNoteInfo($task_id) {
		$note=new NoteModel();
		$note_id=$note->getNoteIdByTask($task_id);
		if (empty($note_id)) {
			return $this->return_info(false, 'task_no_note');
		}
		$info=$note->getNoteInfo($note_id);			//详情
		$info[0]['word_count']=mb_strlen($info[0]['content']);	//字数
		
		return $this->return_info($info[0], 'note_info');
	}
	/**
	* 随手记列表
	* @param $task_id
	* @date 2015-12-21
	* @return:
	*/
	public function getSsjList($task_id) {
		$note=new NoteModel();
		$note->ssjList($task_id);
	}
	/**
	* 随手记保存
	* @param $type 1：文字，2：图片，3：语音
	* @param $flag 0是用户自己记录的，1是推送或其他方式的
	* @param $text 文字内容
	* @param $url 	图片/语音的地址
	* @param $miaoshu 语音的秒数 
	* @date 2015-12-21
	* @return:
	*/
	public function saveShouJi($task_id, $type, $flag, $text, $url='', $miaoshu=0) {
		/*如果传过来的文本是数字，则自动签到一次*/
		if (check($text)) {
			$task=new TaskService();
			$task->setCurrentPage($task_id, $text);
			return $this->return_info(1, 'add_success');
		}
		$note=new NoteModel();
		$data = array(
			'task_id' => $task_id,
			'flag' => $flag,
			'type' => $type,
			'content' => $text,
			'url' => $url,
			'second' => $miaoshu,
		);
		$ssj_id=$note->addDigestData($data);
		
		return $this->return_info($ssj_id, 'add_success');
	}
	/**
	* 随手记删除
	* @param $id 
	* @date 2015-12-21
	* @return:
	*/
	public function ssjDel($ssj_id) {
		$note=new NoteModel();
		$note->ssjDel($ssj_id);
	}
	/**
	* 获取书籍短评
	* @param $task_id
	* @date 2015-12-29
	* @return: string $review
	*/
	public function getReview($task_id) {
		$task=new TaskModel();
		$bookS=new BookService();
		
		$book_id=$task->getByTaskId($task_id, 'book_id');	//获取书籍id
		$review = $bookS->getBookReview($task_id, $book_id);			//获取此书的短评
		$this->saveShouJi($task_id, 1, 1, $review[0]);			//加入随手记，推送类型
		
		return $this->return_info($review[0], 'review');
	}

	/**
	 * 随手记同步
	 * @param $update_time
	 * @date 2016-1-6
	 * @return:
	 */
	public function ssjSync($task_id,$update_time) {
		$note=new NoteModel();
		return $note->ssjSync($task_id,$update_time);
	}

	//返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }
}