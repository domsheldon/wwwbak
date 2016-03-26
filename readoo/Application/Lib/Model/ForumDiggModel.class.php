<?php

class ForumDiggModel extends Model {

    /**
     * 论坛问题顶
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function digg($uid, $note_id){
        $time = date('Y-m-d H:i:s',time());
        $data = array(
            'digg_user' => $uid,
            'note_id' => $note_id,
            'create_time'=>$time
        );
        return M('NoteDigg')->add($data);
    }

    /**
     * 论坛问题取消顶
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function undigg($uid, $note_id){
        $model = M("NoteDigg");
        return $model->where("digg_user='$uid' AND note_id='$note_id'")->delete();
    }

    /**
     * 查看当前问题当前用户是否已经点赞
     * @param $uid 	用户id
     * @param $forum_id 	问题id
     */
    public function isDigg($uid, $note_id){
        $model = M("NoteDigg");
        return $model->where("digg_user='$uid' AND note_id='$note_id'")->select();
    }
}