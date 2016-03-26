<?php
namespace LaneWeChat\Core;
/**
 * 处理请求
 * Created by Lane.
 * User: lane
 * Date: 13-12-19
 * Time: 下午11:04
 * Mail: lixuan868686@163.com
 * Website: http://www.lanecn.com
 */
use \RedisService;
use \WechatReplyModel;
class WechatRequest{
    /**
     * @descrpition 分发请求
     * @param $request
     * @return array|string
     */
    public static function switchType(&$request){
        $data = array();
        switch ($request['msgtype']) {
            //事件
            case 'event':
                $request['event'] = strtolower($request['event']);
                switch ($request['event']) {
                    //关注
                    case 'subscribe':
                        //二维码关注
                        if(isset($request['eventkey']) && isset($request['ticket'])){
                            $data = self::eventQrsceneSubscribe($request);
                        //普通关注
                        }else{
                            $data = self::eventSubscribe($request);
                        }
                        break;
                    //扫描二维码
                    case 'scan':
                        $data = self::eventScan($request);
                        break;
                    //地理位置
                    case 'location':
                        $data = self::eventLocation($request);
                        break;
                    //自定义菜单 - 点击菜单拉取消息时的事件推送
                    case 'click':
                        $data = self::eventClick($request);
                        break;
                    //自定义菜单 - 点击菜单跳转链接时的事件推送
                    case 'view':
                        $data = self::eventView($request);
                        break;
                    //自定义菜单 - 扫码推事件的事件推送
                    case 'scancode_push':
                        $data = self::eventScancodePush($request);
                        break;
                    //自定义菜单 - 扫码推事件且弹出“消息接收中”提示框的事件推送
                    case 'scancode_waitmsg':
                        $data = self::eventScancodeWaitMsg($request);
                        break;
                    //自定义菜单 - 弹出系统拍照发图的事件推送
                    case 'pic_sysphoto':
                        $data = self::eventPicSysPhoto($request);
                        break;
                    //自定义菜单 - 弹出拍照或者相册发图的事件推送
                    case 'pic_photo_or_album':
                        $data = self::eventPicPhotoOrAlbum($request);
                        break;
                    //自定义菜单 - 弹出微信相册发图器的事件推送
                    case 'pic_weixin':
                        $data = self::eventPicWeixin($request);
                        break;
                    //自定义菜单 - 弹出地理位置选择器的事件推送
                    case 'location_select':
                        $data = self::eventLocationSelect($request);
                        break;
                    //取消关注
                    case 'unsubscribe':
                        $data = self::eventUnsubscribe($request);
                        break;
                    //群发接口完成后推送的结果
                    case 'masssendjobfinish':
                        $data = self::eventMassSendJobFinish($request);
                        break;
                    //模板消息完成后推送的结果
                    case 'templatesendjobfinish':
                        $data = self::eventTemplateSendJobFinish($request);
                        break;
                    default:
                        return Msg::returnErrMsg(MsgConstant::ERROR_UNKNOW_TYPE, '收到了未知类型的消息', $request);
                        break;
                }
                break;
            //文本
            case 'text':
                $data = self::text($request);
                break;
            //图像
            case 'image':
                $data = self::image($request);
                break;
            //语音
            case 'voice':
                $data = self::voice($request);
                break;
            //视频
            case 'video':
                $data = self::video($request);
                break;
            //小视频
            case 'shortvideo':
                $data = self::shortvideo($request);
                break;
            //位置
            case 'location':
                $data = self::location($request);
                break;
            //链接
            case 'link':
                $data = self::link($request);
                break;
            default:
                return ResponsePassive::text($request['fromusername'], $request['tousername'], '收到未知的消息，我不知道怎么处理');
                break;
        }
        return $data;
    }


