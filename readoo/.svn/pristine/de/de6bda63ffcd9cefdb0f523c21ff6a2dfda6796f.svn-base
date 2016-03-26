<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/1/21
 * Time: 15:03
 */
import('@.Service.RedisService');
class PlanUserModel extends Model
{
    /**
     * 通过微信用户的open_id获取
     * @param $open_id
     */
    public function getUserStatInfo($user_id){
        $redis = new RedisService();
        $data = $redis->getUserStat();

        $bpModel = new BookPackCheckModel();
        $digg_num = $bpModel->getDiggSum($user_id);
        $book_num = $bpModel->getDiggBookNum($user_id);

        //领先的用户数
        $little_number = 0;
        foreach($data['user_sign'] as $sign){
            if($sign['digg_num'] < $digg_num[0]['digg_num']){
                $little_number = $little_number + $sign['user_numbers'];
            }else{
                break;
            }
        }
        $rate  = $book_num[0]['book_num']==0 ? '0' : number_format($little_number/$data['user_number'] * 100,0);

        $data = array(
            'people_num' => $data['user_number'],
            'digg_sum'=> $digg_num[0]['digg_num'],
            'book_num'=> $book_num[0]['book_num'],
            'rate'=> $rate
        );

        return $data;
    }

    /**
     * @param $user_id
     */
    public function isPlanUser($user_id){
        $plan_user = M("PlanUser");
        return $plan_user->where("user_id = '$user_id' and gd_id = 1")->find();
    }

    /**
     * 加入共读计划
     */
    public function addPlanUser($user_id,$plan_id=1){
        $create_time=date('Y-m-d H:i:s');
        $plan_user = M("PlanUser");
        $res = $plan_user->where("user_id ='$user_id' and gd_id = 1")->find();
        if(!isset($res)){
            $plan_user->add(array('user_id'=>$user_id,'gd_id'=>'1','create_time'=>$create_time));
        }
    }

    /**
     * 退出共读计划
     */
    public function delPlanUser($user_id){
        $plan_user = M("PlanUser");
        $plan_user->where("user_id ='$user_id' and gd_id = 1")->delete();
    }

    /**
     * 从菜单表获取最新的拆书包连接
     * @return array|mixed
     */
    public function getPackUrl(){
        $sql = "SELECT CODE,NAME FROM rw_wechat_menu WHERE NAME LIKE '%早读' OR NAME LIKE '%晚读'";
        $res = M()->query($sql);
        return $res;
    }
}