<?php
/**
* 文章点赞
* @date: 2015-12-17
* @author: efan
* @version:1.0.0
*/
class NoteDiggModel extends Model {
	
//	点赞
	public function addDigg($data) {
		$data['create_time']= date('Y-m-d H:i:s', time());
		M('NoteDigg')->add($data);
        return true;
	}
//    取消赞
    public function delDigg($note_id,$user_id) {
        $data['create_time']= date('Y-m-d H:i:s', time());
        return M('NoteDigg')->where("note_id='$note_id' and user_id='$user_id'")->delete();
    }


}