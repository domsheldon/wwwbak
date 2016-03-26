<?php
//遍历文件夹下的所有文件。
echo __FILE__;
  $hostdir=dirname(__FILE__);

//获取本文件目录的文件夹地址

  $filesnames = scandir($hostdir);
  var_dump($filesnames);

//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

  //print_r ($filesnames);

foreach ($filesnames as $name) {

//echo $name;

$url=$name;

// $aurl= "<a href=\"".$url."\">".$url."</a>";

echo $url . "<br/>";

}

?>
