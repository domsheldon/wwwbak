<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/2/3
 * Time: 10:28
 */
import('@.Service.NoteService');
import('@.Service.UserService');

class ShareAction extends Action
{
 /**
 * 随笔分享页面
 */
    public function note(){
        $note_id = $this->_get('note_id');
        $cookie_name = $_COOKIE['time'.$note_id];
//        echo $cookie_name;die();
        $service = new NoteService();
        $note = $service->getNoteInfo($note_id,1);
        $note_comment = $service->getCommentList('note',$note_id,0,50);
        $note['content']=str_replace("\n", "<br/>", $note['content']);

        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            $is_weixin = '1';
        }else{
            $is_weixin = '0';
        }

//        for($i=0;$i<count($note['img_str']);$i++) {
//            $str_img = $note['img_str'][$i];
//            $arr=explode('@',$str_img);
//            $str_img=$arr[0];
//            $note['img_str'][$i] = $str_img;
//        }

        $topic_list = M('Topic')->field('img,topic_title')->select();
        $this->assign('topic_list',$topic_list);

        $this->assign('note_info',$note);
        $this->assign('comment_list',$note_comment);
        $this->assign('is_digg',$cookie_name);//判断是否点赞
        $this->assign('is_weixin',$is_weixin);//标识打开的是否是微信内置浏览器
        $this->display();
    }
    //点赞
    public function doDigg(){
    	$note_id =$this->_post('note_id');
    	if ($_COOKIE['time'.$note_id]) {
			echo 'had_digg';exit;
		}
		setcookie('time'.$note_id, time(), time()+7*24*3600);			//对每个请求过来的都写入cookie
		
        CommonModel::addFieldCount('note', 'id='.$note_id, 'digg_count');
        echo 'digg';exit;
    }
    /**
     * 随笔分享页面
     */
    public function achieve(){
        $uid = $this->_get('uid');
        $model = new UserModel();
        $user = $model->getUserInfo(array($uid));

        $service = new UserService();
        $res = $service->getUserChengJiu($uid);
        $this->assign('achieve',$res);
        $this->assign('avatar',$user[$uid]['avatar']);
        $this->display();
    }
}