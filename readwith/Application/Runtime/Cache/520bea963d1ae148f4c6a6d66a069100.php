<?php if (!defined('THINK_PATH')) exit();?><!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>有书</title>
    <link rel="stylesheet" href="__PUBLIC__/css/idangerous.swiper.css">
    <link rel="stylesheet" href="__PUBLIC__/css/css.css">
	<link rel="stylesheet" href="__PUBLIC__/css/move.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script type="text/javascript">
        if(/Android (\d+\.\d+)/.test(navigator.userAgent)){
            var version = parseFloat(RegExp.$1);
            if(version>2.3){
                var phoneScale = parseInt(window.screen.width)/480;
                document.write('<meta name="viewport" content="width=480, minimum-scale = '+ phoneScale +', maximum-scale = '+ phoneScale +', target-densitydpi=device-dpi">');
            }else{
                document.write('<meta name="viewport" content="width=480, target-densitydpi=device-dpi">');
            }
        }else{
            document.write('<meta name="viewport" content="width=480, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>
    
</head>
<body>
<div class="loading"><img src="__PUBLIC__/images/youshu.gif"><br>页面正在加载中...</div>
<div class="rongqi" style="display:none">    
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide blue-slide animate">
                <div class="youshu01">
					
					<div class="next"></div>
                </div>
            </div>
            <div class="swiper-slide blue-slide">
                <div class="youshu02">
					
					<div class="next"></div>
                </div>
            </div>
			
            <div class="swiper-slide blue-slide">
                <div class="youshu03">
					
					<div class="next"></div>
                </div>
            </div>

            
            <div class="swiper-slide blue-slide">
                <div class="youshu05">
					<div class="logo"><a href="/download" target="_blank"></a></div>
					<div class="tishi"><a href="/download" target="_blank"></a></div>
					<div class="shou"></div>
					
                </div>
            </div>			
        </div>
    </div>
</div>    
    
<script src="__PUBLIC__/js/jquery-1.10.1.min.js"></script>
<script src="__PUBLIC__/js/js.js"></script>
<script src="__PUBLIC__/js/idangerous.swiper.min.js"></script>
<script src="__PUBLIC__/js/idangerous.swiper.progress.min.js"></script>
<script>
$(document).ready(function(){
var mySwiper = new Swiper('.swiper-container',{
	loop: false,
	mode: 'vertical',
	resistance: "100%",
	onSlideChangeStart: function (swiper, direction) {
			var pre = swiper.previousIndex;
			var cur = swiper.activeIndex;
			var $page = $(swiper.getSlide(cur));
			var $pre = $(swiper.getSlide(pre));
			$pre.removeClass('animate');
			$page.addClass('animate');
	}
})
})
</script>
</body>
</html>