<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>图书分享页面</title>
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
    <div class="book_zt">
        <dl>
            <dt><img src="<?php echo ($info["cover"]); ?>" alt="<?php echo ($info["title"]); ?>"></dt>
            <dd>
                <div class="h1"><span><?php echo ($info["title"]); ?></span></div>
                <div class="h2"><span><?php echo ($info["author"]); ?></span></div>
                <div class="h3"><span class="star"><em class="s_07"></em></span><span><?php echo ($info["score"]); ?></span><span><?php echo ($info["pubdate"]); ?></span></div>
            </dd>
        </dl>
        <div class="zt">读书状态</div>
    </div>
        
    <div class="piaoliushu">
        <h2>相关漂流书（<em><?php echo ($count); ?></em>）</h2>
        <span class="more">更多</span>
    </div>
        
    <div class="biaoqian">
        <div class="h">
            <h2>热门标签</h2>
            <span>给此书贴标签</span>
        </div>
        <div class="list">
            <ul>
            	<?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><li>
                    <div class="bq bj0"><span><?php echo ($tag["tag_name"]); ?></span><span class="s"><?php echo ($tag["count"]); ?></span></div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    
    <div class="about">
        <div class="h">
            <h2>这本书在说些什么？</h2>
        </div>
        <div class="con">
            <p><?php echo ($info["intro"]); ?></p>
        </div>
    </div>
    
    <div class="have_read">
        <div class="h">
            <h2>看过此书的人</h2>
        </div>
        <div class="p">
            <ul>
            <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($user["avatar"]); ?>" alt="<?php echo ($user["name"]); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
            	<?php if(!empty($users)): ?><li><span>更多</span></li><?php endif; ?>
            </ul>
        </div>
    </div>
        
    <div class="ganwu">
        <div class="h">
            <h2>一句话感悟</h2>
            <span>发布感悟</span>
        </div>
        <div class="list">
        <?php if(is_array($summary_list)): $i = 0; $__LIST__ = $summary_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="peo">
                <dl>
                    <dt><img src="<?php echo ($v["user_info"]["avatar"]); ?>" alt="<?php echo ($v["user_info"]["avatar"]); ?>"></dt>
                    <dd><span><?php echo ($v["user_info"]["name"]); ?></span></dd>
                </dl>
                <div class="c">
                    <p><?php echo ($v["summary"]); ?></p>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    
    <div class="erweima">
        <p><img src="__PUBLIC__/images/qr.png" alt="扫码二维码下载有书"></p>
        <span>扫码二维码<br>下载有书</span>
    </div>
    
</section>

<div class="tips">
    <div class="con">
        <div class="close">关闭</div>
        <div class="yu">下载有书APP，加入我们</div>
        <div class="btn"><a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书APP" class="donwapk">立即下载</a></div>
    </div>
</div>
<div class="tmc"></div>
</body>
</html>