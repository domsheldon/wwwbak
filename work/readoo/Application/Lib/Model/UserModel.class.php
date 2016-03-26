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
     * @param $user_id
     * @return mixed
     */
    public static function getUserInfo($user_id, $field='name,avatar'){
        $info=M('UserInfo')->field($field)->where("user_id=$user_id")->find();
        $info['avatar'] = OSS_AVATAR.$info['avatar'].OSS_AVATAR_RULE;
        return $info;
    }

    /**
     * 对于微信登陆，通过open_id获取用户信息
     * @param $open_id
     * @return mixed
     */
    public static function getUserByOpenid($open_id){
        $model = M();
        $info=$model->table('rw_user_info a')
            ->join('rw_user_login b on a.user_id = b.user_id')
            ->where("open_id='$open_id'")
            ->field(array('a.user_id','b.open_id','b.union_id','a.name','a.sex',
                "IF(LOCATE('http://',a.avatar),a.avatar,concat('" . OSS_AVATAR . "',a.avatar,'@100w'))" => 'avatar'))
            ->find();
        return $info;
    }
    
    /**
     * 保存某个用户的信息
     * @param $user_id
     * @return mixed
     */
    public function saveUserInfo($user_id, $data){
        return M('UserInfo')->where('user_id='.$user_id)->save($data);
    }

    /**
     * 新增微信用户，先增加login表，再增加info表
     * @param $data_login
     * @param $data_info
     * @return mixed
     */
    public function addWechatUser($data_login,$data_info){
        $m_user_login = M("UserLogin");
        $res = $m_user_login->where("open_id = '".$data_login['open_id']."'")->find();
        if(!isset($res)){
            $user_id = $m_user_login->add($data_login);
            $data_info['user_id'] = $user_id;
            $m_user_info = M("UserInfo");
            $m_user_info->add($data_info);
            return $user_id;
        }else{
            return $res['user_id'];
        }
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