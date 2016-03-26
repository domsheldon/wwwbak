<?php
/**
* 用户业务逻辑层
* @date: 2015-11-17
* @author: xiaolong
* @version:1.0.0
*/
import('@.ModelV2.UserBooksModel');
import('@.ModelV2.UserModel');
import('@.ORG.Util.Lunar');
import('ORG.Util.Date');
class UserService {

	
	/**
	* 个人中心保存
	* @param $name 
	* @param $data = array();
	* @param $btype 	0公历，1农历
	* @param $birth 	生日 2015-11-20格式
	* @param $school_id 学校id
	* @date 2015-11-20
	* @return:
	*/
	public function saveUserInfo($user_id,$data) {
		if ($data['birthday']) {
			$gdate = $data['birthday'];
			if ($data['btype'] !=0) {		//说明是农历
				$lunar=new Lunar();
				$gdate = $lunar->getLar($gdate, 1);			//返回日期格式
			}
			$date=new Date($gdate);				
			$xingzuo=$date->magicInfo('XZ');					//获取星座
			$data['xingzuo'] =$xingzuo;
		}
		if ($data['school_id']) {
			$data['school_name']=M('School')->where('school_id='.$data['school_id'])->getField('school_name');
		}
		$user=new UserModel();
		return $user->saveUserInfo($user_id, $data);

	}
	/**
	* 取学校名和专业
	* @param string  $schoolId
	* @param string  $academyId
	* @return:
	*/
	public function getSchoolAcadeName($school_id) {
		return M('School')->where('school_id='.$school_id)->getField('school_name');
	}
	/**
	* 搜索学校
	* @param  $keyword 搜索关键字
	* @return:
	*/
	public function searchSchool($keyword,$offset=0,$limit=10) {
		return M('School')->field('school_id,school_name')->where('school_name like "%'.$keyword.'%"')->group('school_id')->limit($offset,$limit)->select();
	}
	/**
	* 用户留言
	* @param $user_id
	* @param $content
	* @param $phone
	* @param $lianxi
	* @date 2015-11-27
	* @return:
	*/
	public function saveMsg($user_id,$content,$phone,$lianxi) {
		$data=array(
			'user_id'=>$user_id,
			'content'=>$content,
			'phone'=>$phone,
			'lianxi'=>$lianxi,
			'create_time'=>date('Y-m-d H:i:s'),
		);
		$user=new UserModel();
		$user->saveMsg($data);
	}
	/**
	* 用户修改密码
	* @param $user_id
	* @param $pwd
	* @date 2015-11-30
	* @return:
	*/
	public function updatePwd($user_id,$pwd) {
		$data['password']=auth_code($pwd, 'ENCODE', MY_SUPER_KEY);
    	$data['login_time']=time();
    	return M('UserInfo')->where('user_id='.$user_id)->save($data);
	}
	/**
	 * 存储第三方个推的clientId和本应用的uid关联
	 * @param $user_id 用户id
	 * @param $client_id 客户端的client_id
	 * @param $os_type 客户端系统 0ios,1android
	 */
	public function save_client($user_id,$client_id, $os_type){
		//存储时先删除掉相同的client_id
		$client=M('UserClient');
		$client->where('user_id='.$user_id)->delete();
		$client->where('client_id="'.$client_id.'"')->delete();
		$data['user_id']	=$user_id;
		$data['client_id']	=$client_id;
		$data['os_type']	=$os_type ? 1 : 0;
		$data['create_time']=time();
		$res=$client->add($data);
		
		return true;
	}
	
	/**
	* 清除cid
	* @param $user_id 用户id
	* @param $client_id 客户端的client_id
	*/
	public function delete($user_id,$client_id) {
		M('UserClient')->where('user_id='.$user_id.' and client_id="'.$client_id.'"' )->delete();
	}
	/**
	* 记录用户日志
	* @param $user_id
	* @param $operation_id
	* @param $oper_desc
	* @date 2015-12-9
	* @return:
	*/
	public function addUserLog($user_id, $operation_id, $oper_desc) {
		$data= array(
			'user_id' => $user_id,
			'operation_id' => $operation_id,
			'operation_desc' => $oper_desc,
			'create_time' => date('Y-m-d H:i:s'),
		);
		$user=new UserModel();
		$user->addLog($data);
	}
}