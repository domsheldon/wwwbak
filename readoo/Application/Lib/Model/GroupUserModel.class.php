<?php

/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-25
 * Time: 13:26
 */
class GroupUserModel extends Model
{
//    获取组内的成员的信息；
    /**
     * @param $id
     * @return mixed
     */
    public function getuser($id){
        $userData=$this->where("group_id='$id'")->select();
        $user=new UserModel();
        $field='user_id,name,sex,avatar,job,province,city,create_time';
        foreach($userData as $key=>$value){
            $userinfo=$user->getUserInfo($value['user_id'],$field);
            $userData[$key]=array_merge($userData[$key],$userinfo);
        }
        return $userData;
    }
}