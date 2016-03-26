<?php

class WechatMenuModel extends Model {

    /**
     * 微信菜单
     */
    public function menu(){
        $model = M('WechatMenu');
        $res = $model->field('id,pid,name,type,code')->order('id')->select();
        return $res;
    }

    /**
     * 微信父id
    */
    public function pidMenu(){
        $model = M('WechatMenu');
        $res = $model->field('id,pid,name,type,code')->where('pid = '."''")->select();
        return $res;
    }

    /**
     * 新增微信菜单操作
     */
    public function doAddMenu($pid,$id,$name,$type,$code){
        $model = M('WechatMenu');
        $data=array(
            'pid' => $pid,
            'id' => $id,
            'name' => $name,
            'type' => $type,
            'code' => $code
        );
        $res = $model->add($data);
        return $res;
    }

    /**
     * 编辑微信菜单
     */
    public function editmenu($menuId){
        $model = M('WechatMenu');
        $res = $model->field('id,pid,name,type,code')->where("id =".$menuId)->select();
        return $res;
    }

    /**
     * 编辑保存微信菜单
     */
    public function doEditmenu($pid,$id,$name,$type,$code){
        $model = M('WechatMenu');
        $data=array(
            'pid' => $pid,
            'name' => $name,
            'type' => $type,
            'code' => $code
        );
        $res = $model->where('id = '.$id)->save($data);
        return $res;
    }

    /**
     * 删除微信客服
     */
    public function deleteMenu($menuId){
        $model = M('WechatMenu');
        $res = $model->where("id = '".$menuId."'")->delete();
        return $res;
    }
}