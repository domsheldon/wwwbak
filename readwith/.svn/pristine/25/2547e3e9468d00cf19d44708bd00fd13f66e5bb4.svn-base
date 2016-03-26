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
			<!-- 书籍列表 -->
			<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>首页广告</h2>
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="__GROUP__/Feed/ad" method="post" enctype="multipart/form-data">
						<p>
							<label>广告显示时间:</label> 
							<input type="text" class="text date_picker" name='start' value='<?php echo ($info["start_date"]); ?>'/>
							--
							<input type="text" class="text date_picker" name='end' value='<?php echo ($info["start_date"]); ?>'/>
						</p>
						
						<p class="fileupload">
							<label>广告图片:</label><br />
							<input type="file" id="fileupload" name='image'/>
							<span id="uploadmsg">Jpg, gif, png and pdf files only. Max size 3mb.</span><br/>
							<?php if(empty($$info["ad_image"])): ?><image src='<?php echo ($info["ad_image"]); ?>'/><?php endif; ?>
						</p>
						<p><label>广告类型:</label> 
							<?php if(($info["ad_type"]) == "in"): ?><input type="radio" class="radio" name='type' value='out'/> 外部页面
								<input type="radio" class="radio" name='type' value='in' checked/> 内部app
							<?php else: ?>
								<input type="radio" class="radio" name='type' value='out' checked/> 外部页面
								<input type="radio" class="radio" name='type' value='in'/> 内部app<?php endif; ?>
							
						</p>
						<p>
							<label>广告链接地址:</label><br />
							<input type="text" class="text small" name='href' value='<?php echo ($info["ad_href"]); ?>'/> 
							<span class="note">*外部广告必填</span>
						</p>
						<p><label>广告排序:</label> <br />
							<select class="styled" name='sort'>
								<?php switch($$info["ad_sort"]): case "1": ?><option value='1' selected>1</option><?php break;?>
									<?php case "2": ?><option value='2' selected>2</option><?php break;?>
									<?php case "3": ?><option value='3' selected>3</option><?php break;?>
									<?php case "4": ?><option value='4' selected>4</option><?php break;?>
									<?php case "5": ?><option value='5' selected>5</option><?php break; endswitch;?>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
							</select><span class="note">*目前只显示5条广告</span>
						</p>
						<p>
							<label>是否现在开启:</label>
							<?php if(($info["is_off"]) == "1"): ?><input type="radio" class="radio" name='is_off' value='0'/> 是
								<input type="radio" class="radio" name='is_off' value='1' checked/> 否
							<?php else: ?>
								<input type="radio" class="radio" name='is_off' value='0' checked/> 是
								<input type="radio" class="radio" name='is_off' value='1'/> 否<?php endif; ?>
							
						</p>
						<p>
							<label>记录描述:</label><br />
							<textarea name='desc'><?php echo ($info["ad_desc"]); ?></textarea>
						</p>
						<hr />
						<p>
							<input type='hidden' name='id' value='<?php echo ($info["id"]); ?>'/>
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