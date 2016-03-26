<?php
require './rediskey.php';
$dbConfig = require './config.db.php';
$config = array(

    'URL_MODEL' => 2, //URL模式为REWRITE模式
//    'URL_HTML_SUFFIX'       =>  '.html',                //伪静态后缀.html
//  'APP_GROUP_MODE' => 0,
//  'DEFAULT_MODULE' => 'Index',
    'TMPL_STRIP_SPACE' => false, //去除模板文件里面的html空格与换行
    'SHOW_PAGE_TRACE' => FALSE, //Trace显示开关
    'DB_SQL_BUILD_CACHE' => false, //MYSQL高速缓存开关
    'TMPL_CACHE_ON' => false, //关闭模版缓存
    'TMPL_L_DELIM' => '{',
    'TMPL_R_DELIM' => '}',
    'APP_DEBUG' => true,
    'DB_FIELD_CACHE' => false,
    'HTML_CACHE_ON' => false,
    'URL_ROUTER_ON' => true, //开启路由
    'APP_GROUP_LIST' => ',Admin',
     'DEFAULT_GROUP' => '',
	'APP_SUB_DOMAIN_DEPLOY' => 1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES' => array(
        'admin' => array('Admin/'), // admin域名指向Admin分组
    ),

    //开启分布式数据库
  	'DB_DEPLOY_TYPE'=>'1',

    'URL_ROUTE_RULES' => array(

    	'm/check/yq'	=>'./MobileLogin/checkYqcode',//判断邀请码是否有效
    	'm/sign/msg'	=>'./MobileLogin/sign_send_msg',//注册页发验证码
    	'm/check/code'	=>'./MobileLogin/checkCode',	//检验验证码
    	'm/get_code'  	=>'./Sms/get_code',//验证回调
    	'm/user/sign' 	=>'./MobileLogin/app_sign', //手机用户注册
    	'm/bind/code' 	=>'./User/bindCode', //邀请码和用户绑定

    	'm/user/entry' 	=>'./MobileLogin/app_entry', //手机用户登录

    	'm/pwd/msg'		=>'./MobileLogin/uppwd_send_msg',//忘记密码验证手机号
    	'm/up/pwd'		=>'./MobileLogin/up_pwd',//密码重置

        'm/receive'		=>'./MobileUser/receive',//保存用户经纬度
    	'm/client/save'  		=>'./MobileUser/save_client',//保存cid
    	'm/client/del'  		=>'./MobileUser/delete_client',//删除cid

    	'm/book/save'  		=>'./Book/book_save',	//保存书籍
    	'm/save/bookpage'  		=>'./Book/savePages',	//保存书籍页数
    	'm/book/info'  		=>'./Book/book_info',	//书籍详情
    	'm/add/plan'  		=>'./Task/createPlan',	//生成计划
    	'm/plan/list'  		=>'./Task/myPlan',		//已读列表
    	'm/plan/detail'  		=>'./Task/taskIndex',	//计划详情
//    	'm/update/page'  		=>'./Task/updatePage',	//签到
    	'm/save/daylist'  		=>'./Task/saveDayList',	//批量更新计划
    	'm/del/planDetail'  		=>'./Task/delPlanDetail',	//删除Day
    	'm/day/detail'  		=>'./Task/dayDetail',	//每天的任务详情
    	'm/del/plan'  		=>'./Task/delPlan',	//计划删除
		'm/save/info'  		=>'./User/saveInfo',	//用户信息保存
		'm/set/pwd'  		=>'./User/setPwd',	//用户修改密码
    	'm/school/list'	=>'./User/getSchool',	//学校筛选
		'm/save/msg'  		=>'./User/saveMsg',	//用户留言
		'm/client/save'  		=>'./User/save_client',		//存cid
		'm/client/del'  		=>'./User/delete_client',	//删除cid

    	'm/log/add'  		=>'./User/userLog',
    	'm/noteslist/week'  		=>'./Task/paihang',	//排行
    	'm/note/info'  		=>'./Note/noteInfo',	//笔记详情
    	'm/note/add'  		=>'./Note/noteAdd',	//笔记新增
    	'm/ssj/add'  		=>'./Note/suishouji',	//随手记保存
    	'm/ssj/del'  		=>'./Note/ssjDel',	//随手记删除
    	'm/ssj/get'  		=>'./Note/dpGet',	//获取短评
		'm/ssj/upimg'  		=>'./Note/upImg',	//图片上传
		'm/ssj/sync'  		=>'./Note/ssjSync',	//随手记同步

		'm/gongdu/list'  		=>'./PlanBook/planBookList',	//共读书单列表
		'm/pbook/list'  		=>'./PaperBook/paperBookList',	//纸质书单列表
		'm/forum/list'  		=>'./Forum/forumList',	//论坛列表
		'm/forum/add'  		=>'./Forum/forumAdd',	//论坛添加、编辑
		'm/forum/digg'  		=>'./Forum/forumDigg',	//论坛问题顶
		'm/forum/undigg'  		=>'./Forum/forumUndigg',	//论坛问题取消顶
		'm/forum/comment'  		=>'./Forum/forumComment',	//论坛问题评论
		'm/forum/uncomment'  		=>'./Forum/forumUncomment',	//论坛问题评论删除
		'm/forum/del'  		=>'./Forum/forumDelete',	//论坛问题删除
		'm/forum/info'  		=>'./Forum/forumInfoDetail',	//论坛问题详情
		'm/forum/duihua'  		=>'./Forum/forumDuihua',	//查看对话
		'm/forum/jubao'  		=>'./Forum/forumJubao',	//问题举报
		'm/forum/jubaocomm'  		=>'./Forum/commJubao',	//评论举报
		'm/get_code'  	=> './Sms/get_code',//验证回调

		//edit by luoqy ,weixin测试
		'wechat/valid' => './WeChat/valid',
		'wechat/txt' => './WeChat/responseMsg',
		'wechat/paihang' => './WeChat/paihang',
		'wechat/readlist'=> './WeChat/readlist',	//签到的入口页面
		'wechat/userinfo'=> './WeChat/getUserInfo',//签到的第2步页面，打卡
		'wechat/gongdu'=> './WeChat/gongdu',		//签到的第3步页面，根据openid获取用户打卡信息
		'wechat/joinplan'=> './WeChat/joinPlan',
		'wechat/quitplan'=> './WeChat/quitPlan',
		'wechat/redis'=> './WeChat/redis',
		'wechat/bkList'=> './WeChat/bookList',//书单与签到页面
		'wechat/sharecj/:id\d'=> './WeChat/chengjiu',//分享我的成就
		'errorInfo' => './ErrorInfo/info',		//错误提示页面，传入info信息

		'topic/list'=> './Topic/topicList',
		'topic/topicnote'=> './Topic/topicNote',//某个话题的随笔列表

		//用户中心
		'usercenter/index' => './UserCenter/index',
		'usercenter/myforum' => './UserCenter/myforum',
		'usercenter/mymsg' => './UserCenter/mymsg',
		'usercenter/msgread' => './UserCenter/msgread',
		'usercenter/mydigg' => './UserCenter/mydigg',
		'usercenter/diggread' => './UserCenter/diggread',

		'share/:id\d'  		=>'./Share/share',	//分享的
		'share1/:id\d'  		=>'./Share/share1',	//分享的
		'dodigg'  		=>'./Share/doDigg',	//点赞
		'agree'  		=>'./Index/agree',	//协议

		//微信讨论区路由
		'wechatdiscuss/discusslist'=> './WeChatDiscuss/discusslist',//微信问题列表
		'wechatdiscuss/discuss/:noteId\d'=> './WeChatDiscuss/discuss',//微信问题讨论区
		'wechatdiscuss/displaycom'=> './WeChatDiscuss/displaycom',//微信问题讨论区独立页面
		'wechatdiscuss/displayforum'=> './WeChatDiscuss/displayforum',//微信问题列表独立页面
		'wechatdiscuss/deleteforum'=> './WeChatDiscuss/deleteforum',//微信问题删除
		'wechatdiscuss/release'=> './WeChatDiscuss/release',//微信问题讨论区发布内容页面
		'wechatdiscuss/comment'=> './WeChatDiscuss/comment',//微信问题讨论区发布内容操作
		'wechatdiscuss/deletecomment'=> './WeChatDiscuss/deletecomment',//微信问题讨论区删除评论操作
		'wechatdiscuss/digg'=> './WeChatDiscuss/digg',//微信问题顶
		'wechatdiscuss/undigg'=> './WeChatDiscuss/undigg',//微信问题取消顶
		'wechatdiscuss/addforum'=> './WeChatDiscuss/addforum',//发布随便感悟
		'wechatdiscuss/dotop'=> './WeChatDiscuss/dotop',//管理员功能，置顶某个问题
		'wechatdiscuss/upload'=> './WeChatDiscuss/upload',//图片上传
		'wechatdiscuss/getBookList'=> './WeChatDiscuss/getBookList',//共读书籍获取

		'login'			=>'./Admin/Login/index',//登录
		'admin/login/index'			=>'./Admin/Login/index',//登录
		'admin/login/verify'			=>'./Admin/Login/verify',//验证
		'admin/backend/index'			=>'./Admin/Backend/index',//后台首页
		'admin/coreading/list'			=>'./Admin/PlanBook/coreading',//共读书单首页
		'admin/coreading/add'			=>'./Admin/PlanBook/addcoreading',//添加共读书单页
		'admin/coreading/from'			=>'./Admin/PlanBook/from',//从书单列表添加到共读书单页
		'admin/coreading/choose'			=>'./Admin/PlanBook/choosebook',//查找书名添加共读书单
		'admin/coreading/fromadd'		=>'./Admin/PlanBook/addFromBookList',//从书单列表添加到共读书单
		'admin/coreading/isbn'			=>'./Admin/PlanBook/isbnSearch',//isbn是否存在
		'upload'			=>'./Admin/PlanBook/uploadImg',//上传共读书籍封页
		'admin/planbook/upload'			=>'./Admin/PlanBook/uploadFile',//上传文件
		'admin/planbook/save'			=>'./Admin/PlanBook/savePlanBook',//保存共读书单

		'admin/planbook/getcode'			=>'./Admin/PlanBook/getcode',//获取拆书包编码页面
		'admin/planbook/dogetcode'			=>'./Admin/PlanBook/doGetCode',//获取拆书包编码操作
		'admin/coreading/doadd'			=>'./Admin/PlanBook/addToCoReadingList',//新增共读书单
		'admin/bookpackage/list'			=>'./Admin/BookPackage/bookpackage',//拆书包首页
		'admin/bookpackage/add'			=>'./Admin/BookPackage/addToBookPack',//新增拆书包
		'admin/pack/edit'			=>'./Admin/PackList/edit',//新增拆书包
		'deletebook'			=>'./Admin/BookPackage/deleteFromList',//删除共读书籍
		'admin/cust/list'			=>'./Admin/CustService/custservice',//微信客服列表
		'admin/cust/add'			=>'./Admin/CustService/addcustservice',//新增微信客服页
		'admin/cust/upload'			=>'./Admin/CustService/uploadFile',//微信上传文件
		'admin/cust/doadd'			=>'./Admin/CustService/addToCustService',//新增微信客服
		'admin/cust/active'			=>'./Admin/CustService/setCustActive',//开启客服激活状态
		'admin/cust/unactive'			=>'./Admin/CustService/setCustUnactive',//关闭客服激活状态
		'admin/cust/delete'			=>'./Admin/CustService/deleteCustService',//删除微信客服
		'amdin/menu/active'	=> './Admin/WechatMenu/ActiveMenu',//激活微信菜单

    	'm/otherinfo/getother'     =>'./OtherInfo/getOther',//获取其他用户的笔记信息，分页信息；
		'm/otherinfo/digother'			=>'./OtherInfo/digOther',//点赞方法
		'm/otherinfo/discuss'			=>'./OtherInfo/discuss',//评论方法


		'qrcode'  		=>'./Qredit/getQrcode',	//返回二维码图片
		'show'  		=>'./Qredit/show',	//显示二维码
		'saoma'  		=>'./Qredit/appBack',//app扫码后请求的地址
		'scan'  		=>'./Qredit/scan',	//轮询地址
		'edit'  		=>'./Qredit/edit',	//编辑页
/***********************************************微信组队******************************************************/
		//'test'  		=>'./WeChatGroup/test',		//周五复位redis，微信组队

    	'add/group'  		=>'./WeChatGroup/addGroup',	//加入组
    	'xq'  			=>'./WeChatGroup/xingqu',		//成功加入页面
    	'join'  		=>'./WeChatGroup/join',		//成功加入页面
    	'error'  		=>'./WeChatGroup/showError',		//404页
    	'chengjiu'  		=>'./WeChatGroup/showChengjiu',	//我的成就
    	'userpai'  		=>'./WeChatGroup/userPai',	//用户排行
    	'groupai'  		=>'./WeChatGroup/grouPai',	//群组排行

	),
	 TMPL_PARSE_STRING => array(
        '__PUBLIC__' => '/public',
    )
);

