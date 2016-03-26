<?php

/**
 * Created by PhpStorm.
 * 处理微信公众号的各种消息请求
 * User: zhouyi
 * Date: 2016/1/25
 * Time: 11:59
 */
import('@.Service.ForumService');
import('@.Service.PlanBookService');
import('@.Service.RedisService');
use \LaneWeChat\Core\JSSDK;

class WeChatDiscussAction extends WebCommonAction{
    /**
     * 校验用户是否登陆
     * @return mixed
     */
    private function checkUserInfo(){
        $service = new RedisService();
        $userInfo = $service->getSession(session_id());

        if(empty($userInfo)) {
            //************************临时代码，模拟用户登录**************************//
//            $data = array(
//                'user_id'=>172,
//                'user_name'=>'luluo'
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
            return $userInfo['user_id'];
        }
    }
    /**
     * 某本书的问题列表
     */
    public function discusslist(){
        $uid = $this->checkUserInfo();
        $book_id = $_GET['book_id'];
        //是否是取精华帖
        $is_top = $_GET['is_top'];

        if(empty($book_id)) {
            $book_id = $this->_post('book_id');
        }

        //判断该用户是否有新的消息
        $msg_count = M('NoteComment')->where('receive_user='.$uid.' and read_flag=0')->count();
        $model = M();
        $digg_count = $model->table('rw_note a,rw_note_digg b')
            ->where('a.id = b.note_id and a.user_id='.$uid.' and b.read_flag=0')->count();
        if($digg_count>0 || $msg_count>0){
            $this->assign('has_new_msg',1);
        }else{
            $this->assign('has_new_msg',0);
        }

        $planBook = new PlanBookService();
        $bookName = $planBook->getBookById($book_id);
        $this->assign('bookName',$bookName);
        $this->assign('book_id',$book_id);
        $this->assign('is_top',$is_top);
        $this->display();
    }

    /**
     * 某本书的问题列表，分页获取
     */
    public function displayforum(){
        $is_top = $_POST['is_top'];

        $uid = $this->checkUserInfo();
        $page = $this->_post('page');
        $book_id = $this->_post('book_id');
        $topic = $this->_post('topic');
        $service = new ForumService();

        //替换热门话题随笔中的##，加入超链
        $forumList = $service->getForumListByPage($uid, $book_id,$page,$is_top,$topic);
        for($i=0;$i<count($forumList);$i++) {
            $matches = array();
            $arr = array();
            $str = $forumList[$i]['content'];
            preg_match_all("/#(.+?)#/", $str, $matches);
            foreach ($matches[1] as $val) {
                if (empty($topic)) {
                    $str = str_replace('#' . $val . '#', '<a style="color:firebrick;" href="/topic/topicnote?topic=' . $val . '">#' . $val . '#</a>', $str);
                } else {
                    $str = str_replace('#' . $val . '#', '<span style="color:firebrick;">#' . $val . '#</span>', $str);
                }
            }

            $forumList[$i]['content'] = $str;

            if (!empty($forumList[$i]['img_str'])) {
                $img_str = $forumList[$i]['img_str'];
                $arr_img = explode(',', $img_str);
                foreach ($arr_img as $img) {
                    $arr[] = OSS_COVER . $img;
                }
                $forumList[$i]['img_str'] = $arr;
            }
        }

        if(empty($forumList)){
            echo  "";
        }else{
            $this->assign('uid',$uid);
            $this->assign('forumList',$forumList);
            if($uid==172 || $uid == 236 || $uid == 628){
                $this->assign('dotop_flag',1);
            }else{
                $this->assign('dotop_flag',0);
            }
            $this->display();
        }
    }

