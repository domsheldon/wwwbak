<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>一句话感悟</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="__PUBLIC__/css/style.css">
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/ad.js" type="text/javascript"></script>
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
    <div class="ganwu">
        <div class="head">
            <div class="peo">
                <dl>
                    <dt><img src="<?php echo ($info["user_info"]["avatar"]); ?>"></dt>
                    <dd>
                        <div class="n"><?php echo ($info["user_info"]["name"]); ?></div>
                        <div class="a"><?php echo ($info["create_time"]); ?><span></span></div>
                    </dd>
                </dl>
                <div class="statr"></div>
                <!--选中样式statr_sle-->
            </div>
            <div class="book">
                <dl>
                    <dt><img src="<?php echo ($info["book_info"]["cover"]); ?>"></dt>
                    <dd>
                        <div class="t"><?php echo ($info["book_info"]["title"]); ?></div>
                        <div class="m"><?php echo ($info["book_info"]["author"]); ?></div>
                    </dd>
                </dl>
            </div>
        </div>
        
        <div class="pl_list">
            <div class="h">
                <h3>评论</h3>
                <div class="conut">浏览:<?php echo ($info["view_count"]); ?></div>
            </div>
            <ul>
            <?php if(!empty($info["comment_list"])): if(is_array($info["comment_list"])): $i = 0; $__LIST__ = $info["comment_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                    <dl>
                        <dt><img src="<?php echo ($v["comment_uinfo"]["avatar"]); ?>"></dt>
                        <dd>
                            <div class="n"><?php echo ($v["comment_uinfo"]["name"]); ?></div>
                            <div class="c"><?php echo ($v["content"]); ?></div>
                        </dd>
                    </dl>
                </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
    </div>
</section>

<div class="share_footer">
    <div class="zan"><em></em><span><?php echo ($info["digg_count"]); ?></span></div>
    <!--赞过样式zan_sel-->
    <div class="pl"><em></em><span><?php echo ($info["comment_count"]); ?></span></div>
    <div class="s"><em>&nbsp;</em></div>
</div>
    
<div class="tips">
    <div class="con">
        <div class="yu">下载有书APP 即可立即借阅</div>
        <div class="btn">
        <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书APP" class="donwapk">下载</a>
        <a href="" title="下载有书APP" class="qx">取消</a>
        </div>
    </div>
</div>
<div class="tmc"></div>
</body>
</html>