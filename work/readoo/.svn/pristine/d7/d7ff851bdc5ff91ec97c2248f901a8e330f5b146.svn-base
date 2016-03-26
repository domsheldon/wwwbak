<?php
/**
 * 纸质书籍
 * @date: 2016-1-15
 * @author: zhouyi
 * @version:1.0.0
 */
import('@.Service.PaperBookService');
class PaperBookAction extends WebCommonAction{

    /**
     * 纸质书籍信息
     */
    public function paperBookList(){
        $book_id = $this->_post('book_id');
        $service = new PaperBookService();
        $list = $service->paperBookList($book_id);
        if($list){
            $this->data['data'] = $list;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','纸质书籍列表无效');
        }
    }
}