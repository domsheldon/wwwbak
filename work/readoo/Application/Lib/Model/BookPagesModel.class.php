<?php
/**
 * 有书的书籍model
 * @date: 2015-1-29
 * @author: efan
 * @version:1.0.0
 */
class BookPagesModel extends Model {

    //book_pages表所有内容
    public function bookPagesInfo(){
        $sql = "SELECT b.*,a.name as username FROM ys_book_pages b, ys_user_info a WHERE b.user_id = a.user_id";
        $model = M();
        return $model->query($sql);
    }

    //book_pages表某个id的内容
    public function bookPagesOnly($id){
        $sql = "SELECT b.*,a.name as username FROM ys_book_pages b, ys_user_info a WHERE b.user_id = a.user_id AND b.id='".$id."'";
        $model = M();
        return $model->query($sql);
    }

    //book_pages表，is_true置1，同时将book表pages task表总页数
    public function setFlag($id){
        $sql = "UPDATE ys_task_notes SET is_true = '1' WHERE is_true = '".$id."'";
        $model = M();
        return $model->query($sql);
    }

}