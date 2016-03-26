<?php 
//拆书包列表
class PackListAction extends WebCommonAction{
	
	//共读列表
	public function index(){
		$book_id=$this->_get('id');
		$data=M('BookPack')->where("book_id=$book_id")->field('id,book_id,book_title,title,read_count,media,time_type,pub_time')->order('id desc')->select();
		foreach($data as $k=>$v){
			$data[$k]['time_type']='早读';
			if($v['time_type']==2){
				$data[$k]['time_type']='晚读';
			}
		}
		$this->assign('data',$data);
		$this->display();
	}
	//返回中间部分，域名什么的后面拼
	private function upload_media($book_id) {
		//上传音频
		$bucket='fengwoimg';
		$fold='readwith/media/'.$book_id;
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename;
	}
	
	public function edit() {
		if($this->isPost()) 
		{
			$id=$this->_post('id');
			$book_id=$this->_post('book_id');
            $media_time=$this->_post('media_time');

			$model=new BookPackageModel();
			//把post信息当data传入库
			$data=$_POST;
			if ($_FILES['media']['name'] || $_FILES['top_img']['name']) 
			{
				$file = $this->upload_media($book_id);
				if (count($file) >1) { //说明是两个都传了
					$data['media']=OSS_AD.$file[0];
					$data['top_img']=OSS_AD.$file[1];
				} else {
					$data['top_img']=$file;
					$ext=pathinfo($file, 'PATHINFO_EXTENSION');
					if ($ext =='.mp3') {
						$data['media']=$file;
					}
				}
                $data['media_time']=$media_time;
			}
            //        	检测音频文件时长格式是否正确；
//          首先将用户输入的中文字符的冒号转换成半角格式的冒号；
            $data['media_time']=preg_replace('/：/',':',$data['media_time']);
            $media_time=preg_match("/^[0-9]{1,2}:[0-9]{1,2}$/",$data['media_time']);
            if (!$media_time) {
                $this->error('音频时长格式错误！');
            }           
            $bool=$model->edit($id, $data);
		  	if (!$bool)
		  	{
		  		$this->error($model->getError());
		  	}
		 	$this->success('修改成功','/Admin/PackList/index/id/'.$book_id);
		} 
		else
		{
			$id=$this->_get('id');
			$data=M('BookPack')->where("id=$id")->field('id,book_id,title,content,abstract,time_type,target,media,media_time,name,share_url,top_img')->find();
			$this->assign('data',$data);
			$this->display();
		}
	}
	
	public function del(){
		$id=$this->_get('id');
		$book_id=$this->_get('book_id');
		M('BookPack')->where("id=$id")->delete();
		$this->success('删除成功',U('/Admin/PackList/index',array('id'=>$book_id)));
	}
	
	
	
}
 ?>
 








