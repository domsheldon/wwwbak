<?php
/**
 * 微信客服业务逻辑层
 * @date: 2016-1-13
 * @author: zhouyi
 * @version:1.0.0
 */
class CustServiceService{
    /**
     * 获取微信客服列表
     */
    public function getServiceList(){
        $model = new CustServiceModel();
        $res = $model->getServiceList();
        return $res;
    }

    /**
     * 新增微信客服页
     */
    public function addCustService($custName,$weChatno,$media_id,$url,$custType){
        $model = new CustServiceModel();
        $flag=$model->where("name='$custName'")->find();
        if(empty($flag)) {
            $res = $model->addCustService($custName, $weChatno, $media_id, $url,$custType);
        }else{
        	$res=FALSE;
        }
        return $res;
    }

    /**
     * 编辑微信客服首页
     */
    public function editcustservice($custId){
        $model = new CustServiceModel();
        $res=$model->editcustservice($custId);
        return $res;
    }

    /**
     * 编辑保存微信客服
     */
    public function doEditCust($custId,$custName,$custType){
        $model = new CustServiceModel();
        $res=$model->doEditCust($custId,$custName,$custType);
        return $res;
    }

    /**
     * 设置客服状态
     */
    public function setCustActive($custId,$status){
        $model = new CustServiceModel();
        $res = $model->setCustActive($custId,$status);
        return $res;
    }

    /**
     * 删除微信客服
     */
    public function deleteCustService($custId){
        $model = new CustServiceModel();
        $res = $model->deleteCustService($custId);
        return $res;
    }

}