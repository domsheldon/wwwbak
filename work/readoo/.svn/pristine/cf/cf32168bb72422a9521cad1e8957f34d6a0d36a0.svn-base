<?php

/**
 * Created by PhpStorm.
 * 处理微信公众号的各种消息请求
 * User: qyluo
 * Date: 2016/1/6
 * Time: 11:59
 */
import('@.Service.RedisService');
import('@.Service.PlanBookService');
import('@.Service.WechatMenuService');
import('@.Model.PlanBookModel');

use LaneWeChat\Core\WeChat;
use LaneWeChat\Core\WeChatOAuth;
use LaneWeChat\Core\UserManage;
use LaneWeChat\Core\ResponseInitiative;
use \LaneWeChat\Core\Menu;
use \LaneWeChat\Core\Media;
use \LaneWeChat\Core\JSSDK;
import('@.ORG.Net.Http');

class WeChatAction extends Action
{
    public static $time = "";
    public static $access_token ="";
    /**
     * 鉴权接口，用于提交给微信判断接口是否合法
     * @throws Exception
     */
    public function valid()
    {
        vendor('Lanewechat.lanewechat');
        $wechat = new WeChat(WECHAT_TOKEN, TRUE);
//        echo $wechat->checkSignature();

        echo $wechat->run();
    }
    /**
     * 第1步.共读入口,跳转到getUserInfo
     */
    public function readlist(){
        vendor('Lanewechat.lanewechat');
        $msg = $this->_get('msg');
        $token = $this->_get('token');
        $service = new RedisService();
        $user_info = $service->getSession(session_id());
        //如果为空，则需要通过微信授权获取信息
        if(empty($user_info)) {
            //第一步，获取CODE
            WeChatOAuth::getCode("/wechat/userinfo?msg=$msg&token=$token", 1, 'snsapi_userinfo');
        }else{
            $this->redirect("wechat/userinfo?msg=$msg&token=$token");
        }
    }

    /**
     * 第2步.判断msg参数，跳转到不同的页面，
     * msg为空：到我的成就页面
     * msg=1：到有书圈
     * msg为其他：到签到页面
     */
    public function getUserInfo(){
        $msg = $this->_get('msg');
        //查看session中是否保存该用户信息
        $service = new RedisService();
        $user_info = $service->getSession(session_id());

        //如果为空，则需要通过微信授权获取信息
        if(empty($user_info)){
            $user_id = $this->wechatUser();
        }else{
            $user_id = $user_info['user_id'];
        }
        if(empty($msg)){
            $this->redirect("wechat/bkList?user_id=$user_id");
        }elseif($msg=='1'){
            $this->redirect("wechatdiscuss/discusslist");
        }
        //微信群入群认证
        elseif($msg=='joingroup'){
            $token = $this->_get('token');
            $this->redirect("add/group?token=$token&user_id=$user_id");
        }
        //群组积分情况
        elseif(trim($msg) == 'groupchengjiu'){
            $this->redirect("/chengjiu?user_id=$user_id");
        }else{
            $this->redirect("wechat/gongdu?msg=$msg&user_id=$user_id");
        }
    }

    /**
     * 进入书单页面，此时用户信息己插入到user_info表
     * 需要判断用户是否已经加入共读计划，显示不同的效果
     */
    public function bookList(){
        $user_id = $_GET['user_id'];
        if(empty($user_id)){
            echo 'Error info :No user_id!';
            exit;
        }
        //查看session中是否保存该用户信息
        $service = new RedisService();
        $userInfo = $service->getSession(session_id());
        $user_id = $userInfo['user_id'];
        //获取本月共读书单
        $model = new PlanBookModel();
        $bk_list = $model->getMonthBkList();

        $plan_user = new PlanUserModel();
        $user_sign = $plan_user->getUserStatInfo($user_id);

        //判断用户是否加入共读计划
        $res = $plan_user->isPlanUser($user_id);
        if(empty($res)){
            //未加入，则标识为0
            $flag = 0;
        }else{
            $flag = 1;
        }

        //获取分享相关的数据
        vendor('Lanewechat.lanewechat');
        $jssdk = new \LaneWeChat\Core\JSSDK(WECHAT_APPID, WECHAT_APPSECRET);
        $signPackage = $jssdk->GetSignPackage();

        //获取拆书包的url
        $redis = new RedisService();
        $redis->setPackUrl();
        $pack_url = $redis->getPackUrl();

        $this->assign('signPackage',$signPackage);
        $this->assign('is_join',$flag);
        $this->assign('bkList',$bk_list);
        $this->assign('user_id',$user_id);
        $this->assign('user_sign',$user_sign);
        $this->assign('pack_url',$pack_url);
        $this->display();
    }

