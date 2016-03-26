<?php
/**
  +------------------------------------------------------------------------------
 * 豆瓣接口
  +------------------------------------------------------------------------------
 * @category   ORG
 * @package  ORG
 * @subpackage  Util
  +------------------------------------------------------------------------------
 */

class Douban{
	
	/**
     * 采集远程文件
     * @access public
     * @param string $key 关键字
     * @return Array
     */
	public static function douban_search($key,$start=0,$count=10){
		$url='https://api.douban.com/v2/book/search?q='.$key.'&start='.$start.'&count='.$count;
		$data=Douban::curl_get($url);
		
		$data_arr=json_decode($data,true);
		$result=$data_arr['books'];
		$arr=array();
		for($i=0;$i<count($result);$i++){
			foreach($result[$i] as $key=>$val){
				if(is_array($result[$i]['author'])){
					$arr[$i]['author']=implode('、', $result[$i]['author']);
				}else{
					$arr[$i]['author']=$result[$i]['author'];
				}
				$arr[$i]['title']=$result[$i]['title'];
				//图书封面先用豆瓣，再采集图片
				$arr[$i]['cover']=$result[$i]['image'];
				$arr[$i]['pages']=$result[$i]['pages'];//页数
				$arr[$i]['pubdate']=$result[$i]['pubdate'];//出版时间
				$arr[$i]['intro']=$result[$i]['summary'];
				$arr[$i]['publisher']=$result[$i]['publisher'];
				$arr[$i]['isbn13']=$result[$i]['isbn13'];
				$arr[$i]['create_time']=time();
			}
		}
		return $arr;
	}
	//根据isbn取豆瓣数据
	//@return array
	public static function douban_isbn_find($isbn){
		$url='https://api.douban.com/v2/book/isbn/'.$isbn;
		$data=Douban::curl_get($url);
		
		$result=json_decode($data,true);
		return $result;
	}
	//远程获取
	private function curl_get($url=''){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$data = curl_exec($ch);
		curl_close($ch);
	   return $data;
	}
}