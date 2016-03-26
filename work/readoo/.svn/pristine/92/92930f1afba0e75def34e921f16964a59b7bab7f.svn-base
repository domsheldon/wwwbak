<?php
namespace LaneWeChat;
/**
 * 系统主配置文件.
 * @Created by Lane.
 * @Author: lane
 * @Mail lixuan868686@163.com
 * @Date: 14-8-1
 * @Time: 下午1:00
 * @Blog: Http://www.lanecn.com
 */
//版本号
define('LANEWECHAT_VERSION', '1.4');
define('LANEWECHAT_VERSION_DATE', '2014-11-05');

/*
 * 服务器配置，详情请参考@link http://mp.weixin.qq.com/wiki/index.php?title=接入指南
 */
define("WECHAT_URL", 'http://zaia.fengwo.com/');

//使用有书共读服务号的appid信息
//define("WECHAT_APPID_AUTHOR",'wx17642efccac31518');
//define("WECHAT_APPSECRET_AUTHOR",'92628cf4514f48377e550bbc047765ce');

//qyluo925测试号的appid信息
define("WECHAT_APPID_AUTHOR",'wx8a617d56f6e10992');
define("WECHAT_APPSECRET_AUTHOR",'d4624c36b6795d1d99dcf0547af5443d');


/*
 * 开发者配置
 */
//测试账号
define('WECHAT_TOKEN', 'qyluo');
define('ENCODING_AES_KEY', "lmAszayHpQMbJplmrwLg35zxFJne7xbLtKVzGMbCREv");
define("WECHAT_APPID", 'wx8a617d56f6e10992');
define("WECHAT_APPSECRET", 'd4624c36b6795d1d99dcf0547af5443d');

//测试账号 lwt
//define('WECHAT_TOKEN', 'qyluo');
//define('ENCODING_AES_KEY', "lmAszayHpQMbJplmrwLg35zxFJne7xbLtKVzGMbCREv");
//define("WECHAT_APPID", 'wxd5b715834d81c087');
//define("WECHAT_APPSECRET", 'd0a721d0b86396bd55302c008314eacc');

//有书
//define('WECHAT_TOKEN', 'PREqvgUQ');
//define('ENCODING_AES_KEY', "eSEeVgWwNKiNqpYciH4f6mEwO3FaQMJSMPKVwU3n2EB");
//define("WECHAT_APPID", 'wxe4f2e09660f82f82');
//define("WECHAT_APPSECRET", '4facf436a134a9ee5b8820664cf3b044');

//蜂窝网
//define('WECHAT_TOKEN', 'fengwo');
//define('ENCODING_AES_KEY', "lmAszayHpQMbJplmrwLg35zxFJne7xbLtKVzGMbCREv");
//define("WECHAT_APPID", 'wx9b4ff0e5f14a378a');
//define("WECHAT_APPSECRET", 'd9e9221ef0c4807f8e5f326ae977fdac');


//-----引入系统所需类库-------------------
//引入错误消息类
include_once 'core/msg.lib.php';
//引入错误码类
include_once 'core/msgconstant.lib.php';
//引入CURL类
include_once 'core/curl.lib.php';

//-----------引入微信所需的基本类库----------------
//引入微信处理中心类
include_once 'core/wechat.lib.php';
//引入微信请求处理类
include_once 'core/wechatrequest.lib.php';
//引入微信被动响应处理类
include_once 'core/responsepassive.lib.php';
//引入微信access_token类
include 'core/accesstoken.lib.php';
//
//-----如果是认证服务号，需要引入以下类--------------
//引入微信权限管理类
include_once 'core/wechatoauth.lib.php';
//引入微信用户/用户组管理类
include_once 'core/usermanage.lib.php';
//引入微信主动相应处理类
include_once 'core/responseinitiative.lib.php';
//引入多媒体管理类
include_once 'core/media.lib.php';
//引入自定义菜单类
include_once 'core/menu.lib.php';
?>