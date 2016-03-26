<?php
/**
* 百度map，参考地址http://developer.baidu.com/map/index.php?title=webapi/guide/webservice-geocoding
* @date: 2014-11-26
* @author: efan
* @version:1.0.0
*/
class Map{
	
	private $url='http://api.map.baidu.com/geocoder/v2/';
	private $ak=BAIDUAK;//密钥,应用名称是有书，百度帐号是我的
	private $output='json';//输出形式
	
	/**
	 * 根据经纬度取出城市等信息
	 * @param float $lng 经度
	 * @param float $lat 纬度
	 * @return array
	 */
	public function get_city_by_lng_lat($lng,$lat) {
		//先经过百度的坐标转换api，再传
		$baidu_map=$this->to_baidu($lng, $lat);
		if($baidu_map){
			$param['ak']='ak='.$this->ak;
			$param['location']='location='.$baidu_map['y'].','.$baidu_map['x'];
			$param['output']='output='.$this->output;
	//		$param['pois']='pois=0';
			$param_str=implode('&', $param);
			
			$http_url=$this->url.'?'.$param_str;
			$res=$this->curl_get($http_url);
			$data=json_decode($res,true);
		}else{
			return false;
		}
		return $data;
	}
	//把GPS定位的经纬度转换成百度地图的经纬度
	private function to_baidu($lng,$lat){
		$url='http://api.map.baidu.com/geoconv/v1/?coords='.$lng.','.$lat.'&from=1&to=5&ak='.$this->ak;
		$res=$this->curl_get($url);
		$res=json_decode($res,true);
		if($res['status'] == 0){
			return $res['result'][0];
		}else{
			return false;
		}
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