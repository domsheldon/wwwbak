<?php
/**
* 拆书包
* @date: 2016-2-2
* @author: efan
*/
import('@.Service.BookPackageService');
import('@.Service.CheckService');
class PackageAction extends WebCommonAction {

	private $check; 	//checkService的实例

	public function __construct(){
		parent::__construct();
		$this->check = new CheckService($this->uid);
	}
	/**
	* 签到
	* @date 2016-2-2
	* @return:
	*/
	public function checkIn() {
		$bp_id=$this->_post('id');		//拆书包id
		$pb_id=$this->_post('pb_id');	//plan_book_id共读一本书的id
		
		$this->check->checkId($bp_id);
		$this->check->checkId($pb_id);
		
		$bp=new BookPackageService();
		$res=$bp->userCheckIn($bp_id, $pb_id, $this->uid);
		if ($res[0]) {
			$this->ajaxReturn();
		}
		$this->ajaxReturn('0', '当前时间不能签到');
	}
	/**
	* 拆书包详情
	* @date 2016-2-3
	* @return:
	*/
	public function getPackInfo() {
		$id=$this->_post('id');
		$this->check->checkId($id);
		
		$bp=new BookPackageService();
		$res=$bp->getPackInfo($id, $this->uid);
		if ($res) {
			//判断是否有顶图
			if (empty($res['top_img'])) $res['top_img']='http://feedimg.fengwo.com/readwith/topimg.png';
			//判断是否显示签到按钮
			$res['show_check']='0';		//0不显示，1显示
			
			if (date('Ymd') == date('Ymd',strtotime($res['pub_time'])) ) {
				$amin=strtotime(date('Y-m-d' ).AMINTIME); 
				$amax=strtotime(date('Y-m-d' ).AMAXTIME); 
				$pmin=strtotime(date('Y-m-d' ).PMINTIME);
				$pmax=strtotime(date('Y-m-d' ).PMAXTIME);
				if ($res['time_type']==1 && time() >=$amin && time() <=$amax){
					$res['show_check']='1';
				}
				if( $res['time_type']==2 && time() >=$pmin && time() <$pmax){
					$res['show_check']='1';
				}
			}
			if ($res['is_qian'] ==1) $res['show_check']=1;
			$this->data['data'] =$res;
			$this->ajaxReturn();
		}
		//未加入共读的，显示加入的h5页面
		//$this->data['href']='http://gongdu.youshu.cc/plan/info?uid='.$this->uid;
		//$this->ajaxReturn('302', '未加入共读计划');
	}
	/**
	* 查看拆书包列表
	* @date: 2016-2-2
	*/
	public function getPackList() {
		$pb_id=$this->_post('pb_id');
		$this->check->checkId($pb_id);
		
		$pack=new BookPackageService();
		$list=$pack->getPackageList($pb_id, $this->uid);
		
		$this->data['data']=$list['list'] ? $list['list']: array();
		$this->data['check']=$list['check'] ? $list['check']: array();
		$this->ajaxReturn();
	}
}
