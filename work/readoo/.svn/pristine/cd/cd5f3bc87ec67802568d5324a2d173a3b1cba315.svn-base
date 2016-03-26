<?php
/**
* 后台管理话题
* @date: 2016-3-7
* @author: efan
*/
class TopicAction extends Action {

	
	/**
	* 话题列表
	* @date: 2016-3-7
	*/
	public function index() {
		$list=M('Topic')->order('join_nums desc')->select();
		
		$this->assign('data', $list);
		$this->display();
	}
	//返回中间部分，域名什么的后面拼
	private function upload_cover() {
		//上传图书封面
		$bucket='fengwoimg';
		$fold='readwith/';
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename[0];
	}
    /**
     * 上传文件
     */
    public function uploadFile() {
        if ($_FILES['img']['name']) {
        	$img_name=$this->upload_cover();
        	echo OSS_COVER.$img_name;exit;
        }
        echo '';
    }
	/**
	* 话题添加、编辑
	* @date: 2016-3-7
	*/
	public function save() {
		if ($this->isPost()) {
			$id=$this->_post('id');
			$data =array(
				'topic_title'=>$this->_post('topic_title'),
				'img'=>trim($this->_post('img')),
				'topic_content'=>trim($this->_post('content')),
				'topic_rule'=>trim($this->_post('rule'))
			);
			$topic=new TopicModel();
			$res=$topic->save($data, $id);
			if ($res!==false) {
	           	redirect('/Admin/Topic/index');
	        } else {
	            $this->error('添加失败');
	        }
		} else {
			$id=$this->_get('id');
			$info=M('Topic')->where('id='.$id)->find();
			$this->assign('info', $info);
			$this->display();
		}
	}
}