//正式服务器的redis服务器
//define('REDIS_HOST','10.172.249.197');

define('REDIS_HOST','127.0.0.1');
define('REDIS_PORT',6379);

define('ADMIN_USER', '1');//默认后台运营帐号

define('MIN_SOFT', '2');//默认软件版本最低

//OSS上bucket
define('COVER_BUCKET', 'book-cover');
define('COVER_OBJECT', 'cover');

//OSS域名
define('OSS_ORI_AVATAR', 'http://fengwo-avatar.oss-cn-beijing.aliyuncs.com/');       //oss上头像原图域名
define('OSS_AVATAR', 'http://avatarimg.fengwo.com/');       //oss上头像小图域名
define('OSS_AVATAR_RULE', '@170w_170h.jpg');       //oss上头像小图的样式
define('OSS_NOTE_RULE', '@165w_165h.jpg');       //oss上笔记小图的样式

//OSS上图片的封面
define('OSS_COVER', 'http://cover.fengwo.com/');
define('OSS_COVER_RULE', '@110h_90Q_1x.jpg');

//OSS上广告地址
define('OSS_AD', 'http://feedimg.fengwo.com/');

//短信
define('SMS_APP_ID','283968510000040529');  //短信验证码应用编号
define('SMS_APP_SECRTE', 'ae7ed6974d5221dd5e90527da1b415cb');   //短信验证码应用密钥
//define('RETURN_URL', 'http://zaia.fengwo.com/m/get_code');   //短信测试回调地址
define('RETURN_URL', 'http://readooapi.youshu.cc/m/get_code');   //短信测试回调地址

define('MY_SUPER_KEY', '!23@fengwo.com');       //蜂窝网加密密钥
define('QR_CODE_IMG','/alidata/www/readoo_api/public/upload_img/');
//define('QR_CODE_IMG','/mnt/www/readolist/public/upload_img/');

return array_merge($dbConfig, $config);
?>
