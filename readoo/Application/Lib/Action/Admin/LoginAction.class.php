<?php
/**
* 后台动态列表
* @date: 2015-12-7
* @author: zhouyi
* @version:1.0.0
*/
class LoginAction extends Action{

	//登录页
	public function index() {
		$username = cookie('bk_username');
		$this->assign('username',$username);
//		$this->assign('password',$password);
		$this->display();
	}

	public function verify(){
		if($this->isPost()){
			$username = $this->_post('username');
			$password = $this->_post('password');
			$backend_user = M('BackendUser');
			$res = $backend_user->where("user_name = '$username'")->find();
			if(empty($res) || $password != $res['password']) {
				echo '1';
				return;
			}else{
				session('user_name',$res['user_name']);
				cookie('bk_username', $username,1);
				echo '1';
				return;
			}
		}else{
			echo '2';
			return;
		}
	}

	//提交验证
	public function verify1(){
		if($this->isPost()){
			$username = $this->_post('username');
			$password = $this->_post('password');
			$check = $this->_post('check_login');
			$backend_user = M('BackendUser');
			$res = $backend_user->where("user_name = '$username'")->find();
			foreach($res as $v){
				$user_id = $v['id'];
			}
			if (empty($res)) {
				echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
				echo "<script charset='utf-8' type='text/javascript'> alert('请输入用户名');parent.location.href='/login'; </script>";
			} else {
				if ($password != auth_code($res['password'], 'DECODE', MY_SUPER_KEY)) {
					echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
					echo  "<script charset='utf-8' type='text/javascript'> alert('密码错误');parent.location.href='/login'; </script>";
				} else {
					if(empty($check)){
						cookie('username', $username,1);
						cookie('password', auth_code($res['password'], 'ENCODE', MY_SUPER_KEY),1);
					}else{
						cookie('username', $username,36000);
						cookie('password', auth_code($res['password'], 'ENCODE', MY_SUPER_KEY),36000);
					}
					session('user_name',$username);
					session('password',auth_code($res['password'], 'ENCODE', MY_SUPER_KEY));
					session('userid',$user_id);
					$data['create_time'] = time();
					$data['login_ip'] = get_client_ip();
					$backend_user->where("user_name = '$username'")->save($data);
					$this->redirect("admin/backend/index");
				}
			}
		}
		else{
			echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			echo  "<script charset='utf-8' type='text/javascript'> alert('请入信息');parent.location.href='/login'; </script>";
		}
	}
}