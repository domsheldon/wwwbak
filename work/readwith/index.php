<?php

    define('THINK_PATH' , '../ThinkPHP/');     //定义一下ThinkPHP框架存放的路径  
    define('APP_NAME' , 'Application');     //定义当前的项目的名称
    define('APP_PATH' , 'Application/');    //定义项目的路径       
    define('APP_STATUS', 'debug');          //定义当前模式为debug模式
    define('APP_DEBUG', true);              //开启调试模式
	
    require THINK_PATH . 'ThinkPHP.php'; 
/**
 * action：接收过滤参数，调用service来得到需要的数据，按需求结构重新组合
 * servie:处理业务逻辑，选择是从model还是redis里调数据
 * model:从库里调数据
 * 
 * oss的bucket
 * fengwo-avatar是存各个app的用户头像
 * book-cover是存各个app下的其他图片，如随笔的图片
 * fengwoimg是存app下的广告图片、弹窗等图片
 */
?> 