<?php
class BackendAction extends WebCommonAction {

    public $data;

    public function index(){
        $this->isLogin();
        $day = date('Y-m-d',time());
        //获取当天新增用户数
        $count_model = new CountModel();
        $result = $count_model->CountNewDayUser($day);
        $num_new_day_user = $result[0]['num'];
        $this->assign('num_new_day_user',$num_new_day_user);

        //获取当天活跃用户数
        $result = $count_model->CountUserDayOperId($day);
        $num_active_day_user = $result[0]['num'];
        $this->assign('num_active_day_user',$num_active_day_user);

        //获取新增任务数
        $result = $count_model->CountNewDayTask($day);
        $num_new_day_task = $result[0]['num'];
        $this->assign('num_new_day_task',$num_new_day_task);

        //获取笔记发布数
        $result = $count_model->CountReleaseNote($day);
        $num_releasenote = $result[0]['num'];
        $this->assign('num_releasenote',$num_releasenote);

        //获取吐槽数
        $result = $count_model->CountFeedback($day);
        $num_feedback = $result[0]['num'];
        $this->assign('num_feedback',$num_feedback);

        $this->display();
    }

    public function statNewUser(){
        $count_model = new CountModel();
        $result = $count_model->CountNewUser();
        $xaxis = array();
        $series = array();
        foreach($result as $row){
            $xaxis[] = $row['days'];
            $series[] = $row['value'];
        }

        $this->data['xaxis']=$xaxis;
        $this->data['data']=$series;

        $this->ajaxReturn ();
    }

    public function statActiveUser(){
        $count_model = new CountModel();
        $result = $count_model->CountOperId();
        $series = array();
        foreach($result as $row){
            $series[] = $row['value'];
        }
        $this->data['data']=$series;

        $this->ajaxReturn ();
    }

    public function statSharetask(){
        $count_model = new CountModel();
        $result = $count_model->CountShareTask();
        $series = array();
        foreach($result as $row){
            $series[] = $row['value'];
        }

        $this->data['data']=$series;

        $this->ajaxReturn ();
    }

    public function statEndtask(){
        $count_model = new CountModel();
        $result = $count_model->CountEndTask();
        $xaxis = array();
        $series = array();
        foreach ($result as $row) {
            $series[] = $row['value'];
        }

        $this->data['data'] = $series;

        $this->ajaxReturn();
    }

    //图表新增任务数
    public function statNewtask(){
        $count_model = new CountModel();
        $result = $count_model->CountNewTask();
        $series = array();
        foreach($result as $row){
            $series[] = $row['value'];
        }

        $this->data['data']=$series;

        $this->ajaxReturn ();
    }

    //图表笔记发布数
    public function statReleaseNote(){
        $count_model = new CountModel();
        $result = $count_model->CountWeekReleaseNote();
        $series = array();
        foreach($result as $row){
            $series[] = $row['value'];
        }

        $this->data['data']=$series;

        $this->ajaxReturn ();
    }

    //图表用户反馈吐槽数
    public function statFeedbackTask(){
        $count_model = new CountModel();
        $result = $count_model->CountFeedbackTask();
        $series = array();
        foreach($result as $row){
            $series[] = $row['value'];
        }

        $this->data['data']=$series;

        $this->ajaxReturn ();
    }

    //图表每周新增任务天数
    public function statNewTaskDays(){
        $count_model = new CountModel();
        $result = $count_model->CountNewTaskDays();

        $this->data['data']=$result;

        $this->ajaxReturn ();
    }

    //图表每周书籍完成天数
    public function statBookFinishDays(){
        $count_model = new CountModel();
        $result = $count_model->CountNewBookFinishDays();

        $this->data['data']=$result;

        $this->ajaxReturn ();
    }

    /**
     * 信息返回
     * @param $code
     * @param $msg
     * @return:json
     */
    public function ajaxReturn($code='1',$msg='success',$date='2015-01-01') {
        $this->data['code']=$code;
        $this->data['msg']=$msg;
        $this->data['date']=$date;
        $str=json_encode($this->data);
        $result=str_replace('null', '""', $str);
        header('Content-Type:application/json; charset=utf-8');
        return exit($result);
    }
}