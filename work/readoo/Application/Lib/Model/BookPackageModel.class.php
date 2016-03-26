<?php

class BookPackageModel extends Model {

    /**
     * 添加拆书包
     */
    public function addToBookPack($data){
    	$data['create_time'] = date('Y-m-d H:i:s');
        return M('BookPack')->add($data);
    }

    /**
     * 获取拆书包编码
     */
    public function getcode($book_id,$title){
        $model = M('BookPackage');
        $res = $model->where("book_id = ".$book_id."AND title =".$title)->limit(1)->select();
        return $res;
    }
	
	/**
     * 编辑拆书包
     */
	public function edit($id, $data){
		return M('BookPack')->where("id=$id")->save($data);
	}
	
	
	
	
	
	
	

}