<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>漂流书</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="__PUBLIC__/css/style.css">
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/js.js" type="text/javascript"></script>
</head>
<body>
<div class="book_share_down">
    <div class="head">
        <p>有书，每天更好一点</p>
        <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书">立即下载</a>
        <em></em>
    </div>
</div>

<section>
    <div class="dt_book">
        <div class="book">
            <dl>
                <dt><img src="<?php echo ($info["book_info"]["cover"]); ?>"></dt>
                <dd>
                    <div class="t"><?php echo ($info["book_info"]["title"]); ?></div>
                    <div class="zh"><?php echo ($info["book_info"]["author"]); ?></div>                
                    <div class="s"><span class="x"><em class="s<?php echo ($info["book_info"]["score"]); ?>"></em></span><span><?php echo ($info["book_info"]["score"]); ?></span><span><?php echo ($info["book_info"]["pubdate"]); ?></span></div>
                    <div class="cy"><span>持有人：</span><span class="p"><?php echo ($info["user_info"]["name"]); ?></span></div>
                </dd>
                <div style="clear: both;"></div>
            </dl>
            <div class="j_t"><span><?php echo ($info["create_time"]); ?></span></div>
        </div>
        <div class="sm">
            <h2>取书时间，地址和相关说明</h2>
            <p><em class="time">时间</em><?php echo (($info["time"])?($info["time"]):'具体商定'); ?></p>
            <p><em class="addr">地址</em><?php echo (($info["place"])?($info["place"]):'具体商定'); ?></p>
            <p><em class="list">说明</em><?php echo (($info["content"])?($info["content"]):'具体商定'); ?></p>
        </div>
    </div>
    
    <div class="dt_book_pl">
        <div class="mou">
            <dl>
                <dt><img src="<?php echo ($user_info["avatar"]); ?>"></dt>
                <dd>
                    <div class="n"><span><?php echo ($user_info["name"]); ?></span><em class="jx">捐献</em></div>
                    <div class="jj"><span><?php echo (($user_info["intro"])?($user_info["intro"]):'暂无简介'); ?></span></div>
                </dd>
            </dl>
            <div class="time"><span>10分钟前</span></div>
        </div>
        
        <div class="pl">
            <p>本书共完成<span><?php echo (($share_count)?($share_count):'0'); ?></span>次漂流</p>
            <a class="more">详情</a>
        </div>
    </div>
    <div class="dt_book_ly">
        <div class="head">
            <h2>一句话感悟</h2>
        </div>
        <div style="margin:6px 5px 0px 5px;">
            <span style="font-size:12px;line-height:23px;"><?php echo (($info["summary"])?($info["summary"]):'暂无感悟'); ?></span>
        </div>
    </div>
    
    <div class="dt_book_ly">
        <div class="head">
            <h2>留言</h2>
            <span>浏览 <?php echo ($info["view_count"]); ?></span>
        </div>
        <div class="list">
            <ul>
            <?php if(!empty($comment_list)): if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                    <dl>
                        <dt><img src="<?php echo ($v["comment_uinfo"]["avatar"]); ?>"></dt>
                        <dd>
                            <div class="name"><?php echo ($v["comment_uinfo"]["name"]); ?></div>
                            <div class="nr"><p><?php echo ($v["content"]); ?></p></div>
                        </dd>
                    </dl>
                </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
    </div>
    
    <div class="dt_book_jy">
        <div class="f_l">
            <span class="zan"><?php echo ($info["digg_count"]); ?></span>
            <span class="pl"><?php echo ($info["comment_count"]); ?></span>
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