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
					<?php if(($list_type) != "search"): ?><h2>动态列表(<?php echo ($count); ?>条)</h2>
					<?php else: ?>
						<h2>搜索结果</h2><?php endif; ?>
					<form action='__GROUP__/Feed/add' method='get' style='float: right;'>
						<input type='submit' value='新增动态' class='submit small'/>
					</form>
				</div>		<!-- .block_head ends -->
				
				<div class='block_content'>高级筛选
					<form action='__GROUP__/Feed' method='get'>
					<p>
					时间段 ：<input type="text" name='sdate' class="text date_picker" value='<?php echo ($sdate); ?>'/>——<input type="text" name='edate' class="text date_picker" value='<?php echo ($edate); ?>'/>
					</p>
					<!--<p>
						是否归还 ：
						<?php if(($is_back) == "1"): ?><input type='radio' name='is_back' class="radio" value='1' checked/>是 
						<?php else: ?>
							<input type='radio' name='is_back' class="radio" value='1'/>是<?php endif; ?>
						<?php if(($is_back) == "1"): ?><input type='radio' name='is_back' class="radio" value='0' checked/>否 
						<?php else: ?>
						<input type='radio' name='is_back' class="radio" value='0'/>否<?php endif; ?>
					</p>
					<p>
						是否下架 ：
						<?php if(($is_back) == "1"): ?><input type='radio' name='is_delete' class="radio" value='1' checked/>是 
						<?php else: ?>
							<input type='radio' name='is_delete' class="radio" value='1'/>是<?php endif; ?>
						<?php if(($is_back) == "1"): ?><input type='radio' name='is_delete' class="radio" value='0' checked/>否 
						<?php else: ?>
						<input type='radio' name='is_delete' class="radio" value='0'/>否<?php endif; ?>
					</p>
					-->
					<p>
						申请状态 ：
						<?php if(is_array($apply_status)): $k = 0; $__LIST__ = $apply_status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$apply): $mod = ($k % 2 );++$k; if(!empty($show_status)): ?><input type='checkbox' name='status[]' class="checkbox" checked/> <?php echo ($apply); ?> 
							<?php else: ?>
								<input type='checkbox' name='status[]' class="checkbox" value='<?php echo ($k-1); ?>' /> <?php echo ($apply); endif; endforeach; endif; else: echo "" ;endif; ?> 
					</p>
					<p>用户ID ：<input type='text' name='uid' value='<?php echo ($uid); ?>'/></p>
					
					<input type='submit' value='筛选' class='submit small'/>
					</form>
					
				</div>
				
				<div class="block_content">
					<form action="__GROUP__/Feed/del" method="get">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>动态ID</th>
									<th>贡献者</th>
									<th>贡献者ID</th>
									<th>书名</th>
									<th>申请状态</th>
									<th>申请数量</th>
									<th>发布时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if(is_array($feed_list)): $i = 0; $__LIST__ = $feed_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
									<td><input type="checkbox" name='id[]' value='<?php echo ($info["feed_id"]); ?>'/></td>
									<td><?php echo ($info["feed_id"]); ?></td>
									<td><?php echo ($info["user_name"]); ?></td>
									<td><?php echo ($info["user_id"]); ?></td>
									<td><< <?php echo ($info["book_title"]); ?> >></td>
									
									<?php switch($info["is_agree"]): case "0": ?><td>申请中</td><?php break;?>
									<?php case "1": ?><td>已同意</td><?php break;?>
									<?php case "3": ?><td>已收书</td><?php break;?>
									<?php case "4": ?><td>已归还</td><?php break; endswitch;?>
									
									<td><?php echo ($info["apply_count"]); ?></td>
									<td><?php echo (date('m-d H:i',$info["create_time"])); ?></td>
									<td><a href="__GROUP__/Feed/info?id=<?php echo ($info["feed_id"]); ?>">查看详情</a></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
							
						</table>
						
						<div class="pagination right">
							<a href="__GROUP__/Feed?page=<?php echo ($page-1); ?>">&laquo;</a>
							<?php $__FOR_START_6565__=1;$__FOR_END_6565__=$sum+1;for($i=$__FOR_START_6565__;$i < $__FOR_END_6565__;$i+=1){ if(($page) == $i): ?><a href="__GROUP__/Feed?page=<?php echo ($i); ?>" class="active"><?php echo ($i); ?></a>
							<?php else: ?>
								<a href="__GROUP__/Feed?page=<?php echo ($i); ?>"><?php echo ($i); ?></a><?php endif; } ?>
							<a href="__GROUP__/Feed?page=<?php echo ($page+1); ?>">&raquo;</a>
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