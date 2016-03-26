<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>报名</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="__PUBLIC__/css/ad/ad01.css">
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/ad.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">
function check(form){
    var i_n = $(".input_n input").val(),
        i_p = $(".input_p input").val(),
        i_g = $(".input_g input").val(),
        i_s = $(".input_s input").val(),
        i_t = $(".input_t input").val(),
        i_b = $(".input_b input").val(),
        t_t = $(".textare .con textarea").val();
    	var hh = $(".advertisement_message .name").siblings().hasClass("book");
    	    
    if(i_n == "请填写您的姓名"){
        alert(i_n);
        $(".input_n input").focus();
    return false;
    }
    
    if(i_s=="请填写您的学校/公司"){
        alert("学校不能为空");
        $(".input_s input").focus();
        return false;
    }
    
    if(i_g=="请填写您的年级"){
        alert("年级不能为空");
        $(".input_g input").focus();
        return false;
    }
    
    if(i_p=="请填写您的专业"){
        alert("专业不能为空");
        $(".input_p input").focus();
        return false;
    }
    
    if(i_t=="请填写您的电话"){
        alert("电话不能为空");
        $(".input_t input").focus();
        return false;
    }
    
    if(i_b=="请填写您要的书名" && hh){
        alert("书名不能为空");
        $(".input_b input").focus();
        return false;
    }
    
    if(t_t=="一句话介绍"){
        alert("一句话介绍");
        $(".textare .con textarea").focus();
        return false;
    }
}
</script>
<style>
input{border: 0px; width: 99%;padding: 2px 5px;text-align: right;color:#767676;background-color: #fcfcfc;font-size: 16px;margin-right: 5px;}
textarea{width: 100%;height: 120px;font-size: 16px;color:#767676;background-color: #fcfcfc;border: 0px;}
</style>

<section class="advertisement_message">
<form method="post" action="/tijiao/<?php echo ($ad_id); ?>" name="myform" onSubmit="return check();">
    <div class="name">
        <div class="laber"><span>姓名</span></div>
        <div class="input_n"><input type="text" name="name" value="请填写您的姓名"></div>
    </div>
    <div class="school">
        <div class="laber"><span>学校/公司</span></div>
        <div class="input_s"><input type="text" name="school" value="请填写您的学校/公司"></div>
    </div>
    <div class="grade">
        <div class="laber"><span>年级</span></div>
        <div class="input_g"><input type="text" name="nianji" value="请填写您的年级"></div>
    </div>
    <div class="professional">
        <div class="laber"><span>专业</span></div>
        <div class="input_p"><input type="text" name="zhuanye" value="请填写您的专业"></div>
    </div>
    <div class="telehpone">
        <div class="laber"><span>电话</span></div>
        <div class="input_t"><input type="text" name="phone" value="请填写您的电话"></div>
    </div>
    <?php if(($ad_id) == "1"): ?><div class="book">
        <div class="laber"><span>书名</span></div>
        <div class="input_b"><input type="text" name="book" value="请填写您要的书名"></div>
    </div><?php endif; ?>
    <div class="introdction">
    	<?php if(($ad_id) == "1"): ?><span class="t">为什么想读？</span>
        <?php else: ?>
        <span class="t">用一句话介绍你自己</span><?php endif; ?>
        <div class="textare">
            <div class="con"><textarea name="intro">一句话介绍</textarea></div>
            <span><em>0</em>/140</span>
        </div>
    </div>
    <input type='hidden' name='ad_id' value='<?php echo ($ad_id); ?>'/>
    <div class="button"><input type=submit value="立即提交"> </div>
</form>
</section>
</body>
</html>