    /**
     * 问题讨论区
     */
    public function discuss(){
        $uid = $this->checkUserInfo();
        $page = $this->_post('page');
        $note_id = I('get.noteId');
        if(empty($page)){
            $page=1;
        }
        if(empty($note_id)){
           $note_id = $this->_post('note_id');
        }

        M('Note')->where('id='.$note_id)->setInc('read_count');

        $service = new ForumService();
        $discussInfo = $service->detailCommentForum($uid, $note_id,$page);
        $isDigg = $service->isDigg($uid,$note_id);
        if(empty($isDigg)){
            $this->assign('diggStatus',0);
        }else{
            $this->assign('diggStatus',1);
        }

        $discussInfo['content']=str_replace("\n", "<br/>", $discussInfo['content']);
        if (!empty($discussInfo['img_str'])) {
            $img_str = $discussInfo['img_str'];
            $arr_img = explode(',', $img_str);
            foreach ($arr_img as $img) {
                $arr[] = OSS_COVER . $img;
            }
            $discussInfo['img_str'] = $arr;
        }


        //获取微信分享相关的数据
        vendor('Lanewechat.lanewechat');
        $jssdk = new \LaneWeChat\Core\JSSDK(WECHAT_APPID, WECHAT_APPSECRET);
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage',$signPackage);

        $this->assign('discussInfo',$discussInfo);
        $this->assign('discussComm',$discussInfo['list']);
        $this->display();
    }

    /**
     * 问题评论区域
     */
    public function displaycom(){
        $uid = $this->checkUserInfo();
        $page = $this->_post('page');
        $note_id = I('get.noteId');
        if(empty($note_id)){
            $note_id = $this->_post('noteId');
        }

        $service = new ForumService();
        $discussInfo = $service->detailCommentForum($uid, $note_id,$page);

        if(empty($discussInfo['list'])){
            echo  "";
        }else{
            $this->assign('discussInfo',$discussInfo);
            $this->assign('discussComm',$discussInfo['list']);
            $this->assign('uid',$uid);
            $this->display();
        }
    }

