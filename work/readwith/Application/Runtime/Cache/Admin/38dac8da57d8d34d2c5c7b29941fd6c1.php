<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Adminus &#9679; Page</title>
    <style type="text/css" media="all">
		@import url("__PUBLIC__/css/style.css");
		@import url("__PUBLIC__/css/jquery.wysiwyg.css");
		@import url("__PUBLIC__/css/facebox.css");
		@import url("__PUBLIC__/css/visualize.css");
		@import url("__PUBLIC__/css/date_input.css");
    </style>
	<link href=''/>
	<!--[if lt IE 8]><style type="text/css" media="all">@import url("css/ie.css");</style><![endif]-->
	<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
</head>
<body>
	
	<div id="hld">
	
		<div class="wrapper">		<!-- wrapper begins -->
				<div id="header">
				<div class="hdrl"></div>
				<div class="hdrr"></div>
				
				<h1><a href="javascript:;">蜂窝后台</a></h1>
				
				<ul id="nav">
					<?php if(($type) == "part"): ?><li class='active'>
					<?php else: ?>
						<li><?php endif; ?>
					<a href="__GROUP__/Users">用户列表</a>
					</li>
					
					<li>
						<a href="__GROUP__/Feed">动态列表</a>
					</li>
					<li>
						<a href="__GROUP__/Book">书籍列表</a>
					</li>
					<li>
						<a href="javascript:;">其他</a>
						<ul>
							<li><a href="__GROUP__/Book/classList">书籍分类</a></li>
							<li><a href="__GROUP__/Back/helpList">用户求帮助</a></li>
							<li><a href="__GROUP__/Ad/adList">首页活动</a></li>
							<li><a href="__GROUP__/Back">意见反馈</a></li>
							<li><a href="__GROUP__/Users/pushList">推送内容列表</a></li>
						</ul>
					</li>
						<!--<ul>
							<li><a href="#">List pages</a></li>
							<li><a href="#">Add page</a></li>
							<li><a href="#">More actions</a>
								<ul>
									<li><a href="#">Some action</a></li>
									<li><a href="#">Some action</a></li>
									<li><a href="#">Some action</a>
										<ul>
											<li><a href="#">Some action</a></li>
											<li><a href="#">Some action</a></li>
											<li><a href="#">Some action</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>-->
					<?php if(in_array(($rights), explode(',',"admin,master"))): ?><li><a href="__GROUP__/System/index">Users</a>
						<ul>
							<li><a href="__GROUP__/System/add_master">新增管理员</a></li>
						</ul>
					</li><?php endif; ?>
				</ul>
				
				<p class="user">Hello, <a href="#"><?php echo ($username); ?></a> | <a href="__GROUP__/Login/out">Logout</a></p>
			</div>		<!-- #header ends -->
		<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>查看用户信息</h2>
					
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="__GROUP__/Users/add_meet" method="post">
						<p>
							<label>用户名:</label>
							<span class="note"><?php echo ($info["name"]); ?></span>
						</p>
						<p>
							<label>手机号:</label>
							<span class="note"><?php echo ($mobile); ?></span>
						</p>
						<p>
							<label>头像:</label>
							<img src='__AVATAR__<?php echo ($info["avatar"]); ?>__AVATARRULE__' />
						</p>
						<p>
							<label>性别:</label>
							<span class="note"><?php if(($info["sex"]) == "1"): ?>男<?php else: ?>女<?php endif; ?></span>
						</p>
						<p>
							<label>总书币:</label>
							<span class="note"><?php echo ($info["money"]); ?></span>
						</p>
						<p>
							<label>可用书币:</label>
							<span class="note"><?php echo ($info["applyd_money"]); ?></span>
						</p>
						<p>
							<label>注册时间:</label>
							<span class="note"><?php echo (date('Y-m-d H:i:s',$info["create_time"])); ?></span>
						</p>
						<p>
							<label>个性签名:</label>
							<span class="note"><?php echo ($info["intro"]); ?></span>
						</p>
						<p>
							<label>申请的书:</label>
							<span class="note">
							<?php if(is_array($apply_book)): $i = 0; $__LIST__ = $apply_book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><a href=''><< <?php echo ($book["book_title"]); ?> >></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</span>
						</p>
						<p>
							<label>发布的书:</label>
							<span class="note">
							<?php if(is_array($fb_book)): $i = 0; $__LIST__ = $fb_book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><a href=''><< <?php echo ($book["book_title"]); ?> >></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</span>
						</p>
						
					</form>
					
				</div>		<!-- .block_content ends -->
				<div class="bendl"></div>
				<div class="bendr"></div>
				
			</div>		<!-- .block ends -->
			
			</div>
			</div>
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>		
<script type="text/javascript" >
$("#add_meet").click(function(){
	$("#add_meet").css("display","none");
	$('#meet').css('display','block');
});
</script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.img.preload.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.date_input.pack.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/facebox.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.visualize.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.visualize.tooltip.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.select_skin.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/ajaxupload.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.pngfix.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/custom.js"></script>
</body>
</html>