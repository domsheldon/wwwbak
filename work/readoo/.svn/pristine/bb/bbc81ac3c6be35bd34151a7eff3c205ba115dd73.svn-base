<?php

/**
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2016/2/20
 * Time: 16:49
 */
class TopicAction extends Action
{
    /**
     * 热门话题列表
     */
    public function topicList(){
        $model = new TopicModel();
        $data = $model->topicList();
        $this->assign('topic_list',$data);
        $this->assign('is_top','2');
        $this->display();
    }

    /**
     * 热门话题的列表页面，不包含具体列表数据。数据由displayNote获得
     */
    public function topicNote(){
        $topic = $_GET['topic'];

        $model = new TopicModel();
        $data = $model->getTopicByName($topic);
        $data['topic_content']=str_replace("\n", "<br/>", $data['topic_content']);
        $data['topic_rule']=str_replace("\n", "<br/>", $data['topic_rule']);

        $this->assign('topic_detail',$data);
        $this->assign('topic',$topic);


        //设置该用户没有新消息，此处不需要此功能
        $this->assign('has_new_msg',0);
        $this->assign('is_top','2');
        $this->display();
    }

}