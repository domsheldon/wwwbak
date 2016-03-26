<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>联系我们 - 有书官方网站</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="__PUBLIC__/css/index.css">
<link rel="stylesheet" href="__PUBLIC__/css/web_move.css">
<link rel="stylesheet" href="__PUBLIC__/css/m.css">
</head>
<body scroll="no" style="overflow: hidden;">
<div class="youshu">    
    <div class="header">
        <h1><a href="/">有书-找回成长的力量</a></h1>
        <div class="menu">
            <div class="m_sle"><a href="javascript:void(0);">联系我们</a></div>
            <ul>
                <li><a href="/" class="shouye">首页</a></li>
                <li><a href="wabout" class="gy">关于有书</a></li>
                <li><a href="act" class="hd">最新活动</a></li>
                <li><a href="contact" class="lx sel">联系我们</a></li>
            </ul>
        </div>
    </div>
    
    <div class="contact">
        <div class="leftside">
            <div class="con">
                <div class="bg">
                    <h2>联系我们connect us</h2>
                    <div class="x">
                        <table>
                            <tr>
                                <td class="laber"><span>电话</span></td>
                                <td>010-51457677</td>
                            </tr>
                            <tr>
                                <td class="laber"><span>邮箱</span></td>
                                <td>kf@youshu.cc</td>
                            </tr>
                            <tr>
                                <td class="laber"><span>地址</span></td>
                                <td><img src="__PUBLIC__/images/youshu_addr.png"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="b"></div>
                </div>
            </div>
        </div>
        
        <div class="rightside">
            <div class="mes">
                <h2>填写信息</h2>
                <div class="x">
                    <form action="/liuyan" method="post" name="form" onSubmit="return check();">
                    <table>
                        <tr>
                            <td class="laber">姓名</td>
                            <td><input type="text" name="name" class="xm" value="请输入您的姓名"></td>
                        </tr>
                        <tr>
                            <td class="laber">电话</td>
                            <td><input type="text" name="phone" class="dh" value="请输入您的电话"></td>
                        </tr>
                        <tr>
                            <td class="laber">留言</td>
                            <td><textarea name="content" class="ly">请输入您的宝贵建议</textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type=submit value=" 提 交 " class="sub"></td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="b"></div>
            </div>
        </div>
        <div class="erweima">
            <div class="ma"><img src="__PUBLIC__/images/youshu_erweima.png"><p>扫一扫关注我们</p></div>
        </div>
    </div>
    
    <div class="footer ii">
        <div class="copy">
            <p><a href="http://www.youshu.cc">www.youshu.cc</a> <a href="http://www.youshu.cc">有书</a> 2014 © All Rights Reserved<span>京ICP备10039869号</span></p>
        </div>
    </div>
</div>    
    
    
    <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/index.js" type="text/javascript"></script>
<script type="text/javascript">
function check(form){
    var i_n = $(".rightside .xm").val(),
        i_p = $(".rightside .dh").val(),
        t_t = $(".rightside .ly").val();
    if(i_n == "请输入您的姓名"){
        alert("姓名不能为空");
        $(".rightside .xm").focus();
    return false;
    }
    
    if(i_p=="请输入您的电话"){
        alert("电话不能为空");
        $(".rightside .dh").focus();
        return false;
    }
    
    if(t_t=="请输入您的宝贵建议"){
        alert("留言不能为空");
        $(".rightside .ly").focus();
        return false;
    }
}
$(document).ready(function(){
    $(".rightside .xm").focus(function(e){
        var c = $(this).val();
        if(c == "请输入您的姓名" || c == ""){
            $(this).val("");
            $(this).css("color","#333");
        }
    })
    $(".rightside .xm").blur(function(){
        var c = $(this).val();
        if(c == "请输入您的姓名" || c == ""){
            $(this).val("请输入您的姓名");
            $(this).css("color","#ccc");
        }
    });
    
    $(".rightside .dh").focus(function(e){
        var c = $(this).val();
        if(c == "请输入您的电话" || c == ""){
            $(this).val("");
            $(this).css("color","#333");
        }
    })
    $(".rightside .dh").blur(function(){
        var c = $(this).val();
        if(c == "请输入您的电话" || c == ""){
            $(this).val("请输入您的电话");
            $(this).css("color","#ccc");
        }
    });
    
    $(".rightside .ly").focus(function(e){
        var c = $(this).val();
        if(c == "请输入您的宝贵建议" || c == ""){
            $(this).val("");
            $(this).css("color","#333");
        }
    })
    $(".rightside .ly").blur(function(){
        var c = $(this).val();
        if(c == "请输入您的宝贵建议" || c == ""){
            $(this).val("请输入您的宝贵建议");
            $(this).css("color","#ccc");
        }
    });
})
</script> 
</body>
</html>