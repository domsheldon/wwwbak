<?php
import('@.Service.NoteService');
import('@.Service.DiggService');
class ShareAction extends Action {
    public function share(){
        $task_id =(int)$this->_get('id');
        $cookie_name = $_COOKIE['time'.$task_id];

        $info = M('Task')->where('id='.$task_id)->find();

        $user = new UserModel();
        $user_info = $user->getUserInfo($info['user_id']);

        $note = new NoteService();
        $note_info=$note->getNoteInfo($task_id);
        foreach ($note_info as $k=>$v) {
            $note_info[$k]['content']=str_replace("\n", "<br/>", $v['content']);
        }

        $this->assign('info',$info);
        $this->assign('user_info',$user_info);
        $this->assign('note_info',$note_info[0]);
        $this->assign('cookie_name',$cookie_name);
        $this->display();
    }

    public function share_bak(){
    	$task_id =(int)$this->_get('id');
    	$cookie_name = $_COOKIE['time'.$task_id];
    	
        $info = M('Task')->where('id='.$task_id)->find();
        $this->assign('info',$info);
        $user = new UserModel();
        $task = new TaskModel();
        $task_detail = new TaskDetailModel();
        $user_info = $user->getUserInfo($info['user_id']);
        $word_count = $task->getTaskWordCount($task_id);

        $task_list=$task_detail->getTaskDetail($task_id);
		//对时间显示处理
		foreach ($task_list as $k=>$v) {
			$task_list[$k]['content']=str_replace("\n", "<br/>", $v['content']);
		}

        $this->assign('user_info',$user_info);
        $this->assign('word_count',$word_count);
        $this->assign('task_list',$task_list);
        $this->assign('cookie_name',$cookie_name);
        $this->display();
    }

    public function doDigg(){
    	$task_id =$this->_post('id');
    	$note_id =$this->_post('nid');
    	if ($_COOKIE['time'.$task_id]) {
			echo 'had_digg';exit;
		}
		setcookie('time'.$task_id, time(), time()+7*24*3600);			//对每个请求过来的都写入cookie
		
		$digg=new DiggService();
		$user_data = array(
			'sessionid' => $_COOKIE['PHPSESSID'],
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			'client_ip' => $_SERVER['REMOTE_ADDR'],
		);
		$digg->diggNote($task_id, $note_id, $user_data);		//点赞
        
        echo 'digg';exit;
    }

    public function share1(){
        $task_id =(int)$this->_get('id');
        $sql = "SELECT a.user_id,a.book_name,concat('".OSS_AVATAR."',avatar) as avatar,c.large_cover
                FROM ys_task a,ys_user_info b,ys_book c
                WHERE a.user_id = b.user_id AND a.book_id = c.book_id AND a.id =".$task_id;
        $model = M();
        $share_info = $model->query($sql);
        $this->assign('info',$share_info[0]);
        $this->display();
    }
}