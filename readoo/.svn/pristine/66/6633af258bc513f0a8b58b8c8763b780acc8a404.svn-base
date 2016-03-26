<?php
/**
 * 拆书包
 * @date: 2016-1-12
 * @author: zhouyi
 * @version:1.0.0
 */
import('@.Service.PlanBookService');
import('@.Service.BookPackageService');
class BookPackageAction extends WebCommonAction{

    /**
     * 新增拆书包页
     */
    public function bookpackage()
    {
        $this->isLogin();
        $gdId = I('get.gdId');
        $planbookser = new PlanBookService();
        $bookpkg = $planbookser->getBookPkgInfo($gdId);
        $this->assign('bookpkg',$bookpkg);
        $this->assign('pb_id',$gdId);		//plan_book的共读id
        
        $this->display();
    }
	//上传音频、拆书包置顶图片按书分
	private function upload_media($book_id) {
		$bucket='fengwoimg';
		$fold='readwith/media/'.$book_id;
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename;
	}
    /**
     * 新增拆书包post添加
     */
    public function addToBookPack()
    {
        $data = array(
        	'pb_id'		=>$this->_post('pb_id'),
        	'book_id'	=>$this->_post('book_id'),
        	'book_title'=>$this->_post('book_title'),
        	'abstract'	=>$this->_post('abstract'),
        	'content'	=>$_POST['content'],
        	'target'	=>$this->_post('target'),
        	'title'		=>$this->_post('title'),
        	'time_type'	=>$this->_post('time_type'),
        	'pub_time'	=>$this->_post('pub_time') . ' 06:00:00',		//发布时间默认是早读
        	'media_time'=>$this->_post('media_time'),
        	'name'		=>$this->_post('name'),
			'share_url' =>$this->_post('share_url')
        );
		
        //判断是否有音频文件
   	 	if ($_FILES['media']['name'] && $_FILES['top_img']['name']) 
		{
			$file = $this->upload_media($data['book_id']);	//此时把音频和图片都上传了0是media的地址，1是图片的地址
			$data['media']=OSS_AD.$file[0];
			$data['top_img'] =OSS_AD.$file[1];
		}
//        检测音频文件时长格式是否正确；
//            首先将用户输入的中文字符的冒号转换成半角格式的冒号；
        $data['media_time']=preg_replace('/：/',':',$data['media_time']);
        $media_time=preg_match("/^[0-9]{1,2}:[0-9]{1,2}$/",$data['media_time']);

        if(!empty($data['media_time'])) {
            if (!$media_time) {
                $this->error('音频时长格式错误！');
            }
        }

//      晚读的话发布时间改为下午
        if($data['time_type'] ==2)
        {
            $data['pub_time'] = $this->_post('pub_time').' 17:00:00';
        }
        $bp=new BookPackageModel();
        $res = $bp->addToBookPack($data);
        if($res)
        {
            $this->redirect('/Admin/PackList/index/id/'.$data['book_id']);
        }
        else
        {
            $this->error('拆书包信息需填写完整');
        }
    }
}