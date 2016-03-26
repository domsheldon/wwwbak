<?php

class ForumModel extends Model {
    /**
     * 通过编号查询该问题是否存在
     * @param $forum_id
     * @return mixed
     */
    public function getForumById($forum_id){
        $model = M("Note");
        return $model->where("id=$forum_id and is_delete=0")->find();
    }

    /**
     * 论坛数据列表
     * @param $uid 	用户id
     * @param $book_id 	共读id
     */
    public function getList($uid, $book_id){
//        $sql = "SELECT b.id,b.book_id,b.user_id,concat('".OSS_AVATAR."',a.avatar) as avatar,b.title,b.digg_count,b.comment_count FROM ys_forum b,ys_user_info a WHERE b.user_id=a.user_id AND b.user_id='".$uid."' AND b.book_id='".$book_id."'";
        $model = M();
        $getList = $model->table('rw_note b,rw_user_info a')
            ->where("b.user_id=a.user_id  AND b.book_id='".$book_id."' and b.is_delete=0")
            ->field(array('b.id','b.book_id','b.user_id',"concat('".OSS_AVATAR."',a.avatar)"=>'avatar',
                    'b.title','b.digg_count','b.comment_count','a.name','b.create_time','b.desc'))
            ->order('b.digg_count desc')
            ->select();
        return $getList;
    }

    /**
     * 分页获取论坛列表
     * @param $uid 	用户id
     * @param $book_id 	共读id
     * @param $page 	页码
     */
    public function getForumListByPage($uid, $book_id,$page,$is_top,$topic){
        if($is_top == '2'){
            return $this->getTopicNoteByPage($uid, $book_id,$page,$is_top,$topic);
        }
        $model = M();
        if(!empty($book_id)) {
            if(empty($is_top)){
                $where = "b.book_id='" . $book_id . "'  and b.is_delete=0";
            }else{
                $where = "is_top=$is_top and b.book_id='" . $book_id . "'  and b.is_delete=0";
            }
            $res = $model->table('rw_note b')
                ->join('rw_user_info a on b.user_id=a.user_id')
                ->join('rw_note_digg c ON b.id = c.note_id and c.digg_user='.$uid)
                ->where($where)
                ->field(array('b.id', 'b.book_id', 'b.user_id', "IF(LOCATE('http://',avatar),avatar,concat('" . OSS_AVATAR . "',a.avatar,'@100w'))" => 'avatar',
                    'b.title', 'b.digg_count', 'b.comment_count', 'a.name', 'b.create_time', 'b.content','b.img_str',
                    "IF(c.digg_user IS NULL,0,1)"=>'digg_flag','b.is_top'))
                ->limit((10 * ($page - 1)), 10)
                ->order('b.create_time desc')
                ->select();
            return $res;
        }else{
            if(!empty($is_top)){
                $where = "is_top=$is_top";
            }else{
                $where = "1=1";
            }
            $res = $model->table('rw_note b')
                ->where($where)
                ->join('rw_user_info a on b.user_id=a.user_id')
                ->join('rw_note_digg c ON b.id = c.note_id and c.digg_user='.$uid)
                ->field(array('b.id', 'b.book_id', 'b.user_id', "IF(LOCATE('http://',avatar),avatar,concat('" . OSS_AVATAR . "',a.avatar,'@100w'))" => 'avatar',
                    'b.title', 'b.digg_count', 'b.comment_count', 'a.name', 'b.create_time', 'b.content','b.img_str',
                    "IF(c.digg_user IS NULL,0,1)"=>'digg_flag','b.is_top'))
                ->limit((10 * ($page - 1)), 10)
                ->order('b.create_time desc')
                ->select();
            return $res;
        }
    }

    /**
     * 获得某个话题的随笔列表
     * @param $uid
     * @param $book_id
     * @param $page
     * @param $is_top
     * @param $topic
     */
    public function getTopicNoteByPage($uid, $book_id,$page,$is_top,$topic){
        $model = M();
        $where = "b.content like '%#" . $topic . "#%'  and b.is_delete=0";

        $res = $model->table('rw_note b')
            ->join('rw_user_info a on b.user_id=a.user_id')
            ->join('rw_note_digg c ON b.id = c.note_id and c.digg_user='.$uid)
            ->where($where)
            ->field(array('b.id', 'b.book_id', 'b.user_id', "IF(LOCATE('http://',avatar),avatar,concat('" . OSS_AVATAR . "',a.avatar,'@100w'))" => 'avatar',
                'b.title', 'b.digg_count', 'b.comment_count', 'a.name', 'b.create_time', 'b.content','b.img_str',
                "IF(c.digg_user IS NULL,0,1)"=>'digg_flag','b.is_top'))
            ->limit((10 * ($page - 1)), 10)
            ->order('b.create_time desc')
            ->select();
        return $res;
    }

