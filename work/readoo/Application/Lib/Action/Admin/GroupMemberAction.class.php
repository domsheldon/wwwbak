<?php

/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-24
 * Time: 17:52
 */
class GroupMemberAction extends Action
{
    public function index(){
        if($this->isPost()){
            $name=$_POST['groupName'];
            $data['code']=200;
//            根据群组名称返回群组id；
            $group=new GroupModel();
            $groupData=$group->getGroupInfo('group_name',$name);
            $data['groupData']=$groupData[0];
            $groupId=$data['groupData']['id'];
            $groupUser=new GroupUserModel();
            $groupUserData=$groupUser->getuser($groupId);
            $data['groupUserData']=$groupUserData;
            $this->ajaxReturn($data);
            die;
        }
        $this->display();

    }
}