<?php

/**
 * Description of LoginModel
 *
 * @author Sorci
 * 1.7版注册流程：
 * 用户使用第三方注册，获得第三方的id、name、avatar,填写手机号、登录密码，
 * 实际上是把手机号密码填了后注册有书id，然后把第三方的信息保存到user_login和user_info表
 * 登录：客户端传
 */
class LoginModel extends Model {
    
    private $empty_conntent = '';

    /**
     * @name 通过手机和密码注册生成一个帐号
     * @param string $mobile 手机号
     * @param string $password 密码
     * @return ($user_id, 'register_success')
     */
    public function register($mobile, $password, $name, $sex, $avatar) {
        $data['mobile'] = $mobile;
        $data['password'] = auth_code($password, 'ENCODE', MY_SUPER_KEY);
        $data['name'] = $name;
        $data['sex'] = $sex;
        $data['avatar'] = $avatar;
        $data['create_time'] = date('Y-m-d H:i:s');
      
        $user_id =M('UserInfo')->add($data);
        if ($user_id) {
            return $this->return_info($user_id, 'register_success');
        } else {
            return $this->return_info(false, 'register_faild');
        }
    }

    /**
     * @name 通过手机号和密码进行登录
     * @param string $mobile 手机号
     * @param string $password 密码
     */
    public function login($mobile, $password) {
        $res = M('UserInfo')->where("mobile = '$mobile'")->find();
        if (!$res) {
            return $this->return_info(false, 'not_have_mobile');
        }
        $ori_password = auth_code($res['password'], 'DECODE', MY_SUPER_KEY);
        if ($ori_password == $password) {
            return $this->return_info($res['user_id'], 'login_success');
        } else {
            return $this->return_info(false, 'password_error');
        }
    }

    /**
     * @name 重置密码
     * @param string $mobile 手机号
     * @param string $password 新密码
     */
    public function reset_password($mobile, $password) {
    	$data['password']=auth_code($password, 'ENCODE', MY_SUPER_KEY);
    	$data['login_time']=time();
        $res = M('UserInfo')->where("mobile = '$mobile'")->save($data);
        if ($res) {
            return $this->return_info(true, 'reset_password_success');
        }
        return $this->return_info(false, 'reset_password_faild');
    }
    /**
    * 修改手机号
    * @param $user_id 用户id
    * @param $phone 手机号
    * @param $pwd 密码
    * @date 2015-8-14
    * @return:
    */
    public function resetPhone($user_id,$phone,$pwd) {
    	$data['password']	=auth_code($pwd, 'ENCODE', MY_SUPER_KEY);
    	$data['login_time']	=time();
    	$data['mobile']		=$phone;
    	return M('UserInfo')->where('user_id='.$user_id)->save($data);
    }
	//获取上次登录时间
    public function get_last_login_time($user_id){
		return M('UserInfo')->where('user_id='.$user_id)->getField('login_time');
	}

    /**
     * @name 检查是否存在该手机号、微信号、QQ号、微博号
     * @param string $value 要对比的值
     * @param string $type 对比类型
     * @return $user_id
     */
    public function check_mobile($value,$type='mobile') {
    	switch ($type) {
    		case 'mobile':
    			$where='mobile="'.$value.'"';
    			break;
    	}
        $res = M('UserInfo')->where($where)->find();
        if ($res) {
            return $this->return_info($res['user_id'], 'mobile_already_register');
        } 
        
        return $this->return_info(false, 'mobile_not_used');
    }
	
    //返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }

}
