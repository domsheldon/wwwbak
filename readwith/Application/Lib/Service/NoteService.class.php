<?php
/**
* 笔记、书摘业务层
* @date: 2015-12-18
* @author: efan
* @version:1.0.0
*/
import('@.Service.BookService');
class NoteService {
	
	/**
	* 有书圈列表
	* @date 2016-1-28
	* @return:
	*/
	public function getNoteIndex($user_id, $book_id, $offset, $limit, $order) {
		$where='';
		if ($book_id) {									//按书筛选随笔
			$where ='is_pub=0 and book_id='.$book_id;
		}
		//组合筛选条件的where
		$orderby='create_time desc';
		if ($order == 'hot') { 							//热门的先按点赞数排序
			$orderby='digg_count desc';	
		}
		
		return $this->getNoteList($user_id, $where, 'index_note', $book_id, $offset, $limit, $orderby);
	}
	/**
	 * 根据where条件取笔记，收藏的随笔、我的随笔、随笔详情、有书圈列表都经过此方法
	 * @param int $user_id
	 * @param string $where 		where条件
	 * @param string $redis_type 	为空时不走redis
	 * @param string $value			根据哪个key来筛选	
	 * @param string $offset 
	 * @param string $limit			每页显示条数
	 * @param string $order 		排序语句
	 */
	public function getNoteList($user_id, $where, $redis_type, $value, $offset, $limit, $order='create_time desc') {
		$note=new NoteModel();
		$user=new UserModel();
		$digg=new DiggModel('Note', 'note_id');
		
		if ($where) {
			$where.=' and is_delete=0';
		}else {
			$where='is_pub=0 and is_delete=0';
		}
		//从redis或数据库里取数据
		$list=$note->getNoteData($where, $redis_type, $value, $order, $offset, $limit);
		
		//组合处理数据
		foreach ($list as $v) {
			$user_arr[]=$v['user_id'];
			$id_arr[]=$v['id'];
		}
		$note_id_str=implode(',', $id_arr);			//limit的note_id字符串，为了便于查是否点赞、收藏
		$user_list=$user->getUserInfo($user_arr, 'user_id,name,avatar,sex');
		$digg_list=$digg->isDigg($note_id_str, $user_id);	//把当前用户点赞信息放入redis
		$fav_list=$note->isFav($note_id_str, $user_id);		//把当前用户收藏信息放入redis
		
		//把用户信息、点赞、收藏组合到列表
		foreach ($list as $k=>$v) {
		
			//组合笔记的插图
			$list[$k]['img_str']=array();
			$list[$k]['is_digg']=$list[$k]['is_fav']='0';
			if($v['img_str']) {
				$arr=explode(',', $v['img_str']);
				unset($list[$k]['img_str']);		//之前是个字符串，先删掉，再赋为数组类型的
				foreach ($arr as $a) {
					$list[$k]['img_str'][]=OSS_COVER.$a.OSS_COVER_RULE;
				}
			}
			//组合用户信息
			if ($user_list[$v['user_id']]) {
				$list[$k]['user_data']=$user_list[$v['user_id']];
			}
			//组合点赞
			if ($digg_list[$v['id']]) {
				$list[$k]['is_digg']='1';
			}
			//组合收藏
			if ($fav_list[$v['id']]) {
				$list[$k]['is_fav']='1';
			}
		}
		return $list; 
	}
	/**
	* 获取note的发布者id
	* @param  $note_id
	* @date 2016-2-1
	* @return:
	*/
	public function getNoteUser($id) {
		return M('Note')->where('id='.$id)->getField('user_id');
	}
	/**
	* 笔记保存
	* @param $data 
	* @param $note_id 笔记id
	* @date 2015-12-22
	* @return:
	*/
	public function noteSave($data, $note_id=0) {
		$book=new BookModel();
		$note=new NoteModel();
		$matches = array();
		$topic=new TopicService();
		//匹配出data['content']的开头是否有话题，匹配第一位则说明首部有#
		if (strpos($data['content'], '#') ==0){
			 preg_match_all("/#(.+?)#/", $data['content'], $matches);
			foreach ($matches[1] as $v) {
				$topic->addTopic($data['user_id'], $v);
			}
		}
		if ($note_id) {				//编辑的时候不让修改书籍
			unset($data['book_id']);
			$note->noteUpdate($note_id, $data);
			$res = $note_id;
		}else {
			$res=$note->addNote($data);
			
			//发订阅，加相应的积分
			$redis=new RedisModel();
			$redis->groupRankMsg($data['user_id'], 'note');
			
		}
		return $res;
	}
	/**
	* 笔记详情
	* @param $note_id 
	* @date 2015-12-18
	* @return:
	*/
	public function getNoteInfo($id, $user_id) {
		//阅读量+1
		CommonModel::addFieldCount('Note', 'id='.$id, 'read_count');
		$note=new NoteModel();
		
		$where='id='.$id;
		
		$list=$this->getNoteList($user_id, $where, 'note_info', $id, 0, 1);
		$info=$list[0];

		if($info){
			$word_count=mb_strlen(strip_tags($info['content']));	//字数
			$info['word_count']="$word_count";
		}
		return $info;
	}
	/**
	 * 随笔和拆书包的     赞、取消赞
	 * @param  $id		随笔/拆书包id
	 * @param  $user_id	当前点赞用户id
	 * @param  $type	区分随笔note、拆书包bp
	 * @param  $act		动作，点赞、取消赞、点赞列表
	 */
	public function diggAct($id, $user_id, $type, $act) {
		$field='note_id';
		$table='note';
		if ($type =='bp'){		
			$field='bp_id';		
			$table='BookPack';
		}
		
		$digg=new DiggModel($table, $field);
		switch ($act) {
			case 'c':		//取消赞
				$ori_user=$digg->diggDel($id, $user_id);
				//发订阅，减相应的积分
				if ($type =='note' && $ori_user) {
					$redis=new RedisModel();
					$redis->groupRankMsg($ori_user, 'undigg');
				}
				break;
			case 'list':
				$user_arr=$digg->diggUserList($id);
				$user=new UserModel();
				$user_list=$user->getUserInfo($user_arr);
				sort($user_list);
				return $user_list;
				break;
			default:
				
				$digg_res=$digg->diggAdd($id, $user_id);
				//发订阅，加相应的积分
				if ($type =='note' && $digg_res[0]) {
					$redis=new RedisModel();
					$redis->groupRankMsg($digg_res[0], 'digg');
				}
				break;
		}
		
	}
	/**
	* 新增评论
	* @param $type
	* @param $id
	* @date 2016-2-1
	* @return:
	*/
	public function commentAct($type, $id, $user_id, $content, $comm_type, $cid) {
		//先根据不同的type来确定哪个表
		$info_id = 'note_id';
		$table='Note';
		$ori_user=$this->getNoteUser($id);
		if ($type =='bp') {
			$info_id ='bp_id';
			$table='BookPack';
			$ori_user=0;
		}
		$comment=new CommentModel($table, $info_id);
		$comment_id=$comment->commentAdd($id, $ori_user, $user_id, $content, $comm_type, $cid);
		//发订阅，加相应的积分
		if ($type =='note') {
			$redis=new RedisModel();
			$redis->groupRankMsg($user_id, 'comment');
		}
		return $comment_id;
	}
	/**
	* 评论列表
	* @param $type
	* @param $id
	* @date 2016-2-1
	* @return:
	*/
	public function getCommentList($type, $id, $offset, $limit) {
		//先根据不同的type来确定哪个表
		$info_id = 'note_id';
		$table='Note';
		if ($type =='bp') {
			$info_id ='bp_id';
			$table='BookPack';
		}
		$list = array();
		$comment=new CommentModel($table, $info_id);
		
		$list=$comment->getCommentList($id, $offset, $limit);
		return $list;
	}
	/**
	* 查看评论对话
	* @param $id 
	* @param  $send_user
    * @param  $receive_user
	* @date 2016-2-1
	* @return:
	*/
	public function getCommentTalk($type, $id, $send_user, $receive_user) {
		//先根据不同的type来确定哪个表
		$info_id = 'note_id';
		$table='Note';
		if ($type =='bp') {
			$info_id ='bp_id';
			$table='BookPack';
		}
		$comment=new CommentModel($table, $info_id);
		return $comment->getCommentTalk($id, $send_user, $receive_user);
	}
	/**
	* 评论删除
	* @param  $comment_id
	* @date 2016-2-1
	* @return:
	*/
	public function commentDel($type, $user_id, $comment_id) {
		//先根据不同的type来确定哪个表
		$info_id = 'note_id';
		$table='Note';
		if ($type =='bp') {
			$info_id ='bp_id';
			$table='BookPack';
		}
		$comment=new CommentModel($table, $info_id);
		return $comment->commentDel($comment_id, $user_id);
	}
	/**
	* 笔记收藏
	* @param $note_id 
	* @param $user_id 
	* @date 2016-1-28
	* @return:
	*/
	public function noteFav($note_id, $user_id) {
		$note=new NoteModel();
		return $note->noteFav($note_id, $user_id);
	}
	/**
	* 笔记删除
	* @param $note_id 
	* @param $user_id 
	* @date 2016-1-28
	* @return:
	*/
	public function noteDel($user_id,$note_id) {
		$note=new NoteModel();
		$topic=new TopicModel();
		$res=$note->noteDel($user_id, $note_id);
		
		//对话题的人数-1
		$content=$note->getNoteField($note_id, 'content');
		if (strpos($content, '#') ==0) {
			preg_match_all("/#(.+?)#/", $content, $matches);
			foreach ($matches[1] as $v) {
				$topic->decJoinNums($v);
			}
		}
		return $res;
	}
	/**
	* 笔记举报
	* @param $note_id 
	* @param $user_id 
	* @date 2016-1-28
	* @return:
	*/
	public function jubao($note_id, $user_id) {
		$note=new NoteModel();
		$note->jubao($note_id, $user_id);
	}
	

	//返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }
}