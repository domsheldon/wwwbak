<?php
/**
* 阿里云存储服务oss
* @date: 2014-8-25
* @author: efan
* @version:1.0.0
*/
//引进oss
vendor('AliyunOss.sdk','','.class.php');

class OssAction extends Action{
	public $oss_sdk_service;
	
	public function __construct() {
		$this->oss_sdk_service=new ALIOSS();
		//设置是否打开curl调试模式
		$this->oss_sdk_service->set_debug_mode(FALSE);
	}
	/**
	 * oss上传
	 * @param $bucket bucket名字
	 * @param $fold 文件夹
	 * @param $rule 规则（图片样式）
	 */
	public function oss_upload($bucket,$fold){
		try {
			$file_arr=$this->dealFiles($_FILES);
			$n=count($file_arr);
			//不能超过9张
			if($n>9){
				return false;
			}
			//循环上传
			foreach($file_arr as $key=>$v){
				$file=$this->uniqd_file($v['name']);//生成object名
				
				if(!$file){
					die(json_encode(array('code'=>'400','msg'=>'文件不合法')));
				}
				$object=$fold.'/'.$file;//oss上存储的文件名
				//上传的内容，从临时目录里读取
				$content=file_get_contents($v['tmp_name']);
				//组合参数
				$upload_file_options = array(
					'content' => $content,
					'length' => strlen($content),
					ALIOSS::OSS_HEADERS => array(
						'Expires' => date('Y-m-d H:i:s'),
					),
				);
				//上传
				$response=$this->oss_sdk_service->upload_file_by_content($bucket, $object,$upload_file_options);
				$filename[]=$object;
			}
			return $filename;
		}catch (Exception $ex){
			die(json_encode(array('code'=>'10020','msg'=>$ex->getMessage())));
		}
	}
	/**
	 * 通过文件路径上传
	 * @param $bucket  oss上实例
	 * @param $object	oss上的文件夹
	 * @param $file		本地图片文件路径
	 */
	public function oss_upload_file($bucket,$object,$filename){
		try {
			$file=$this->uniqd_file($filename);//生成object名
			if(!$file){
				die(json_encode(array('code'=>'400','msg'=>'文件不合法')));
			}
			$object=$object.'/'.$file;//oss上存储的文件名
			//上传
			$response=$this->oss_sdk_service->upload_file_by_file($bucket, $object, $filename);
			//返回oss上存储的文件路径
			return $object;
		}catch (Exception $ex){
			die(json_encode(array('code'=>'10020','msg'=>$ex->getMessage())));
		}
	}
	/**
	* 获取oss上的bucket列表
	* @param unknowtype 
	* @return:
	*/
	public function bucket_list() {
		$this->oss_sdk_service->list_bucket();
	}
	/**
	* 生成文件名，采用unqid方法
	* @param $filename 文件名
	* @return:array
	*/
	public function uniqd_file($filename) {
		$file=array();
		$ext=$this->getExt($filename);
		if(in_array(strtolower($ext),array('jpg','jpeg','png','wav','mp3'))){
			$file=uniqid().'.'.$ext;
			return $file;
		}else{
			return false;
		}
	}
	/**
     * 取得上传文件的后缀
     * @access private
     * @param string $filename 文件名
     * @return boolean
     */
    private function getExt($filename) {
        $pathinfo = pathinfo($filename);
        return $pathinfo['extension'];
    }
	/**
     * 转换上传文件数组变量为临时文件
     * @access private
     * @param array $files  上传的文件变量
     * @return array
     */
    private function dealFiles($files) {
      	$fileArray  = array();
        $n          = 0;
        foreach ($files as $key=>$file){
            if(is_array($file['name'])) {
                $keys       =   array_keys($file);
                $count      =   count($file['name']);
                for ($i=0; $i<$count; $i++) {
                    $fileArray[$n]['key'] = $key;
                    foreach ($keys as $_key){
                        $fileArray[$n][$_key] = $file[$_key][$i];
                    }
                    $n++;
                }
            }else{
               $fileArray[$key] = $file;
            }
        }
       return $fileArray;
    }
}