<?php

class ForumJubaoModel extends Model {

    /**
     * 问题举报
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function add($uid, $forum_id, $content){
        $time = date('Y-m-d H:i:s',time());
        $data = array(
            'user_id' => $uid,
            'forum_id' => $forum_id,
            'content' => $content,
            'create_time'=>$time
        );
        return M('ForumJubao')->add($data);
    }

    /**
     * 评论举报
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function addcomm($uid, $forum_id,$comment_id, $content){
        $time = date('Y-m-d H:i:s',time());
        $data = array(
            'user_id' => $uid,
            'forum_id' => $forum_id,
            'comment_id' => $comment_id,
            'content' => $content,
            'create_time'=>$time
        );
        return M('ForumJubao')->add($data);
    }
}