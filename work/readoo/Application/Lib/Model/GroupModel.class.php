<?php

/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2016-03-24
 * Time: 18:27
 */
class GroupModel extends Model
{
//    protected $tableName ="group";
    /**
     * 通过用户名称/id返回用户组的信息；
     * name:用户名称；
     * type:传入数据的类型，传入的是用户的id，或者是用户组的名称；
     * 返回用户组的所有数据
     */
    public function getGroupInfo($type,$type_name){
        $data=$this->where("$type='$type_name'")->select();
        return $data;
    }

    /**
     * 获取负责人某一段时间内的用户数；
     * $operator:用户组负责人
     * $start:查询时间开始点
     * $end:查询时间结束点
     * @return array|mixed
     * 返回的数据按照用户加入群的时间倒序排列
     */
    public function getOperatorInfo($operator,$start,$end){
        $Model=M();
        $sql="SELECT COUNT(*) AS total ,operator ,group_name, DATE_FORMAT(b.join_time,'%Y-%m-%d') AS join_time FROM rw_group a,rw_group_user AS b WHERE a.id  = b.group_id AND operator LIKE '%".$operator."%' AND join_time BETWEEN '".$start."' AND '".$end."' GROUP BY group_id,DATE_FORMAT(b.join_time,'%Y-%m-%d') ORDER BY join_time DESC";
        return $Model->query($sql);
    }



}