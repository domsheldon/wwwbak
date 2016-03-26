<?php

class ForumCommentModel extends Model {
    public function getCommentById($comment_id){
        $model = M("NoteComment");
        return $model->where("id=$comment_id")->find();
    }

    /**
     * 论坛问题评论
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     * @param $content 	评论内容
     * @param $comment_user_id 	当前评论者id
     * @param $reply_user_id 	被回复的评论id
     */
    public function comment($uid, $note_id, $content, $send_user, $receive_user,$comment_type=0){
        $time = date('Y-m-d H:i:s',time());
        $data = array(
            'note_id' => $note_id,
            'content' => $content,
            'send_user'=>$send_user,
            'receive_user'=>$receive_user,
            'comment_type'=>$comment_type,
            'create_time'=>$time
        );
        return M('NoteComment')->add($data);
    }

    /**
     * 论坛问题评论删除
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function uncomment($uid, $note_id,$comment_id){
        $model = M("NoteComment");
        return $model->where("send_user='$uid' AND note_id='$note_id' AND id='$comment_id'")->delete();
    }

    /**
     * 论坛问题详情
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function detailComment($uid, $note_id,$page){
        $model = M('NoteComment');
        $detail=$model->table('rw_note_comment c')
            ->join('rw_user_info a ON send_user = a.user_id')
            ->join('rw_user_info b ON receive_user = b.user_id')
            ->where("note_id='".$note_id."'")
            ->field(array('send_user','a.name'=>'send_name',"IF(LOCATE('http://',a.avatar),a.avatar,concat('" . OSS_AVATAR . "',a.avatar))"=>'send_avatar','id'=>'comment_id','content',
                'receive_user','b.name'=>'receive_name','c.create_time','c.comment_type'))
            ->limit((10*($page-1)),10)
            ->order('c.create_time desc')
            ->select();
        return $detail;
    }

    /**
     * 论坛问题详情（回复）
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
//    public function detailCommentReply($uid, $forum_id){
//        $model = M();
//        $detail = $model->table('ys_forum_comment b,ys_user_info a')
//            ->where("b.reply_user_id=a.user_id AND b.forum_id='".$forum_id."'")
//            ->field(array('b.reply_user_id','a.name'=>'reply_name',"concat('".OSS_AVATAR."','a.avatar')"=>'reply_avatar','b.content',
//                    'b.create_time','b.comment_type'))
//            ->select();
//        return $detail;
//    }
}