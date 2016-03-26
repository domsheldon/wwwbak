<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>9个梦想赞助者招募</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>
*{margin: 0px;padding: 0px;}
.advertisement04{width: 100%;max-width: 640px;margin: auto;position: relative;background-image: url(__PUBLIC__/images/ad/ad03_bg.png);background-color: #24aadc;background-repeat: no-repeat;background-size: 100% 100%;}
.advertisement04:before{content: ""; display: block; padding-top: 180%;}
.advertisement04 .text{background-image: url(__PUBLIC__/images/ad/ad03_text.png);background-size: 100% auto; background-repeat: no-repeat;width: 94%;line-height: 24px;position: absolute;top: 2%;left: 3%;z-index: 2;}
.advertisement04 .text:before{content: ""; display: block; padding-top: 150%;}
.advertisement04 .bjf{background-image: url(__PUBLIC__/images/ad/ad03_pic02.png);background-size: 100% auto; background-repeat: no-repeat;width: 100%;line-height: 24px;position: absolute;bottom: 0px;left: 0%;z-index: 1;}
.advertisement04 .bjf:before{ content: ""; display: block; padding-top: 31%;}
.but{position: absolute;bottom: 5%;z-index: 5;width: 100%;}
.but a{background-image: url(__PUBLIC__/images/ad/ad03_jionus.png);background-size: 100% auto; background-repeat: no-repeat;width: 23%;display: block;margin: auto;}
.but a:before{ content: ""; display: block; padding-top: 56.8%;}
</style>
</head>
<body>
<section class="advertisement04">
    <div class="text"></div>
    <div class="bjf"></div>
    <div class="but"><a href="/tijiao/<?php echo ($ad_id); ?>"></a></div>
</section>
</body>
</html>