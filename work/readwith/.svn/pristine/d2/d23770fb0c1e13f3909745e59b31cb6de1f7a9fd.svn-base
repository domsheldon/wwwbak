<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <title>中国第一款陪读应用Readoo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
</head>
<body>
  <div class="content-main">
     <div class="mod-project-card funding">
       <div class="mod-project-card_header clearfix">
         <div class="mod-project-card_header__avatar"><img src="__PUBLIC__/images/logo_01.png" width="50" height="50"></div>
         <div class="mod-project-card_header__user">
           <span style='font-size:18px'><span class="blue"><?php echo ($user_info["name"]); ?></span>读完了《<?php echo ($info["book_name"]); ?>》</span>
           <p class="mod-project-card_header__time">留下了<span class="blue"><?php echo ($word_count); ?></span>字的读书笔记</p>
         </div>
       </div>
    <?php if(is_array($task_list)): $i = 0; $__LIST__ = $task_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mod-project-card_content">
		   <header class="mod-project-card_content__header clearfix">
				<span class="timeline"><?php echo ($vo["title"]); ?></span><span class="times"><?php echo ($vo["update_time"]); ?></span>
		   </header>
           <div class="mod-project-card_content__detail">
             <p class="description"><?php echo ($vo["content"]); ?></p>
           </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="mod-project-card_content">
			<div class="praise" id="love">
					<img src="__PUBLIC__/images/Praise_bj.png">
					<div class="zan">
                        <?php if(!empty($cookie_name)): ?><img id="loveimg" src="__PUBLIC__/images/Praise.png">
                        <?php else: ?>
                            <img id="loveimg" src="__PUBLIC__/images/Praise_01.png"><?php endif; ?>

                    </div>
					<span id="count"><?php echo ($info["digg_count"]); ?></span>
			</div>
		</div>
     </div>
      <input type='hidden' value='<?php echo ($info["id"]); ?>' id='task_id'>
      <input type='video' src='http://cover.fengwo.com/readoo/20151222/56790b4c00d46.mp3'/>
  </div>
   <div class="bottom_Download clearfix">
         <div class="logo"><img src="__PUBLIC__/images/logo.png"></div>
         <div class="B">
           <span>Readoo</span>
           <p>中国第一款陪读应用</p>
         </div>
		 <div class="Download">
			<a href="http://fir.im/readoo">立即下载</a>
		 </div>

       </div>
<script type="text/javascript">
    $('#love').click(function(){
        var val = $('#task_id').val();
        var digg_count =$("#count").html();
        
        $.ajax({
            type : 'post',
            url : '/dodigg',
            data : {'id':val},
            success : function(msg) {
	            if (msg == 'digg') {
	                $("#count").html(parseInt(digg_count)+1);
	                $("#loveimg").attr('src',"__PUBLIC__/images/Praise.png");
	 
	             }
            },
            error :function(e){
            	alert(e);
				$("#loveimg").attr('src',"__PUBLIC__/images/Praise.png");
            }
        });
        
    });
</script>

 </body></html>