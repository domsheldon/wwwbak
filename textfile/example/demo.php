<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-13
 * Time: 10:39
 */
echo "1";
header("Content-type:text/html;charset=utf-8");
/*if($_POST){
    echo "post";
    p($_POST);

    foreach($_FILES['up']['tmp_name'] as $k=>$tmpName){
        if(is_uploaded_file($tmpName)){
            $path='./Upload/'.date('ymd').'/';
p($path);
            is_dir($path)||mkdir($path,0777,true);
//        huoqu 上传文件类型；
            $name=$_FILES['up']['name'][$k];
            p($name);
            $type=strrchr($name,'.');
            p($type);
//        处理文件；
            $fileName=time().mt_rand(0,99999).$type;
            p($fileName);
//        完整路径：
            $fullPath=$path.$fileName;
            p($fullPath);die;
            move_uploaded_file($tmpName,$fullPath);

        }
    }
}*/

function p($msg){
    var_dump($msg);
}



//文件下载；







/*$file="houdunwang.jpg";
header('Content-type:text/html;charset=utf-8');
header('Content-type"application/octet-stream');
$fileName=basename($file);
header('Content-disposition:attachment;filename={$fileName}');
header("Content-ranges:bytes");//文件尺寸单位；
header("Content-length:".filesize($file));//文件大小
readfile($file);*/
//var_dump($_FILES);
//var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
    文件：<input type="file" name="up[]">
    <input type="file" name="up[]">
    <input type="submit"  value="上传文件">
</form>
</body>
</html>












