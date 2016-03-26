<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/1/31
 * Time: 23:08
 */
import('@.Service.RedisService');
class UserCenterAction extends Action
{
    public function index(){
        //获取用户信息
        $userInfo = $this->checkUserInfo();
        $uid = $userInfo['user_id'];
        $msg_count = M('NoteComment')->where('receive_user='.$uid.' and read_flag=0')->count();

        $model = M();
        $digg_count = $model->table('rw_note a,rw_note_digg b')
            ->where('a.id = b.note_id and a.user_id='.$uid.' and b.read_flag=0')->count();
        $this->assign('user_info',$userInfo);
        $this->assign('digg_count',$digg_count);
        $this->assign('msg_count',$msg_count);
        $this->display();
    }

    public function myforum(){
        $userInfo = $this->checkUserInfo();
        $uid = $userInfo['user_id'];

        $model = M();
        $forumList = $model->table('rw_note b')
                ->join('rw_user_info a on b.user_id=a.user_id')
                ->where('b.user_id = '.$uid)
                ->field(array('b.id', 'b.book_id', 'b.user_id', "IF(LOCATE('http://',avatar),avatar,concat('" . OSS_AVATAR . "',a.avatar,'@100w'))" => 'avatar',
                    'b.title', 'b.digg_count', 'b.comment_count', 'a.name', 'b.create_time', 'b.content'))
                ->order('b.create_time desc')
                ->select();
        $this->assign('forumList',$forumList);

        $this->display();
    }

    public function mymsg(){
        $userInfo = $this->checkUserInfo();
        $uid = $userInfo['user_id'];

        $model = M();
        $commList = $model->table('rw_note a,rw_note_comment b')
            ->join('rw_user_info c on b.send_user=c.user_id')
            ->where('a.id=b.note_id and b.receive_user = '.$uid)
            ->field(array('a.id', 'a.title','c.name','b.content','b.create_time','b.read_flag','b.id'=>'comment_id'))
            ->order('b.read_flag,b.create_time desc')
            ->select();
        $this->assign('uid',$uid);
        $this->assign('commList',$commList);
        $this->display();
    }

    public function msgread(){
        $userInfo = $this->checkUserInfo();
        $uid = $userInfo['user_id'];
        $comment_id = $this->_post('comment_id');

        $model = M();
        $model->execute('update rw_note_comment set read_flag=1 where id='.$comment_id);
    }

    public function mydigg(){
        $userInfo = $this->checkUserInfo();
        $uid = $userInfo['user_id'];

        $model = M();
        $diggList = $model->table('rw_note a,rw_note_digg b')
            ->join('rw_user_info c on b.digg_user = c.user_id')
            ->where('a.id=b.note_id and a.user_id='.$uid)
            ->field(array('a.id', 'a.title','c.name','b.create_time','b.id'=>'digg_id','b.read_flag'))
            ->order('b.read_flag,b.create_time desc')
            ->select();
        $this->assign('uid',$uid);
        $this->assign('diggList',$diggList);
        $this->display();
    }

    public function diggread(){
        $userInfo = $this->checkUserInfo();
        $digg_id = $this->_post('digg_id');

        $model = M();
        $model->execute('update rw_note_digg set read_flag=1 where id='.$digg_id);
    }



    /**
     * 校验前端微信用户是否登陆
     * @return mixed
     */
    private function checkUserInfo(){
        $service = new RedisService();
        $userInfo = $service->getSession(session_id());

        if(empty($userInfo)) {
            //************************临时代码，模拟用户登录**************************//
//            $data = array(
//                'user_id'=>172,
//                'name'=>'罗罗925',
//                'avatar' => 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLCtXXnrF4POjbuTzEFk7suN1lNQfiaL8pEib9ic01Vo8ZLJibNJXeP9asjZlhXl27FNUrGoAMXRXicHacg/0'
//            );
//
//            $redis = new Redis();
//            $redis->connect(REDIS_HOST,REDIS_PORT);
//            $redis->set(session_id(),json_encode($data));
//            $redis->close();
            //*************************************************//
            $error_info = '您没有登录，无法进行后续操作！';
            $this->redirect('/errorInfo?info='.$error_info);
        }else{
            return $userInfo;
        }
    }
}