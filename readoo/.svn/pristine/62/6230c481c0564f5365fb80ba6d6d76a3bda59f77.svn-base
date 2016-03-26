<?php

class PaperBookModel extends Model {

    /**
     * 纸质书籍信息
     */
    public function paperBookList($book_id){
        $model = M('PbookInfo');

        $res = $model->table('ys_pbook_info b,ys_book a')
            ->where("b.book_id=a.book_id AND b.book_id='".$book_id."'")
            ->field(array('b.id','a.title','b.shop_name','b.price','b.url'))
            ->order('b.price')
            ->select();
        return $res;
    }

}