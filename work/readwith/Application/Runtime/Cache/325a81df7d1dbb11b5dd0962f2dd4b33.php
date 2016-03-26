<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>读书笔记</title>
<meta charset="utf-8">
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="__PUBLIC__/css/style.css">
<style>
body{background-color: #F3F3F3;}
.dszj_header{background-color: #FAFAFA;overflow: hidden;}
.dszj_header .t{margin-top: 15px;padding-left: 20px;padding-right: 20px;overflow: hidden;}
.dszj_header .t dl{float: left;}
.dszj_header .t dt{margin-right: 10px;float: left;}
.dszj_header .t dt img{width: 62px;height: 62px;border-radius: 60px;-moz-border-radius: 60px;}
.dszj_header .t dd{margin-top: 5px;font-size: 14px;color: #989898;display: inline-block;}
.dszj_header .t dd span{font-size: 20px;color: #454545;display: block;font-weight: bold;padding-bottom: 15px;}
.dszj_header .t .tim{float: right;text-align: right;}
.dszj_header .t .tim em{width: 21px;height: 21px;background: url("__PUBLIC__/images/dsbj.png") -1px -2px;display: block;margin-left:30px;margin-bottom: 17px;background-size: 100px 26px;}
.dszj_header .t .tim span{font-size: 14px;color: #989898;}
.dszj_header .c{margin-left: 30px;margin-right: 20px;overflow: hidden;margin-top: 20px;}
.dszj_header .c .xq p{color: #828282;line-height: 24px;}
.dszj_header .c .pic{width: 100%;overflow: hidden;}
.dszj_header .c .pic ul{width: 110%;}
.dszj_header .c .pic ul li{float: left;margin-top: 20px;margin-right: 3%;display: inline-block;width: 28%;max-height: 23%; overflow: hidden;}
.dszj_header .c .pic ul li img{}
.dszj_header .f{margin: 20px 20px 20px 30px;background-color: #eee;padding: 6px;overflow: hidden;}
.dszj_header .f dl{}
.dszj_header .f dt{float: left;margin-right: 15px;}
.dszj_header .f dt img{width: 61px; height: 78px;}
.dszj_header .f dd{color: #989898;font-size: 14px;}
.dszj_header .f dd span{color: #454545;display: block;font-size: 16px;margin-bottom: 15px;}
.zp_zan{padding:0 20px 20px 20px;background-color: #fff;margin-top: 15px;}
.zp_zan .h{overflow: hidden;border-bottom: 1px solid #F3F3F3;}
.zp_zan .h .l{float: left;}
.zp_zan .h .r{float: right;}
.zp_zan .h a{width: 93px;line-height: 50px;text-align: center;font-size: 16px;color: #6B6B6B;}
.zp_zan .h .s{margin-left: 15px;display: inline-block;border-bottom: 1px solid #31C08C;}
.zp_zan .list{}
.zp_zan .list dl{font-size: 14px; color: #868686;border-bottom: 1px solid #F3F3F3;padding: 20px 0;}
.zp_zan .list dt{float: left;}
.zp_zan .list dt img{width: 48px;height: 48px;border-radius: 25px;-moz-border-radius: 25px;}
.zp_zan .list dd{line-height: 24px;margin-left: 60px;}
.dsbj_b{max-width: 440px;margin: auto; line-height: 51px;border-top: 1px solid #F3F3F3;background-color: #fff;padding-left: 20px;padding-right: 20px;}
.dsbj_b em{background: url(__PUBLIC__/images/zan.png);display: inline-block;text-indent:-9999px;margin-top: 15px;background-size: 25px 27px;}
.dsbj_b .s em{width: 23px;height:24px;background-position: -23px 0;}
.dsbj_b .p em{width: 26px;height:26px;background-position: -47px 0;}
.dsbj_b .z em{width: 25px;height:26px;background-position: -75px 0;}
.dsbj_b .s{float: left;}
.dsbj_b .p{text-align: center;display: inline-block;width: 80%;}
.dsbj_b .z{float: right;}
</style>
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/js.js" type="text/javascript"></script>
</head>
<body>
<div class="book_share_down">
    <div class="head">
        <p>有书，每天更好一点</p>
        <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书" class="downapp">立即下载</a>
        <em></em>
    </div>
</div>
<section>
    <div class="dszj_header">
        <div class="t">
            <dl>
                <dt><img src="<?php echo ($info["user_info"]["avatar"]); ?>"></dt>
                <dd><span><?php echo ($info["user_info"]["name"]); ?></span>发布了读书笔记</dd>
            </dl>
            <div class="tim">
                <span><em></em></span>
                <span><?php echo ($info["create_time"]); ?></span>
            </div>
        </div>
        <div class="c">
            <div class="xq">
                <p><?php echo ($info["content"]); ?></p>
            </div>
            <div class="pic">
                <ul>
                	<?php if(is_array($info["img_str"])): $i = 0; $__LIST__ = $info["img_str"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($v); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="f">
            <dl>
                <dt><img src="<?php echo ($info["book_info"]["cover"]); ?>"></dt>
                <dd><span><?php echo ($info["book_info"]["title"]); ?></span><?php echo ($info["book_info"]["author"]); ?></dd>
            </dl>
        </div>
    </div>
    <div class="zp_zan">
        <div class="h">
            <span class="l">
                <a href="javascript:;" class="s">评论<?php echo ($info["comment_count"]); ?></a>
            </span>
            <div class="dsbj_b">
        		<div class="z" id='digg'><em style='vertical-align: -10px;margin-right: 7px;'>赞</em><span id='digg_count'><?php echo ($info["digg_count"]); ?></span></div>
    		</div>
       		</div>
        <div class="list">
        	<?php if(is_array($info["comment_list"])): $i = 0; $__LIST__ = $info["comment_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                <dt><img src="<?php echo ($v["comment_uinfo"]["avatar"]); ?>"></dt>
                <dd><?php echo ($v["comment_uinfo"]["name"]); ?></dd>
                <dd><?php echo ($v["content"]); ?></dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        <input type='hidden' value='<?php echo ($info["note_id"]); ?>' id='note_id'/>
        </div>
    </div>
    
    <div class="erweima">
        <p><img src="/public/images/qr.png" alt="扫码二维码下载有书"></p>
        <span>扫码二维码<br>下载有书</span>
    </div>
    
</section>

<div class="tips">
    <div class="con">
        <div class="yu">下载有书APP 即可立即借阅</div>
        <div class="btn">
        <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.fengwo.bookapp" title="下载有书APP" class="donwapk">下载</a>
        <a href="javascript:void(0);" title="下载有书APP" class="qx">取消</a>
        </div>
    </div>
</div>
<div class="tmc"></div>
<script type='text/javascript'>
	$("#digg").click(function() {
		var s=$("#digg_count").html();
		var noteid=$("#note_id").val();
		
		$.ajax({
			 type: "POST",
			 url: "/diggNote",
			 data: {"note_id":noteid},
			success: function(msg){
				$('.dsbj_b em').css({background:"url(/public/images/zanhou.png)",width:'25px',height:'28px'});
				$("#digg_count").html(parseInt(s)+1);
			}
		});
	
		
		
		
	});
	
	
</script>
</body>
</html>