<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmsModel
 *
 * @author Sorci
 */
class SmsModel extends Model {

    private $app_id = SMS_APP_ID; // 应用ID
    private $app_secret = SMS_APP_SECRTE; // 应用的密钥
    private $timestamp = ''; //时间戳，格式为：yyyy-MM-dd hh:mm:ss
    private $phone = '';
    private $exp_time = '10'; //验证码有效期长度，单位是分钟，可以为空，默认有效2分钟
    private $grant_type = 'client_credentials'; //Client Credentials授权模式
    private $access_token_url = 'https://oauth.api.189.cn/emp/oauth2/v2/access_token'; // 获取access_token的URL
    private $send_url = 'http://api.189.cn/v2/dm/randcode/send'; // 自定义短信发送信息的URL
    private $token_url = 'http://api.189.cn/v2/dm/randcode/token'; // 获取token的URL

    /**
     * @name 通过手机发送手机验证码
     * @param string $mobile 手机号
     */
    public function post_sms_by_mobile($mobile) {
        $this->phone = $mobile;
        $this->timestamp = date('Y-m-d H:i:s');
        $smsCheck = M('SmsCheck');
        $res = $smsCheck->where("mobile = '$mobile'")->find();
        if ($res) {
            $return = $this->repost_sms_code($res['create_time']);
            switch ($return) {
                case 0:
                    return $this->return_info(true, 'resend_success');
                case 1:
                    return $this->return_info(false, 'post_faild');
                case 2:
                    return $this->return_info(false, 'send_time_error');
                default : break;
            }
        } else {
            $identifier = $this->post_sms();
            if ($identifier) {
                $this->add_mobile_identifier($this->phone, $identifier);
                return $this->return_info(true, 'send_success');
            } else {
                return $this->return_info(false, 'post_faild');
            }
        }
    }

    /**
     * @name 通过短信版本信息保存短信验证码
     * @param string $identifier 短信版本信息
     * @param string $code 短信验证码信息
     */
    public function save_sms_code($identifier, $code) {
        $data['identifier'] = $identifier;
        $data['code'] = $code;
        M('SmsCode')->add($data);
        return $this->return_info(true, 'save_sms_code_success');
    }

    /**
     * @name 通过手机号和验证码判断是否匹配
     * @param string $mobile 手机号
     * @param string $code 验证码
     */
    public function check_mobile_code($mobile, $code) {
        $res = M('SmsCheck')->where("mobile = '$mobile'")->find();
        if($res){
	        if (time() - (int) $res['create_time'] > 600) {
	            return $this->return_info(false, 'sms_code_timeout');
	        }
        }else{
        	return $this->return_info(false, 'check_not_pass');
        }
        $ori_code = M('SmsCode')->where("identifier = '" . $res['identifier'] . "'")->getField('code');
        if ($code == $ori_code) {
        	//删除此条记录
        	M('SmsCheck')->where("mobile = '$mobile'")->delete();
        	M('SmsCode')->where("identifier = '" . $res['identifier'] . "'")->delete();
            return $this->return_info(true, 'check_pass');
        } else {
            return $this->return_info(false, 'check_not_pass');
        }
    }

    //重新发送验证码流程
    private function repost_sms_code($time) {
        if (time() - (int) $time > 58) {  //符合重新发送手机验证码条件
            $identifier = $this->post_sms();
            if ($identifier) {
                $this->save_mobile_identifier($this->phone, $identifier);
                return 0;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }

    //新增短信版本
    private function add_mobile_identifier($mobile, $identifier) {
        $data['mobile'] = $mobile;
        $data['identifier'] = $identifier;
        $data['create_time'] = time();
        M('SmsCheck')->add($data);
    }

    //修改短信版本
    private function save_mobile_identifier($mobile, $identifier) {
        $data['identifier'] = $identifier;
        $data['create_time'] = time();
        M('SmsCheck')->where("mobile = '$mobile'")->save($data);
    }

    //发送短信
    private function post_sms() {
        $access_token = $this->getAccessKey();
        $token = $this->getToken($access_token);

        $param['app_id'] = "app_id=" . $this->app_id;
        $param['access_token'] = "access_token=" . $access_token;
        $param['timestamp'] = "timestamp=" . $this->timestamp;
        $param['token'] = "token=" . $token;
        $param['phone'] = "phone=" . $this->phone;
        $param['url'] = "url=" . RETURN_URL;
        if (!empty($this->exp_time)) {
            $param['exp_time'] = "exp_time=" . $this->exp_time;
        }
        ksort($param);
        $plaintext = implode("&", $param);
        $param['sign'] = "sign=" . rawurlencode(base64_encode(hash_hmac("sha1", $plaintext, $this->app_secret, $raw_output = True)));
        ksort($param);
        $str = implode("&", $param);
        $result = $this->curl_post($this->send_url, $str);
        $obj = json_decode($result);
        if ($obj->res_code == 0) {
            return $obj->identifier;
        } else {
        	//写入日志
        	$string='time:'.date('Y-m-d H:i:s').'mobile:'.$this->phone.'msg:'.$obj->res_message."\n";
        	$file='/var/log/sms.log';
        	$handle=fopen($file, 'a');
        	fwrite($handle, $string);
        	fclose($handle);
        	return false;
        }
    }

    //获取access_token
    private function getAccessKey() {
        $param['grant_type'] = "grant_type=" . $this->grant_type;
        $param['app_id'] = "app_id=" . $this->app_id;
        $param['app_secret'] = "app_secret=" . $this->app_secret;
        $plaintext = implode("&", $param);
        $result = $this->curl_post($this->access_token_url, $plaintext);
        $obj = json_decode($result);
        return $obj->access_token;
    }

    //获取Token
    private function getToken($access_token) {
        $param['app_id'] = "app_id=" . $this->app_id;
        $param['access_token'] = "access_token=" . $access_token;
        $param['timestamp'] = "timestamp=" . $this->timestamp;
        ksort($param);
        $plaintext = implode("&", $param);
        $param['sign'] = "sign=" . rawurlencode(base64_encode(hash_hmac("sha1", $plaintext, $this->app_secret, $raw_output = True)));
        ksort($param);
        $this->token_url .= '?' . implode("&", $param);
        $result = $this->curl_get($this->token_url);
        $obj = json_decode($result);
        return $obj->token;
    }

    //cURL库抓网页,从一个链接上取数据(get方式)
    private function curl_get($url = '') {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //cURL库抓网页,从一个链接上取数据(post方式)
    private function curl_post($url = '', $postdata = '') {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    //返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }

}
