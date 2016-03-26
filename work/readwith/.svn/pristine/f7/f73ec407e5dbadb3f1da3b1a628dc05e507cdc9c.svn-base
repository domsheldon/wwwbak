<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>最新活动 - 有书官方网站</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="__PUBLIC__/css/index.css">
<link rel="stylesheet" href="__PUBLIC__/css/web_move.css">
<link rel="stylesheet" href="__PUBLIC__/css/m.css">
</head>
<style>
@media (min-width: 800px) {
    .header{
        position: fixed;
    }
}
    .ac_bg{
        position: fixed;
        background-image: url("__PUBLIC__/images/youshu_bg.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        z-index: 1;
        bottom: 0px;
    }
    .header{
        
        width: 100%;
        z-index: 21;
        top: 30px;
    }
    .zhezhao{
        filter: alpha(opacity = 30);
        -moz-opacity: 0.3;
        -khtml-opacity: 0.3;
        opacity: 0.3;
        background-color: #FFF;
        width: 100%;
        position: fixed;
        top: 0px;
        height: 60px;
        z-index: 20;
        display: none;
    }
    .youshu{
        position: absolute;
        z-index: 10;
    }
    .clear{
        clear: both;
    }
</style>
<body>
<div class="ac_bg"></div>
<div class="youshu">    
    <div class="header" style="margin-top: 0px;">
        <h1><a href="/">有书-找回成长的力量</a></h1>
        <div class="menu">
            <div class="m_sle"><a href="javascript:void(0);">最新活动</a></div>
            <ul>
                <li><a href="/" class="shouyel">首页</a></li>
                <li><a href="wabout" class="gy">关于有书</a></li>
                <li><a href="act" class="hd  sel">最新活动</a></li>
                <li><a href="contact" class="lx">联系我们</a></li>
            </ul>
        </div>
    </div>
    <div class="zhezhao"></div>
    
    <div class="activity">
        <div class="left_menu">
            <div class="bg">
                <ul>
                    <li><a href="#">校园活动</a></li>
                    <li><a href="#">企业活动</a></li>
                    <li><a href="#">社会活动</a></li>
                </ul>
            </div>
        </div>

        <div class="b_list">
            <div class="m_laber">
                <div class="num">
                    <div class="num01">1</div>
                    <div class="num02">2</div>
                    <div class="num03">3</div>
                    <div class="line01"></div>
                    <div class="line02"></div>
                    <div class="line03"></div>
                </div>
            </div>
            
            <div class="banaer">
                <div class="b01"><img src="__PUBLIC__/images/activty_banner01.jpg"></div>
                <div class="b02"><img src="__PUBLIC__/images/activty_banner02.jpg"></div>
                <div class="b03"><img src="__PUBLIC__/images/activty_banner03.jpg"></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    
    <div class="footer" style="position: relative;">
        <div class="copy">
            <p><a href="http://www.youshu.cc">www.youshu.cc</a> <a href="http://www.youshu.cc">有书</a> 2014 © All Rights Reserved<span>京ICP备10039869号</span></p>
        </div>
    </div>
    
</div>    

    
    <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/index.js" type="text/javascript"></script>
<script type="text/javascript">
    var scrollFunc = function (e) {  
        e = e || window.event;  
        if (e.wheelDelta) {  //判断浏览器IE，谷歌滑轮事件               
            if (e.wheelDelta > 0) { //当滑轮向上滚动时  
                
                var jr = $(document).scrollTop();
                if(jr<=100){
                    $(".zhezhao").fadeOut(500);
                    $(".youshu .header").addClass("head_sel");
                    $(".youshu .header").removeClass("head_qx");
                }
            }  
            if (e.wheelDelta < 0) { //当滑轮向下滚动时  
                $(".zhezhao").fadeIn(500);
                $(".youshu .header").removeClass("head_sel");
                $(".youshu .header").addClass("head_qx");
            }  
        } else if (e.detail) {  //Firefox滑轮事件  
            if (e.detail> 0) { //当滑轮向上滚动时  


            }  
            if (e.detail< 0) { //当滑轮向下滚动时  
                $(".zhezhao").fadeIn(500);
                $(".youshu .header").animate({top:'5px'});
            }  
        }  
    }  
    //给页面绑定滑轮滚动事件  
    if (document.addEventListener)   
    //滚动滑轮触发scrollFunc方法  //ie 谷歌  
    window.onmousewheel = document.onmousewheel = scrollFunc;
    
    function heae(){
        var juanqu = $(document).scrollTop();
        if(juanqu <= 100){
            $(".zhezhao").css("display","none");
            $(".youshu .header").css("top","30px");
            //alert("aa");
        }
        
    }

    




    
$(document).ready(function(){ 
    
    var img_atrr = new Array(
        '__PUBLIC__/images/activty_banner01.jpg',
        "__PUBLIC__/images/activty_banner02.jpg",
        "__PUBLIC__/images/activty_banner03.jpg"
    );
    
    //图片预加载开始   
    function loadimg(arr,funLoading,funOnLoad,funOnError){
        var numLoaded=0,
        numError=0,
        isObject=Object.prototype.toString.call(arr)==="[object Object]" ? true : false;

        var arr=isObject ? arr.get() : arr;
        for(a in arr){
            var src=isObject ? $(arr[a]).attr("data-src") : arr[a];
            preload(src,arr[a]);
        }

        function preload(src,obj){
            var img=new Image();
            img.onload=function(){
                numLoaded++;
                funLoading && funLoading(numLoaded,arr.length,src,obj);
                funOnLoad && numLoaded==arr.length && funOnLoad(numError);
            };
            img.onerror=function(){
                numLoaded++;
                numError++;
                funOnError && funOnError(numLoaded,arr.length,src,obj);
            }
            img.src=src;
        }
     }
    
    var imgonload=function(errors){
        /*errors：加载出错的图片数量；*/
        //console.log("loaded,"+errors+" images loaded error!");
    }

    var funloading=function(n,total,src,obj){
            /*
            n：已加载完成的数量；
            total：总共需加载的图片数量；
            src：当前加载完成的图片路径；
            obj：当loadimg函数中传入的arr为存放图片路径的数组时，obj=src，是图片路径，
                   当arr为jquery对象时，obj是当前加载完成的img dom对象。
           */
        //console.log(n+"of"+total+" pic loaded.",src);
        var newimg = document.createElement("img");
        newimg.src=src;
        //$("body").append(newimg).fadeIn();
        
        if(n > 2){
            //加载完成后执行
            var h01 = $(".youshu .activity .b_list .banaer .b01").height();
            $(".youshu .activity .b_list .m_laber .line01").animate({height: h01});
            var h02 = $(".youshu .activity .b_list .banaer .b02").height();
            $(".youshu .activity .b_list .m_laber .line02").animate({height: h02+h01+30});
            $(".youshu .activity .b_list .m_laber .num02").animate({top: h01});
            var h03 = $(".youshu .activity .b_list .banaer .b03").height();
            $(".youshu .activity .b_list .m_laber .line03").animate({height: h03+h01+h02+60});
            $(".youshu .activity .b_list .m_laber .num03").animate({top: h01+h02+30});
        }
    }

    var funloading_obj=function(n,total,src,obj){
        //console.log(n+"of"+total+" pic loaded.",src);
        $(obj).attr("src",src);
        $(obj).fadeIn(200);
    }

    var funOnError=function(n,total,src,obj){
        //console.log("the "+n+"st img loaded Error!");
    }
    
    loadimg(img_atrr,funloading,imgonload,funOnError);
    //图片预加载结束

})
</script>  
</body>
</html>