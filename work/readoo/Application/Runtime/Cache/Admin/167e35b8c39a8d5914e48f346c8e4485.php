<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>readoo后台管理</title>

    <!-- Bootstrap Core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="__PUBLIC__/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="__PUBLIC__/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="__PUBLIC__/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="__PUBLIC__/js/html5shiv.js"></script>
    <script src="__PUBLIC__/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">请输入用户名和密码</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="用户名" id="username" name="username" type="username" value="" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="密码" id="password" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label id="check_login_label">
                                <input name="check_login" id="check_login" class="check_login" checked="checked" type="checkbox" style="cursor:pointer">
                                <span class="checkbox-t">记住帐号密码</span>
                            </label>
                        </div>
                        <button class="btn btn-lg btn-success btn-block login">登录</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="__PUBLIC__/js/jquery-1.11.0.js"></script>
    <script src="__PUBLIC__/js/cookie.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="__PUBLIC__/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="__PUBLIC__/js/sb-admin-2.js"></script>

</body>
<script type="text/javascript">
$(function() {
	$("#username").val(getCookie('username'));
	$("#password").val(getCookie('pwd'));
	
})
    $('.login').click(function(){
        var username = $('#username').val();
        var password = $('#password').val();
        var check_login = document.getElementById("check_login").checked;
        $.ajax({
            type:'post',
            url:'/admin/login/verify',
            data : {'username':username,'password':password,'check_login':check_login},
            success : function(msg) {
                if(msg.indexOf('1')>=0) {
                	if (check_login) {
                		setCookie('username', username);
                		setCookie('pwd', password);
                	}
                    window.location.href='/admin/backend/index';
                }
                else if(msg.indexOf('0')>=0){
                    alert('用户名不存在或者密码错误！');
                }
            },
            error :function(e){
                alert(e);
            }
        })
    })
</script>
</html>