    /**
     * 问题讨论区评论问题
     */
    public function comment(){
        $uid = $this->checkUserInfo();

        $note_id = $_POST['noteId'];
        $content = $_POST['commContent'];//form提交获取方式
        $send_user = $uid;
        $comment_type = $this->_post('comment_type');
        $receive_user = $this->_post('receive_user');

        $forum=new ForumService();
        $list = $forum->commentForum($uid, $note_id, $content, $send_user, $receive_user,$comment_type);
        //发送评论消息
        $redis = new RedisService();
        $redis->groupRankMsg($uid,'comment');

        //如果是ajax请求，直接返回
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            return;
        }
        if(empty($note_id)||empty($content)||empty($send_user)||empty($receive_user)){
            echo "论坛评论无效";
            return false;
        }
        elseif(empty($list)) {
            echo "该问题已经被删除或不存在，评论无效";
            return false;
        }
        else{
            $this->redirect("/wechatdiscuss/discuss/$note_id");
        }
    }

    /**
     * 问题顶
     */
    public function digg(){
        $uid = $this->checkUserInfo();
        $note_id = $this->_post('note_id');
        $forum=new ForumService();
        $list = $forum->diggForum($uid, $note_id);

        //取发动态的原用户id，为了消息通知
        $ori_user_id = M('Note')->where('id='.$note_id)->getField('user_id');
        //发送点赞消息
        $redis = new RedisService();
        $redis->groupRankMsg($ori_user_id,'digg');

        if(!empty($list)){
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','该讨论问题不存在或已被删除！');
        }
    }

    /**
     * 问题取消顶
     */
    public function undigg(){
        $uid = $this->checkUserInfo();
        $note_id = $this->_post('note_id');
        $forum=new ForumService();
        $list = $forum->UndiggForum($uid, $note_id);

        
        if(isset($list)){
        	//取发动态的原用户id，为了消息通知
	        $ori_user_id = M('Note')->where('id='.$note_id)->getField('user_id');
	        //发送取消点赞消息
	        $redis = new RedisService();
	        $redis->groupRankMsg($ori_user_id,'undigg');
	        	
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛取消顶无效');
        }
    }

    /**
     * 论坛问题加精或取消
     */
    public function dotop(){
        $flag= $this->_post('top_flag');
        $note_id = $this->_post('note_id');
        if(!empty($note_id)){
            $arr = Array('id'=>$note_id,
                'is_top'=>$flag);
            $model = M('Note');
            $model->save($arr);
            $this->ajaxReturn();
        }else{
            return 0;
        }
    }

    public function addforum(){
        $uid = $this->checkUserInfo();
        $book_id = $this->_post('book_id');
        $forum_content = $this->_post('note_content');
        $forum_title = $this->_post('note_title');
        $imgs = $this->_post('img');

        //上传的图片保存到oss
        $arr_img = '';
        foreach($imgs as $imageFile) {
            $arr_img[] = $this->upload_note_img(trim($imageFile));
            unlink($imageFile);
        }
        $img_str = implode(',',$arr_img);
        if(empty($img_str)){
            $img_str = '';
        }
        $forum = new ForumService();
        $note_id = $forum->addEditForum($uid,$book_id,$forum_title,$forum_content,'',$img_str);

        //把note数据存入哈希类型
        $res=M('Note')->where('id='.$note_id)->find();
        $redis=new RedisModel();
        if ($redis->isConnect() !== false)	{
            $redis->setNoteRedis($note_id, $res);
            $redis->close();
        }

        //查找内容中的双#，把话题的参加人数+1
        $matches = array();
        preg_match_all("/#(.+?)#/", $forum_content, $matches);
        foreach($matches[1] as $val) {
            M('Topic')->where("topic_title = '$val'")->setInc('join_nums',1);
        }

        //发送点赞消息
        $redis = new RedisService();
        $redis->groupRankMsg($uid,'note');

        if(empty($matches[1])){
            $this->redirect('/wechatdiscuss/discusslist');
        }else{
            $this->redirect('/topic/topicnote?topic='.$matches[1][0]);
        }
    }

    /**
     * 问题评论删除
     * @param $uid 	用户id
     * @param $note_id 	论坛id
     * @param $comment_id 	评论id
     */
    public function deletecomment(){
        $uid = $this->checkUserInfo();
        $note_id = $this->_post('note_id');
        $comment_id = $this->_post('comment_id');
        $forum=new ForumService();
        $list = $forum->UncommentForum($uid, $note_id,$comment_id);
        if(isset($list)){
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛评论删除无效');
        }
    }

    /**
     * 问题删除
     * @param $uid 	用户id
     * @param $note_id 	论坛id
     */
    public function deleteforum(){
        $uid = $this->checkUserInfo();
        $note_id = $this->_post('note_id');
        $note_info = M('Note')->where('id='.$note_id)->find();
        $book_id = $note_info['book_id'];
        $uid = $note_info['user_id'];

        $forum=new ForumService();
        $list = $forum->DeleteForum($uid, $note_id);
        if(isset($list)){
            //从redis中删除该条随笔
            $redis=new RedisModel();
            if ($redis->isConnect() !== false)	{
                $redis->delNoteRedis($note_id,$uid,$book_id);
                $redis->close();
            }
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','论坛问题删除无效');
        }
    }

    public function upload()
    {
        $base64_string = $_POST['base64_string'];
        $data=base64_decode($base64_string);
        $savename = uniqid().'.jpeg';//localResizeIMG压缩后的图片都是jpeg格式]
        $savepath = 'public/upload_img/'.$savename;
        if($base64_string){
            file_put_contents($savepath, $data);
            echo '{"status":1,"content":"上传成功","url":"'.$savepath.'"}';
        }else{
            echo '{"status":0,"content":"上传失败"}';
        }
    }

    private function upload_note_img($filename){
        //上传头像
        $bucket='book-cover';
        $object='readwith/'.date('Ymd');
        $oss=new OssAction();
        $file=$oss->oss_upload_file($bucket,$object,$filename);
        return $file;
    }

    public function getBookList(){
        $model = new PlanBookModel();
        echo json_encode($model->getList());
    }
}