<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/2/20
 * Time: 17:34
 */
class TopicModel extends Model
{
    public function topicList(){
        return M('Topic')->order('create_time desc')->select();
    }

    public function getTopicByName($topic){
        $model = M('Topic');
        $data = $model->where("topic_title = '$topic'")->find();
        return $data;
    }

    public function getTopicPeoples($topic){
        $model = M('Topic');
        $data = $model->where("topic_title = '$topic'")->count();
        return $data;
    }
    //保存话题信息
    public function save($data, $id='') {
    	if ($id) {
    		M('Topic')->where('id='.$id)->save($data);
    	} else {
    		M('Topic')->add($data);
    	}
    } 
}