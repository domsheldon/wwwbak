<?php
/**
* redis相关动作，增、删、改
* @date: 2016-2-22
* @author: efan
*/
class RedisModel extends Model{
	
	public $redis;				//redis对象
	
	//note相关key
	const NOTE='rw:note'; 	//note的哈希key
	const NOTETIME='rw:note:ctime'; //根据时间存的有序
	const NOTEDIGG='rw:note:digg'; //根据点赞数存的有序
	
	const USERNOTE='rw:usernote:'; //按user_id分的note,接user_id
	const BOOKNOTE='rw:booknote:'; //按book_id筛选、时间排序的note_id
	const BOOKNOTEDIGG='rw:booknotedigg:'; //按book_id筛选、点赞数排序的note_id
	
	//user相关key
	const USER='rw:userinfo';	//哈希存储
	
	//bookpackcheck签到相关key
	const CHECK='rw:bookpackcheck';
	const CHECKSUM='rw:checksum';
	
	/**
	* 连接redis
	* @date 2016-2-22
	* @return:
	*/
	public function __construct() {
		$this->redis = new Redis();
	}
	/**
	* 尝试连接
	* @date 2016-2-23
	* @return:
	*/
	public function isConnect() {
		$this->redis->connect(REDIS_HOST, REDIS_PORT);
		if ($this->redis->ping()) {
			return true;
		}
		return false;
	}
	
