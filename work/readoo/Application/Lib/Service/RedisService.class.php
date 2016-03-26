<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/1/13
 * Time: 13:50
 */

import('@.Model.PlanUserModel');
class RedisService{

    public function chkRedisStatus(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        try {
            $redis->ping();
        }catch (Exception $e){
            return null;
        }

        return $redis;
    }

    /**
     * 获得某本书所有的拆书包，key方式存储，key:bpack_{$plan_id}_{$bp_id}
     * @param $redis
     * @param $plan_id，共读编号
     * @return mixed
     */
    public function getBookPack($plan_id){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);

        $res = $redis->keys("bpack_".$plan_id."*");
        $redis->close();
        return json_decode($res);
    }

    /**
     * 保存某本书的所有拆书包内容
     * @param $redis
     * @param $book_id
     * @param $pack_arr
     */
    public function saveBookPack($plan_id,$pb_id,$pack_arr){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);

        $redis->set("book_pack_".$plan_id."_".$pb_id,json_encode($pack_arr));
        $redis->close();
    }

    /**
     * 获取激活的客服号
     * @return bool|string
     */
    public function getActiveCustService(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);

        $res= $redis->get("active_cust");
        if(empty($res)) {
            $model = new CustServiceModel();
            $res = $model->getActiveService();
            $redis->set('active_cust',json_encode($res));
        }
        $redis->close();
        return $res;
    }

    /**
     * 保存更新的客服号
     * @return bool
     */
    public function saveActiveCustService(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);

        $model = new CustServiceModel();
        $cust = $model->getActiveService();
        $res = $redis->set("active_cust",json_encode($cust));
        $redis->close();
        return $res;
    }

    /**
     * 保存查询出来的用户信息
     * @param $id
     * @param $data
     */
    public function setUserSession($id,$data){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $redis->set($id,json_encode($data));
        $redis->close();
    }

    /**
     * 从数据库中查询用户信息，并保存到redis
     * @param $id
     * @param $open_id
     */
    public function setSession($id,$open_id){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $model = new UserModel();
        $user_info = $model->getUserByOpenid($open_id);
        $redis->set($id,json_encode($user_info));
        $redis->close();
    }

    public function getSession($id){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $res = json_decode($redis->get($id),true);
        $redis->close();
        return $res;
    }

    public function  setMediaId($session_id,$media_id){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $redis->set("media_".$session_id,$media_id);
        $redis->close();
    }

    public function getMediaId($session_id){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $res = $redis->get("media_".$session_id);
        $redis->close();
        return $res;
    }

    /**
     * 保存lanwechat的token，老化时间300秒
     * @param $token
     */
    public function setWechatToken($token,$key='wechat_token'){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $redis->setex($key,300,$token);
        $redis->close();
    }

    /**
     * 获取lanewechat的token
     * @return bool|string
     */
    public function getWechatToken($key='wechat_token'){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $res = $redis->get($key);
        $redis->close();
        return $res;
    }

    /**
     * 获取最新的拆书包连接到内存
     */
    public function getPackUrl(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $res = $redis->get('book_pack_url');
        $pack = json_decode($res,true);
        if(!empty($pack) || count($pack)<2) {
            $model = new PlanUserModel();
            $pack = $model->getPackUrl();
            $redis->set('book_pack_url',json_encode($pack));
        }
        $redis->close();
        return $pack;
    }

    /**
     * 设置最新的拆书包连接到内存
     */
    public function setPackUrl(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $model = new PlanUserModel();
        $pack = $model->getPackUrl();

        $redis->set('book_pack_url',json_encode($pack));
    }

    /**
     * 获取关键词自动回复信息
     */
    public function getReply(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $res = $redis->get('wechat_reply');
        $reply = json_decode($res,true);
        if(empty($reply)) {
            $model = new WechatReplyModel();
            $reply = $model->wechatreply();
            $redis->set('wechat_reply',json_encode($reply));
        }
        $redis->close();
        return $reply;
    }

    /**
     *保存关键词自动回复到redis
     */
    public function setReplay(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $model = new WechatReplyModel();
        $reply = $model->wechatreply();

        $redis->set('wechat_reply',json_encode($reply,JSON_UNESCAPED_UNICODE));
    }

    /**
     *获取用户成就中的总用户数，每个签到次数对应的用户数
     */
    public function getUserStat(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $counts = $redis->get('user_stat_numbers');
        if(empty($counts) || $counts == 20000){
            //需要先设置counts值
            $counts = 0;
            $redis->set('user_stat_numbers',$counts);

            $sql = "SELECT COUNT(distinct user_id) as _num FROM rw_book_pack_check";
            $res = M()->query($sql);

            $sql_sign = "select count(*) as user_numbers,digg_num from(
                            select count(*) digg_num, user_id
                            from rw_book_pack_check
                            group by user_id
                            ) as tb group by digg_num";
            $res_sign = M()->query($sql_sign);

            $data = array(
                'user_number' => $res[0]['_num'],
                'user_sign' => $res_sign
            );
            $redis->set("user_stat_info",json_encode($data));

        }
        $counts = $counts + 1;
        $redis->set('user_stat_numbers',$counts);
        $data = $redis->get("user_stat_info");
        return json_decode($data,true);
    }

    /**
     * redis发pub
     * @param $user_id 被加分的用户（）
     * @param $msg_type $包括note,comment,digg,check
     */
    public function groupRankMsg($user_id,$msg_type){

    	try {
	    	$redis = new Redis();
	        $redis->connect(REDIS_HOST,REDIS_PORT);
	        if($redis->ping()){
	            $data = Array();
	            $data['type'] = $msg_type;
	            $data['user_id'] = $user_id;
	
	            $ret = M()->query('select group_id from rw_group_user where user_id='.$user_id);
	            $data['groups'] = $ret;
	
	            $redis->publish('group_rank_msg',json_encode($data));
	        }
    	} catch (Exception $e) {
    	}
        
    }
}