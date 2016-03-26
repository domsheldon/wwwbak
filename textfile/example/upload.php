<?php

/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-14
 * Time: 9:21
 */
class upload
{
    public function up (){
//        重组数组：
        $arr=$this->resetArr();
//        筛选过滤文件
        foreach($arr as $v =>$value){
//            如果筛选成功，
            if($this->filter($v)){
//                上传；
//                重组文件保存路径，然后将文件移动到指定的路径下；
                $this->move();
            }
        }
    }
    private function move(){
//move_uoloaded_file($filename,$path);

    }
//    过滤文件是否是通过非法路径上传的，必须要是经过post途径上传的才可以；
    private function filter(){
    }
    private function resetArr(){
//        判断是否是多文件上传；
        $temp=array();
        foreach($_FILES as $v){
            if(is_array($v['name'])){
                foreach($v['name'] as $key =>$name){
                    $temp[]=array(
                        'name'=>$name,
                        'type'=>$v['type']['$key'],
                        'tmp_name'=>$v['tmp_name'][$key],
                        'error'=>$v['error'][$key],
                        'size'=>$v['size'][$key]
                    );
                }
            }else{
//                如果是单文件上传；
                $temp=$v;
            }
            return $temp;
        }
    }
}