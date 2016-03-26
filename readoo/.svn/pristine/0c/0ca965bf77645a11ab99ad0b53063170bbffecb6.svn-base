<?php

class PlanBookModel extends Model {

    /**
     * 共读书单
     */
    public function getList(){
        return M('PlanBook')->order('end_time desc')->select();
    }


    /**
     * 获取共读书单名称
     */
    public function getBookById($book_id){
        return M('PlanBook')->where('book_id='.$book_id)->find();
    }

    /**
     * 添加到共读书单列表
     */
    public function savePlanBook($data, $pb_id=''){
        $model = M('PlanBook');
        if ($pb_id) {
        	$model->where('id='.$pb_id)->save($data);
        }else {
        	$res = $model->add($data);
        }
        return $res;
    }


    /**
     * 添加到共读书单页
     */
    public function addcoreading($bookId,$bookName,$uploadPic,$dtp_input_start,$bookComment){
        $model = M('PlanBook');
        $time = date('Y-m-d H:m:s',time());
        $end_time = date('Y-m-d', strtotime ("+7 day", strtotime($dtp_input_start)));
        $data = array(
            'book_id' => $bookId,
            'book_title' => $bookName,
            'book_cover' => $uploadPic,
            'start_time' => $dtp_input_start,
            'comment' => $bookComment,
            'create_time'=> $time,
            'end_time'=>$end_time
        );
        $res = $model->add($data);
        return $res;
    }

    /**
     * 拆书包信息
     * @return:
     */
    public function getBookPkgInfo($gdId) {
        $model = M('PlanBook');
        $res = $model->where("id = '".$gdId."'")->find();
        return $res;
    }

    /**
     * 从书籍列表添加共读书单
     */
    public function addFromBookList($bookId,$title,$cover,$startTime){
        $model=M('PlanBook');
        $time = date('Y-m-d H:m:s',time());
        $end_time = date('Y-m-d', strtotime ("+7 day", strtotime($startTime)));
        $data = array(
            'book_id' => $bookId,
            'book_title' => $title,
            'book_cover' => $cover,
            'start_time' => $startTime,
            'end_time' => $end_time,
            'create_time'=> $time
        );
        $res = $model->add($data);
        return $res;
    }

    /**
     * 删除共读书籍
     * @return:
     */
    public function deleteBook($gdId) {
        $model = M('PlanBook');
        $res = $model->where("id = '".$gdId."'")->delete();
        return $res;
    }

    /**
     * 获取当月共读书单
     */
    public function getMonthBkList(){
        $model=M('PlanBook');
        $time = date('Y-m',time());
        $res = $model->where("DATE_FORMAT(start_time,'%Y-%m')='$time'
        or DATE_FORMAT(end_time,'%Y-%m')='$time'")->order("start_time")->select();
        return $res;
    }
}