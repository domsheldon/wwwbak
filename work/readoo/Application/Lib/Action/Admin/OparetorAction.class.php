<?php

/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-24
 * Time: 17:53
 */
class OparetorAction extends Action
{
    public function index(){
        if($this->isPost()){

//            $operator=$this->_POST('operator');
//            echo "1";
            $operator=$_POST['operator'];
            $start=$_POST['start'];
            $end=$_POST['end'];


//            实例化用户群组表；
            $group=new GroupModel();
            $operator=$group->getOperatorInfo($operator,$start,$end);

            $data['operator']=$operator;

            $data['code']=200;
//            p($_POST);
            $this->ajaxReturn($data);
        }

//        $group=new groupModel();

        $this->display();
    }

}