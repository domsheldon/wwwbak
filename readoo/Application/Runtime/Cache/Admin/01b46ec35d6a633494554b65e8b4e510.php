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

    <!-- DataTables CSS -->
    <link href="__PUBLIC__/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="__PUBLIC__/css/sb-admin-2.css" rel="stylesheet">

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
                            <a id="" href="/Admin/GroupMember/index.html"><i class="fa fa-table fa-fw"></i>组成员详情</a>
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
                <h1 class="page-header">组成员详情</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form action="" method="post">
                            <input type="text" name="groupName" placeholder="请输入用户组名称：" id="groupname">
                            <button type="button"  class="am-btn am-btn-primary am-btn-xs addPlanbook" style="margin-left:50px;border-radius:3px;">查看群组成员详细信息</button>
                        </form>
                    </div>

                    <div class="panel-body" style="font-family: 'Kaiti SC';">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover" id="groupinfo">
                                <thead>
                                <tr>
                                    <th style="width: 100px;">群组id</th>
                                    <th>群组名</th>
                                    <th>群组成员数</th>
                                    <th style="width: 150px;">群组负责人</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="odd gradeX" id="group_id" ></td>
                                        <td class="odd gradeX" id="group_name"></td>
                                        <td class="odd gradeX" id="group_num"></td>
                                        <td class="odd gradeX" id="group_operator"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered table-hover" id="group_mem">
                                <thead>
                                <tr>
                                    <th style="width: 100px;">成员id</th>
                                    <th>头像</th>
                                    <th>名称</th>
                                    <th>性别</th>
                                    <th>工作</th>
                                    <th>详细地址</th>
                                    <th style="width: 150px;">注册时间</th>
                                </tr>
                                </thead>
                                <tbody  id="userinfo">
<!--                                    <tr>
                                        <td class="odd gradeX user_id">1</td>
                                        <td class="odd gradeX user_avatar"><img src="" alt="" style="height:30px;"></td>
                                        <td class="odd gradeX user_name">2</td>
                                        <td class="odd gradeX user_sex">3</td>
                                        <td class="odd gradeX user_job">4</td>
                                        <td class="odd gradeX user_address">5</td>
                                        <td class="odd gradeX user_create_time">6</td>
                                    </tr>-->
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

<script src="__PUBLIC__/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("button").click(function(){
//            alert(1);
            var url="http://www.readoo.com/Admin/GroupMember/index.html";
            var groupname=$("#groupname").val();
            $.ajax({
                url:url,
                type:'post',
                dataType:'json',
                data:{
                    groupName:groupname
                },
                success:function(phpData){
                    if(phpData.code==200){
                        $('#group_id').html(phpData.groupData.id);
                        $("#group_name").html(phpData.groupData.group_name);
                        $('#group_num').html(phpData.groupData.join_nums);
                        $('#group_operator').html(phpData.groupData.operator);

                        if(phpData.groupUserData.length>0){
                            var tt='';
                            for(var i=0;i<phpData.groupUserData.length;i++){
                                tt+='<tr>' +
                                    '<td class="odd gradeX user_id">'+phpData.groupUserData[i].user_id+'</td>' +
                                    '<td class="odd gradeX user_avatar"><img src="'+phpData.groupUserData[i].avatar+'" alt="" style="height:30px;"></td>' +
                                    '<td class="odd gradeX user_name">'+phpData.groupUserData[i].name+'</td>' +
                                    '<td class="odd gradeX user_name">';
                                if(phpData.groupUserData[i].sex==1){
                                    tt+='女';
                                }else if(phpData.groupUserData[i].sex==2){
                                    tt+='男';
                                }
                                else{
                                    tt+='未设置';
                                }
                                        phpData.groupUserData[i].sex+'</td>';
                                tt+='<td class="odd gradeX user_job">'+phpData.groupUserData[i].job+'</td>' +
                                    '<td class="odd gradeX user_address">'+phpData.groupUserData[i].province+phpData.groupUserData[i].city+'</td>' +
                                    '<td class="odd gradeX user_create_time">'+phpData.groupUserData[i].create_time+'</td>';
                            }
                            $('#userinfo').html(tt);
                        }
                    }
                }
            })

        })
//         alert(1);

    })
</script>

</body>
</html>