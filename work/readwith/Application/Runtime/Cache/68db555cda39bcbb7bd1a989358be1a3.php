<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($user_info["name"]); ?>书房</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="__PUBLIC__/css/style.css">
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/js.js" type="text/javascript"></script>
</head>
<body>
<div class="book_share_down">
    <div class="head">
        <p>有书，以书为媒 连接同类</p>
        <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书" class="downapp">立即下载</a>
        <em></em>
    </div>
</div>

<section>
    <div class="bookhost">
        <div class="h">
            <div class="portrait">
                <img src="<?php echo ($user_info["avatar"]); ?>" alt="<?php echo ($user_info["name"]); ?>">
                <?php if(($$user_info["sex"]) == "0"): ?><span class="female">女</span>
                <?php else: ?>
                <span class="male">男</span><?php endif; ?>
            </div>
            <div class="title"><?php echo ($user_info["name"]); ?></div>
            <div class="introdction"><?php echo (($user_info["intro"])?($user_info["intro"]):'暂无简介'); ?></div>
        </div>
        
        <div class="collection_book">
            <h2>藏书<span><?php echo ($count); ?></span>本</h2>
            <ul>
            	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($info["cover"]); ?>" alt="<?php echo ($info["title"]); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        
    </div>
    
    <div class="erweima">
        <p><img src="__PUBLIC__/images/qr.png" alt="扫码二维码下载有书"></p>
        <span>扫码二维码<br>下载有书</span>
    </div>
    
</section>

<div class="tips">
    <div class="con">
        <div class="yu">下载有书APP 即可立即借阅</div>
        <div class="btn">
        <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书APP" class="donwapk">下载</a>
        <a href="javascript:void(0);" title="下载有书APP" class="qx">取消</a>
        </div>
    </div>
</div>
<div class="tmc"></div>
</body>
</html>