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
					<?php if(($list_type) != "search"): ?><h2>用户列表</h2>
					<?php else: ?>
						<h2>搜索结果</h2><?php endif; ?>
					&nbsp;&nbsp;&nbsp;<a href='__GROUP__/Users/adminPush'>全部推送</a>
					<form action="__GROUP__/Users/search" method="post">
						<input type="text" class="text" name='kw' value="Search" /><input type='submit' value='搜索'/>
					</form>
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="__GROUP__/Users/del" method="get">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>用户ID</th>
									<th>用户名</th>
									<th>头像</th>
									<th>性别</th>
									<th>可用书币</th>
									<th>注册时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
									<td><input type="checkbox" name='id[]' value='<?php echo ($info["id"]); ?>'/></td>
									<td><?php echo ($info["id"]); ?></td>
									<td><a href="__GROUP__/Users/info?id=<?php echo ($info["id"]); ?>"><?php echo ($info["name"]); ?></a></td>
									
									<td><img src='__AVATAR__<?php echo ($info["avatar"]); ?>__AVATARRULE__' width='20' height='20'/></td>
									<td>
									<?php if(($info["sex"]) == "1"): ?>男<?php else: ?>女<?php endif; ?>
									</td>
									<td><?php echo ($info["applyd_money"]); ?></td>
									<td><?php echo (date('Y-m-d H:i:s',$info["create_time"])); ?></td>
									<td><a href="__GROUP__/Users/info?id=<?php echo ($info["id"]); ?>">查看详情</a></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
							
						</table>
						
						<div class="pagination right">
							<a href="__GROUP__/Users?page=<?php echo ($page-1); ?>">&laquo;</a>
							<?php $__FOR_START_20207__=1;$__FOR_END_20207__=$sum+1;for($i=$__FOR_START_20207__;$i < $__FOR_END_20207__;$i+=1){ if(($page) == $i): ?><a href="__GROUP__/Users?page=<?php echo ($i); ?>" class="active"><?php echo ($i); ?></a>
							<?php else: ?>
								<a href="__GROUP__/Users?page=<?php echo ($i); ?>"><?php echo ($i); ?></a><?php endif; } ?>
							<a href="__GROUP__/Users?page=<?php echo ($page+1); ?>">&raquo;</a>
						</div>		<!-- .pagination ends -->
						
					</form>
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>	
			</div>
			</div>
<script type="text/javascript">
$('td :checkbox').click(function(){
	var c=$(this).attr('checked');
	var uid=$(this).attr('value');
	var val=0;
	if(c){
		val=1;
	}
	$.ajax({   
        type : 'post',
        url : '__GROUP__/Users/set_admin',    
        dataType : 'json',
        data : {uid : uid,is:val},
   });
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