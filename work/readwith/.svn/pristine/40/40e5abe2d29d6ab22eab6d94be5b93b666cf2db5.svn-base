<?php
/**
* 评论model
* @date: 2015-8-31
* @author: efan
* @version:1.0.0
*/
import('@.Service.NotifyService');
class CommentModel extends Model  {
	
	/**
	 * 表前缀，如 Note笔记、BookPackage
	 * @var string
	 */
	private $table='';
	
	/**
	 * M的评论表实例
	 * @var string
	 */
	private $m='';
	
	/**
	 * 被评论的bp_id或note_id 
	 */
	private $info_id='';
	
	//要新增或减少的字段名
	private $count='comment_count';
	
	/**
	 * @param  $table 评论表名,驼峰命名
	 * @param  $field 字段前缀，如给feed_comment的feed_id,加入评论数据，则：FeedComment,feed
	 */
	public function __construct($table, $info_id){
		$this->table=$table;
		$this->m = M($table.'Comment');
		$this->info_id = $info_id;
	}
	/**
     * 动态评论
     * @param $id 动态id 
     * @param $send_user 发表评论用户id 
     * @param $comm_type 评论类型    0评论1回复评论
     * @param $comm_id 被回复评论的id
     * @param $content 评论内容
     * @return:$comment_id
     */
    public function commentAdd($id, $ori_user, $send_user, $content, $comm_type = 0, $cid = 0) {
    	$data = array(
    		$this->info_id => $id,
    		'send_user' => $send_user,			
    		'content' => $content,
    		'comment_type' => $comm_type,
    		'receive_cid' => $cid,
    		'receive_user' => $ori_user,
    		'create_time' => date('Y-m-d H:i:s'),
    	);
        if ($cid) {		//回复评论
            $ruser_id = $this->m->where('id='.$cid)->getField('send_user');
            if ($ruser_id) {
                $data['receive_user'] = $ruser_id;
            } else {
                return false;
            }
        }
        $comment_id = $this->m->add($data);
        //拆书包的回复评论都不发通知
       
        if ($comment_id) {
        	//评论数+1
        	CommonModel::addFieldCount($this->table, 'id='.$id, $this->count);
        	$redis=new RedisModel();
			if ($redis->isConnect()) {
				$redis->upNoteCount($id);
			}
			if ($this->table=='note') {
	        	//对应的用户收到消息通知
	        	$notify=new NotifyService();
	        	$notify->comment_notify($id, $send_user, $data['receive_user'], $content);
			}
            return $comment_id;
        } else {
            return false;
        }
    }
    
    /**
     * 获取评论列表
     * @param $id 动态id ,note_id bp_id的值 
     * @return:array
     */
    public function getCommentList($id, $offset, $limit) {
        $comment_list=array();
        $userM=new UserModel();
        
        //根据相关的id取这个id的评论列表
        $comment_list = $this->m->where($this->info_id.'= ' . $id)->order('create_time desc')->limit($offset,$limit)->select();
        if ($comment_list) {
	        foreach ($comment_list as $c) {			//把评论用户取出，被回复用户取出，以便取用户信息
	            $suser_arr[] = $c['send_user'];
	            if ($c['comment_type'] == 1) {		
	                $ruser_arr[] = $c['receive_user'];
	            }
	        }
			$suser_list=$userM->getUserInfo($suser_arr);
	        if (!empty($ruser_arr)) {
	            $ruser_list = $userM->getUserInfo($ruser_arr);
	        }
	        //把用户信息和评论的组合
	        foreach ($comment_list as $k => $comment) {
				$comment_list[$k]['user_data'] =$suser_list[$comment['send_user']];
	            $comment_list[$k]['reply_user_data'] =array('user_id'=>'','name'=>'','avatar'=>'');
	            if ($comment['comment_type'] == 1) {
					$comment_list[$k]['reply_user_data'] =$ruser_list[$comment['receive_user']];
	            }
	        }
        }
        return $comment_list;
    }
    /**
    * 查看对话(两人之间的评论)
    * @param  $id
    * @param  $send_user
    * @param  $receive_user
    * @date 2016-2-1
    * @return:
    */
    public function getCommentTalk($id, $send_user, $receive_user) {
    	$where=$this->info_id .'='. $id;
    	$where.=" and (send_user=$send_user and receive_user=$receive_user or send_user=$receive_user and receive_user=$send_user)";
    	$field='id,send_user as user_id,receive_user as user_id,content,create_time';
    	
    	$comment_list=$this->m->field($field)->where($where)->order('create_time asc')->select();
    	if ($comment_list) {
    		//查两方的用户信息
    		$user=new UserModel();
    		$user_list=$user->getUserInfo(array($send_user, $receive_user));
    		$list['talk_list']=$comment_list;
    		$list['meuser_data'] = $user_list[$send_user];
    		$list['tauser_data'] = $user_list[$receive_user];
    	}
    	return $list;
    }
    
    /**
    * 删除评论
    * @param $comment_id 
    * @date 2016-2-1
    * @return:
    */
    public function commentDel($comment_id, $user_id) {
    	$where="id=$comment_id and send_user=$user_id";
    	$id=$this->m->where($where)->getField($this->info_id);		//先取这个外键，为了把指定的count数字-1
    	
    	$res=$this->m->where($where)->delete();
    	if ($res) {
    		CommonModel::reduceFieldCount($this->table, 'id='.$id, $this->count);
    	}
    	return $res;
    }
}