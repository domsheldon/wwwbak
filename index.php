<?php 
$str="03：30";
echo preg_match("/^[0-9]{2}:[0-9]{2}$/",$str);
echo "<br>";
$str=preg_replace('/：/',':',$str);
echo "<br>";
echo preg_match("/^[0-9]{2}:[0-9]{2}$/",$str);
// var_dump($a);
// $exg=



0：38








/*$str = '<td>面包一</td><td>面包二</td>';
preg_match('/<td>(.*)<\/td>/',$str,$res);
print_r($res);*/




/*
 {"other_data":{"user_id":"31","name":"efan","sex":"1","avatar":"readwith\/20160318\/56ec006d517ec.jpg","job":"","intro":"","province":"","city":"","create_time":"2016-03-18 15:49:08"},"note_data":[{"title":"","content":"\u8bc4\u8bba\u8bc4\u8bba\u8bc4\u8bba","digg_count":"0","comment_count":"2","create_time":"2016-03-18 20:57:36","img_str":"","is_fav":0,"is_digg":0}],"page":"1","code":"200","msg":"success"} 
 {"other_data":{"user_id":"31","name":"efan","sex":"1","avatar":"readwith\/20160318\/56ec006d517ec.jpg","job":"","intro":"","province":"","city":"","create_time":"2016-03-18 15:49:08"},"note_data":[{"title":"","content":"\u8bc4\u8bba\u8bc4\u8bba\u8bc4\u8bba","digg_count":"0","comment_count":"2","create_time":"2016-03-18 20:57:36","img_str":"","is_fav":0,"is_digg":0}],"page":"1","code":"200","msg":"success"} 
 {"other_data":{"user_id":"31","name":"efan","sex":"1","avatar":"readwith\/20160318\/56ec006d517ec.jpg","job":"","intro":"","province":"","city":"","create_time":"2016-03-18 15:49:08"},"note_data":[{"title":"","content":"\u8bc4\u8bba\u8bc4\u8bba\u8bc4\u8bba","digg_count":"0","comment_count":"2","create_time":"2016-03-18 20:57:36","img_str":"","is_fav":0,"is_digg":0}],"page":"1","code":"200","msg":"success"} 
 {"code":{"other_data":{"user_id":"31","name":"efan","sex":"1","avatar":"readwith\/20160318\/56ec006d517ec.jpg","job":"","intro":"","province":"","city":"","create_time":"2016-03-18 15:49:08"},"note_data":[{"title":"","content":"\u8bc4\u8bba\u8bc4\u8bba\u8bc4\u8bba","digg_count":"0","comment_count":"2","create_time":"2016-03-18 20:57:36","img_str":"","is_fav":0,"is_digg":0}],"page":"1","code":"200","msg":"success"},"msg":"json"}
 {"other_data":{"user_id":"31","name":"efan","sex":"1","avatar":"readwith\/20160318\/56ec006d517ec.jpg","job":"","intro":"","province":"","city":"","create_time":"2016-03-18 15:49:08"},"note_data":[{"title":"","content":"\u8bc4\u8bba\u8bc4\u8bba\u8bc4\u8bba","digg_count":"0","comment_count":"2","create_time":"2016-03-18 20:57:36","img_str":"","is_fav":0,"is_digg":0}],"page":"1","code":"200","msg":"success"}*/
 ?>