    /**
     * 第3步.共读接口，用户获取用户信息，并展现共读界面
     */
    public function gongdu(){
        $user_id = $_GET['user_id'];

        //添加打开信息{"plan":1,"pack":1}
        $msg = $this->_get('msg');
        $base64 = base64_decode($msg);
        $json = json_decode($base64,true);

        if(empty($user_id)){
            echo 'Error info :No user_id!';
            exit;
        }
        //查看session中是否保存该用户信息
        $service = new RedisService();
        $userInfo = $service->getSession(session_id());

        $avatar = $userInfo['avatar'];
        $user_id = $userInfo['user_id'];
        $plan_id = $json['plan'];
        $pack = $json['pack'];

        if(!empty($user_id) && !empty($plan_id) && !empty($pack)) {
            $time = date("Y-m-d",time());
            $sql = "select * from rw_book_pack where id = $pack and date_format(pub_time,'%Y-%m-%d') >= '$time'";
            $res = M()->query($sql);
            if(empty($res)){
                $info = '抱歉，您错过打卡时间了，下次加油哦<br>';
            }else {
                $bpdModel = new BookPackCheckModel();
                $digg = array(
                    'pb_id' => $plan_id,
                    'user_id' => $user_id,
                    'pack_id' => $pack
                );
                $bpdModel->addDigg($digg);
                $info = '您已成功签到<br>';
            }
        }else{
            $info = '点击拆书包的"阅读原文"链接签到<br>';
        }

        //获取微信分享相关的数据
        vendor('Lanewechat.lanewechat');
        $jssdk = new \LaneWeChat\Core\JSSDK(WECHAT_APPID, WECHAT_APPSECRET);
        $signPackage = $jssdk->GetSignPackage();

        $plan_user = new PlanUserModel();
        $data = $plan_user->getUserStatInfo($user_id);
        //自动把用户加入到共读计划
        $plan_user->addPlanUser($user_id,1);

        if(strstr($userInfo['avatar'],'http://') == false){
            $avatar =  OSS_AVATAR .$avatar;
        }

        $this->assign('signPackage',$signPackage);
        $this->assign('user_stat',$data);
        $this->assign('info',$info);
        $this->assign('avatar',$avatar);
        $this->assign('user_id',$user_id);
        $this->display();
    }

    /*
     * 分享我的成就
     */
    public function chengjiu(){
        $user_id = $_GET['id'];

        $model = new UserModel();
        $userInfo = $model->getUserInfo($user_id);

        $info = '点击拆书包的"阅读原文"链接签到<br>';
        //获取微信分享相关的数据
        vendor('Lanewechat.lanewechat');
        $jssdk = new \LaneWeChat\Core\JSSDK(WECHAT_APPID, WECHAT_APPSECRET);
        $signPackage = $jssdk->GetSignPackage();

        $plan_user = new PlanUserModel();
        $data = $plan_user->getUserStatInfo($user_id);

        $this->assign('signPackage',$signPackage);
        $this->assign('user_stat',$data);
        $this->assign('info',$info);
        $this->assign('avatar',$userInfo['avatar']);
        $this->assign('user_id',$user_id);
        $this->display('gongdu');
    }

