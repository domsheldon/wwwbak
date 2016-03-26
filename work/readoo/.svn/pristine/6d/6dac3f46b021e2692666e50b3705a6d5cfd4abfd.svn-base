<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>分享</title>
<!-- Main CSS file -->
<link rel="stylesheet" href="__PUBLIC__/css/style.css"  type="text/css" media="screen" />
</head>
<body id="page">
<div id="pagecontainer">
	<div id="header" class="black_gradient">
		<h1>有书</h1>
		<h2>你的共享图书馆</h2>
	</div>

	<div class="content">
		<div class="peo">
			<div class="pic"><img src="<?php echo ($info["user_info"]["avatar"]); ?>" alt="<?php echo ($info["user_info"]["name"]); ?>"></div>
			<div class="xq">
				<p class="name"><?php echo ($info["user_info"]["name"]); ?><span>贡献了一本书籍</span></p>
				<p class="time"><?php echo ($info["create_time"]); ?></p>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="book">
			<div class="pic"><img src="<?php echo ($info["book_info"]["cover"]); ?>" alt="<?php echo ($info["book_info"]["title"]); ?>"></div>
			<div class="xq">
				<p class="name"><?php echo ($info["book_info"]["title"]); ?></p>
				<p class="author"><?php echo ($info["book_info"]["author"]); ?></p>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="xq">
			<div class="h3">简介：</div>
			<div class="x">
				<p><?php echo ($info["book_info"]["intro"]); ?></p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="footer" class="black_gradient">
		<p class="m">有书，为图书共享而生</p>
		<p class="youshudown"><a href="<?php echo ($url); ?>">立即下载</a></p>
	</div>
</div>
</body>
</html>