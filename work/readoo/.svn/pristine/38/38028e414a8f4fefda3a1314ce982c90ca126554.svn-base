<?php
/**
 * 回复列表
 * @date: 2016-1-21
 * @author: zhouyi
 * @version:1.0.0
 */
import('@.Service.WechatReplyService');
class WechatReplyAction extends WebCommonAction{

    /**
     * 回复列表
     */
    public function wechatreply(){
        $service = new WechatReplyService();
        $replyInfo = $service->wechatreply();
        $this->assign('replyInfo',$replyInfo);
        $this->display();
    }

    /**
     * 新增回复页
     */
    public function addreply(){
        $this->display();
    }
    /**
     * 新增回复
     */
    public function doAddReply(){
        $keyword = $this->_post('keyword');
        $content = $_POST['content'];
        $mediaId = $this->_post('mediaId');
        $compound = $this->_post('compound');
        $text = $this->_post('text');
        $img = $this->_post('img');
        $service = new WechatReplyService();
        $res = $service->doAddReply($keyword,$content,$mediaId,$compound,$text,$img);
        $this->ajaxReturn();
    }

    /**
     * 编辑微信回复页
     */
    public function editreply(){
//        $menuId = $this->_post('menuId');
        $replyId = I('get.replyId');
        $service = new WechatReplyService();
        $editInfo = $service->editreply($replyId);
        $this->assign('editInfo',$editInfo);

        //激活成功后，加载到redis
//        $redis = new RedisService();
//        $redis->saveActiveCustService();
        $this->display();
    }

    /**
     * 编辑保存微信回复
     */
    public function doEditReply(){
        $replyId = $this->_post('replyId');
        $keyword = $this->_post('keyword');
        $content = $_POST['content'];
        $mediaId = $this->_post('mediaId');
        $compound = $this->_post('compound');
        $text = $this->_post('text');
        $img = $this->_post('img');
        $service = new WechatReplyService();
        $res = $service->doEditReply($replyId,$keyword,$content,$mediaId,$compound,$text,$img);
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','编辑保存菜单错误');
        }
    }

    /**
     * 删除微信回复
     */
    public function deleteReply(){
        $replyId = $this->_post('replyId');
        $service = new WechatReplyService();
        $res = $service->deleteReply($replyId);

        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','删除微信回复错误');
        }
    }
}