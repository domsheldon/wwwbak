<?php
/**
 * 微信菜单逻辑层
 * @date: 2016-1-19
 * @author: zhouyi
 * @version:1.0.0
 */
class WechatMenuService{
    /**
     * 微信菜单
     */
    public function menu(){
        $model = new WechatMenuModel();
        $res = $model->menu();
        return $res;
    }
    /**
     * 新增微信菜单
     */
    public function addMenu(){

    }

    /**
     * 微信父id
    */
    public function pidMenu(){
        $model = new WechatMenuModel();
        $res = $model->pidMenu();
        return $res;
    }

    /**
     * 新增微信菜单操作
     */
    public function doAddMenu($pid,$id,$name,$type,$code){
        $model = new WechatMenuModel();
        $res = $model->doAddMenu($pid,$id,$name,$type,$code);
        return $res;
    }

    /**
     * 编辑微信菜单
     */
    public function editmenu($menuId){
        $model = new WechatMenuModel();
        $res = $model->editmenu($menuId);
        return $res;
    }

    /**
     * 编辑保存微信菜单
     */
    public function doEditmenu($pid,$id,$name,$type,$code){
        $model = new WechatMenuModel();
        $res = $model->doEditmenu($pid,$id,$name,$type,$code);
        return $res;
    }

    /**
     * 删除微信客服
     */
    public function deleteMenu($menuId){
        $model = new WechatMenuModel();
        $res = $model->deleteMenu($menuId);
        return $res;
    }
}