<?php

import('@.Service.ForumService');
class ForumAction extends WebCommonAction {

    /**
     * 论坛列表
     * @return:
     */
    public function forumList(){
        $uid = $this->uid;
        $book_id = $this->_post('book_id');
        $forum = new ForumService();
        $list = $forum->getForumList($uid, $book_id);

        if(!empty($book_id)){
            if($list == null){
                $list = array();
            }
            $this->data['data'] = $list;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛列表无效');
        }
    }

    /**
     * 论坛添加、编辑
     * @param $uid 	用户id
     * @param $book_id 	共读id
     * @param $title 	问题
     * @param $desc 	问题描述
     * @param $forum_id 	论坛id
     * @return:
     */
    public function forumAdd(){
        $uid = $this->uid;
        $book_id = $this->_post('book_id');
        $title = $this->_post('title');
        $desc = $this->_post('desc');
        $forum_id = $this->_post('forum_id');
        $forum = new ForumService();
        $list = $forum->addEditForum($uid, $book_id, $title, $desc, $forum_id);

        if((!empty($forum_id))&&(!empty($uid))){
            if($list == null){
                $list = array();
            }
            $this->data['data'] = $list;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛添加、编辑无效');
        }
    }

    /**
     * 论坛问题顶
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function forumDigg(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $forum=new ForumService();
        $list = $forum->diggForum($uid, $forum_id);
        if(!empty($list)){
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','该讨论问题不存在或已被删除！');
        }
    }

    /**
     * 论坛问题取消顶
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function forumUndigg(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $forum=new ForumService();
        $list = $forum->UndiggForum($uid, $forum_id);
        if(isset($list)){
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛取消顶无效');
        }
    }

    /**
     * 论坛问题评论
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     * @param $content 	评论内容
     * @param $comment_user_id 	当前评论者id
     * @param $reply_user_id 	被回复的评论id
     */
    public function forumComment(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $content = $this->_post('content');
        $comment_user_id = $this->_post('comment_user_id');
        $reply_user_id = $this->_post('reply_user_id');
        $forum=new ForumService();
        $list = $forum->commentForum($uid, $forum_id, $content, $comment_user_id, $reply_user_id);
        if(empty($forum_id)||empty($content)||empty($comment_user_id)||empty($reply_user_id)){
            $this->ajaxReturn('0','论坛评论无效');
        }
        elseif(empty($list)) {
            $this->ajaxReturn('0','该问题已经被删除或不存在，评论无效');
        }
        else{
            $this->data = $list;
            $this->ajaxReturn();
        }
    }

    /**
     * 论坛问题评论删除
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function forumUncomment(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $comment_id = $this->_post('comment_id');
        $forum=new ForumService();
        $list = $forum->UncommentForum($uid, $forum_id, $comment_id);
        if($list){
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛评论删除无效');
        }
    }

    /**
     * 论坛问题删除
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function forumDelete(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $forum=new ForumService();
        $list = $forum->DeleteForum($uid, $forum_id);
        if($list){
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛问题删除无效');
        }
    }

    /**
     * 论坛问题详情
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function forumInfoDetail(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $page = $this->_post('page');
        if(empty($page)){
            $page=1;
        }
        $forum=new ForumService();
        $list = $forum->detailCommentForum($uid, $forum_id,$page);
        if(empty($list)){
            $this->ajaxReturn('0','该问题已经被删除或不存在');
        }
        if(!empty($forum_id)){
            if($list == null){
                $list = array();
            }
            $this->data['data'] = $list;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛编号为空');
        }
    }

    /**
     * 论坛问题举报
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function forumJubao(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $content = $this->_post('content');
        $forum=new ForumService();
        $list = $forum->jubaoForum($uid, $forum_id,$content);
        if(empty($list)){
            $this->ajaxReturn('0','论坛问题不存在或已被删除');
        }
        if((!empty($forum_id))&&(!empty($content))){
            if($list == null){
                $list = array();
            }
            $this->data['data'] = $list;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛问题举报无效');
        }
    }

    /**
     * 论坛评论举报
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function commJubao(){
        $uid = $this->uid;
        $forum_id = $this->_post('forum_id');
        $comment_id = $this->_post('comment_id');
        $content = $this->_post('content');
        $forum=new ForumService();
        $list = $forum->commJubao($uid, $forum_id,$comment_id,$content);
        if(!empty($list)){
            $this->data['data']=$list;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛问题不存在或已被删除');
        }
    }

    /**
     * 查看对话
     * @param $uid 	用户id
     * @param $wenti_id 	问题id
     * @param $comment_user_id 	评论用户id
     * @param $reply_id 	回复用户id
     */
    public function forumDuihua(){
        $uid = $this->uid;
        $wenti_id = $this->_post('wenti_id');
        $comment_user_id = $this->_post('comment_user_id');
        $reply_id = $this->_post('reply_id');
        $forum=new ForumService();
        $this->data=array(
            'comment_user_id'=>'104',
            'comment_name'=>'王兰兰',
            'comment_avatar'=>'http://avatarimg.fengwo.com/avatar/20151204/56613bb04ae49.png',
            'comment_id'=>'104',
            'reply_user_id'=>'104',
            'reply_name'=>'王兰兰',
            'list'=>array(
                'comment_id'=>'104',
                'content'=>'评论内容',
                'create_time'=>'2015-12-30 12:12:12',
            ),
        );
        $this->ajaxReturn();
//        $list = $forum->dialogForum($uid, $wenti_id, $comment_user_id, $reply_id);
//        if($list){
//            $this->ajaxReturn();
//        }else{
//            $this->ajaxReturn('0','查看对话无效');
//        }
    }
}