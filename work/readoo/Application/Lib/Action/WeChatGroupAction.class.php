<?php
/**
* E
* @date: 2016-3-9
* @author: efan
*/
import('@.Service.WeChatGroupService');
import('@.Service.RedisService');
use \LaneWeChat\Core\JSSDK;

class WeChatGroupAction extends Action {
	
	//微信组队 放redis的key
	const USERTYPECOUNT='user_type_count';	//存储用户签到数、随笔数等的key
	const GROUPUSER='group_users_';			//一个群组里的所有用户排名，  _群组id
	const GROUPSORT='grouplist';			//所有群组排名key
	
	//user相关key
	const USER='rw:userinfo';	//哈希存储
	
	
	
	/**
	 * 从扫二维码进来的 --加入群组
	 * 根据微信的union_id取出user_id,参数里带group_id
	 */
	public function addGroup() {
		$user_id=$this->_get('user_id');	
		$token=$this->_get('token');			//加密后的群id，需要解密
		$group_id=base64_decode($token);
		
		if (empty($user_id) || empty($group_id)) {
			echo $user_id.'--'.$group_id;exit;
			$this->display('error');exit;
		}
		$wechat=new WeChatGroupService();
		$res=$wechat->addGroup($user_id, $group_id);
		if ($res) {	
			$this->redirect('/xq?user_id='.$user_id);
			//未加入显示加入成功页
			//$this->redirect('/join?user_id='.$user_id);				
		} else {
			//已加入直接显示我的成就
			$this->redirect('/chengjiu?user_id='.$user_id);
		}
	} 
	/**
	* 成功加入页面之前的兴趣浮层页
	* @date 2016-3-23
	*/
	public function xingqu() {
		$user_id=$this->_get('user_id');
		
		if ($this->isPost()) {
			$data['xingqu']=trim($this->_post('tips'));		//兴趣,用|连接发过来的
			$data['rec']=trim($this->_post('conn'));		//自我介绍
			$user_id=$this->_post('user_id');
			$res=M('UserInfo')->where('user_id='.$user_id)->save($data);
			if ($res !==false) {
				$url='/join?user_id='.$user_id;
				echo json_encode(array('code'=>'1','url'=>$url));exit;
			}echo 'save_faild';exit;
		}
		$this->assign('user_id', $user_id);
		$this->display('xq');
	}
	/**
	* 成功加入群组页面展示
	* @date 2016-3-16
	*/
	public function join() {
		$user_id=$this->_get('user_id');
		$this->assign('user_id',$user_id);
		$this->display('joinGroup');
	}
	/**
	* 我的成就--------展示用户信息、签到数等、排名
	* @date 2016-3-11
	*/
	public function showChengjiu() { 
		$user_id=$this->_get('user_id');		//加密或直接加
		
		//群组数据
		$group_id=M('GroupUser')->where('user_id='.$user_id)->getField('group_id');
		if (empty($group_id)) {
			$this->redirect('/error');			//跳回到加入群组页
		}
		$group_name=M('Group')->where('id='.$group_id)->getField('group_name');
		
		$we=new WeChatGroupService();
		$data=$we->showChengJiu($user_id, $group_id);
		
		//获取微信分享相关的数据
		vendor('Lanewechat.lanewechat');
		$jssdk = new \LaneWeChat\Core\JSSDK(WECHAT_APPID, WECHAT_APPSECRET);
		$signPackage = $jssdk->GetSignPackage();
		$this->assign('signPackage',$signPackage);
//		print_r($signPackage);die();
		
		$data['group_name']=$group_name;
		$data['group_id']=$group_id;
		
		$this->assign('data', $data);
		$this->assign('user_id', $user_id);
		$this->display('achievement');
	}
	
	/**
	* 规则说明
	* @date 2016-3-16
	*/
	public function guize() {
		$this->display();
	}
	/**
	* 用户排行
	* @date 2016-3-11
	*/
	public function userPai() {
		$user_id=$this->_get('user_id');
		$group_id=$this->_get('id');		//group_id
	
		//取当前周的书籍信息
		$guser=new WeChatGroupService();
		$book_info=$guser->getCurrentBook();
		
		//用户名次
		$list=$guser->userRank($group_id, $user_id);
		
		$data=array(
			'book'=>$book_info,
			'user'=>$list['user'],
			'list'=>$list['list'],
		);
		
		$this->assign('data', $data);
		$this->display('personalRanking');
	}
	/**
	* 群组排行
	* @param unknowtype 
	* @date 2016-3-16
	* @return:
	*/
	public function grouPai() {
		$user_id=$this->_get('user_id');
		$group_id=$this->_get('id');		//group_id
	
		//取当前周的书籍信息
		$guser=new WeChatGroupService();
		$book_info=$guser->getCurrentBook();
		
		//排名、排序列表、总群数
		$list=$guser->groupRank($group_id, $user_id);
		
		$value='100';						//显示前100的群组
		$lingxian=0;
		if ($list['group_sum'] != $list['group']['pai']) {
			$lingxian=$list['group']['pai'] / ($list['group_sum']+1 - $value);//领先 排名/（总群-已上榜的100+1,要把最后一个干掉才能上榜）
		}
		$sheng=1-$lingxian;
		
		$data=array(
			'book'=>$book_info,
			'group'=>$list['group'],
			'list'=>$list['list'],
			'value'=>$value,
			'ling'=>round($lingxian * 100),
			'sheng'=>round($sheng * 100),
		);
		
		$this->assign('data', $data);
		$this->display('groupRanking');
	}
	public function showError(){
		$this->display('error');
		
	}
	public function test() {
		$s=new WeChatGroupService();
		$s->saveGroupRank();
	}
}