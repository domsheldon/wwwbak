<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>用户协议 - Readoo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <link href="__PUBLIC__/css/help.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content">
	<div class="con">
		<img src='http://list.com/qrcode'/>
		扫描二维码登录Readoo

	</div>

</div>
<input type='hidden' id='uuid' value='<?php echo ($uuid); ?>'/>
<script type='text/javascript' src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
<script type='text/javascript'>
var uuid=$("#uuid").val();
var post_count=0;
$(function () {
    function poll() {
    	post_count++;
        $.ajax({
            type: "GET",
            url: "/scan?uuid="+uuid,
            dataType: "json",
            cache: false,
            timeout: 100000,
            success: function (data) {
            	if (post_count>6) {
            		clearTimeOut('poll');
            	}
                if (data.scaned) {
                	 window.location.href = "/edit?uuid="+uuid;
                }
                else {
                	setTimeout(function () {
                        poll();
                    }, 5000);
                }
            },
            error: function () {
                setTimeout(function () {
                    poll();
                }, 5000);
            }
        });
    }
  
    poll();
    
})
</script>
</body>
</html>