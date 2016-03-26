<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>有书漂流瓶</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="__PUBLIC__/css/ad/ad01.css">
<link rel="stylesheet" href="__PUBLIC__/css/ad/swiper.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/ad/move.css">
<!-- Demo styles -->
<style>
html, body {
    position: relative;
    height: 100%;
}
body {
    background: #eee;
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color:#000;
    margin: 0;
    padding: 0;
}
.swiper-container {
    width: 100%;
    height: 100%;
}
.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}
</style>
    
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/ad.js" type="text/javascript"></script>
</head>
<body>

    <div class="swiper-container">
        <div class="swiper-wrapper advertisement">
    
    
            <div class="swiper-slide ad01" >
                <div class="cove">
                    <div class="pic"></div>
                    <div class="text"></div>
                </div>
            </div>

            <div class="swiper-slide ad02">
                <div class="cove">
                    <div class="pic"><img src="__PUBLIC__/images/ad/ad_bg_02.png"></div>
                    <div class="text"></div>
                </div>
            </div>

            <div class="swiper-slide ad03">
                <div class="cove">
                    <div class="pic"><img src="__PUBLIC__/images/ad/ad_03_bg.png"></div>
                    <div class="text"></div>
                    <div class="button"><a href="/tijiao?type=<?php echo ($type); ?>">立即参与</a></div>
                </div>
            </div>
            
        </div>
    </div>

    
<!-- Swiper JS -->
<script src="__PUBLIC__/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    direction: 'vertical'
});
</script>
</body>
</html>