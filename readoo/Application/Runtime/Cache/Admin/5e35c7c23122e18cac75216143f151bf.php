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
						<a href="javascript:;">其他</a>
						<ul>
							<li><a href="__GROUP__/Feed/ad">首页广告添加</a></li>
							<li><a href="__GROUP__/Back">意见反馈</a></li>
							<li><a href="__GROUP__/Version">版本更新</a></li>
							<li><a href="__GROUP__/Users/pushList">推送列表</a></li>
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
					
					<h2>新增平台信息</h2>
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="__GROUP__/Version/add" method="post" enctype="multipart/form-data">
						<p>
							<label>系统类型:</label>
							<?php if(($info["app_type"]) == "1"): ?><input type="radio" class="radio" checked value='1' name='type'/>android &nbsp;&nbsp;&nbsp;
							<?php else: ?>
								<input type="radio" class="radio" value='1' name='type'/>android &nbsp;&nbsp;&nbsp;<?php endif; ?>
							<?php if(($info["app_type"]) == "2"): ?><input type="radio" class="radio" checked value='2' name='type'/>Ios
							<?php else: ?>
								<input type="radio" class="radio" value='2' name='type'/>Ios<?php endif; ?>
							
						</p>
						<p>
							<label>平台名称:</label><br />
							<input type="text" class="text small" name='plat' value='<?php echo ($info["plat"]); ?>'/> 
						</p>
						<p>
							<label>平台拼写:</label><br />
							<input type="text" class="text small" name='plat_str' value='<?php echo ($info["plat_str"]); ?>'/> (例：应用宝->yingyongbao；要和给app开发的一致)
						</p>
						<p>
							<label>版本号:</label><br />
							<input type="text" class="text small" name='code' value='<?php echo ($info["version_code"]); ?>'/> 
						</p>
						<p>
							<label>下载地址:</label><br />
							<input type="text" class="text small" name='url' value='<?php echo ($info["apk_url"]); ?>'/> 
						</p>
						<p>
							<label>更新内容:</label><br />
							<textarea name='content'><?php echo ($info["upgrade_point"]); ?></textarea>
						</p>
						<hr />
						<p>
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