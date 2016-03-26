<?php
/**
* 用户
* @date: 2015-11-27
* @author: efan
* @version:1.0.0
*/
import('@.Service.UserService');
import('@.Service.CheckService');
import('@.Model.CommentRedis');
class UserAction extends WebCommonAction {
	
	private $check; 	//checkService的实例

	public function __construct(){
		parent::__construct();
		$this->check = new CheckService($this->uid);
	}
	
	//返回中间部分，域名什么的后面拼
	private function upload_avatar(){
		//上传头像
		$fold=OBJECT.'/'.date('Ymd');
		$oss=new OssAction();
		$filename=$oss->oss_upload(AVATAR_BUCKET, $fold);
		return $filename[0];
	}
	
	/**
	* 保存个人中心
	* @url m/userinfo/save
	* @date 2016-1-21
	* @return:
	*/
	public function saveInfo() {
		if ($_POST['name']) {
			$this->check->checkContent($_POST['name'], '1', '30', '10009', '姓名长度有误');
		}
		if ($_POST['intro']) {
			$this->check->checkContent($_POST['intro'], '1', '50', '10009', '简介长度有误');
		}
		$data=$_POST;
		if (!empty($_FILES['img'])) {
			$data['avatar'] = $this->upload_avatar();
		}
		$user=new UserService();
		try {
			$res = $user->saveUserInfo($this->uid, $data);
			$this->data['user_data']=$res;
			$this->ajaxReturn();
		} catch (Exception $e) {
			$this->ajaxReturn('009','网络错误');
		}
	}
	/**
	* 他人主页
	* @date 2016-1-28
	* @return:
	*/
	public function getUserData() {
		$ta_user=$this->_post('ta_user_id');
		$page=$this->_post('page')?$this->_post('page'):'1';
		$limit=10;
		$offset=($page-1)*$limit;
		
		$user=new UserService();
		$res=$user->getUserData($this->uid, $ta_user, $offset, $limit);
		if ($res['user_data']) $this->data['user_data']=$res['user_data'];
		$this->data['data']=$res['data'];
		$this->data['page']=$page;
		$this->ajaxReturn();
	}
	/**
	* 我的收藏随笔，我的随笔
	* @date 2016-2-2
	* @return:
	*/
	public function userNote() {
		$type=$this->_post('type');
		$page=$this->_post('page')?$this->_post('page'):'1';
		$limit=10;
		$offset=($page-1)*$limit;
		
		$user=new UserService();
		$list=$user->getUserNote($this->uid, $type, $offset, $limit);
		
		$this->data['data'] = $list ? $list : array();
		$this->data['page']=$page;
		$this->ajaxReturn(); 
	}
	/**
	* 我的阅历
	* @date 2016-2-2
	* @return:
	*/
	public function getReadBooks() {
		$user=new UserService();
		$list=$user->getUserReadBooks($this->uid);
		$this->data['data'] =$list ? $list : array();
		$this->ajaxReturn();
	}
	/**
	* 我的成就数据，签到次数，随笔条数，书数
	* @date 2016-2-4
	* @return:
	*/
	public function getChengJiu() {
		$user=new UserService();
		$data=$user->getUserChengJiu($this->uid);
		
		$this->data['data'] =$data;
		$this->ajaxReturn();
	}
	/**
	* 我的成就排行
	* @date 2016-2-4
	* @return:
	*/
	public function getUserSort() {
		$type=$this->_post('type') ? $this->_post('type') : 'now';
		$user=new UserService();
		$list=$user->getUserSort($this->uid, $type);
		if ($list){
			if ($list == '1no_check') $this->ajaxReturn('0', '早读未签到，签到后看今日排行');
			if ($list == '2no_check') $this->ajaxReturn('2', '晚读未签到，签到后看今日排行');
			$this->data['data'] =$list;
		}
		$this->ajaxReturn();
	}
	/**
	* 第三方绑定
	* 三方帐号留一个不能解绑
	* @return:
	*/
	public function thirdBind() {
		$type=$this->_post('type');			//  qq/wx/weibo
    	$third_id=$this->_post('third_id');//wx的要传两个id，open_id和union_id
    	$union_id=$this->_post('union_id');
    	if ($type!='wx' && $type!='qq' && $type!='weibo') {
    		$this->ajaxReturn('0','第三方类型错误');
    	}
    	if ($type=='wx' && empty($union_id)) $this->ajaxReturn('0', '获取第三方信息错误');  
    	
    	$user=new UserService();
    	$res=$user->thirdBind($this->uid, $third_id, $type, $union_id);
    	
    	if ($res) {		//绑定
    		$this->ajaxReturn();
    	} elseif ($res ===false) {
    		$this->ajaxReturn('0','已被绑定');
    	} else {
    		$this->ajaxReturn('2','解绑成功');
    	}
	}
	/**
	* 用户留言
	* @date 2015-11-27
	* @return:
	*/
	public function saveMsg() {
		$content=$this->_post('msg');
		$phone=$this->_post('phone');
		$lianxi=$this->_post('lianxi');
		if (!empty($_FILES['img'])) {
			$img = $this->upload_avatar();
		}
		$user=new UserService();
		$user->saveMsg($this->uid, $content, $phone, $lianxi, $img);
		$this->ajaxReturn();
	}
	/**
	* 用户设置提醒时间
	* @date 2015-11-30
	* @return:
	*/
	public function setTime() {
		$atime=$this->_post('atime');
		$ptime=$this->_post('ptime');
		$is_tishi=$this->_post('is_tishi') ? $this->_post('is_tishi') : 0;	//1开，0关
		if (empty($atime) && empty($ptime)) {
			$this->ajaxReturn('0','设置失败');
		}
		$user=new UserService();
		$res=$user->setUserTime($this->uid, $atime, $ptime,$is_tishi);
		
		$this->ajaxReturn();
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