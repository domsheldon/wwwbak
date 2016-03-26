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
						<a href="__GROUP__/Wish/wishList">心愿列表</a>
					</li>
					<li>
						<a href="__GROUP__/Book">书籍列表</a>
					</li>
					<li>
						<a href="javascript:;">其他</a>
						<ul>
							<li><a href="__GROUP__/Feed/adminFeed">后台发动态</a></li>
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
					
					<h2>查看动态信息</h2>
					
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="" method="post">
						<p>
							<label>时&nbsp;&nbsp;&nbsp;间:</label>
							<span class="note"><?php echo (date('Y-m-d H:i:s',$info["create_time"])); ?></span>
						</p>
						
						<p>
							<label>书&nbsp;&nbsp;&nbsp;名:</label>
							<span class="note"> <a href=''><< <?php echo ($info["book_title"]); ?> >> </a></span>
						</p>
						<p>
							<label>感&nbsp;&nbsp;&nbsp;悟:</label>
							<span class="note"><?php echo (($info["summary"])?($info["summary"]):'空'); ?></span>
						</p>
						<p>
							<label>时&nbsp;&nbsp;&nbsp;间:</label>
							<span class="note"><?php echo (($info["time"])?($info["time"]):'空'); ?></span>
						</p>
						<p>
							<label>地&nbsp;&nbsp;&nbsp;点:</label>
							<span class="note"><?php echo (($info["place"])?($info["place"]):'空'); ?></span>
						</p>
						<p>
							<label>说&nbsp;&nbsp;&nbsp;明:</label>
							<span class="note"><?php echo (($info["content"])?($info["content"]):'空'); ?></span>
						</p>
						<p>
							<label>赞&nbsp;&nbsp;&nbsp;数:</label>
							<span class="note"><?php echo ($info["digg_count"]); ?></span>
						</p>
						<p>
							<label>评论数:</label>
							<span class="note"><?php echo ($info["comment_count"]); ?></span>
						</p>
						<p>
							<label>申请数:</label>
							<span class="note"><?php echo ($info["apply_count"]); ?></span>
						</p>
						
						<p>
							<label>状&nbsp;&nbsp;&nbsp;态:</label>
							<span class="note">
							<?php if(($info["is_agree"]) == "0"): ?>申请中<?php endif; ?>
							<?php if(($info["is_agree"]) == "1"): ?>已同意<?php endif; ?>
							<?php if(($info["is_agree"]) == "3"): ?>已收书<?php endif; ?>
							<?php if(($info["is_agree"]) == "4"): ?>已还书<?php endif; ?>
							<?php if(($info["is_delete"]) == "1"): ?>已下架<?php endif; ?>
							
							</span>
						</p>
						<p>
							<label>动态流程:</label><br/><br/>
							<?php if(is_array($licheng)): $k = 0; $__LIST__ = $licheng;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><img src='<?php echo ($v["avatar"]); ?>' width='50' height='50'/>
								<?php if(($k) == "1"): ?><span class="note"><a><?php echo ($v["name"]); ?></a>  于<?php echo (date('Y-m-d H:i:s',$v["time"])); ?> 发布</span>
								<?php else: ?>
								<span class="note"><a><?php echo ($v["name"]); ?></a>  于<?php echo (date('Y-m-d H:i:s',$v["time"])); ?> 借到</span><?php endif; ?>
								<br/><?php endforeach; endif; else: echo "" ;endif; ?>
						</p>
						
					</form>
					
				</div>		<!-- .block_content ends -->
				<div class="bendl"></div>
				<div class="bendr"></div>
				
			</div>		<!-- .block ends -->
			
			</div>
			</div>
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>		

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