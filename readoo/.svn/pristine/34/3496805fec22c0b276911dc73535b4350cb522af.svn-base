<?php
/**
* 用户
* @date: 2015-11-27
* @author: efan
* @version:1.0.0
*/
import('@.Service.UserService');
import('@.Service.CheckService');
class UserAction extends WebCommonAction {
	
	private $check; 	//checkService的实例

	public function __construct(){
		parent::__construct();
		$this->check = new CheckService($this->uid);
	}
	/**
	* 把邀请码和用户绑定
	* @date 2015-12-7
	* @return:
	*/
	public function bindCode() {
		$yqcode=$this->_post('yqcode');
		$data['user_id']=$this->uid;
		$data['is_delete']=1;
		$data['create_time']=time();
		M('Yqcode')->where("yqcode='$yqcode'")->save($data);
		$this->ajaxReturn();
	}
	//返回中间部分，域名什么的后面拼
	private function upload_avatar(){
		//上传头像
		$bucket='fengwo-avatar';//book-cover
		$fold='readoo/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload($bucket, $fold);
		return $filename[0];
	}
	/**
	* 保存个人中心
	* @url m1/save/info
	* @date 2015-11-20
	* @return:
	*/
	public function saveInfo() {
		if (!empty($_FILES['img'])) {
			$data['avatar'] = $this->upload_avatar();
		}
		$data['name']	=$this->_post('name');		//昵称
		$data['sex']	=$this->_post('sex');		//性别
		$btype	 =$this->_post('btype');		//生日类别
		$birthday =$this->_post('birth');		//生日 格式2015-11-25
		$pro_id	=$this->_post('pro_id');		//省id
		$city_id=$this->_post('city_id');		//市id
		$school_id	=$this->_post('school_id');//学校id
		
		$this->check->checkContent($data['name'], '1', '10', '10009', '姓名长度有误');
		if ($data['sex'] !=0 && $data['sex'] !=1) $this->ajaxReturn('10010','error_sex');
		if (isset($btype) && $birthday) {
			$data['btype']=$btype;
			$data['birthday']=$birthday;
		}
		if ($pro_id && $city_id) {
			$data['province_id'] = $pro_id;
			$data['city_id'] = $city_id;
			$data['location'] = CommonModel::get_location_info($pro_id, $city_id);
		}
		if ($school_id) {
			$data['school_id'] = $school_id;
		}
		$user=new UserService();
		$res = $user->saveUserInfo($this->uid, $data);
		
		$this->data['data']=UserModel::getUserInfo($this->uid,'*');
		$this->ajaxReturn();
	}
	
	/**
	* 学校筛选
	* @date 2015-11-20
	* @return:
	*/
	public function getSchool() {
		$keyword=$this->_post('keyword'); 		//学校搜索关键字
		$page=$this->_post('page') ? $this->_post('page'):'1';
		$limit='20';
		$offset=($page-1)* $limit;
		$this->check->checkContent($keyword, '1');
		
		$user=new UserService();
		$list=$user->searchSchool($keyword, $offset, $limit);
		
		$this->data['data']=$list ? $list :array();
		$this->ajaxReturn();
	}
	/**
	* 用户留言
	* @date 2015-11-27
	* @return:
	*/
	public function saveMsg() {
		$content=$this->_post('content');
		$phone=$this->_post('phone');
		$lianxi=$this->_post('lianxi');
		
		$user=new UserService();
		$user->saveMsg($this->uid, $content, $phone, $lianxi);
		$this->ajaxReturn();
	}
	/**
	* 用户修改密码
	* @param $pwd
	* @date 2015-11-30
	* @return:
	*/
	public function setPwd() {
		$pwd=$this->_post('pwd');
		
		$user=new UserService();
		$res=$user->updatePwd($this->uid, $pwd);
		if ($res) {
			$this->ajaxReturn();
		}
		$this->ajaxReturn(0,'修改失败');
	}
	/**
	* 存储客户端的client_id
	*/
	public function save_client() {
		$cid=trim($this->_post('cid'));
		$os_type=$this->_post('os') ? $this->_post('os') :'0';	//0ios,1android
		if(strlen($cid) != '32'){
			$this->ajaxReturn('10025','error');
		}
		$user=new UserService();
		$res=$user->save_client($this->uid, $cid, $os_type);
		$this->ajaxReturn();
	}
	/**
	* 清除client_id
	*/
	public function delete_client() {
		$cid=trim($this->_post('cid'));
		if(strlen($cid) != '32'){
			$this->ajaxReturn('10025','error');
		}
		$user=new UserService();
		$user->delete($this->uid, $cid);
		$this->ajaxReturn();
	}
	/**
	* 存储用户日志
	* @date 2015-12-9
	* @return:
	*/
	public function userLog() {
		$id=$this->_post('operation_id');
		$desc=$this->_post('operation_desc');
		
		$user=new UserService();
		$user->addUserLog($this->uid, $id, $desc);
		$this->ajaxReturn();
	}
	
}