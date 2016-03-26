<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/2/11
 * Time: 23:32
 */
class BookPackCheckModel extends Model
{
    /**
     * 拆书包点赞，签到记录
     */
    public function addDigg($data){
        $data['create_time'] = date('Y-m-d H:i:s');
        $digg = M('BookPackCheck');
        //每本书、每个拆书包只允许打卡一次
        $res = $digg->where("user_id = '".$data['user_id']."'
        and pack_id='" .$data['pack_id']."'
        and pb_id='" .$data['pb_id']."'")->find();
        if(!isset($res)){
            //发送签到消息
            $redis = new RedisService();
            $redis->groupRankMsg($data['user_id'], 'check');

            return M('BookPackCheck')->add($data);
        }
    }

    /**
     * 返回该用户的总计打开次数
     * @param $user_id
     * @return array|mixed
     */
    public function getDiggSum($user_id){
        $sql = "select count(*) as digg_num from rw_book_pack_check where user_id='".$user_id."'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 返回该用户的总计参加的书籍总数
     * @param $user_id
     * @return array|mixed
     */
    public function getDiggBookNum($user_id){
        $sql = "select count(distinct pb_id) as book_num from rw_book_pack_check where user_id='".$user_id."'";
        $model = M();
        return $model->query($sql);
    }
}