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
	<script src="__PUBLIC__/js/jquery.date_input.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $("#usertype").live("change",function(){
	              $("#form").submit();
	         }); 
		});
	</script>
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
			
			<!-- 领域列表 -->
			<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					<h2>活动动态列表(<?php echo ($count); ?>条)</h2>
					<form action='__GROUP__/Feed/add' method='get' style='float: right;'>
						<input type='submit' value='新增动态' class='submit small'/>
					</form>
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="" method="get">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>动态ID</th>
									<th>书名</th>
									<th>发布时间</th>
									<th>二维码</th>
								</tr>
							</thead>
							<tbody>
							<?php if(is_array($feed_list)): $i = 0; $__LIST__ = $feed_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
									<td><input type="checkbox" name='id[]' value='<?php echo ($info["feed_id"]); ?>'/></td>
									<td><?php echo ($info["feed_id"]); ?></td>
									<td><?php echo ($info["book_title"]); ?></td>
									<td><?php echo (date('m-d H:i',$info["create_time"])); ?></td>
									
									<td><img src='__GROUP__/Feed/feed_qrcode?id=<?php echo ($info["feed_id"]); ?>'></img></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
							
						</table>
						
						<div class="pagination right">
							<a href="__GROUP__/Feed/adminFeed?page=<?php echo ($page-1); ?>">&laquo;</a>
							<?php $__FOR_START_9542__=1;$__FOR_END_9542__=$sum+1;for($i=$__FOR_START_9542__;$i < $__FOR_END_9542__;$i+=1){ if(($page) == $i): ?><a href="__GROUP__/Feed/adminFeed?page=<?php echo ($i); ?>" class="active"><?php echo ($i); ?></a>
							<?php else: ?>
								<a href="__GROUP__/Feed/adminFeed?page=<?php echo ($i); ?>"><?php echo ($i); ?></a><?php endif; } ?>
							<a href="__GROUP__/Feed/adminFeed?page=<?php echo ($page+1); ?>">&raquo;</a>
						</div>		<!-- .pagination ends -->
						
					</form>
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>	
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