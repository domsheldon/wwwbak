<?php

class CustServiceModel extends Model {

    /**
     * 微信客服列表
     */
    public function getServiceList(){
        return M('CustService')->select();
    }

    /**
     * 新增微信客服
     */
    public function addCustService($custName,$weChatno,$media_id,$url,$custType){
        $time = time();
        $model = M('CustService');
        $data = array(
            'name' => $custName,
            'wechatno' => $weChatno,
            'media_id' => $media_id,
            'img_url' => $url,
            'cust_type' => $custType,
            'create_time' => $time,
        );
        $res = $model->add($data);
        return $res;
    }

    /**
     * 编辑微信客服首页
     * @return mixed
     */
    public function editcustservice($custId){
        $model = M('CustService');
        $res = $model->where("id = '".$custId."'")->limit(1)->select();
        return $res;
    }

    /**
     * 编辑保存微信客服
     * @return mixed
     */
    public function doEditCust($custId,$custName,$custType){
        $model = M('CustService');
        $data = array(
            'name' => $custName,
            'cust_type' => $custType
        );
        $res = $model->where("id = '".$custId."'")->save($data);
        return $res;
    }

    /**
     * 返回所有激活的微信号
     * @return mixed
     */
    public function getActiveService(){
        $model = M();
        $sql = "select media_id,cust_type from rw_cust_service where status = 1";
        return $model->query($sql);
    }

    /**
     * 设置客服状态
     */
    public function setCustActive($custId,$status){
        $model = M('CustService');
        $data = array(
            'status' => $status,
            'send_counts' => 0
        );
        $res = $model->where("id = '".$custId."'")->save($data);
        return $res;
    }

    /**
     * 删除微信客服
     */
    public function deleteCustService($custId){
        $model = M('CustService');
        $res = $model->where("id = '".$custId."'")->delete();
        return $res;
    }
}