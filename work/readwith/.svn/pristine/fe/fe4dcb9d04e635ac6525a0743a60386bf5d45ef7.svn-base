<?php
import('@.Service.UserService');
import('@.Service.PlanBookService');
import('@.Service.BookPackageService');
import('@.Service.OtherService');
import('@.Service.CheckService');
class IndexAction extends WebCommonAction {
	

	/**
	* 配置信息
	* @date 2016-1-28
	* @return:
	*/
	public function getConfig() {
		$other=new OtherService();
		$user=new UserService();
		
		//判断当前用户是否设置闹铃,设置闹铃才提示
		$nl_data=$user->getUserTime($this->uid);
		if ($nl_data) {
			$nl_data['is_config'] = '1';
			$nl_data['atitle'] = '早读提醒';
			$nl_data['ptitle'] = '晚读提醒';
			$this->data['nao_ling']=$nl_data;
		}
		
		//从后台取推送的弹窗、话题(随笔note)、h5的链接
		$config_data=$other->getConfigData();
		if($config_data) {
			$this->data['act'] = $config_data;
		}
		
		//配置的字数限制的数据
		$word_limit= array(
			'comment_limit'=>'140', 
			'note_limit'=>'5000', 
			'note_title_limit'=>'20', 
			'err_msg'=>'字数过多',
		);
		$this->data['word_limit'] = $word_limit;
		$this->ajaxReturn();
	}
	/**
	* 首页
	* @date 2016-1-28
	* @return:
	*/
	public function getIndexData() {
		$bp=new BookPackageService();
		$pb=new PlanBookService();
		$other=new OtherService();
		
		$book_data=$pb->getNowPlanBook();		//共读信息
		$pb_id=$book_data['pb_id'];
		$pack_data=$bp->getPackageList($pb_id, $this->uid);	//拆书包数据
		$target=$pack_data[0]['target'];		//取最新拆书包的一句话
		$banner_data=$other->getBannerData();
		if ($book_data) {
			$this->data['book_data']=$book_data;
		}
		$this->data['bp_list']=$pack_data['list'] ? $pack_data['list'] : array();
		$this->data['check']=$pack_data['check'] ? $pack_data['check']: array();
		$this->data['target']=$target ? $target : '';
		$this->data['banner']=$banner_data ? $banner_data : array();
		$this->ajaxReturn();
	}
	/**
	* 有书圈筛选书籍列表
	* @date 2016-3-2
	*/
	public function bookList() {
		//会有搜索功能
		
		$pb=new PlanBookService();
		$list=$pb->getPlanBook();
		$this->data['data']=$list ? $list : array();
		$this->ajaxReturn();
	}
	
	
}