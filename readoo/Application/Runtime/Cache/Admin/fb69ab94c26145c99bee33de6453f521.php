<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>移动端图片上传解决方案localResizeIMG先压缩后ajax无刷新上传</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width , initial-scale=1.0 , user-scalable=0 , minimum-scale=1.0 , maximum-scale=1.0" />
<script type='text/javascript' src='__PUBLIC__/localUpload/jquery-2.0.3.min.js'></script>
<script type='text/javascript' src='__PUBLIC__/localUpload/LocalResizeIMG.js'></script>
<script type='text/javascript' src='__PUBLIC__/localUpload/mobileBUGFix.mini.js'></script>
<style type="text/css">
body{font-family:"微软雅黑"}
.uploadbtn{ display:block;height:40px; line-height:40px; color:#333; text-align:center; width:100%; background:#f2f2f2; text-decoration:none; }
.imglist{min-height:200px;margin:10px;}
.imglist img{width:100%;}
</style>
</head>
<body>
<div style="width:500px;margin:10px auto; border:solid 1px #ddd; overflow:hidden; ">
	<form action="">
  <input type="file" id="uploadphoto" name="uploadfile" value="请点击上传图片"   style="display:none;" /> 
  <div class="imglist"></div> 
  <a href="javascript:void(0);" onclick="uploadphoto.click()" class="uploadbtn">点击上传文件</a>
  </form>
</div>
<div style="text-align:center;margin-top:50px;">@ <a href="http://www.devdo.net/">码农小兵,专注web开发 欢迎投稿</a></div>
<script type="text/javascript">
$(document).ready(function(e) {
   $('#uploadphoto').localResizeIMG({
      width: 400,
      quality: 0.7,
      success: function (result) {  
		  var submitData={
				base64_string:result.clearBase64, 
			}; 
		$.ajax({
		   type: "POST",
		   url: "/Admin/TestUpload/upload",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
				return false;
			 }else{
				var attstr= '<img src="'+'/'+data.url+'">'; 
				$(".imglist").append(attstr);
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
			   alert(XMLHttpRequest.status);
			   alert(XMLHttpRequest.readyState);
			   alert(textStatus);
			}
		}); 
      }
  });

}); 
</script>
</body>
</html>