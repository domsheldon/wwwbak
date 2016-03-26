<?php
/**
* 点赞model
* @date: 2015-10-23
* @author: efan
* @version:1.0.0
*/
import('@.Service.NotifyService');
class DiggModel extends Model {
	
	/**
	 * 表前缀，如 Note笔记、BookPackage
	 * @var string
	 */
	private $table='';
	
	//字段
	private $field_name;
	
	//要新增或减少的字段名
	private $count='digg_count';
	
	//M的实例
	private $m;
	
	/**
	 * @param  $table 评论表名,驼峰命名
	 * @param  $field_id 字段名，如note_id,bp_id表示digg表里的
	 */
	public function __construct($table, $field_name){
		$this->table 	= $table;
		$this->m	= M($table.'Digg');
		$this->field_name= $field_name;
	}
	/**
	* 获取原ori_user_id
	* @param $id 
	* @date 2016-3-18
	* @return:
	*/
	public function getOriUsere($id) {
		return M($this->table)->where('id='.$id)->getField('user_id');
	}
	/**
	 * 动态点赞
	 * @param int $id 动态id
	 * @param int $digg_user_id 点赞的用户id
	 * @return 
	 */
	public function diggAdd($id,$digg_user_id) {
		//取发动态的原用户id，为了消息通知
		$ori_user_id=$this->getOriUsere($id);
		
		$digg_id=$this->isDigg($id, $digg_user_id);
		if($digg_id){
			return $this->return_info(false, 'cancel');
		}else{
			$data[$this->field_name]=$id;
			$data['digg_user']=$digg_user_id;
			$data['create_time']=date('Y-m-d H:i:s');
			$add_res=$this->m->add($data);
		
			if($add_res){
				//增加table表的赞数量
				CommonModel::addFieldCount($this->table, 'id='.$id, $this->count);
				$redis=new RedisModel();
				if ($redis->isConnect()) {
					$redis->setIncNoteDigg($id);
				}
				//对原作者发通知
				if ($digg_user_id != $ori_user_id) {
					$notify=new NotifyService();
					$notify->digg_notify($id, $digg_user_id, $ori_user_id);
				}
				return $this->return_info($ori_user_id, 'digg');
			}else{
				return $this->return_info(false, 'faild');
			}
		}
	}
	/**
	* 取消赞
	* @param $id 
	* @param $digg_user_id
	* @date 2016-1-29
	* @return:
	*/
	public function diggDel($id, $digg_user) {
		$res=$this->m->where($this->field_name.'='.$id.' and digg_user='.$digg_user)->delete();
		if($res) {
			CommonModel::reduceFieldCount($this->table, 'id='.$id, $this->count);
			$redis=new RedisModel();
			if ($redis->isConnect()) {
				$redis->setDecNoteDigg($id);
			}
			return $this->getOriUsere($id);
		}
	}
	/**
	 * 是否点过赞
	 * @param  $id_str 			动态id字符串
	 * @param  $digg_user_id 	点赞的用户id
	 * @return $digg_id/null
	 */
	public function isDigg($id_str, $digg_user_id) {
		$digg_list=$this->m->where($this->field_name.' in ('.$id_str.') and digg_user='.$digg_user_id)->select();
		foreach ($digg_list as $v) {
			$list[$v[$this->field_name]]='1';
		}
		return $list;
	}
	/**
	* 点赞的用户列表
	* @param $id note_id,bp_id
	* @date 2016-1-28
	* @return:array(8,5,9)
	*/
	public function diggUserList($id) {
		$list=$this->m->field('digg_user')->where($this->field_name.'='.$id)->select();
		foreach ($list as $v) {
			$user[]=$v['digg_user'];
		}
		return $user;
	}
	//返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }
}