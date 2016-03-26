<?php

class WechatReplyModel extends Model {

    /**
     * 回复列表
     */
    public function wechatreply(){
        $model = M('WechatReply');
        $res = $model->field('id,keyword,content,media_id,type')->order('id')->select();
        return $res;
    }

    public function getReplyBykey($keyword){
        $model = M('WechatReply');
        $res = $model->where("keyword='$keyword'")->find();
        return $res;
    }

    /**
     * 新增回复
     */
    public function doAddReply($keyword,$content,$mediaId,$type){
        $model = M('WechatReply');
        $data = array(
            'keyword'=>$keyword,
            'content'=>$content,
            'media_id'=>$mediaId,
            'type'=>$type
        );
        $res = $model->add($data);
        return $res;
    }

    /**
     * 编辑微信回复页
     */
    public function editreply($replyId){
        $model = M('WechatReply');
        $res = $model->where('id = '.$replyId)->limit(1)->select();
        return $res;
    }

    /**
     * 编辑保存微信回复
     */
    public function doEditReply($replyId,$keyword,$content,$mediaId,$type){
        $model = M('WechatReply');
        $data=array(
            'keyword'=>$keyword,
            'content'=>$content,
            'media_id'=>$mediaId,
            'type'=>$type
        );
        $res = $model->where('id = '.$replyId)->save($data);
        return $res;
    }

    /**
     * 删除微信回复
     */
    public function deleteReply($replyId){
        $model = M('WechatReply');
        $res = $model->where('id = '.$replyId)->delete();
        return $res;
    }
}