    /**
     * 论坛添加
     * @param $uid 	用户id
     * @param $book_id 	共读id
     * @param $title 	问题
     * @param $desc 	问题描述
     * @param $forum_id 	论坛id
     */
    public function add($uid, $book_id, $title, $content,$imgs){
        $time = date('Y-m-d H:i:s',time());
        if(empty($book_id)){
            $book_id = '';
        }
        $data = array(
            'user_id' => $uid,
            'book_id' => $book_id,
            'title' => $title,
            'content' => $content,
            'digg_count' => 0,
            'comment_count'=> 0,
            'create_time'=>$time,
            'img_str'=> $imgs
        );
        $model = M('Note');
        return $model->add($data);
    }

    /**
     * 论坛编辑
     * @param $uid 	用户id
     * @param $book_id 	共读id
     * @param $title 	问题
     * @param $desc 	问题描述
     * @param $forum_id 	论坛id
     */
    public function edit($title, $content, $note_id){
        $model = M("Note");
        $data = array(
            'title' => $title,
            'content' => $content,
        );
        $model->where("id='$note_id'")->setField($data);
        return $note_id;
    }

    /**
     * 论坛问题顶后，论坛表后顶数+1
     */
    public function addDiggTotal($uid, $note_id){
        $model = M("Note");
        $model->where("id='$note_id'")->setInc('digg_count');
    }

    /**
     * 论坛问题顶后，论坛表后顶数-1
     */
    public function minusDiggTotal($uid, $note_id){
        $model = M("Note");
        $model->where("id='$note_id'")->setDec('digg_count');
    }

    /**
     * 论坛问题评论后，论坛表评论数+1
     */
    public function addCommentTotal($uid, $note_id){
        $model = M("Note");
        $model->where("id='$note_id'")->setInc('comment_count');
    }

    /**
     * 论坛问题评论删除后，论坛表评论数-1
     */
    public function minusCommentTotal($uid, $note_id){
        $model = M("Note");
        $model->where("id='$note_id'")->setDec('comment_count');
    }

    /**
     * 论坛问题删除，需要同时删除comment和digg
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function delete($uid, $note_id){
        $m_comment = M("NoteComment");
        $m_comment->where("note_id=$note_id")->delete();

        $m_comment = M("NoteDigg");
        $m_comment->where("note_id=$note_id")->delete();

        $model = M("Note");
        return $model->where("user_id='$uid' AND id='$note_id'")->delete();
    }

    /**
     * 论坛问题详情
     * @param $uid 	用户id
     * @param $forum_id 	论坛id
     */
    public function detailComment($uid, $note_id){
        $model = M();
        $detail = $model->table('rw_note b,rw_user_info a')
            ->where("a.user_id = b.user_id and b.id='".$note_id."'")
            ->field(array('b.user_id','a.name',"IF(LOCATE('http://',avatar),avatar,concat('" . OSS_AVATAR . "',a.avatar,'@100w'))"=>'avatar','b.id','b.book_id',
                    'b.title','b.content','b.digg_count','b.comment_count','b.create_time','b.img_str'))
            ->select();

        return $detail;
    }

    /**
     * 查看对话
     * @param $uid 	用户id
     * @param $wenti_id 	问题id
     * @param $comment_user_id 	评论用户id
     * @param $reply_id 	回复用户id
     */
    public function dialog($uid, $wenti_id, $comment_user_id, $reply_id){
        $model = M();
        $res = $model->table('rw_note_comment c,rw_user_info b,rw_note a')
            ->where("c.note_id='".$wenti_id."' AND c.send_user='".$comment_user_id."' AND
                     c.receive_user='".$reply_id."' AND a.user_id='".$uid."' AND a.id=c.note_id")
            ->field(array('c.send_user','c.receive_user'))
            ->select();
        return $res;
    }
}