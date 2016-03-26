<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>readoo后台管理</title>

    <!-- Bootstrap Core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="__PUBLIC__/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="__PUBLIC__/css/sb-admin-2.css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" rel="stylesheet">

    <!-- Amaze CSS -->
    <link href="/public/amazeui/assets/css/amazeui.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="__PUBLIC__/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="__PUBLIC__/js/html5shiv.js"></script>
    <script src="__PUBLIC__/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>readoo后台管理</title>

    <!-- Bootstrap Core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="__PUBLIC__/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="__PUBLIC__/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="__PUBLIC__/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="__PUBLIC__/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="__PUBLIC__/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="__PUBLIC__/js/html5shiv.js"></script>
    <script src="__PUBLIC__/js/respond.min.js"></script>
    <script src="__ECHARTS__/build/dist/echarts.js" type="text/javascript"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">readoo后台数据首页</a>
        </div>
        <!-- /.navbar-header -->
    </nav>

</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="__PUBLIC__/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="__PUBLIC__/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="__PUBLIC__/js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="__PUBLIC__/js/plugins/morris/raphael.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="__PUBLIC__/js/sb-admin-2.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>readoo后台管理</title>

    <!-- Bootstrap Core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="__PUBLIC__/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="__PUBLIC__/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="__PUBLIC__/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="__PUBLIC__/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="__PUBLIC__/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="__PUBLIC__/js/html5shiv.js"></script>
    <script src="__PUBLIC__/js/respond.min.js"></script>
    <script src="__ECHARTS__/build/dist/echarts.js" type="text/javascript"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="查找...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <?php if(session('user_name') == admin): ?><li>
                            <a id="dashboard" href="/Admin/Backend/index.html"><i class="fa fa-dashboard fa-fw"></i> 后台数据首页</a>
                        </li>
                        <li>
                            <a id="feedback" href="/Admin/Feedback/index.html"><i class="fa fa-table fa-fw"></i> 用户反馈表</a>
                        </li>
                        <!--<li>
                            <a id="book_task_list" href="/Admin/DataList/book_task_list.html"><i class="fa fa-table fa-fw"></i> 书籍任务表</a>
                        </li>
                        <li>
                            <a id="book_pages_list" href="/Admin/BookPages/index.html"><i class="fa fa-table fa-fw"></i>书籍页数列表</a>
                        </li>-->
                        <li>
                            <a id="coreading_list" href="/Admin/PlanBook/coreading.html"><i class="fa fa-table fa-fw"></i>共读列表</a>
                        </li><?php endif; ?>
                    <li>
                        <a id="cust_service_list" href="/Admin/CustService/custservice.html"><i class="fa fa-table fa-fw"></i>微信客服列表</a>
                    </li>
                    <?php if(session('user_name') == admin): ?><li>
                            <a id="add_wechat_menu" href="/Admin/WechatMenu/menu.html"><i class="fa fa-table fa-fw"></i>新增微信菜单</a>
                        </li>
                        <li>
                            <a id="add_wechat_reply" href="/Admin/WechatReply/wechatreply.html"><i class="fa fa-table fa-fw"></i>新增微信回复</a>
                        </li>
                        <li>
                            <a id="push" href="/Admin/Sendmsg/index.html"><i class="fa fa-edit fa-fw"></i> 推送用户消息</a>
                        </li>
                        <!--<li>
                            <a href="#" data-target="#demo"><i class="fa fa-files-o fa-fw"></i> 数据图页<span class="fa arrow"></span></a>
                            <ul id="demo" class="nav nav-second-level">
                                <li>
                                    <a id="add_active_user_table" href="/Admin/AddActiveUserTable/index.html">新增活跃用户详情</a>
                                </li>
                                <li>
                                    <a id="add_task_table" href="/Admin/AddTaskTable/index.html">新增任务详情</a>
                                </li>
                                <li>
                                    <a id="today_active_user_table" href="/Admin/TodayActiveUserTable/index.html">当天活跃用户列表任务详情</a>
                                </li>
                            </ul>
                            
                        </li>-->
                        <li>
                            <a id="" href="/Admin/HomeNotice/index.html"><i class="fa fa-table fa-fw"></i>首页通知栏</a>
                        </li>
                        <li>
                            <a id="" href="/Admin/GroupMember/index.html"><i class="fa fa-table fa-fw"></i>组成员详情---</a>
                            <!--<span>GroupMember/index</span>-->
                        </li>
                        <li>
                            <a id="" href="/Admin/Oparetor/index.html"><i class="fa fa-table fa-fw"></i>负责人组详情---</a>
                            <!--<span>Oparetor/index</span>-->
                        </li>
                        <li>
                            <a id="" href="/Admin/Topic/index.html"><i class="fa fa-table fa-fw"></i>热门话题</a>
                        </li>
                        <li>
                            <a id="" href="/Admin/TestUpload/index.html"><i class="fa fa-table fa-fw"></i>测试上传</a>
                        </li><?php endif; ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="__PUBLIC__/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="__PUBLIC__/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="__PUBLIC__/js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="__PUBLIC__/js/plugins/morris/raphael.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="__PUBLIC__/js/sb-admin-2.js"></script>

