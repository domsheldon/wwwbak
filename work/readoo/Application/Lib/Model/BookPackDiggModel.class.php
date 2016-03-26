<?php

class BookPackDiggModel extends Model {

    /**
     * 拆书包点赞，签到记录
     */
    public function addDigg($data){
        $data['create_time'] = date('Y-m-d H:i:s');
        $digg = M('BookPackDigg');
        //每本书、每个拆书包只允许打卡一次
        $res = $digg->where("digg_user_id = '".$data['digg_user_id']."'
        and pack_id='" .$data['pack_id']."'
        and plan_id='" .$data['plan_id']."'")->find();
        if(!isset($res)){
            return M('BookPackDigg')->add($data);
        }
    }

    /**
     * 返回该用户的总计打开次数
     * @param $user_id
     * @return array|mixed
     */
    public function getDiggSum($user_id){
        $sql = "select count(*) as digg_num from ys_book_pack_digg where digg_user_id='".$user_id."'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 返回该用户的总计参加的书籍总数
     * @param $user_id
     * @return array|mixed
     */
    public function getDiggBookNum($user_id){
        $sql = "select count(distinct plan_id) as book_num from ys_book_pack_digg where digg_user_id='".$user_id."'";
        $model = M();
        return $model->query($sql);
    }

}