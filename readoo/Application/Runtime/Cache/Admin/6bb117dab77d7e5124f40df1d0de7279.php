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
					<li>
						<a href="javascript:;">后台统计</a>
						<ul>
							<li><a href="__GROUP__/Version">版本更新</a></li>
						</ul>
					</li>
					<?php if(($type) == "part"): ?><li class='active'>
					<?php else: ?>
						<li><?php endif; ?>
					<a href="javascript:;">后台设置项</a>
						<ul>
							<li><a href="__GROUP__/Users">用户列表</a></li>
							<li><a href="__GROUP__/Major">行业</a></li>
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
			<!-- 书籍列表 -->
			<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>修改后台用户地理位置</h2>
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="__GROUP__/Users/save_lng" method="post" enctype="multipart/form-data">
						<p>
							<label>地理信息:</label>经纬度<?php echo ($info["lng"]); ?>--<?php echo ($info["lat"]); ?>具体地址：<?php echo ($info["province"]); echo ($info["city"]); echo ($info["district"]); echo ($info["street"]); echo ($info["street_number"]); ?>
						</p>
						<p>
							<label>经度:</label><input type="text" class="text small" name='lng' value=''/> <br/>
						</p>
						<p>
							<label>纬度:</label><input type="text" class="text small" name='lat' value=''/> 
						</p>
						<hr />
						<p>
							<input type='hidden' name='user_id' value='<?php echo ($user_id); ?>'/>
							<input type="submit" class="submit small" value="保存" />
						</p>
					</form>
				</div>		<!-- .block_content ends -->
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->	
			</div>
			</div>
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