</body>

<script type="text/javascript">
    function dashboard(){
        var dashboard = document.getElementById('dashboard');
        dashboard.setAttribute("class", "active");
    }
    function feedback(){
        var feedback = document.getElementById('feedback');
        feedback.setAttribute("class", "active");
    }
    function push(){
        var push = document.getElementById('push');
        push.setAttribute("class", "active");
    }
    function book_task_list(){
        var book_task_list = document.getElementById('book_task_list');
        book_task_list.setAttribute("class", "active");
    }
    function book_pages_list(){
        var book_pages_list = document.getElementById('book_pages_list');
        book_pages_list.setAttribute("class", "active");
    }
    function coreading_list(){
        var coreading_list = document.getElementById('coreading_list');
        coreading_list.setAttribute("class", "active");
    }
    function cust_service_list(){
        var cust_service_list = document.getElementById('cust_service_list');
        cust_service_list.setAttribute("class", "active");
    }
    function add_wechat_menu(){
        var add_wechat_menu = document.getElementById('add_wechat_menu');
        add_wechat_menu.setAttribute("class", "active");
    }
    function add_wechat_reply(){
        var add_wechat_reply = document.getElementById('add_wechat_reply');
        add_wechat_reply.setAttribute("class", "active");
    }
    function add_active_user_table(){
        var demo = document.getElementById('demo');
        var add_active_user_table = document.getElementById('add_active_user_table');
        demo.setAttribute("class", "nav nav-second-level navbar-collapse");
        add_active_user_table.setAttribute("class", "active");
    }
    function add_task_table(){
        var demo = document.getElementById('demo');
        var add_task_table = document.getElementById('add_task_table');
        demo.setAttribute("class", "nav nav-second-level navbar-collapse");
        add_task_table.setAttribute("class", "active");
    }
    function today_active_user_table(){
        var demo = document.getElementById('demo');
        var today_active_user_table = document.getElementById('today_active_user_table');
        demo.setAttribute("class", "nav nav-second-level navbar-collapse");
        today_active_user_table.setAttribute("class", "active");
    }
</script>
</html>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">共读书单</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            共读书单列表
                        </div>
                        <div class="panel-body">
                        <form action='/admin/planbook/save' method='post'>
                            <div class="row">
                            	<?php if(empty($book_id)): ?><div class="form-group" style="margin-left: 30px;">
                                    <label>isbn编码:</label>
                                    <input id="isbnVal" type="text" class="text small" name='title' value='<?php echo ($addBookInfo[0]["isbn13"]); ?>'/>（13位）
                                    <input type='button' value='搜索' id='isbn' class="am-btn am-btn-primary am-btn-xs addPlanbook"/>
                                </div>
                                <div class="form-group" id="bookname" style="margin-left: 30px;">
                                    <label>书籍名称:</label>
                                    <input id="bookVal" type="text" class="text small" name='title' value='<?php echo ($addBookInfo[0]["title"]); ?>'/>
                                    <input type='button' class="am-btn am-btn-primary am-btn-xs" id='find_book' value='查找书籍'>
                                </div>
                                <?php else: ?>
                                <div class="form-group" style="margin-left: 30px;">
                                    <label>书籍名称:</label>
                                    <input class='text small' value='<?php echo ($title); ?>' name='title' readonly />
                                </div><?php endif; ?>
                                <div class="form-group" style="margin-left: 30px;">
                                    <label>图书封面:</label>
                                    <input id="upload" type="button" value="修改封面" style="cursor: pointer">
                                    <input id="cover" type="text" value="<?php echo ($cover); ?>" name='cover' style="width:200px"><br/>
                                    <img src='<?php echo ($cover); ?>' id='cover_show'/>
                                    
                                </div>
                                
                                <div class="form-group" style="margin-left: 30px;">
                                    <label>摘要简介:</label>
                                    <textarea rows="3" cols="60" class="m-wrap" name='comment' id='intro'><?php echo ($comment); ?></textarea>
                                </div>
                                <?php if(empty($book_id)): ?><div class="form-group" style="margin-left: 30px;" id="startTime">
                                    <label class="control-label">开始时间:</label>
                                    <div class="control-group">
                                        <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input_start" data-link-format="yyyy-mm-dd">
                                            <input name="start" size="16" type="text" value="<?php echo ($start); ?>" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input_start" value="" /><br/>
                                    </div>
                                    <label class="control-label">结束时间:</label>
                                    <div class="control-group">
                                        <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input_start" data-link-format="yyyy-mm-dd">
                                            <input name="end" type="start" size="16" type="text" value="<?php echo ($start); ?>" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input_start" value="" /><br/>
                                    </div>
                                </div><?php endif; ?>
                                <input type='hidden' id='bookId' name='book_id' value='<?php echo ($book_id); ?>'/>
                                <input type='hidden' name='pb_id' value='<?php echo ($pb_id); ?>'/>
                                <div class="col-lg-12">
                                	<?php if(empty($book_id)): ?><input type='submit' class="am-btn am-btn-primary am-btn-xs addPlanbook" value='加到共读书单'/>
                                	<?php else: ?>
                                	<input type='submit' class="am-btn am-btn-primary am-btn-xs addPlanbook" value='提交修改'/><?php endif; ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                           </form>
                            <!-- /.row (nested) -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="__PUBLIC__/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap-datetimepicker.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="__PUBLIC__/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="__PUBLIC__/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="__LAYER__/layer.js"></script>
    <script src="__PUBLIC__/js/jquery.upload.v2.js"></script>

