<?php
/**
 * 共读书单上传
 * @date: 2016-1-12
 * @author: zhouyi
 * @version:1.0.0
 */
import('@.Service.PlanBookService');
import('@.Service.BookPackageService');
import('@.Service.BookService');
class PlanBookAction extends WebCommonAction{

    /**
     * 共读书单
     */
    public function coreading(){
        $this->isLogin();
        $service = new PlanBookService();
        $res = $service->getPlanBook();
        $this->assign('bookinfo',$res);
        $this->display();
    }

    /**
     * 获取编码页面
     */
    public function getcode(){
        $book_id = I('get.bookId');
        $gdId = I('get.gdId');
        $bookService = new BookService();
        $bookInfo = $bookService->get_book_info($book_id);
        $book_pack = M('BookPack')->where('pb_id='.$gdId)->select();

        $this->assign('bookInfo',$bookInfo);
        $this->assign('gdId',$gdId);
        $this->assign('book_id',$book_id);
        $this->assign('book_pack',$book_pack);

        $this->display();
    }

    /**
     * 获取编码操作
     */
    public function doGetCode(){
        $book_id = $this->_post('book_id');
        $select = $this->_post('select');
        $gdId = $this->_post('gdId');

        $code = '{"plan":'.$gdId.',"pack":'.$select.'}';
        $ecode = base64_encode($code);
        return exit($ecode);
    }

    /**
     * 添加共读书单页
     */
    public function addcoreading(){
        $bookId = $this->_post('bookId');
        $bookName = $this->_post('bookName');
        $uploadPic = $this->_post('uploadPic');
        $dtp_input_start = $this->_post('dtp_input_start');
        $bookComment = $this->_post('bookComment');
        $service = new PlanBookService();
        $addBookInfo = $service->addcoreading($bookId,$bookName,$uploadPic,$dtp_input_start,$bookComment);
        $this->assign('addBookInfo',$addBookInfo);
        if($addBookInfo){
            $this->ajaxReturn();
        }
        $this->display();
    }

    /**
     * 从书籍列表添加共读书单页
     */
    public function from(){
        $service = new PlanBookService();
        $res = $service->getBookList();
        $this->assign('bookinfo',$res);
        $this->display();
    }

    /**
     * 查找书名选择书籍
     */
    public function choosebook(){
        $bookName = $_GET['bookname'];
        $service = new PlanBookService();
        $bookInfo = $service->choosebook($bookName);
        $this->assign('bookInfo',$bookInfo);
        $this->display();
    }

    /**
     * 从书籍列表添加共读书单
     */
    public function addFromBookList(){
        $bookId = $this->_post('bookId');
        $startTime = $this->_post('startTime');
        $service = new PlanBookService();
        $res = $service->addFromBookList($bookId,$startTime);
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','添加到共读书单错误');
        }
    }

    /**
     * 根据ISBN查询书的信息
     */
    public function isbnSearch(){
        $isbn = $this->_post('isbn');
        $service = new PlanBookService();
        $res = $service->isbnIsExist($isbn);
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','isbn获取错误');
        }

    }
	//返回中间部分，域名什么的后面拼
	private function upload_cover() {
		//上传图书封面
		$bucket='book-cover';
		$fold='readoo/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename[0];
	}
    /**
     * 上传文件
     */
    public function uploadFile() {
        if ($_FILES['cover']) {
        	$img_name=$this->upload_cover();
        	echo OSS_COVER.$img_name;exit;
        }
        echo '';
    }
    /**
     * 添加到共读书单列表
     */
    public function savePlanBook(){
    	if ($this->isPost())
    	{
	        $book_id = $this->_post('book_id');
	        $pb_id = $this->_post('pb_id');
	        $title = $this->_post('title');
	        $comment = $this->_post('comment');		//摘要简介
	        $cover = $this->_post('cover');
	        $start = $this->_post('start');
	        $end = $this->_post('end');
	
	        if($book_id) {
	            $service = new PlanBookService();
	            $res = $service->savePlanBook($book_id, $title, $cover, $comment, $start, $end, $pb_id);
	        }
	        if ($res!==false) {
	           	redirect('/Admin/PlanBook/coreading', 1, 'success');
	        } else {
	            $this->error('添加失败');
	        }
    	} else {
    		$pb_id=$this->_get('pb_id');
    		$book_id=$this->_get('book_id');
    		if ($pb_id) {
    			$info=M('PlanBook')->field('book_title,book_cover,comment')->where('id='.$pb_id)->find();
    			$this->assign('pb_id', $pb_id);
    			$this->assign('book_id', $book_id);
    			$this->assign('cover', $info['book_cover']);
    			$this->assign('title', $info['book_title']);
    			$this->assign('comment', $info['comment']);
    		}
    		$this->display('addcoreading');
    	}
    }
	
    /**
     * 删除共读书籍
     */
    public function deleteBook(){
        $gdId = $this->_post('gdId');
        $service = new PlanBookService();
        $res = $service->deleteBook($gdId);
        //激活成功后，加载到redis
//        $redis = new RedisService();
//        $redis->saveActiveCustService();
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','删除共读书籍错误');
        }
    }
}