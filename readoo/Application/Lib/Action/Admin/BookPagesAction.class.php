<?php
/**
 * 后台动态列表
 * @date: 2015-12-7
 * @author: zhouyi
 * @version:1.0.0
 */
class BookPagesAction extends WebCommonAction{

    public function index(){
        $this->isLogin();
        $model = new BookPagesModel();
        $book_pages_info = $model->bookPagesInfo();
        $this->assign('book_pages_info',$book_pages_info);
        $this->display();
    }

    public function ensure(){
        $id = $this->_post('id');
        $pages = $this->_post('pages');
        $model = new BookPagesModel();
        $flag = $model->setFlag("id");
        $info = $model->bookPagesOnly($id);
        foreach($info as $k=>$v){
            $pages = $v['pages'];
            $book_id = $v['book_id'];
        }

        $book_model = new BookModel();
        $update_book = $book_model->updateBookPages($book_id,$pages);
        $task_model = new TaskModel();
        $update_book = $book_model->updateBookPages($book_id,$pages);
    }

}