	/**
	* 把一条note存入哈希
	* @date: 2016-2-22
	*/
	public function setNoteRedis($note_id, $note_info, $act='add') {
		$this->redis->hset(self::NOTE, $note_id, json_encode($note_info));
		if ($act=='add') {
			$this->setNoteTimeRedis($note_info['create_time'], $note_id);		//时间排序
			$this->setNoteDiggRedis($note_info['digg_count'], $note_id);		//点赞排序
			$this->setNoteBook($note_info['book_id'], $note_info['create_time'], $note_id);//按book_id的按时间排序
			$this->setNoteBookDigg($note_info['book_id'], $note_info['digg_count'], $note_id);//按book_id的按赞排序
			$this->setNoteUser($note_info['user_id'], $note_info['create_time'], $note_id);//按user_id的按时间排序
		}
	}
	/**
	* 按时间把note存入有序
	* @param note的创建时间
	* @param note_id
	* @date 2016-2-22
	* @return:
	*/
	public function setNoteTimeRedis($time, $note_id) {
		$this->redis->zadd(self::NOTETIME, strtotime($time), $note_id);
	}
	/**
	* 按点赞数把note存入有序
	* @param note的点赞数
	* @param note_id
	* @date 2016-2-22
	* @return:
	*/
	public function setNoteDiggRedis($digg_count, $note_id) {
		$this->redis->zadd(self::NOTEDIGG, $digg_count, $note_id);
	}
	/**
	* 累加到此用户下的note_id
	* @param $user_id 
	* @param $note_id 
	* @date 2016-2-22
	* @return:
	*/
	public function setNoteUser($user_id, $note_ctime, $note_id) {
		$this->redis->zadd(self::USERNOTE.$user_id, strtotime($note_ctime), $note_id);
		$this->redis->expire(self::USERNOTE.$user_id, 30*24*3600);			//有效期设为1个月
	}
	/**
	* 累加到此书下 
	* @param $book_id 
	* @param $note_ctime 随笔的时间
	* @param $note_id  
	* @date 2016-2-22
	* @return:
	*/
	public function setNoteBook($book_id, $note_ctime, $note_id) {
		$this->redis->zadd(self::BOOKNOTE.$book_id, strtotime($note_ctime), $note_id);
		$this->redis->expire(self::BOOKNOTE.$book_id, 30*24*3600);			//有效期设为1个月
	}
	/**
	* 累加到此书下 
	* @param $book_id 
	* @param $note_ctime 随笔的时间
	* @param $note_id  
	* @date 2016-2-22
	* @return:
	*/
	public function setNoteBookDigg($book_id, $digg_count, $note_id) {
		$this->redis->zadd(self::BOOKNOTEDIGG.$book_id, $digg_count, $note_id);
		$this->redis->expire(self::BOOKNOTEDIGG.$book_id, 30*24*3600);		//有效期设为1个月
	}

	
	/******************************删除key的value值******************************************/
	/**
	* 删除key
	* @param $note_id
	* @date 2016-2-22
	* @return:
	*/
	public function delNoteRedis($note_id, $user_id, $book_id) {
		$this->redis->hdel(self::NOTE, $note_id);
		
		$this->redis->zrem(self::NOTETIME, $note_id);					//移除时间key
		$this->redis->zrem(self::NOTEDIGG, $note_id);				//移除点赞key
		$this->redis->zrem(self::BOOKNOTEDIGG.$book_id, $note_id);	//移除书时间key
		$this->redis->zrem(self::BOOKNOTE.$book_id, $note_id);		//移除书点赞key
		$this->redis->zrem(self::USERNOTE.$user_id, $note_id);		//移除用户时间key
		
	}
	/******************************获取key的value值******************************************/
	/**
	* 根据不同的条件排序取note
	* @param  
	* @date 2016-2-22
	* @return:
	*/
	public function getNoteRedisList($redis_type, $value, $order, $offset,$limit) {
		$limit=$offset+($limit-1);
//		$this->setNoteAllRedis();
		$list=array();
		if ($redis_type == 'ta_note') {		//他人主页的随笔，公有
			$note_id_arr=$this->redis->zrevrange(self::USERNOTE.$value, $offset, $limit);
		}
		if ($redis_type == 'note_info') {	//随笔详情
			$note_id_arr=$value;
		}
		if ($redis_type == 'index_note') { 	//首页
			if ($order=='create_time desc') {	//最新排序
				if ($value)	{		//按书筛选、时间排序
					$note_id_arr=$this->redis->zrevrange(self::BOOKNOTE.$value, offset, $limit);
				} else {			
					$note_id_arr=$this->redis->zrevrange(self::NOTETIME, $offset, $limit);
				}
			} else {	//热门排序
				if ($value)	{		//按书筛选、热门排序
					$note_id_arr=$this->redis->zrevrange(self::BOOKNOTEDIGG.$value, offset, $limit);
				}else {				
					$note_id_arr=$this->redis->zrevrange(self::NOTEDIGG, $offset, $limit);
				}
			}
		}
		$is_exists=$this->redis->hexists(self::USER, $note_id_arr);
		if (!$is_exists) {		//写入redis
			$this->setNoteArrRedis($note_id_arr);
		}
		$note_json=$this->redis->hmget(self::NOTE, $note_id_arr);
		return $this->dealJson($note_json);
	}
	/**
	* 把指定的note存入redis
	* @date 2016-2-22
	* @return:
	*/
	public function setNoteArrRedis($note_id_arr) {
		$note_id_str=implode(',', $note_id_arr);
		$list=M('Note')->where("id in ($note_id_str) and is_delete=0")->select();
		foreach ($list as $l){
			$this->redis->hset(self::NOTE, $l['id'], json_encode($l));
			
			$this->setNoteTimeRedis($l['create_time'], $l['id']);		//时间排序
			$this->setNoteDiggRedis($l['digg_count'], $l['id']);		//点赞排序
			$this->setNoteBook($l['book_id'], $l['create_time'], $l['id']);//按book_id的按时间排序
			$this->setNoteBookDigg($l['book_id'], $l['digg_count'], $l['id']);//按book_id的按赞排序
			$this->setNoteUser($l['user_id'], $l['create_time'], $l['id']);//按user_id的按时间排序
		}
		
		//统一设置有效期，1个月
		$this->redis->expire(self::NOTE, 30*24*3600);
		$this->redis->expire(self::NOTETIME, 30*24*3600);
		$this->redis->expire(self::NOTEDIGG, 30*24*3600);
	}
	/**
	* 把指定的note存入redis
	* @date 2016-2-22
	* @return:
	*/
	public function setNoteAllRedis() {
		$list=M('Note')->where("is_delete=0")->select();
		foreach ($list as $l){
			$this->redis->hset(self::NOTE, $l['id'], json_encode($l));
			$this->setNoteTimeRedis($l['create_time'], $l['id']);		//时间排序
			$this->setNoteDiggRedis($l['digg_count'], $l['id']);		//点赞排序
			$this->setNoteBook($l['book_id'], $l['create_time'], $l['id']);//按book_id的按时间排序
			$this->setNoteBookDigg($l['book_id'], $l['digg_count'], $l['id']);//按book_id的按赞排序
			$this->setNoteUser($l['user_id'], $l['create_time'], $l['id']);//按user_id的按时间排序
		}
		//统一设置有效期，1个月
		$this->redis->expire(self::NOTE, 30*24*3600);
		$this->redis->expire(self::NOTETIME, 30*24*3600);
		$this->redis->expire(self::NOTEDIGG, 30*24*3600);
	}
	/******************************设置用户key的value值******************************************/
	public function setUserArr($user_id_arr) {
		$user_id_str=implode(',', $user_id_arr);
		$user_list=M('UserInfo')->where("user_id in ($user_id_str)")->select();
		
		foreach ($user_list as $k=>$v){
			$list[$k]=$v;
		}
		$this->redis->hset(self::USER, $list);
		$this->redis->expire(self::USER, 30*24*3600);
	}
	/**
	* 把单个用户信息存入redis
	* @param  
	* @date 2016-2-23
	* @return:
	*/
	public function setUser($user_id, $user_info) {
		$this->redis->hset(self::USER, $user_id, json_encode($user_info));
	}
	/**
	* 获取用户信息
	* @param $user_id_arr 用户id数组 
	* @date 2016-2-23
	* @return:
	*/
	public function getUser($user_id_arr) {
		$list=array();
		$is_exists=$this->redis->hexists(self::USER, $user_id_arr);
		if (!$is_exists) {		//写入redis
			$user_id_str=implode(',', $user_id_arr);
			$user_list=M('UserInfo')->field('user_id,name,sex,avatar')->where("user_id in ($user_id_str)")->select();
			foreach ($user_list as $v){
				$list[$v['user_id']]=json_encode($v);
			}
			$this->redis->hmset(self::USER, $list);
			$this->redis->expire(self::USER, 30*24*3600);
		}
		$json=$this->redis->hmget(self::USER, $user_id_arr);
		return $this->dealJson($json);
	}
	/******************************设置前100个签到用户数据******************************************/
	/**
	* 今日签到的100条用户数据
	* 每天早上6点和下午14点自动写 
	* @param  
	* @date 2016-2-24
	* @return:
	*/
	public function setCheckData($pack_id) {
		$check_list=M('BookPackCheck')->field('user_id,create_time as r')->where('pack_id='.$pack_id)->order('create_time asc')->limit(0,50)->select();
		$this->redis->set(self::CHECK, json_encode($check_list));
		//设置有效期10个小时
		$this->redis->expire(self::CHECK, 10*3600);
	}
	/**
	* 写总签到排前50的用户数，领先总数50个用户基本不会变
	* @date 2016-2-24
	* @return:
	*/
	public function setCheckSumData() {
		$check_list=M('BookPackCheck')->field('user_id, count(user_id) as r')->group('user_id')->order('r desc')->limit(0,50)->select();
		$this->redis->set(self::CHECKSUM, json_encode($check_list));

		//设置有效期10个小时
		$this->redis->expire(self::CHECKSUM, 10*3600);
	}
	/**
	* 获取今日签到的50用户
	* @date 2016-2-24
	* @return:array()
	*/
	public function getCheckData($pack_id) {
		//先判断这些key是否存在，再取redis数据
		$is_exists=$this->redis->exists(self::CHECK);
		if ( !$is_exists) {
			$this->setCheckData($pack_id);
		}
		$json=$this->redis->get(self::CHECK);
		return json_decode($json, true);
	}
	/**
	* 获取签到总数的50
	* @date 2016-2-24
	* @return:array()
	*/
	public function getCheckSumData() {
		//先判断这些key是否存在，再取redis数据
		$is_exists=$this->redis->exists(self::CHECKSUM);
		if ( !$is_exists) {
			$this->setCheckSumData();
		}
		$json=$this->redis->get(self::CHECKSUM);
		return json_decode($json, true);
	}
	
	//@return json->array()
	private function dealJson($json_data){
		foreach ($json_data as $v) {
			$list[]=json_decode($v, true);
		}
		return $list;
	}
	/**
	* 关闭redis连接
	* @date 2016-2-23
	* @return:
	*/
	public function close() {
		$this->redis->close();
	}
}