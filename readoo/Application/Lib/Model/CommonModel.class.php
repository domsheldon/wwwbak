<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonModel
 *
 * @author Sorci
 */
class CommonModel extends Model {

    /**
     * @name 获取全部地区信息
     */
    public function get_area() {
        $area = M('Area');
        $p_list = $area->field('area_id,title')->where('pid = 0')->select();
        $c_list = $area->field('area_id,title,pid')->where('pid !=0')->select();
        foreach ($p_list as $key => $val) {
            foreach ($c_list as $v) {
                if ($val['area_id'] == $v['pid']) {
                    $p_list[$key]['city'][] = $v;
                }
            }
        }
        return $this->return_info($p_list, 'get_area_success');
    }
	//获取省列表
    public function getProvince() {
        $area = M('Area');
        $list = $area->field('area_id,title')->where('pid = 0')->order('sort')->select();
        return $list;
    }
    /**
     *  @name    获取市区列表
     *  @param  pid     省的id
     *  @return    array    返回城市列表
     */
    public function get_city_area_by_pid($pid) {
        //检查参数是否正确提供
        if ($pid == '') {
            return $this->return_info(false, '20000');
        }
        //获取信息列表
        $area = M('Area');
        $list = $area->field('area_id,title')->where('pid = ' . $pid)->order('sort')->select();
        return $this->return_info($list, '10002', 'get_city_area_success');
    }
    /**
     * @name 通过省、市编号获取信息
     * @param int $p_id 省编号
     * @param int $c_id 市编号
     */
    public static function get_location_info($p_id, $c_id) {
        $area = M('Area');
        $p_title = $area->where('area_id = '.$p_id.' and pid=0')->getField('title');
        $c_title = $area->where('area_id = '.$c_id.' and pid='.$p_id)->getField('title');
        return $p_title . ' ' . $c_title;
    }
	/**
	* 增加各表的各个字段，如给user_count加用户的数量，feed表的赞数量等
	* @param $table M(驼峰table) ，更新的哪个表
	* @param $where where条件 id=id
	* @param $field 更新的字段
	* @date 2015-9-1
	* @return:
	*/
	public static function addFieldCount($table,$where,$field) {
		return M($table)->where($where)->setInc($field);
	}
	/**
	* 减少各表的各个字段，如给user_count加用户的数量，feed表的赞数量等
	* @param $table M(驼峰table) ，更新的哪个表
	* @param $where where条件
	* @param $field 更新的字段
	* @date 2015-9-1
	* @return:
	*/
	public static function reduceFieldCount($table,$where,$field,$step='1') {
		return M($table)->where($where)->setDec($field,$step);
	}
	
	/**
	* curl get
	* @param string $url 
	* @date 2015-9-7
	* @return:采集下的内容
	*/
	public static function curl_get($url) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$data = curl_exec($ch);
		curl_close($ch);
	   return $data;
	}
	//返回产品家的分类（技能）
	public function get_apply_date(){
		return M('ApplyDate')->field('id as date_id,name,date')->select();
	}
	
	/**
	* 获取广告列表
	* @return:
	*/
	public function getAdList($field,$where,$order) {
		$ad_list=M('AdminAd')->field($field)->where($where)->order($order)->select();
		foreach ($ad_list as $k=>$a){
			if($a['ad_image'])
			$ad_list[$k]['ad_image']=OSS_AVATAR.$a['ad_image'];
		}
		return $ad_list;
	}
	/**
	 * 获取版本号
	 * @param  $app_type 设备类型 1安卓  2ios
	 * @param  $plat 平台str
	 */
	public function get_app_version($app_type,$plat){
		return M('VersionUpgrade')->where('app_type='.$app_type.' and plat_str="'.$plat.'"')->find();
	}
    //返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }

//	添加评论模型；
/**
 * $note_id:评论的笔记的id；；
 * $content:用户的评论内容；
 * $send_user:发送者的id；
 * $receive_iser::被评论的用户id；
 * $receive_id：被评论的评论的id；
 * $comment_type:评论的类型；0：表示给笔记的评论；1表示给评论的评论；
 */
    public function addComment($note_id,$content,$send_user,$receive_user,$comment_type=0,$receive_cid=0){
        $time=date('Y-m-d H:i:s',time());
        $data=array(
            'note_id'=>$note_id,
            'send_user'=>$send_user,
            'comment_type'=>$comment_type,
            'receive_user'=>$receive_user,
            'receive_cid'=>$note_id,
            'content'=>$content,
            'create_time'=>$time,
            'receive_cid'=>$receive_cid,
            'read_flag'=>0
        );
//        return M('NoteComment')->find();
        return M('NoteComment')->add($data);
    }


}
