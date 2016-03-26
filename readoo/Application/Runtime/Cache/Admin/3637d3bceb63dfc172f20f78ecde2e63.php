<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Adminus &#9679; Page</title>
    <style type="text/css" media="all">
		@import url("__PUBLIC__/css/style.css");
		@import url("__PUBLIC__/css/jquery.wysiwyg.css");
		@import url("__PUBLIC__/css/facebox.css");
		@import url("__PUBLIC__/css/visualize.css");
		@import url("__PUBLIC__/css/date_input.css");
    </style>
	<!--[if lt IE 8]><style type="text/css" media="all">@import url("css/ie.css");</style><![endif]-->
</head>

<body>
	<div id="hld">
		<div class="wrapper">		<!-- wrapper begins -->
			<div class="block small center login">
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					<h2>Login</h2>
					<ul>
						<li><a href="http://www.fengwo.com">back to the site</a></li>
					</ul>
				</div>		<!-- .block_head ends -->
				<div class="block_content">
					<form action="__GROUP__/Login/index" method="post">
						<p>
							<label>Username:</label> <br />
							<input type="text" class="text" value="" name='username'/>
						</p>
						<p>
							<label>Password:</label> <br />
							<input type="password" class="text" value="" name='password'/>
						</p>
						<p>
							<input type="submit" class="submit" value="Login" /> &nbsp; 
							<input type="checkbox" class="checkbox" checked="checked" id="rememberme" /> <label for="rememberme">Remember me</label>
						</p>
					</form>
					
				</div>		<!-- .block_content ends -->
					
				<div class="bendl"></div>
				<div class="bendr"></div>
								
			</div>		<!-- .login ends -->
			

		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->
	

</body>
</html>