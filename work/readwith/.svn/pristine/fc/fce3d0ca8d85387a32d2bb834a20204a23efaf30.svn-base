<?php

/**
 * 用户信息
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2015/11/17
 * Time: 17:43
 */
class UserModel extends Model
{
    /**
     * 获取某个用户的信息
     * @param $user_arr 用户id数组 array(3,5);
     * @return mixed
     */
    public function getUserInfo($user_arr, $field='user_id,name,avatar,sex'){
    	$redis=new RedisModel();
    	$list=array();
    	//默认的field读缓存，其余的字段读库
    	if ($field == 'user_id,name,avatar,sex') {
			if ($redis->isConnect()) {
	   			$list=$redis->getUser($user_arr);
			}
    	}
		if (empty($list)) {
    		$user_str=implode(',', $user_arr);
        	$list=M('UserInfo')->field($field)->where("user_id in ($user_str)")->select();
    	}
        foreach ($list as $k=>$v) {
        	$res[$v['user_id']]=$v;
	        if ($v['avatar']) {
	        	$res[$v['user_id']]['avatar'] = OSS_AVATAR.$v['avatar'].OSS_AVATAR_RULE;
	        }
        }
        return $res;
    }
    
    /**
     * 保存某个用户的信息
     * @param $user_id
     * @return int
     */
    public function saveUserInfo($user_id, $data){
    	$u=M('UserInfo');
        $res=$u->where('user_id='.$user_id)->save($data);
       if ($res) {
	        //把更新的写入redis
	        $info=$u->where('user_id='.$user_id)->find();
	        $redis=new RedisModel();
	        $redis->setUser($user_id, $info);
        }
        return $res;
    }
	/**
	* 共读历程，用户签到的书形成的历程
	* @param $user_id 
	* @date 2016-3-1
	*/
	public function getUserRead($user_id) {
		$sql='select b.id,b.book_id,b.book_title,b.book_cover,b.start_time,b.end_time  from rw_book_pack_check a
				left JOIN rw_plan_book b on a.pb_id = b.id
				where user_id='.$user_id.' group by a.pb_id order by end_time desc';
		$pb_list=M()->query($sql);
		return $pb_list;
	}
    /**
    * 吐槽用户留言 
    * @date 2015-11-27
    * @return:
    */
    public function saveMsg($data) {
    	M('Msg')->add($data);
    }
    /**
    * 记录用户日志
    * @date 2015-11-27
    * @return:
    */
    public function addLog($data) {
    	M('UserLog')->add($data);
    }

    /**
     * 获取所有client_id
     * @date 2015-11-27
     * @return:
     */
    public function getClientId() {
        return M('UserClient')->select();

    }
    
}