</body>
<script type="text/javascript">
    var coreading_list = document.getElementById('coreading_list');
    coreading_list.setAttribute("class", "active");
	 //检查isbn是否存在
    $('#isbn').click(function(){
        var val = $('#isbnVal').val();
        $.ajax({
            type : 'post',
            url : '/admin/coreading/isbn',
            data : {'isbn':val},
            dataType : 'json',
            success : function(msg) {
                if(msg.code == 0){
                    layer.msg('isbn有误', {
                        time: 2000 //2秒关闭（如果不配置，默认是3秒）
                    }, function(){
                        //do something
                    });
                } else {	//书存在，则把数据展示到页面上
                	//console.log(msg);
                	$('#cover_show').attr('src', msg.cover);
                	$('#intro').html(msg.intro);
                    $("#bookId").attr("value",msg.book_id);
                    $("#bookName").attr("value",msg.title);
                }
            },
            error :function(e){
                alert(e);
            }
        });
    });
   
    //上传封面
    $("#upload").click(function(){
        $("#upload").upload({
            action: "/admin/planbook/upload", //上传地址
            fileName: "cover",    //文件名称。用于后台接收
            params: {},         //参数
            accept: ".jpg,.png",     //文件类型
            complete: function (data) {  //上传完成
                layer.msg('上传图片完成', {
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                }, function(){
                    //do something
                    $('#cover').val(data);
                    $('#cover_show').attr('src', data);
                    picPath = data;
                });
            },
            submit: function () {
                layer.msg('上传图片中，请耐心等待', {
                    time: 5000 //2秒关闭（如果不配置，默认是3秒）
                }, function(){
                    //do something
                });//提交之前
            }
        });
    });
    $('#find_book').click(function(){
       var bookname = $('#bookVal').val();
       //iframe层
       layer.open({
           type: 2,
           title: '书籍页',
           shadeClose: true,
           shade: 0.8,
           area: ['880px', '90%'],
           content: '/admin/coreading/choose?bookname='+bookname //iframe的url
       });
   })

    //提交到共读书单
    $('#addToList').click(function(){
        var bookId = $('#bookId').val();
        var bookName = $('#bookVal').val();
        var uploadPic = $('#file_path').val();
        var dtp_input_start = $('#dtp_input_start').val();
        var bookComment = document.getElementById("bookComment").value;
        if(bookName.length == 0){
            layer.tips('请输入书名', '#bookVal', {
                tips: [1, '#3595CC'],
                time: 4000
            });
            return false;
        }
        if(bookId.length == 0){
            layer.tips('请输入书籍编号', '#bookId', {
                tips: [1, '#3595CC'],
                time: 4000
            });
            return false;
        }
        if(dtp_input_start.length == 0){
            layer.tips('请选择开始时间', '#startTime', {
                tips: [1, '#3595CC'],
                time: 4000
            });
            return false;
        }
        $.ajax({
            type : 'post',
            url : '/Admin/PlanBook/addcoreading',
            data : {'bookId':bookId,'bookName':bookName,'uploadPic':uploadPic,'dtp_input_start':dtp_input_start,'bookComment':bookComment},
            dataType : 'json',
            success : function(msg) {
                if(msg.code == 0){
                    layer.msg('添加到共读书单失败', {
                        time: 2000 //2秒关闭（如果不配置，默认是3秒）
                    }, function(){
                        //do something
                    });
                }else{
                    layer.msg('添加到共读书单成功', {
                        time: 2000 //2秒关闭（如果不配置，默认是3秒）
                    }, function(){
                        window.location.reload();
                    });
                }
            },
            error :function(e){
                alert(e);
            }
        });
    });

    $('.form_date').datetimepicker({
        format: 'yyyy-mm-dd',
        minView: "month",
        maxView: "decade"
    });
</script>
</html>