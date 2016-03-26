<?php

/**
 * 用户信息
 * Created by PhpStorm.
 * User: qyluo
 * Date: 2015/11/17
 * Time: 17:43
 */
class CountModel extends Model
{
    //当天数据统计
    /**
     * 统计当天新增用户量
     * @param $time
    */
    public static function CountNewDayUser($time){
        $sql="SELECT COUNT(*) as num,DATE_FORMAT(create_time,'%Y-%m-%d') as date
              FROM ys_user_info
              WHERE DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计当天活跃用户量
     * @param $time
     * @param $operation_id
     */
    public static function CountUserDayOperId($time){
        $sql="SELECT COUNT(DISTINCT user_id) as num,DATE_FORMAT(create_time,'%Y-%m-%d') as name
              FROM ys_user_log
              WHERE DATE_FORMAT(create_time,'%Y-%m-%d') = '" .$time. "' AND operation_id = '001'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计当天新增任务数
     * @param $time
     */
    public static function CountNewDayTask($time){
        $sql= "SELECT COUNT(*) as num,DATE_FORMAT(create_time,'%Y-%m-%d') as date
              FROM ys_task
              WHERE DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."' ";

        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计笔记发布数
     * @param $time
     */
    public static function CountReleaseNote($time){
        $sql="SELECT COUNT(*) AS num FROM ys_task_detail WHERE DATE_FORMAT(update_time,'%Y-%m-%d')='".$time. "'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计用户吐槽反馈数
     * @param $time
     */
    public static function CountFeedback($time){
        $sql= "SELECT COUNT(*) as num,DATE_FORMAT(create_time,'%Y-%m-%d') as date
              FROM ys_msg
              WHERE DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'";

        $model = M();
        return $model->query($sql);
    }

    //7天图表统计
    /**
     * 统计7天的新增用户量
     * @param $time
     */
    public static function CountNewUser(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $now = date('Y-m-d',time());
        $sql = "SELECT days,IFNULL(VALUE,'0')  value FROM (
                SELECT COUNT(*) AS VALUE, DATE_FORMAT(create_time,'%Y-%m-%d') AS NAME
                FROM ys_user_info WHERE DATE_FORMAT(create_time,'%Y-%m-%d') > '".$day."'
                GROUP BY DATE_FORMAT(create_time,'%Y-%m-%d')
                )  a
                RIGHT JOIN ys_dic_date b
                ON a.name = b.days
                WHERE b.days > '" .$day."' and b.days <='" .$now . "'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计7天内活跃用户量
     * @param $time
     * @param $operation_id
     */
    public static function CountOperId(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $now = date('Y-m-d',time());
        $sql = "SELECT days,IFNULL(VALUE,'0')  value FROM (
                SELECT COUNT(distinct user_id) AS VALUE, DATE_FORMAT(create_time,'%Y-%m-%d') AS NAME
                FROM ys_user_log WHERE DATE_FORMAT(create_time,'%Y-%m-%d') > '".$day."' and operation_id = '001'
                GROUP BY DATE_FORMAT(create_time,'%Y-%m-%d')
                )  a
                RIGHT JOIN ys_dic_date b
                ON a.name = b.days
                WHERE b.days > '" .$day."' and b.days <='" .$now . "'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计7天分享阅读数
     * @param $time
     */
    public static function CountShareTask(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $now = date('Y-m-d',time());
        $sql = "SELECT days,IFNULL(VALUE,'0')  value FROM (
                SELECT COUNT(*) AS VALUE, DATE_FORMAT(create_time,'%Y-%m-%d') AS NAME
                FROM ys_user_log WHERE DATE_FORMAT(create_time,'%Y-%m-%d') > '".$day."' and operation_id = '002'
                GROUP BY DATE_FORMAT(create_time,'%Y-%m-%d')
                )  a
                RIGHT JOIN ys_dic_date b
                ON a.name = b.days
                WHERE b.days > '" .$day."' and b.days <='" .$now . "'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计7天完成阅读数
     * @param $time
     */
    public static function CountEndTask(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $now = date('Y-m-d',time());
        $sql = "SELECT days,IFNULL(VALUE,'0')  value FROM (
                SELECT is_end AS VALUE, DATE_FORMAT(create_time,'%Y-%m-%d') AS NAME
                FROM ys_task WHERE DATE_FORMAT(create_time,'%Y-%m-%d') > '".$day."' and is_end = '1'
                GROUP BY DATE_FORMAT(create_time,'%Y-%m-%d')
                )  a
                RIGHT JOIN ys_dic_date b
                ON a.name = b.days
                WHERE b.days > '" .$day."' and b.days <='" .$now . "'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计7天新增任务数
     * @param $time
     */
    public static function CountNewTask(){
        $now = date('Y-m-d',time());
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $sql = "SELECT days,IFNULL(VALUE,'0')  value FROM (
                SELECT COUNT(*) AS VALUE, DATE_FORMAT(create_time,'%Y-%m-%d') AS NAME
                FROM ys_task WHERE DATE_FORMAT(create_time,'%Y-%m-%d') > '".$day."'
                GROUP BY DATE_FORMAT(create_time,'%Y-%m-%d')
                )  a
                RIGHT JOIN ys_dic_date b
                ON a.name = b.days
                WHERE b.days > '" .$day."' and b.days <='" .$now . "'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计7天笔记发布数
     * @param $time
     */
    public static function CountWeekReleaseNote(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $now = date('Y-m-d',time());
        $sql = "SELECT days,IFNULL(VALUE,'0')  value FROM (
                SELECT COUNT(*) AS VALUE, DATE_FORMAT(update_time,'%Y-%m-%d') AS NAME
                FROM ys_task_detail WHERE DATE_FORMAT(update_time,'%Y-%m-%d') > '".$day."'
                GROUP BY DATE_FORMAT(update_time,'%Y-%m-%d')
                )  a
                RIGHT JOIN ys_dic_date b
                ON a.name = b.days
                WHERE b.days > '" .$day."' and b.days <='" .$now . "'";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计7天用户吐槽反馈数
     * @param $time
     */
    public static function CountFeedbackTask(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $now = date('Y-m-d',time());
        $sql = "SELECT days,IFNULL(VALUE,'0')  value FROM (
                SELECT COUNT(*) AS VALUE, DATE_FORMAT(create_time,'%Y-%m-%d') AS NAME
                FROM ys_msg WHERE DATE_FORMAT(create_time,'%Y-%m-%d') > '".$day."'
                GROUP BY DATE_FORMAT(create_time,'%Y-%m-%d')
                )  a
                RIGHT JOIN ys_dic_date b
                ON a.name = b.days
                WHERE b.days > '" .$day."' and b.days <='" .$now . "'";

        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计每周新增任务天数,按计划天数分类统计
     * @param $time
     */
    public static function CountNewTaskDays(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $sql="SELECT COUNT(*) AS value ,concat('task days:',plan_day) AS name FROM ys_task
              WHERE create_time > $day AND is_end = 0
              GROUP BY plan_day";
        $model = M();
        return $model->query($sql);
    }

    /**
     * 统计每周书籍完成天数,按计划天数分类统计
     * @param $time
     */
    public static function CountNewBookFinishDays(){
        $day = date('Y-m-d', strtotime( date('Y-m-d',time()) ) - 7*24*3600);
        $sql="SELECT COUNT(*) AS value ,concat('finsh days:',plan_day) AS name FROM ys_task
              WHERE create_time > $day AND is_end = 1
              GROUP BY plan_day";
        $model = M();
        return $model->query($sql);
    }

    //Table统计

    //用户列表
    //1.缺省用户列表
    public static function TodayUserInfo(){
        $time = date("Y-m-d",time());
        $sql = "SELECT b.*,a.num FROM (SELECT COUNT(*) AS num,user_id FROM ys_user_log
        GROUP BY user_id) a,ys_user_info b
        WHERE a.user_id = b.user_id AND DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'";
//        $sql = "SELECT *
//                FROM ys_user_info
//                WHERE DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'
//                ORDER BY create_time DESC";
        $model = M();
        return $model->query($sql);
    }
    //2.全部用户列表
    public static function AllUserInfo(){
        $sql = "SELECT b.*,a.num FROM (SELECT COUNT(*) AS num,user_id FROM ys_user_log
        GROUP BY user_id) a,ys_user_info b
        WHERE a.user_id = b.user_id ORDER BY create_time DESC";
//        $sql = "SELECT *
//                FROM ys_user_info
//                ORDER BY create_time DESC";
        $model = M();
        return $model->query($sql);
    }
    //3. 选取时间范围表
    public static function SelectUserInfo($begin,$end){
        $sql = "SELECT b.*,a.num FROM (SELECT COUNT(*) AS num,user_id FROM ys_user_log
        GROUP BY user_id) a,ys_user_info b
        WHERE a.user_id = b.user_id AND DATE_FORMAT(create_time,'%Y-%m-%d') <= '".$end."' AND DATE_FORMAT(create_time,'%Y-%m-%d') >= '".$begin."'";
//        $sql = "SELECT *
//                FROM ys_user_info
//                WHERE DATE_FORMAT(create_time,'%Y-%m-%d') <= '".$end."' AND DATE_FORMAT(create_time,'%Y-%m-%d') >= '".$begin."'
//                ORDER BY create_time DESC";
        $model = M();
        return $model->query($sql);
    }

    //任务列表
    //1. 缺省任务表
    public static function TodayTaskInfo(){
        $time = date("Y-m-d",time());
        $sql = "SELECT b.*,a.username FROM (select user_id as id,name as username from ys_user_info) a,ys_task b
        WHERE a.id = b.user_id AND DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'";
//        $sql = "SELECT *
//                FROM ys_task
//                WHERE DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'
//                ORDER BY create_time DESC";
        $model = M();
        return $model->query($sql);
    }
    //2.全部用户列表
    public static function AllTaskInfo(){
        $sql = "SELECT b.*,a.username FROM (select user_id as id,name as username from ys_user_info) a,ys_task b
        WHERE a.id = b.user_id";
//        $sql = "SELECT *
//                FROM ys_task
//                ORDER BY create_time DESC";
        $model = M();
        return $model->query($sql);
    }
    //3. 选取时间范围表
    public static function SelectTaskInfo($begin,$end){
        $sql = "SELECT b.*,a.username FROM (select user_id as id,name as username from ys_user_info) a,ys_task b
        WHERE a.id = b.user_id AND DATE_FORMAT(create_time,'%Y-%m-%d') <= '".$end."' AND DATE_FORMAT(create_time,'%Y-%m-%d') >= '".$begin."'";
//        $sql = "SELECT *
//                FROM ys_task
//                WHERE DATE_FORMAT(create_time,'%Y-%m-%d') <= '".$end."' AND DATE_FORMAT(create_time,'%Y-%m-%d') >= '".$begin."'
//                ORDER BY create_time DESC";
        $model = M();
        return $model->query($sql);
    }

    //当天活跃用户列表
    public static function TodayActiveUserInfo(){
        $time = date("Y-m-d",time());
        $sql = "SELECT b.*,a.num FROM (SELECT COUNT(*) AS num,user_id FROM ys_user_log WHERE DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'
        GROUP BY user_id) a,ys_user_info b
        WHERE a.user_id = b.user_id ";
        $model = M();
        return $model->query($sql);

    }

    //笔记列表 //yves
    //1. 缺省笔记表
    public static function ReleaseNoteInfo(){
        $time = date("Y-m-d",time());
        $sql = "SELECT b.*,a.username FROM (select user_id as id,name as username from ys_user_info) a,ys_task b
        WHERE a.id = b.user_id AND DATE_FORMAT(create_time,'%Y-%m-%d') = '".$time."'";
        $model = M();
        return $model->query($sql);
    }
    //2.全部笔记列表
    public static function AllReleaseNoteInfo(){
        $sql = "SELECT b.*,a.username FROM (select user_id as id,name as username from ys_user_info) a,ys_task b
        WHERE a.id = b.user_id";
        $model = M();
        return $model->query($sql);
    }
    //3. 选取时间笔记范围表
    public static function SelectReleaseNoteInfo($begin,$end){
        $sql = "SELECT b.*,a.username FROM (select user_id as id,name as username from ys_user_info) a,ys_task b
        WHERE a.id = b.user_id AND DATE_FORMAT(create_time,'%Y-%m-%d') <= '".$end."' AND DATE_FORMAT(create_time,'%Y-%m-%d') >= '".$begin."'";
        $model = M();
        return $model->query($sql);
    }
}