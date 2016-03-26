<?php

import('@.Service.NotifyService');
class ForumService{

    /**
     * 获取论坛列表
     * @param $uid 	用户id
     * @param $book_id 	共读id
     */
    public function getForumList($uid, $book_id){
        $model=new ForumModel();
        $res = $model->getList($uid, $book_id);
        return $res;
    }

    /**
     * 分页获取论坛列表
     * @param $uid 	用户id
     * @param $book_id 	共读id
     * @param $page 	页码
     */
    public function getForumListByPage($uid, $book_id,$page,$is_top,$topic){
        $model=new ForumModel();
        $res = $model->getForumListByPage($uid, $book_id,$page,$is_top,$topic);
        return $res;
    }

    /**
     * 论坛添加、编辑
     * @param $uid 	用户id
     * @param $book_id 	共读id
     * @param $title 	问题
     * @param $desc 	问题描述
     * @param $forum_id 	论坛id
     */
    public function addEditForum($uid, $book_id, $title, $content, $note_id,$imgs){
        $model=new ForumModel();
        //检查传入的论坛id是否存在
        if(empty($note_id)){
            $res = $model->add($uid, $book_id, $title, $content,$imgs);
        }else{
            $res = $model->edit($title, $content, $note_id);
        }
        return $res;
    }

    /**
     * 论坛问题顶
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function diggForum($uid, $forum_id){
        $model=new ForumModel();
        $flag = $model->getForumById($forum_id);
        if(empty($flag)){
            return;
        }
        $digg=new ForumDiggModel();
        $res = $digg->digg($uid, $forum_id);
        $model->addDiggTotal($uid, $forum_id);
        return $res;
    }

    /**
     * 论坛问题取消顶
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function UndiggForum($uid, $note_id){
        $model=new ForumModel();
        $digg=new ForumDiggModel();
        $res = $digg->undigg($uid, $note_id);
        $model->minusDiggTotal($uid, $note_id);
        return $res;
    }

    /**
     * 论坛问题评论
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     * @param $content 	评论内容
     * @param $comment_user_id 	当前评论者id
     * @param $reply_user_id 	被回复的评论id
     */
    public function commentForum($uid, $forum_id, $content, $comment_user_id, $reply_user_id,$comment_type=0){
        $model=new ForumModel();
        $comment=new ForumCommentModel();
        $flag = $model->getForumById($forum_id);
        if(empty($flag)){
            return;
        }
        $res = $comment->comment($uid, $forum_id, $content, $comment_user_id, $reply_user_id,$comment_type);
        $model->addCommentTotal($uid, $forum_id);
        
        //对@或楼主发推送
        $notify=new NotifyService();
        $notify->comment_notify($forum_id, $comment_user_id, $reply_user_id, $content);
        $arr = array('id'=>"$res");
        return $arr;
    }

    /**
     * 论坛问题评论删除
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function UncommentForum($uid, $note_id,$comment_id){
        $model=new ForumModel();
        $comment=new ForumCommentModel();
        $res = $comment->uncomment($uid, $note_id,$comment_id);
        $model->minusCommentTotal($uid, $note_id);
        return $res;
    }

    /**
     * 论坛问题删除
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function DeleteForum($uid, $note_id){
        $model=new ForumModel();
        $res = $model->delete($uid, $note_id);
        return $res;
    }

    /**
     * 论坛问题详情
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function detailCommentForum($uid, $note_id,$page){
        $model=new ForumModel();
        $comment=new ForumCommentModel();

        $flag = $model->getForumById($note_id);
        if(empty($flag)){
            return;
        }
        $res_detail = $model->detailComment($uid, $note_id);
        $res_comment = $comment->detailComment($uid,$note_id,$page);
        //统计是否点赞
        $diggModel = M();
        $sql = "SELECT COUNT(*) as 'digg_sum' from rw_note_digg where note_id='".$note_id."' AND digg_user='".$uid."'";
        $digg = $diggModel->query($sql);
        if($digg[0]['digg_sum'] == 0){
            $status = 0;
        }else{
            $status = 1;
        }

        if($res_comment == null){
            $arr = $res_detail[0];
            $arr['status'] = $status;
        }else{
            $arr = $res_detail[0];
            $arr['status'] = $status;
            $arr['list'] = $res_comment;
        }

        return $arr;
    }

    /**
     * 论坛问题举报
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function jubaoForum($uid, $note_id,$content){
        $model=new ForumModel();

        $flag = $model->getForumById($note_id);
        if(empty($flag)){
            return;
        }
        $model=new ForumJubaoModel();
        $res = $model->add($uid, $note_id,$content);
        return $res;
    }

    /**
     * 论坛评论举报
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function commJubao($uid, $forum_id,$comment_id,$content){
        $model=new ForumModel();
        $flag = $model->getForumById($forum_id);
        if(empty($flag)){
            return;
        }
        $m_comment = new ForumCommentModel();
        $flag = $m_comment->getCommentById($comment_id);
        if(empty($flag)){
            return;
        }

        $model=new ForumJubaoModel();
        $res = $model->addcomm($uid, $forum_id,$comment_id,$content);
        return $res;
    }

    /**
     * 查看对话
     * @param $uid 	用户id
     * @param $wenti_id 	问题id
     * @param $comment_user_id 	评论用户id
     * @param $reply_id 	回复用户id
     */
    public function dialogForum($uid, $wenti_id, $comment_user_id, $reply_id){
        $model=new ForumModel();
        $res = $model->dialog($uid, $wenti_id, $comment_user_id, $reply_id);
        return $res;
    }

    /**
     * 查看当前问题当前用户是否已经点赞
     * @param $uid 	用户id
     * @param $forum_id 	问题id
     */
    public function isDigg($uid, $note_id){
        $model=new ForumDiggModel();
        $res = $model->isDigg($uid, $note_id);
        return $res;
    }
}