<?php 
class HomeNoticeModel extends Model
{
      public function getInfo()
	  {
	  	$model=M('ActionConfig');
        $data=$model->select();
		foreach ($data as $k => $v) 
		{
			if($v['action_type']=='alert')
			{
				$data[$k]['action_type']='强弹窗';
			}
			if($v['action_type']=='act_topic')
			{
				$data[$k]['action_type']='话题';
			}
			if($v['action_type']=='banner')
			{
				$data[$k]['action_type']='广告';
			}
			if($v['action_type']=='act_note')
			{
				$data[$k]['action_type']='写笔记';
			}
		}
		return $data;
	  }
	  
	  public function store($img)
	  {
       	 $title=$_POST['title'];
		     $titleLength=mb_strlen($title);
			   $buttonLength=mb_strlen($_POST['button']);
		     if($title==''){
		     	   $this->error='标题不能为空';
				     return false;
		     }if($titleLength>12){
		     	   $this->error='标题不能超过12个字符';
				     return false;
		     }if($buttonLength>5){
		     	   $this->error='按钮不能超过5个字符';
				     return false;
		     }
			   $type=$_POST['action_type'];   //如果类型为话题讨论，判断note_id是否为0
			   $note_id=$_POST['note_id'];
			   if($type=='act_topic'){
			   	  if($note_id==0){
			   	  	$this->error='话题id不能为空';
					    return false;
			   	  }
			   }
			      $arr=array(
				    'action_type'=>$_POST['action_type'],
				    'title'=>$_POST['title'],
				    'button'=>$_POST['button'],
				    'href'=>$_POST['href'],
				    'img'=>$img,
				    'start_time'=>$_POST['start_time'],
				    'end_time'=>$_POST['end_time'],
				    'note_id'=>$note_id
				  );
			      M('ActionConfig')->add($arr);
				    return true;
	  }

   public function edit($id)
	{
		     $title=$_POST['title'];
		     $titleLength=mb_strlen($title,'utf8');
			   $buttonLength=mb_strlen($_POST['but'],'utf8');
			   $id=$_POST['id'];
		     if($title==''){
		     	   $this->error='标题不能为空';
				     return false;
		     }if($titleLength>12){
		     	   $this->error='标题不能超过12个字符';
				     return false;
		     }if($buttonLength>5){
		     	   $this->error='按钮不能超过5个字符';
				     return false;
		     }
			   $type=$_POST['type'];   //如果类型为话题讨论，判断note_id是否为0
			   $note_id=$_POST['note'];
			   if($type=='act_topic'){
			   	  if($note_id==0){
			   	  	$this->error='话题id不能为空';
					    return false;
			   	  }
			   }
			   $arr=array(
				    'action_type'=>$_POST['type'],
				    'title'=>$_POST['title'],
				    'button'=>$_POST['but'],
				    'href'=>$_POST['href'],
				    'start_time'=>$_POST['start_time'],
				    'end_time'=>$_POST['end_time'],
				    'note_id'=>$note_id
				  );
			   M('ActionConfig')->where('id='.$id)->save($arr);
				    return true;
	}
	  
}
 ?>
 












