<?php
/**
* 读书笔记
* @date: 2015-10-14
* @author: efan
* @version:1.0.0
*/
class NoteModel extends Model {
	
	/**
	* 取列表
	* @param $where where字符串
	* @param $redis_type
	* @param $value
	* @date 2016-1-28
	* @return:
	*/
	public function getNoteData($where, $redis_type, $value, $order, $offset=0, $limit=10 ) {
		if ($redis_type) {
			$redis=new RedisModel();
			if ($redis->isConnect() !== false) {
				$list=$redis->getNoteRedisList($redis_type, $value, $order, $offset, $limit);
				$redis->close();
				if ($list) return $list;
			}
		}
		$list=M('Note')->where($where)->order($order)->limit($offset, $limit)->select();
		return $list;
	}

	/**
	 * 读书笔记新增
	 * @param $data 
	 * @return: $note_id
	 */
	public function addNote($data) {
		$note=M('Note');
		$data['create_time']=date('Y-m-d H:i:s');
		$note_id=$note->add($data);
		
		//把公开的note数据存入哈希类型
		$res=$note->where('id='.$note_id)->find();
		if ($res['is_pub'] ==0) {
			$redis=new RedisModel();		
			if ($redis->isConnect() !== false)	{
				$redis->setNoteRedis($note_id, $res);
				$redis->close();
			}
		}
		return $note_id;
	}
	
	/**
	* 笔记更新
	* @param $id 
	* @param $data 
	* @date 2016-2-1
	* @return: 影响行数
	*/
	public function noteUpdate($id, $data) {
		$note=M('Note');
		$note->where('id='.$id)->save($data);
		
		//更新redis数据
		$note_info=$note->where('id='.$id)->find();
		if ($note_info['is_pub'] ==0) {
			$redis=new RedisModel();
			if ($redis->isConnect() !== false)	{
				$redis->setNoteRedis($id, $note_info, 'update');
				$redis->close();
			}
		}
	}
	public function getNoteField($note_id, $field) {
		return M('Note')->where('id='.$note_id)->getField($field);
	} 
	/**
	* 笔记评论
	* @param $note_id 书籍感悟id
	* @date 2015-8-31
	* @return:$comment_id
	*/
	public function commentNote($note_id, $comment_user_id, $content, $comm_type = 0, $comm_id = 0) {
		//实例化评论
    	$comment=new CommentModel('NoteComment', 'note');
    	//取发感悟的用户id，入库到comment表
    	$ori_user_id=M('Note')->where('note_id='.$note_id)->getField('user_id');
    	$comment_id=$comment->commentAdd($note_id, $ori_user_id, $comment_user_id, $content, $comm_type, $comm_id);
    	//增加评论数量
		CommonModel::addFieldCount('Note', 'note_id='.$note_id, COMMENT_COUNT);
		//判断评论者是否是自己，不是则通知
        if($comment_user_id != $ori_user_id){ 
	        //通知
			$notify=new NotifyModel();
			$notify->comment_notify($note_id, $comment_user_id, $comm_type, $ori_user_id, 'note');
			$notify->save_notify($comment_user_id, $ori_user_id, 'comment');
        }
    	return $comment_id;
	}
	
	/**
	* 取消收藏/收藏笔记
	* @param $note_id 笔记id
	* @param $user_id 用户id
	* @date 2015-9-1
	* @return:
	*/
	public function noteFav($note_id,$user_id) {
		$fav=M('NoteFav');
		$where='note_id='.$note_id.' and user_id='.$user_id;
		$is_fav=$fav->where($where)->find();
		if ($is_fav) {
			$fav->where($where)->delete();
			return 'cancel';
		}else {
			$data['note_id']=$note_id;
			$data['user_id']=$user_id;
			$data['create_time']=date('Y-m-d H:i:s');
			$fav->add($data);
			
			return 'fav';
		}
	}
	/**
	* 我的收藏
	* @param $user_id
	* @date 2016-2-2
	* @return: 5,8,9
	*/
	public function getUserFavNote($user_id, $offset, $limit) {
		$list=M('NoteFav')->field('note_id')->where('user_id='.$user_id)->limit($offset,$limit)->select();
		foreach ($list as $v) {
			$arr[]=$v['note_id'];
		}
		return implode(',', $arr);
	}
	/**
	* 是否收藏
	* @param $note_id_str
	* @param $user_id
	* @date 2016-2-3
	* @return:
	*/
	public function isFav($note_id_str, $user_id) {
		$fav_list=M('NoteFav')->where('note_id in ('.$note_id_str.') and user_id='.$user_id)->select();
		foreach ($fav_list as $v) {
			$list[$v['note_id']]='1';
		}
		return $list;
	}
	/**
	* 删除笔记
	* @param int $user_id 用户id
	* @param int $note_id 笔记id 
	* @return:bool
	*/
	public function noteDel($user_id,$note_id) {
		//先判断是否已同意或已删除
		$res=M('Note')->where('user_id='.$user_id.' and id='.$note_id)->setField('is_delete', '1');
		$book_id=$this->getNoteField($note_id, 'book_id');
		if ($res) {
			//删除redis里的note
			$redis=new RedisModel();
			if ($redis->isConnect() !== false)	{
				$redis->delNoteRedis($note_id, $user_id, $book_id);
				$redis->close();
			}
		}
		return $res;
	}
	/**
	* 笔记举报
	* @param $note_id
	* @param $user_id
	* @date 2016-1-29
	* @return:
	*/
	public function jubao($note_id, $user_id) {
		$data=array(
			'note_id'=>$note_id,
			'user_id'=>$user_id,
			'create_time'=>date('Y-m-d H:i:s')
		);
		M('NoteJubao')->add($data);
	}
	/**
	* 用户的笔记条数
	* @param $user_id
	* @date 2016-2-4
	* @return:
	*/
	public function getUserNoteCount($user_id) {
		$count=M('Note')->where('user_id='.$user_id.' and is_delete=0')->count();
		return (int)$count;
	}
}