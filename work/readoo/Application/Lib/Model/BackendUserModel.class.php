<?php

/**
 * 用户信息
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2015/11/17
 * Time: 17:43
 */
class BackendUserModel extends Model
{
    /**
     * 获取某个用户的信息
     * @param $user_id
     * @return mixed
     */
    public static function getUserInfo($user_id, $field='name,avatar'){
        $info=M('BackendUser')->field($field)->where("user_id=$user_id")->find();
        $info['avatar'] = OSS_AVATAR.$info['avatar'].OSS_AVATAR_RULE;
        return $info;
    }
    
    /**
     * 保存某个用户的信息
     * @param $user_id
     * @return mixed
     */
    public function saveUserInfo($user_id, $data){
        return M('BackendUser')->where('user_id='.$user_id)->save($data);
    }
    
}