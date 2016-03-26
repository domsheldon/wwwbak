<?php
/**
 * 微信客服
 * @date: 2016-1-14
 * @author: zhouyi
 * @version:1.0.0
 */
import('@.Service.CustServiceService');
import('@.Service.PlanBookService');
import('@.Service.RedisService');
import('@.ORG.Util.Page');
use \LaneWeChat\Core\Media;
class CustServiceAction extends WebCommonAction{

    /**
     * 微信客服列表
     */
    public function custservice(){
    		$name=$this->_get('search');
    		$status=$this->_get('status')?$this->_get('status'):0;
    		if ($name) {
    			$where="name like '%$name%'";
    		}
    		if ($status) {
    			$where='status='.$status;
    		}
    		$custModel=M('CustService');
			$count=$custModel->where($where)->count();
			$page=new Page($count,10); //计算分页
			$show=$page->show();
			$list=$custModel->where($where)->order('create_time desc')->limit($page->firstRow.','.$page->listRows)->select();  //分页数据
			$this->assign('list',$list);
			$this->assign('page',$show);
			$this->assign('name',$name);
			$this->assign('status',$status);
        
        $this->display();
    }

    /**
     * 新增微信客服首页
     */
    public function addcustservice(){
        $this->display();
    }

    /**
     * 编辑微信客服首页
     */
    public function editcustservice(){
        $custId = I('get.custId');
        $service = new CustServiceService();
        $editInfo = $service->editcustservice($custId);
        $this->assign('editInfo',$editInfo);
        $this->display();
    }

    /**
     * 编辑保存微信客服
     */
    public function doEditCust(){
        $custId = $this->_post('custId');
        $custName = $this->_post('custName');
        $custType = $this->_post('custType');
        $service = new CustServiceService();
        $res = $service->doEditCust($custId,$custName,$custType);
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','编辑保存客服错误');
        }
    }

    /**
     * 新增微信客服
     */
    public function addToCustService(){
    	if($this->isAjax()){
    		$filename=basename($this->_post('img'));
	        $custName=strchr($filename, '.', true);
			$weChatno=$custName;
	        $custType = $this->_post('custType');
			$img=$filename;
	
		     vendor('Lanewechat.lanewechat');
		     $menuId = \LaneWeChat\Core\Media::upload_material('@./public/upload_img/'.trim($img), 'image');
		     if (empty($menuId['media_id'])) {
		         die('error');
		     }
	        $media_id = $menuId['media_id'];
	        $url = $menuId['url'];
	        $service = new CustServiceService();
	        $res = $service->addCustService($custName,$weChatno,$media_id,$url,$custType);
	
	        if($res){
	            $this->ajaxReturn('1','添加成功');
	        }else{
	            $this->ajaxReturn('0','添加失败');
	        }		
      }
		
    }

    /**
     * 开启客服激活状态
     */
    public function setCustActive(){
        $custId = $this->_post('custId');
        $status = $this->_post('status');

        $service = new CustServiceService();
        $res = $service->setCustActive($custId,$status);
        //激活成功后，加载到redis
        $redis = new RedisService();
        $redis->saveActiveCustService();
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','开启客服状态错误');
        }
    }

    /**
     * 关闭客服激活状态
     */
    public function setCustUnactive(){
        $custId = $this->_post('custId');
        $service = new CustServiceService();
        $res = $service->setCustUnactive($custId);
        //激活成功后，加载到redis
        $redis = new RedisService();
        $redis->saveActiveCustService();
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','关闭客服状态错误');
        }
    }

    /**
     * 删除微信客服
     */
    public function deleteCustService(){
        $custId = $this->_post('custId');
        $service = new CustServiceService();
        $res = $service->deleteCustService($custId);
        //激活成功后，加载到redis
//        $redis = new RedisService();
//        $redis->saveActiveCustService();
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','删除客服状态错误');
        }
    }

    /**
     * 上传文件
     */
    public function uploadFile(){
        $arrType=array('image/jpg','image/gif','image/png','image/bmp','image/pjpeg','image/jpeg');
        $max_size='500000000000';      // 最大文件限制（单位：byte）
        $upFile= QR_CODE_IMG; //图片目录路径
        $file=$_FILES['file'];


        $file_name = $file['name'];
        if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
            if(!file_exists($upFile)){  // 判断存放文件目录是否存在
                mkdir($upFile,0777,true);
            }

            $picName=$upFile.$file_name;
            if(file_exists($picName)){
                unlink($picName);
            }
            if(!move_uploaded_file($file['tmp_name'],$picName)){
                $this->data='move file error';
            }else{
                $this->data = $file['name'];
            }
        }
        echo $this->data;
    }
	
	 public function upload()
	{
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  'public/upload_img/';// 设置上传目录
		$upload->saveRule='';
		$upload->uploadReplace=true;
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		  $info =  $upload->getUploadFileInfo();
		  echo '/'.$info[0]['savepath'].$info[0]['savename'];
		}
	}

}