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
							<li><a href="__GROUP__/Feed/adList">首页广告</a></li>
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
					
					<h2>书籍信息编辑</h2>
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="__GROUP__/Book/edit_book" method="post" enctype="multipart/form-data">
						<p>
							<label>书名:</label><br />
							<input type="text" class="text small" name='title' value='<?php echo ($info["title"]); ?>'/> 
						</p>
						<p>
							<label>作者:</label><br />
							<input type="text" class="text small" name='author' value='<?php echo ($info["author"]); ?>'/> 
						</p>
						<p class="fileupload">
							<label>封面:</label><br />
							<input type="file" name='img'/>
							<span id="uploadmsg">Jpg, gif, png and pdf files only. Max size 3mb.</span>
						</p>
						<img src='<?php echo ($info["cover"]); ?>'/><br />
						<p>
							<label>ISBN13:</label><br />
							<input type="text" class="text small" name='isbn13' value='<?php echo ($info["isbn13"]); ?>'/> 
						</p>
						<p>
							<label>页数:</label><br />
							<input type="text" class="text small" name='pages' value='<?php echo ($info["pages"]); ?>'/> 
						</p>
						<p>
							<label>出版日期:</label><br />
							<input type="text" class="text small" name='pubdate' value='<?php echo ($info["pubdate"]); ?>'/> 
						</p>
						<p>
							<label>出版社:</label><br />
							<input type="text" class="text small" name='publisher' value='<?php echo ($info["publisher"]); ?>'/> 
						</p>
						<p>
							<label>简介:</label><br />
							<textarea name='intro'><?php echo ($info["intro"]); ?></textarea>
						</p>
						<p><label>标签:</label> 
								<?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i; if(($tag["is"]) == "1"): ?><input type='checkbox' value='<?php echo ($tag["tag_id"]); ?>' checked name='tag[]'/><?php echo ($tag["tag"]); ?>&nbsp;&nbsp;
								<?php else: ?>
								<input type='checkbox' value='<?php echo ($tag["tag_id"]); ?>' name='tag[]'/><?php echo ($tag["tag"]); ?>&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
							
						</p>
						<hr />
						<p>
							<input type="hidden" name='book_id' value="<?php echo ($info["book_id"]); ?>" />
							<input type="hidden" name='type' value="<?php echo ($type); ?>" />
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