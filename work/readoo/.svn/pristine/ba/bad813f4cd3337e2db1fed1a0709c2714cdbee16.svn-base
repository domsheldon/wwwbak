<?php 
class TestUploadAction extends WebCommonAction{
	public function index(){
		$this->display();
	}
	
	public function upload()
	{
		 $base64_string = $_POST['base64_string'];
		 $data=base64_decode($base64_string);
         $savename = uniqid().'.jpeg';//localResizeIMG压缩后的图片都是jpeg格式]
         $savepath = 'public/upload_img/'.$savename; 
//       $image = $this->base64_to_img( $base64_string, $savepath );
		  if($base64_string){
		       file_put_contents($savepath, $data);
               echo '{"status":1,"content":"上传成功","url":"'.$savepath.'"}';
         }else{
               echo '{"status":0,"content":"上传失败"}';
         } 

	}
	

}
 ?>