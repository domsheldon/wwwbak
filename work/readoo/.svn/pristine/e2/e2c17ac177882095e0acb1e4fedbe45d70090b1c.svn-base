<?php
/**
* 笔记、书摘
* @date: 2015-12-18
* @author: efan
* @version:1.0.0
*/
import('@.Service.NoteService');
import('@.Service.CheckService');
class NoteAction extends WebCommonAction {
	
	private $check; 	//checkService的实例	
	
	public function __construct(){
		parent::__construct();
		$this->check = new CheckService($this->uid);
	}
	/**
	* 保存笔记
	* @date 2015-12-22
	* @return:
	*/
	public function noteAdd() {
		$task_id = $this->_post('task_id');
		$note_id = $this->_post('note_id') ? $this->_post('note_id') : 0;
		$title = trim($this->_post('title'));
		$content = trim($_POST['content']);
		
		$this->check->checkId($task_id);
		$this->check->checkContent($title, '1', '30');
		if (empty($content)) $this->ajaxReturn('10041', '内容有误');
		
		$note=new NoteService();
		/*组合数据*/
		$data = array( 'title'=>$title, 'content'=>$content);
		if (empty($note_id)) {
			$data['task_id'] = $task_id;
			$data['user_id'] = $this->uid;
		}
		$res=$note->noteAdd($data, $note_id);
		if ($res[0]) {
			$this->data['note_id']="$res[0]";
			$this->ajaxReturn();
		}
		$this->ajaxReturn('0','新增失败');
	}
	
	/**
	* 笔记详情
	* @date 2015-12-18
	* @return:
	*/
	public function noteInfo() {
		$task_id=$this->_post('task_id');
//		$note_id=$this->_post('note_id');
		$this->check->checkId($task_id);
		
		$note = new NoteService();
		$res=$note->getNoteInfo($task_id);
		if ($res[0]){
			$this->data['data'] = $res[0];
		}
		$this->ajaxReturn();
	}
	/**
	* 上传图片返回图片地址
	* @date 2015-12-22
	* @return:
	*/
	public function upImg() {
		if ($_FILES['img']) {
			$img=$this->upload_file();
		}
		$this->data['url']=$img ? OSS_COVER.$img : '';
		$this->ajaxReturn();
	}
	//上传图片、语音
	private function upload_file(){
		//上传头像
		$bucket='book-cover';
		$fold='readoo/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename[0];
	}
	/**
	* 随手记保存
	* @date 2015-12-21
	* @return:
	*/
	public function suishouji() {
		$type=1;
		$miaoshu=0;
		$task_id = $this->_post('task_id');
		$text=trim($this->_post('content'));	//文本
		$miaoshu=(int)$this->_post('miao');			//语音秒数
		
		if ($_FILES['file']) {			//图片或语音文件
			$url = $this->upload_file();
			$type=2;
			if (pathinfo($url, PATHINFO_EXTENSION) =='wav') $type=3;	//取后缀判断是语音/图片
		}
		$this->check->checkId($task_id);		
		if(empty($text) && empty($url)) $this->ajaxReturn('0', '内容不能为空');		
			
		$note=new NoteService();
		$res=$note->saveShouJi($task_id, $type, 0, $text, $url, $miaoshu);		//保存
		
		$this->data['ssj_id'] = $res[0];
		$this->ajaxReturn();
	}
	/**
	* 随手记删除
	* @date 2015-12-21
	* @return:
	*/
	public function ssjDel() {
		$ssj_id = $this->_post('ssj_id');
		$this->check->checkId($ssj_id);
		
		$note=new NoteService();
		$note->ssjDel($ssj_id);
		$this->ajaxReturn();
	}
	/**
	* 返回书籍短评
	* @date 2015-12-22
	* @return:
	*/
	public function dpGet() {
		$task_id=$this->_post('task_id');
		$this->check->checkId($task_id);
		
		$task=new NoteService();
		$res=$task->getReview($task_id);
		
		$this->data['content']=$res[0];
		$this->data['flag']='douban';
		$this->ajaxReturn();
	}

	/**
	 * 随手记同步
	 * @date 2016-1-6
	 * @return:
	 */
	public function ssjSync() {
		$task_id = $this->_post('task_id');
		$update_time = $this->_post('update_time');

		if(empty($update_time) || empty($task_id)){
			$this->ajaxReturn('0','随手记同步无效');
		}else{
			$note=new NoteService();
			$res = $note->ssjSync($task_id,$update_time);
			if(empty($res)){
				$this->data = [];
			}else{
				$this->data = array('data'=>$res);
			}
			$this->ajaxReturn();
		}
	}
}