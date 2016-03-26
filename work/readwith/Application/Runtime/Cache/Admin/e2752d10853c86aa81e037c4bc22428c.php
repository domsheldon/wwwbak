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
			<!-- 书籍列表 -->
			<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>新发漂流书</h2>
				</div>		<!-- .block_head ends -->
				
				<div class="block_content">
					<form action="__GROUP__/Feed/add" method="post" enctype="multipart/form-data">
						
						<p class="fileupload">
							<label>图书isbn:</label><br />
							<input type="text" class="text small" name='isbn' value=''/> 
							<span class="note">*必填</span>
						</p>
						<p class="fileupload">
							<label>发布用户id:</label>
							<select name='uid' id='suid'>
							<option value='2216'>有书君{活动专用号}</option>
							<?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($v["user_id"]); ?>'><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							<option value='1948'>2286</option>
							<option value='2202'>9193</option>
							<option value='11'>1411</option>
							<option value='1146'>3409</option>
							</select>
							<br />
							<!--<input type="text" class="text small" name='href' value='2216' readonly/>
							<span class="note">*必填</span>--> 
						</p>
						<p>
							<label>发布群组:</label>
							<select name='lib'>
							<!-- 这里是固定的几个活动群组 -->
							<option value='17'>北科大青年读书会</option>
							<option value='1'>有书群</option>
							<option value='13'>北语读书沙龙</option>
							<option value='14'>交大先锋文字社</option>
							</select>
						</p>
						<p>
							<label>图书分类:</label>
							<select id='pclass'>
							<?php if(is_array($pclass)): $i = 0; $__LIST__ = $pclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($v["class_id"]); ?>'><?php echo ($v["class_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<select name='class' id='class'>
							<option value='0'>请选择</option>
							</select>
						</p>
						<p>
							<label>读书感悟:</label><br />
							<input type="text" class="text small" id='summary' name='summary' value='<?php echo ($info["ad_href"]); ?>'/> 
							<span id='showZi'></span>
							<span class="note">*必填</span>
						</p>
						<p>
							<label>取书时间:</label><br />
							<input type="text" class="text small" name='time' value='<?php echo ($info["ad_href"]); ?>'/> 
							<span class="note">*必填</span>
						</p>
						<p>
							<label>取书地点:</label><br />
							<input type="text" class="text small" name='place' value='<?php echo ($info["ad_href"]); ?>'/> 
							<span class="note">*必填</span>
						</p>
						<p>
							<label>取书说明:</label><br />
							<input type="text" class="text small" name='content' value='<?php echo ($info["ad_href"]); ?>'/> 
							<span class="note">*必填</span>
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
<script type="text/javascript">
$("#pclass").change(function() {
	var s;
	s=$("#pclass").val();
	$.ajax({ 
		url: "/Admin/Feed/bookClass", 
		type:'post',
		data:{'cid':s},
		success: function(msg){
			$("#class").html(msg);
		}
	});
});
$("#summary").keyup(function() {
	$("#showZi").html($("#summary").val().length);
	if ($("#summary").val().length > 140 ) {
		alert('感悟超过140字了');
	}
});
</script>
</body>
</html>