    /**
     * 内部函数，通过微信公众号接口调用
     * @return mixed
     */
    private function wechatUser(){
        //调用微信接口
        vendor('Lanewechat.lanewechat');
        $code = $_GET['code'];
        //第二步，获取access_token网页版
        $openId = WeChatOAuth::getAccessTokenAndOpenId($code);
        //判断用户是否已经在内存中，如果在则不需要再获取用户信息
        $user_model = new UserModel();
        $userInfo = $user_model->getUserByOpenid($openId['openid']);
        $user_id = $userInfo['user_id'];
        if(empty($userInfo)) {
            //第三步，获取用户信息
            $userInfo = UserManage::getUserInfo_new($openId);

//         $userInfo = UserManage::getUserInfo($openId['openid']);//此方法是通过全局access_token获取用户资料
            //用户头像保存到阿里OSS
            $avatar = $this->downUp($userInfo['headimgurl']);

            //组装从微信获取的用户信息
            $create_time = date('Y-m-d H:i:s');
            $data_login = Array(
                'open_id' => $userInfo['openid'],
                'union_id' => $userInfo['unionid'],
                'create_time' => $create_time
            );
            $data_info = Array(
                'name' => $userInfo['nickname'],
                'sex' => $userInfo['sex'],
                'avatar' =>$avatar,
                'create_time' => $create_time
            );
            //添加用户信息
            $user_id = $user_model->addWechatUser($data_login,$data_info);
        }
        //由于之前的错误导致用户头像存储截断，需要重新保存此部分头像
        elseif(strlen($userInfo['avatar'])==50 || (strstr($userInfo['avatar'],'http://') !== false)){
            //第三步，获取用户信息
            $userInfo = UserManage::getUserInfo_new($openId);
            $avatar = $this->downUp($userInfo['headimgurl']);

            $data = Array(
                'name' => $userInfo['nickname'],
                'sex' => $userInfo['sex'],
                'avatar' => $avatar,
                'user_id' => $user_id
            );
//            $data['create_time']=date('Y-m-d H:i:s');
            M('UserInfo')->where("user_id=$user_id")->save($data);
        }

        //把用户信息存到redis中
        $service = new RedisService();
        //通过open_id从数据库中查询用户信息，然后保存到redis中
        $service->setSession(session_id(),$openId['openid']);
        return $user_id;
    }

    public function downUp($url) {
        $local='./public/upload_img/'.uniqid().'.jpg';
        Http::curlDownload($url, $local);
        $cover=$this->book_upload_cover($local);
        unlink($local);
        return $cover;
    }
    /**
     * 给OSS上传图书封面
     * @param string $dir 本地图片路径
     * @param string $dir oss上存储的名字
     */
    private function book_upload_cover($filename){
        //上传头像
        $bucket='fengwo-avatar';
        $object='readwith/'.date('Ymd');
        $oss=new OssAction();
        $file=$oss->oss_upload_file($bucket,$object,$filename);
        return $file;
    }

    /**
     *加入共读计划
     */
    public function joinPlan(){
        $user_id = $this->_post('user_id');
        $plan_user = new PlanUserModel();
        $plan_user->addPlanUser($user_id,1);
    }

    /**
     * 退出共读计划
     */
    public function quitPlan(){
        $user_id = $this->_post('user_id');
        $plan_user = new PlanUserModel();
        $plan_user->delPlanUser($user_id);
    }

    public function paihang(){
//        $service = new WechatMenuService();
//        $menuList=$service->menu();
//        vendor('Lanewechat.lanewechat');
//        \LaneWeChat\Core\Menu::setMenu($menuList);
        vendor('Lanewechat.lanewechat');
        //获取ACCESS_TOKEN
        $accessToken = \LaneWeChat\Core\AccessToken::getAccessToken();
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$accessToken;
        $data = json_encode(array('type'=>'news', 'offset'=>0,'count'=>10));
        $res =  \LaneWeChat\Core\Curl::callWebServer($queryUrl, $data, 'POST');
//        foreach($res['item'] as $item){
//            echo $item['MEDIA_ID'].'<br/>';
////            echo $item['content']['news_item']['title'].'<br/>';
//        }
//        die();
    }


    public function redis(){
        $redis=new RedisModel();
        if ($redis->isConnect() !== false)	{
            $redis->setNoteAllRedis();
            $redis->close();
        }
    }
}