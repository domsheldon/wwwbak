<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($info["lib_name"]); ?>群组</title>
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
        
        <div class="group">
            <div class="n">
                <span class="l">群组名称</span>
                <span class="r"><?php echo ($info["lib_name"]); ?></span>
            </div>
            <div class="n">
                <span class="l">加入群组口令</span>
                <span class="r"><?php echo ($info["lib_ask"]); ?></span>
            </div>
            <div class="c">
                <h2>群组简介</h2>
                <div class="jj">
                    <?php echo ($info["lib_intro"]); ?>
                </div>
            </div>
        </div>
            
        <div class="collection_book">
            <div class="t">
                <div class="l">共<span><?php echo ($count); ?></span>本图书</div>
                <div class="r">捐赠图书</div>
                <div class="clear"></div>
            </div>
            <ul>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($v["book_info"]["cover"]); ?>" alt="书名"><span><?php echo ($v["book_info"]["title"]); ?><br>@<?php echo ($v["user_info"]["name"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php if(($count) > "6"): ?><div class="more">点击加载更多</div><?php endif; ?>
    </div>
    
    <div class="erweima">
        <p><img src="__PUBLIC__/images/qr.png" alt="扫码二维码下载有书"></p>
        <span>扫码二维码<br>下载有书</span>
    </div>
    
</section>

<div class="tips">
    <div class="con">
        <div class="close">关闭</div>
        <div class="yu">下载有书APP 即可立即借阅</div>
        <div class="btn">
            <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书APP" class="donwapk">下载</a>
            <a href="javascript:void(0);" title="取消下载" class="qx">取消</a>
        </div>
    </div>
</div>
<div class="tmc"></div>
</body>
</html>