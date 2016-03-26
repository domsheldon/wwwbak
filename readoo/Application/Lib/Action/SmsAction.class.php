<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmsAction
 *
 * @author Sorci
 */
class SmsAction extends Action {
	public $sms;
	
	public function __construct(){
		$this->sms = new SmsModel();
	}
	
	//获取验证并存储到表里
    public function get_code() {
        $rand_code=$_POST['rand_code'];
        $identy=$_POST['identifier'];
        if($rand_code && $identy){
        	echo '{“res_code”:”0”}';
        	$this->sms->save_sms_code($identy, $rand_code);
        }
    }

}
