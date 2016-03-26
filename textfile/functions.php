<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-12
 * Time: 21:14
 */
header('Content-type:text/html;charset=utf-8');
date_default_timezine_set('PRC');
function p($var,$name=null){
    if($name){
        echo "<h2 style='width:100%;height:100%;background:#d1d1d1;text-align:center;line-height:40px;color:white;'>{$name}</h2>";
    }
    echo '<pre sryle="padding:5px;background:#eee;border-radius:5px;border:1px solid #a10000;>';
    print_r($var);
    echo '</pre>';
}
//成功提示：$msg为提示的信息；￥url提示成功后挑传的页面；
function($msg,$url){
    $str=<<<str
        <script type="text/javascript">
        alert("$msg");
        window.location.replace('$url');
        </script>
str;
    echo $str;
//    这里使用window.location.replace(),是因为

}
