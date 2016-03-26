<?php
class HomeNoticeAction extends WebCommonAction
{
	public function index()   //通知栏首页
	{
		$this->isLogin();
        $HomeNotice=new HomeNoticeModel();
		$info=$HomeNotice->getInfo();       //获取首页通知栏所有信息
		$this->assign('data',$info);
		$this->display();
	}
	
	public function add()   //添加通知栏
	{
		$model=new HomeNoticeModel();
		if($_FILES['photo']){
			$img=$this->upload_avatar();
			$bool=$model->store($img);
			if(!$bool){
				$this->error($model->getError());
			}
			   $this->success('添加成功','index');
		}
		$this->display();
	}
	
	private function upload_avatar(){
		$bucket='fengwoimg';//广告地址
		$fold='readwith';
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return OSS_AD.$filename[0];
	}
	
   public function edit()
   {
   	   $model=new HomeNoticeModel();
	   $id=$this->_get('id'); //获取要修改数据的id
	   $data=M('ActionConfig')->where("id={$id}")->find();
   	   if($this->isAjax())
	   {
	   	  $bool=$model->edit(); //将要修改信息的id传入模型执行修改动作
		  if(!$bool){
//		  	$this->error($model->getError());
             $this->ajaxReturn('0',$model->getError());
		  }
//		   $this->success('修改成功','/Admin/HomeNotice/index');
           $this->ajaxReturn('1','修改成功');
	   }
	   $this->assign('data',$data);
   	   $this->display();
   }
   
   public function del()
   {
   	  $id=$this->_post('id');
	  M('ActionConfig')->where("id={$id}")->delete();
	  $this->ajaxReturn();
   }
	
	
}
 ?>