    /**
     * @descrpition 文本
     * @param $request
     * @return array
     */
    public static function text(&$request){
        $msg = $request['content'];
        $redis = new RedisService();
        $keywords = $redis->getReply();
        foreach($keywords as $val){
            $tmparray = explode($val['keyword'],$msg);
            //如果包含该关键词
            if(count($tmparray)>1) {
                $content = $val['content'];
                if($val['type'] == 'text'){
                    $content = str_replace("&amp;","&",$content);
                    return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
                }elseif($val['type'] == 'img' && !empty($val['media_id'])){
                    return ResponsePassive::image($request['fromusername'], $request['tousername'], $val['media_id']);
                }
            }
        }

        $content = "腹中有书气自华
有书力求为书友打造一个高质量的领读平台
加入有书共读群的书友们一定要买书跟读哦";
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 图像
     * @param $request
     * @return array
     */
    public static function image(&$request){
        $model = new WechatReplyModel();
        $keywords = $model->wechatreply();
        foreach($keywords as $val){
            if($val['keyword'] == 'image.youshu.cc'){
                $content = $val['content'];
                return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
            }
        }

        $content = '收到图片';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 语音
     * @param $request
     * @return array
     */
    public static function voice(&$request){
        if(!isset($request['recognition'])){
            $content = '收到语音';
            return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
        }else{
            $content = '收到语音识别消息，语音识别结果为：'.$request['recognition'];
            return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
        }
    }

    /**
     * @descrpition 视频
     * @param $request
     * @return array
     */
    public static function video(&$request){
        $content = '收到视频';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 视频
     * @param $request
     * @return array
     */
    public static function shortvideo(&$request){
        $content = '收到小视频';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 地理
     * @param $request
     * @return array
     */
    public static function location(&$request){
        $content = '收到上报的地理位置';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 链接
     * @param $request
     * @return array
     */
    public static function link(&$request){
        $content = '收到连接';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 关注
     * @param $request
     * @return array
     */
    public static function eventSubscribe(&$request){
        $model = new WechatReplyModel();
        $keywords = $model->wechatreply();
        foreach($keywords as $val){
            if($val['keyword'] == 'youshu.cc'){
                $content = $val['content'];
                return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
            }
        }

        $content = "终于等到你！

欢迎报名加入有书共读，一起组队对抗惰性。

加入有书共读，全年汲取52本书的营养，你心动了吗？[爱心]

有书公众号，工作日每天早上6:30准时推送两篇“领读精华包”，带大家每周共读一本书。

享受更多的共读乐趣，您只需点击左下方菜单栏“我要报名”，长按群二维码，扫描入群。

近百位书友正在等你组队对抗惰性，一起分享读书的乐趣！你还在等什么！
";
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 取消关注
     * @param $request
     * @return array
     */
    public static function eventUnsubscribe(&$request){
//        $content = '希望您继续关注有书，谢谢。';
//        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 扫描二维码关注（未关注时）
     * @param $request
     * @return array
     */
    public static function eventQrsceneSubscribe(&$request){
        $content = '欢迎您关注我们的微信，将为您竭诚服务';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 扫描二维码（已关注时）
     * @param $request
     * @return array
     */
    public static function eventScan(&$request){
        $content = '您已经关注了哦～';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 上报地理位置
     * @param $request
     * @return array
     */
    public static function eventLocation(&$request){
        $content = '收到上报的地理位置';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 点击菜单拉取消息时的事件推送
     * @param $request
     * @return array
     */
    public static function eventClick(&$request){
		//获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到点击菜单事件，您设置的key是' . $eventKey;


        //如果菜单是获取二维码
        if($eventKey == 'V1001_JOIN'){
            $redis = new RedisService();
            //从redis中获取该session_id的mediaid
            $s_data = json_decode($redis->getMediaId($request['fromusername']),true);

            $s_mid = $s_data['media_id'];
            $res = json_decode($redis->getActiveCustService(),true);

            //如果是有书群，直接返回该群号
            if((strstr($s_data['cust_type'], '有书群') !== false) && !empty($s_mid)){
                return ResponsePassive::image($request['fromusername'], $request['tousername'],$s_mid);
            }

            if(isset($res)) {
                $flag= false;
                //判断缓存中保存的上次发送的二维码客服是否是激活的，如果是，则继续发生该图片，如果否则随机分配
                if(strstr(json_encode($res),$s_mid) !== false){
                    $flag =  true;
                }

                if ($flag && !empty($s_mid)) {
                    $qr_code_media_id = $s_mid;
                } else {
                    //判断用户的归属地，如果客服号中有专属的客服号，则分配该客服号
                    $userInfo = UserManage::getUserInfo($request['fromusername']);
                    $province = $userInfo['province'];
                    $city = $userInfo['city'];

                    //临时数组，保存匹配该用户的所有客服号
                    $arr_tmp = array();
                    //用来保存其他的非匹配的客服号
                    $arr_tmp_other = array();
                    foreach($res as $value){
                        if((!empty($province) && strstr($value['cust_type'],$province) !== false) ||
                            (!empty($city) && strstr($value['cust_type'],$city) !== false)){
                            $arr_tmp[] = $value;
                        }
                        //包含有书群的数据，不参与随机分配
                        elseif((strstr($value['cust_type'], '有书群,') == false)
                        && (strstr($value['cust_type'], '有书群，') == false)){
                            $arr_tmp_other[] = $value;
                        }
                    }

                    //核心分配算法部分，初次的分配都在下面的逻辑中
                    //如果没有匹配的专属客服号，则随机分配
                    if(empty($arr_tmp)){
                        //如果没有专属客服，则优先分配到arr_tmp_other
                        if(!empty($arr_tmp_other)){
                            $sel = rand(1, count($arr_tmp_other));
                            $qr_code_media_id = $arr_tmp_other[$sel - 1]['media_id'];
                            $qr_code_cust_type = $arr_tmp_other[$sel - 1]['cust_type'];
                        }
                        //如果arr_tmp为空，同时arr_tmp_other为空，则发送到临时群
//                        else{
//                            $model = new WechatReplyModel();
//                            $keywords = $model->wechatreply();
//                            foreach($keywords as $val){
//                                if($val['keyword'] == '进不去'){
//                                    $content = $val['content'];
//                                    return ResponsePassive::image($request['fromusername'], $request['tousername'], $content);
//                                }
//                            }
//                        }
//                        else{
//                            $sel = rand(1, count($res));
//                            $qr_code_media_id = $res[$sel - 1]['media_id'];
//                            $qr_code_cust_type = $res[$sel - 1]['cust_type'];
//                        }
                    }else {
                        $sel = rand(1, count($arr_tmp));
                        $qr_code_media_id = $arr_tmp[$sel - 1]['media_id'];
                        $qr_code_cust_type = $arr_tmp[$sel - 1]['cust_type'];
                    }
                    //如果是新分配的二维码，则需要把send_counts计数器+1
                    if(strstr($qr_code_cust_type, '有书群') !== false){
                        M()->execute("update rw_cust_service set send_counts = 1 + send_counts where media_id='".$qr_code_media_id."'");
                        $ret = M("CustService")->where("media_id='".$qr_code_media_id."'")->find();

                        //如果达到100人，则把该群去激活
                        if($ret['send_counts'] >= 150){
                            M()->execute("update rw_cust_service set status = 0 where media_id='".$qr_code_media_id."'");
                            $redis->saveActiveCustService();
                        }
                    }
                }
            }

            if(empty($qr_code_media_id)){
                return ResponsePassive::text($request['fromusername'], $request['tousername'],
                    "非常抱歉！暂时没有空闲的客服，请15分钟后再试，或者在公众号回复：【有书共读】,抢先了解共读规则。
                    PS-- 23:30至9:30为小助手休息时间，请在明天早上9:30之后再点击【我要报名】申请入群");
            }else{
                //把media_id保存到redis
                $data = array('media_id'=>$qr_code_media_id,
                    'cust_type'=>$qr_code_cust_type);
                $redis->setMediaId($request['fromusername'],json_encode($data));
                return ResponsePassive::image($request['fromusername'], $request['tousername'], $qr_code_media_id);
            }

        }

        //如果是其他key
        $model = new WechatReplyModel();
        $tmp = $model->getReplyBykey($eventKey);
        if(!empty($tmp)){
            $content = $tmp['content'];
            $type = $tmp['type'];
            $media_id=$tmp['media_id'];
            if($type == 'text'){
                return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
            }else if($type=='img'){
                return ResponsePassive::image($request['fromusername'], $request['tousername'], $media_id);
            }
        }

        //缺省返回
        $content = '欢迎加入有书共读，一起组队对抗惰性。';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 点击菜单跳转链接时的事件推送
     * @param $request
     * @return array
     */
    public static function eventView(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到跳转链接事件，您设置的key是' . $eventKey;
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 扫码推事件的事件推送
     * @param $request
     * @return array
     */
    public static function eventScancodePush(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到扫码推事件的事件，您设置的key是' . $eventKey;
        $content .= '。扫描信息：'.$request['scancodeinfo'];
        $content .= '。扫描类型(一般是qrcode)：'.$request['scantype'];
        $content .= '。扫描结果(二维码对应的字符串信息)：'.$request['scanresult'];
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 扫码推事件且弹出“消息接收中”提示框的事件推送
     * @param $request
     * @return array
     */
    public static function eventScancodeWaitMsg(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到扫码推事件且弹出“消息接收中”提示框的事件，您设置的key是' . $eventKey;
        $content .= '。扫描信息：'.$request['scancodeinfo'];
        $content .= '。扫描类型(一般是qrcode)：'.$request['scantype'];
        $content .= '。扫描结果(二维码对应的字符串信息)：'.$request['scanresult'];
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出系统拍照发图的事件推送
     * @param $request
     * @return array
     */
    public static function eventPicSysPhoto(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到弹出系统拍照发图的事件，您设置的key是' . $eventKey;
        $content .= '。发送的图片信息：'.$request['sendpicsinfo'];
        $content .= '。发送的图片数量：'.$request['count'];
        $content .= '。图片列表：'.$request['piclist'];
        $content .= '。图片的MD5值，开发者若需要，可用于验证接收到图片：'.$request['picmd5sum'];
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出拍照或者相册发图的事件推送
     * @param $request
     * @return array
     */
    public static function eventPicPhotoOrAlbum(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到弹出拍照或者相册发图的事件，您设置的key是' . $eventKey;
        $content .= '。发送的图片信息：'.$request['sendpicsinfo'];
        $content .= '。发送的图片数量：'.$request['count'];
        $content .= '。图片列表：'.$request['piclist'];
        $content .= '。图片的MD5值，开发者若需要，可用于验证接收到图片：'.$request['picmd5sum'];
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出微信相册发图器的事件推送
     * @param $request
     * @return array
     */
    public static function eventPicWeixin(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到弹出微信相册发图器的事件，您设置的key是' . $eventKey;
        $content .= '。发送的图片信息：'.$request['sendpicsinfo'];
        $content .= '。发送的图片数量：'.$request['count'];
        $content .= '。图片列表：'.$request['piclist'];
        $content .= '。图片的MD5值，开发者若需要，可用于验证接收到图片：'.$request['picmd5sum'];
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 弹出地理位置选择器的事件推送
     * @param $request
     * @return array
     */
    public static function eventLocationSelect(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到点击跳转事件，您设置的key是' . $eventKey;
        $content .= '。发送的位置信息：'.$request['sendlocationinfo'];
        $content .= '。X坐标信息：'.$request['location_x'];
        $content .= '。Y坐标信息：'.$request['location_y'];
        $content .= '。精度(可理解为精度或者比例尺、越精细的话 scale越高)：'.$request['scale'];
        $content .= '。地理位置的字符串信息：'.$request['label'];
        $content .= '。朋友圈POI的名字，可能为空：'.$request['poiname'];
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * 群发接口完成后推送的结果
     *
     * 本消息有公众号群发助手的微信号“mphelper”推送的消息
     * @param $request
     */
    public static function eventMassSendJobFinish(&$request){
        //发送状态，为“send success”或“send fail”或“err(num)”。但send success时，也有可能因用户拒收公众号的消息、系统错误等原因造成少量用户接收失败。err(num)是审核失败的具体原因，可能的情况如下：err(10001), //涉嫌广告 err(20001), //涉嫌政治 err(20004), //涉嫌社会 err(20002), //涉嫌色情 err(20006), //涉嫌违法犯罪 err(20008), //涉嫌欺诈 err(20013), //涉嫌版权 err(22000), //涉嫌互推(互相宣传) err(21000), //涉嫌其他
        $status = $request['status'];
        //计划发送的总粉丝数。group_id下粉丝数；或者openid_list中的粉丝数
        $totalCount = $request['totalcount'];
        //过滤（过滤是指特定地区、性别的过滤、用户设置拒收的过滤，用户接收已超4条的过滤）后，准备发送的粉丝数，原则上，FilterCount = SentCount + ErrorCount
        $filterCount = $request['filtercount'];
        //发送成功的粉丝数
        $sentCount = $request['sentcount'];
        //发送失败的粉丝数
        $errorCount = $request['errorcount'];
        $content = '发送完成，状态是'.$status.'。计划发送总粉丝数为'.$totalCount.'。发送成功'.$sentCount.'人，发送失败'.$errorCount.'人。';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * 群发接口完成后推送的结果
     *
     * 本消息有公众号群发助手的微信号“mphelper”推送的消息
     * @param $request
     */
    public static function eventTemplateSendJobFinish(&$request){
        //发送状态，成功success，用户拒收failed:user block，其他原因发送失败failed: system failed
        $status = $request['status'];
        if($status == 'success'){
            //发送成功
        }else if($status == 'failed:user block'){
            //因为用户拒收而发送失败
        }else if($status == 'failed: system failed'){
            //其他原因发送失败
        }
        return true;
    }


    public static function test(){
        // 第三方发送消息给公众平台
        $encodingAesKey = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFG";
        $token = "pamtest";
        $timeStamp = "1409304348";
        $nonce = "xxxxxx";
        $appId = "wxb11529c136998cb6";
        $text = "<xml><ToUserName><![CDATA[oia2Tj我是中文jewbmiOUlr6X-1crbLOvLw]]></ToUserName><FromUserName><![CDATA[gh_7f083739789a]]></FromUserName><CreateTime>1407743423</CreateTime><MsgType><![CDATA[video]]></MsgType><Video><MediaId><![CDATA[eYJ1MbwPRJtOvIEabaxHs7TX2D-HV71s79GUxqdUkjm6Gs2Ed1KF3ulAOA9H1xG0]]></MediaId><Title><![CDATA[testCallBackReplyVideo]]></Title><Description><![CDATA[testCallBackReplyVideo]]></Description></Video></xml>";


        $pc = new Aes\WXBizMsgCrypt($token, $encodingAesKey, $appId);
        $encryptMsg = '';
        $errCode = $pc->encryptMsg($text, $timeStamp, $nonce, $encryptMsg);
        if ($errCode == 0) {
            print("加密后: " . $encryptMsg . "\n");
        } else {
            print($errCode . "\n");
        }

        $xml_tree = new \DOMDocument();
        $xml_tree->loadXML($encryptMsg);
        $array_e = $xml_tree->getElementsByTagName('Encrypt');
        $array_s = $xml_tree->getElementsByTagName('MsgSignature');
        $encrypt = $array_e->item(0)->nodeValue;
        $msg_sign = $array_s->item(0)->nodeValue;

        $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
        $from_xml = sprintf($format, $encrypt);

        // 第三方收到公众号平台发送的消息
        $msg = '';
        $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
        if ($errCode == 0) {
            print("解密后: " . $msg . "\n");
        } else {
            print($errCode . "\n");
        }
    }

}
