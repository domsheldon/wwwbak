<?php
/**
 * 拆书包业务逻辑层
 * @date: 2016-1-13
 * @author: zhouyi
 * @version:1.0.0
 */
class BookPackageService{
    /**
     * 添加拆书包
     */
    public function addToBookPack($data) {
        $model = new BookPackageModel();
        $res = $model->addToBookPack($data);
        return $res;
    }

    /**
     * 获取拆书包编码
     */
    public function getcode($book_id,$title) {
        $model = new BookPackageModel();
        $res = $model->getcode($book_id,$title);
        return $res;
    }

}