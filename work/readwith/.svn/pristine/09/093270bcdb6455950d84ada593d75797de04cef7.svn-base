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

    /**
     * @name 通过手机注册生成一个帐号,user_login和 user_info
     * @param string $mobile 手机号
     * @return ($user_id, 'register_success')
     */
    public function register($mobile) {
        $data['mobile'] = $mobile;
        $data['create_time'] = date('Y-m-d H:i:s');
      
        $user_id =M('UserLogin')->add($data);
        if ($user_id) {
        	$this->add_user_info($user_id);			//生成user_info数据
            return $user_id;
        }
        return false;
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
    		case 'qq':
    			$where='qq_id="'.$value.'"';
    			break;
    		case 'weixin':
    			$where='union_id="'.$value.'"';
    			break;
    		case 'weibo':
    			$where='weibo_id="'.$value.'"';
    			break;
    		default:
    			return $this->return_info(false, 'type_error');
    	}
        $res = M('UserLogin')->where($where)->find();
        if ($res) {
            return $res['user_id'];
        } 
        return false;
        
    }
    /**
    * 更新login表的open_id2
    * @param $user_id
    * @param $open_id2  app从微信获得的open_id
    * @date 2016-2-5
    */
    public function set_open_id2($user_id, $open_id2) {
    	M('UserLogin')->where('user_id='.$user_id)->setField('open_id2', $open_id2);
    }
	/**
	* 第三方注册
	* @param $type  第三方类型
	* @param $third_id  第三方id值
	* @date 2015-9-18
	* @return:$user_id /false
	*/
	public function third_register($type,$third_id, $union_id='') {
		switch ($type) {
			case 'qq':
    			$data['qq_id']=$third_id;
    			break;
    		case 'weixin':
    			$data['open_id2']=$third_id;
    			$data['union_id']=$union_id;
    			break;
    		case 'weibo':
    			$data['weibo_id']=$third_id;
    			break;
		}
        $data['create_time'] = date('Y-m-d H:i:s');
        $user_id = M('UserLogin')->add($data);
        if ($user_id) {
            $info_res=$this->add_user_info($user_id);		//生成user_info数据
           	return $user_id;
        }
        return false;
	}
	//生成空的用户信息
    private function add_user_info($user_id) {
        $data['user_id'] = $user_id;
        $data['create_time'] = date('Y-m-d H:i:s');
        M('UserInfo')->add($data);
        return true;
    }
    //返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }

}
