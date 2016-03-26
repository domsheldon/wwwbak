<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
*{font-family: arial,Microsoft Yahei,宋体;}
body{margin:0;background-color:#f5f5f5;}
.main{width:100%;max-width:500px;margin:0 auto;}
.content{width:100%;height:100%;overflow:hidden;}
.touxiang_box{width:30%;height:120px;float:left;text-align:center;margin-top:30px;}
.touxiang_box img{ border-radius:100px;max-height:80px;max-width:80px;width:100%;height:auto;}
.info{width:70%;float:right;margin-top:20px;}
.info .con{width:98%;float:right;margin-right:4px;}
.yqm{width:90%;height:auto;background-color:#FFF;border:1px solid #d2d1d1;border-radius:15px;-moz-border-radius:15px; /* Old Firefox */}
.download{text-align:center;margin:50px 0px;}
.download a{background-color:#00b289;font-size:18px;color:#FFF;display:block;border-radius:25px;text-decoration: none;width: 150px;margin: auto;padding:5px 15px;}
.qm{font-size:16px;color:#a8a8a8;margin:0px;}
.yqm{position: relative;}
.yqm i{position: absolute;left:6%;top:-15px;background:url(__PUBLIC__/images/jiao.png);-moz-background-size:100% 100%; /* 老版本的 Firefox */background-size:100% 100%;background-repeat:no-repeat;width:30px;height:16px;display:block;}
.xb{width:20px;height:20px;margin-left:6px;vertical-align:top;margin-top: 15px;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<title>有书——闲置图书分享平台</title>
</head>
<body>
<div class="main">
  <div class="content">
  		<div class="touxiang_box"><img src='<?php echo ($info["avatar"]); ?>'/></div>
        <div class="info">
        	<div class="con">
        		<p style="line-height:50px;margin:0px;">
					<span style="font-size:20px;color:#323232;"><?php echo ($info["name"]); ?></span>
					<?php if(($info["sex"]) == "1"): ?><img class="xb" src="__PUBLIC__/images/man.png" />
					<?php else: ?>
					<img class="xb" src="__PUBLIC__/images/girl.png" /><?php endif; ?> 
				</p>
				<p class="qm">个性签名：<?php echo (($info["intro"])?($info["intro"]):'空'); ?></p>
        	</div>
        </div>
		<div style="clear:both;"></div>
        <!--<div class="yqm" style="margin:0 auto;text-align:center;">
			<i></i>
        	<p style="display:block;font-size:16px;color:#a8a8a8;margin:0px 15px;"><br />邀请您加入有书，输入邀请码，即可换取书币。</p>
			<p style="display:block;font-size:20px;color:#00b289;text-align:center;margin:0px;line-height:50px;">邀请码：<?php echo ($invite_code); ?></p>
        </div>
     --><div class="download"><a href='/download'>下载有书</a></div>   
  </div>
</div>
</body>
</html>