<?php
/**
 * 微信自动回复逻辑层
 * @date: 2016-1-19
 * @author: zhouyi
 * @version:1.0.0
 */
import('@.Service.RedisService');
class WechatReplyService{
    /**
     * 回复列表
     */
    public function wechatreply(){
        $model = new WechatReplyModel();
        $res = $model->wechatreply();
        return $res;
    }
    /**
     * 新增回复
     */
    public function doAddReply($keyword,$content,$mediaId,$compound,$text,$img){
        $model = new WechatReplyModel();
        if(empty($compound)){
            if(empty($text)){
                $type = $img;
            }
            if(empty($img)){
                $type = $text;
            }
        }else{
            $type = $compound;
        }
        $res = $model->doAddReply($keyword,$content,$mediaId,$type);
        $redis = new RedisService();
        $redis->setReplay();
        return $res;
    }

    /**
     * 编辑微信回复页
     */
    public function editreply($replyId){
        $model = new WechatReplyModel();
        $res = $model->editreply($replyId);
        return $res;
    }

    /**
     * 编辑保存微信回复
     */
    public function doEditReply($replyId,$keyword,$content,$mediaId,$compound,$text,$img){
        $model = new WechatReplyModel();
        if(empty($compound)){
            if(empty($text)){
                $type = $img;
            }
            if(empty($img)){
                $type = $text;
            }
        }else{
            $type = $compound;
        }
        $res = $model->doEditReply($replyId,$keyword,$content,$mediaId,$type);

        $redis = new RedisService();
        $redis->setReplay();
        return $res;
    }

    /**
     * 删除微信回复
     */
    public function deleteReply($replyId){
        $model = new WechatReplyModel();
        $res = $model->deleteReply($replyId);

        $redis = new RedisService();
        $redis->setReplay();
        return $res;
    }
}