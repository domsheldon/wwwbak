<?php
/**
 * 共读业务逻辑层
 * @date: 2016-1-13
 * @author: zhouyi
 * @version:1.0.0
 */
class PlanBookService{
    /**
     * 获取共读书单
     */
    public function getPlanBook(){
        $model=new PlanBookModel();
        $res = $model->getList();
        return $res;
    }

    /**
     * 获取共读书单名称
     */
    public function getBookById($book_id){
        $model=new PlanBookModel();
        $res = $model->getBookById($book_id);
        return $res;
    }

    /**
     * 获取书籍列表
     */
    public function getBookList(){
        $model=new BookModel();
        $res = $model->getBookList();
        return $res;
    }

    /**
     * 从bookid添加共读书单页
     */
    public function getBookFromId($bookId){
        $model=new BookModel();
        $res = $model->getBookFromId($bookId);
        return $res;
    }

    /**
     * 添加共读书单页
     */
    public function addcoreading($bookId,$bookName,$uploadPic,$dtp_input_start,$bookComment){
        $model=new PlanBookModel();
        $res = $model->addcoreading($bookId,$bookName,$uploadPic,$dtp_input_start,$bookComment);
        return $res;
    }

    /**
     * 查询book表里是否存在传入的isbn书籍
     */
    public function isbnIsExist($isbn){
        $model = new BookModel();
        //先查询是否存在
        $res = $model->isbnIsExist($isbn);
        if (empty($res)) {
        	//从豆瓣上采集信息  存到book表
        	$result=$model->douban_isbn_find($isbn);			
        	$book_id=$model->save_book_info($result['title'], $result['author'][0], $result['image'], $result['isbn13'], $result['price'], $result['publisher'], $result['summary'],$result['images']['large'],$result['pages'],$result['rating']['average'],$result['pubdate'],$result['binding'],$result['id']);
        	$res = array(		//重新组合显示到页面上，看运营是否需要编辑图片和简介
        		'book_id'=>$book_id,
        		'title'=>$result['title'],
        		'book_id'=>$book_id,
        		'cover'=>$result['image'],
        		'intro'=>$result['summary']
        	);
        }
        return $res;
    }

    /**
     * 把书加入共读书单
     *
     */
    public function savePlanBook($book_id, $title, $cover, $comment, $start, $end, $pb_id){
        $model=new PlanBookModel();
        $data = array(
        	'book_title' => $title,
        	'book_cover' => $cover,
        	'comment' => $comment
        );
     	if (empty($pb_id)) {
        	$data['book_id'] = $book_id;
        	$data['start_time']=$start;
        	$data['end_time']=$end;
        }
        $res = $model->savePlanBook($data, $pb_id);
        //单独保存book表数据
        $book_data=array(
        	'title'=> $title,
        	'cover' => $cover
        );
        M('Book')->where('book_id='.$book_id)->save($book_data);
        return $res;
    }

    /**
     * 从书籍列表添加共读书单
     */
    public function addFromBookList($bookId,$startTime){
        $model=new PlanBookModel();
        $bookModel = new BookModel();
        $bookDetail = $bookModel->get_book_info($bookId);
        foreach($bookDetail as $k=>$v){
            if($k == 'title'){
                $title = $v;
            }
            if($k == 'cover'){
                $cover = $v;
            }
        }
        $res = $model->addFromBookList($bookId,$title,$cover,$startTime);
        return $res;
    }

    /**
     * 拆书包书籍信息列表
     */
    public function getBookPkgInfo($gdId) {
        $model = new PlanBookModel();
        $res = $model->getBookPkgInfo($gdId);
        return $res;
    }

    /**
     * 查找书名选择书籍
     */
    public function choosebook($bookName) {
        $model = new BookModel();
        $res = $model->choosebook($bookName);
        return $res;
    }

    /**
     * 删除共读书籍
     */
    public function deleteBook($gdId) {
        $model = new PlanBookModel();
        $res = $model->deleteBook($gdId);
        return $res;
    }
}