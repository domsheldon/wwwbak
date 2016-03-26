<?php
//   http://www.ds.com/Admin/OtherInfo/getOther.html?user_id=32&ta_user_id=29
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-22
 * Time: 15:14
 */
class OtherInfoAction extends WebCommonAction{
//    这里写的是根据get来接收数据的，应该不是发送ajax来获取的，因为是点击用户的个人信息头像或者用户名来跳转的；
    public function getOther(){
//        echo $this->isPost();
//        获取get参数；
//        $page=$this->_get('page');
        $ta_user_id=$this->_get('ta_user_id');
        $user_id=$this->_get('user_id');
        if( $ta_user_id!=0){


    //        实例化用户信息表；
            $userInfo = M('UserInfo');
//            $userdata=$userInfo->where("user_id='$user_id'")->find();
    //        获取当前用户的信息；

    //        获取其他用户的个人信息；
            $otherData=$userInfo->where("user_id='$ta_user_id'")->find();
            $note=M('Note');
    //        将其他用户笔记的信息获取出来；
//            这里限制每页写两列数据，页数显示为￥page；
            $noteData=$note->field('title,content,digg_count,comment_count,create_time,img_str')->limit(1,4)->where("user_id='$ta_user_id'")->select();
    //        实例化用户收藏表；
            $fav=M("NoteFav");
    //        $favData=$fav->select();

    //        实例化用户点赞表
            $digg=M("NoteDigg");
    //        $diggData=$digg->select();
    //        获取用户是否可以收藏；
            if(!empty($noteData)){
                foreach($noteData as  $key=>$value ){
    //                p($value['id']);
                    $id=$value['id'];
    //                判断用户是否收藏笔记。
                    $is_fav=$fav->where("user_id=$user_id and note_id=$id")->find();
                    if(!empty($is_fav)){
                        $noteData[$key]['is_fav']=1;
                    }else{
                        $noteData[$key]['is_fav']=0;
                    }
    //                判断用户是否点赞
                    $is_digg=$digg->where("digg_user=$user_id and note_id=$id")->find();
                    if(!empty($is_digg)){
                        $noteData[$key]['is_digg']=1;
                    }else{
                        $noteData[$key]['is_digg']=0;
                    }
                }
            }
//            $info['user_data']=$userdata;
            $info['other_data']=$otherData;
            $info['note_data']=$noteData;
            $info['page']="1";
            $info['code']="200";
            $info['msg']="success";
//            p($info);
            $info=json_encode($info);
           echo $info;
            return $info;
        }else{
            $info['code']=0;
            $info['msg']="用户id未得到。";
           echo $info;
            return $info;
        }
/*
        "title":"如何理解",//讨论标题-
        "content":"如何理解",//-
        "is_digg":"1",//1已点赞?
        "is_fav":"1",//1已收藏?
        "digg_count":"22",//点赞数-
        "comment_count": "45",//评论数-
        "create_time": "0000-00-00 00:00:00"-
*/

    }
    public function getMoreOther(){
//        echo $this->isPost();
//        获取get参数；
        $page=$this->_get('page');
        $user_id=$this->_get('user_id');
        $ta_user_id=$this->_get('ta_user_id');
        if( $ta_user_id!=0){


            //        实例化用户信息表；
            $userInfo = M('UserInfo');
//            $userdata=$userInfo->where("user_id='$user_id'")->find();
            //        获取当前用户的信息；

            //        获取其他用户的个人信息；
            $otherData=$userInfo->where("user_id='$ta_user_id'")->find();
            $note=M('Note');
            //        将其他用户笔记的信息获取出来；
//            这里限制每页写两列数据，页数显示为￥page；
            $noteData=$note->field('title,content,digg_count,comment_count,create_time,img_str')->limit($page,4)->where("user_id='$ta_user_id'")->select();
            //        实例化用户收藏表；
            $fav=M("NoteFav");
            //        $favData=$fav->select();

            //        实例化用户点赞表
            $digg=M("NoteDigg");
            //        $diggData=$digg->select();
            //        获取用户是否可以收藏；
            if(!empty($noteData)){
                foreach($noteData as  $key=>$value ){
                    //                p($value['id']);
                    $id=$value['id'];
                    //                判断用户是否收藏笔记。
                    $is_fav=$fav->where("user_id=$user_id and note_id=$id")->find();
                    if(!empty($is_fav)){
                        $noteData[$key]['is_fav']=1;
                    }else{
                        $noteData[$key]['is_fav']=0;
                    }
                    //                判断用户是否点赞
                    $is_digg=$digg->where("digg_user=$user_id and note_id=$id")->find();
                    if(!empty($is_digg)){
                        $noteData[$key]['is_digg']=1;
                    }else{
                        $noteData[$key]['is_digg']=0;
                    }
                }
            }
            $info['other_data']=$otherData;
            $info['note_data']=$noteData;
            $info['page']="1";
            $info['code']="200";
            $info['msg']="success";
//            p($info);
            $info=json_encode($info);
            dump($info);
            return $info;
        }else{
            $info['code']=0;
            $info['msg']="用户id未得到。";
            dump($info);
            return $info;
        }
        /*
                "title":"如何理解",//讨论标题-
                "content":"如何理解",//-
                "is_digg":"1",//1已点赞?
                "is_fav":"1",//1已收藏?
                "digg_count":"22",//点赞数-
                "comment_count": "45",//评论数-
                "create_time": "0000-00-00 00:00:00"-
        */

    }
}
