<?php
/**
 * 微信菜单设置
 * @date: 2016-1-19
 * @author: zhouyi
 * @version:1.0.0
 */

import('@.Service.WechatMenuService');
import('@.Service.RedisService');

class WechatMenuAction extends WebCommonAction{

    /**
     * 微信菜单列表
     */
    public function menu(){
        $service = new WechatMenuService();
        $menuInfo = $service->menu();
        $this->assign('menuInfo',$menuInfo);
        $this->display();
    }

    /**
     * 新增微信菜单页
     */
    public function addMenu(){
        $service = new WechatMenuService();
        $pidInfo = $service->pidMenu();
        $this->assign('pidInfo',$pidInfo);
        $this->display();
    }

    /**
     * 新增微信菜单操作
     */
    public function doAddMenu(){
        $pid = $this->_post('pid');
        $id = $this->_post('menuId');
        $name = $this->_post('menuName');
        $type = $this->_post('typeName');
        $code = $this->_post('menuCode');
        $service = new WechatMenuService();
        $res = $service->doAddMenu($pid,$id,$name,$type,$code);
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','添加菜单错误');
        }
    }

    /**
     * 编辑微信菜单
     */
    public function editmenu(){
//        $menuId = $this->_post('menuId');
        $menuId = I('get.menuId');
        $service = new WechatMenuService();
        $editInfo = $service->editmenu($menuId);
        $this->assign('editInfo',$editInfo);

        $pidInfo = $service->pidMenu();
        $this->assign('pidInfo',$pidInfo);

        //激活成功后，加载到redis
//        $redis = new RedisService();
//        $redis->saveActiveCustService();
        $this->display();
    }

    /**
     * 编辑保存微信菜单
     */
    public function doEditmenu(){
        $pid = $this->_post('pid');
        $id = $this->_post('menuId');
        $name = $this->_post('menuName');
        $type = $this->_post('typeName');
        $code = $this->_post('menuCode');
        $service = new WechatMenuService();
        $res = $service->doEditmenu($pid,$id,$name,$type,$code);
        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','编辑保存菜单错误');
        }
    }

    /**
     * 删除微信菜单
     */
    public function deleteMenu(){
        $menuId = $this->_post('menuId');
        $service = new WechatMenuService();
        $res = $service->deleteMenu($menuId);

        if($res){
            $this->data = $res;
            $this->ajaxReturn();
        }else{
            $this->ajaxReturn('0','删除微信菜单错误');
        }
    }

    public function activeMenu(){
        $service = new WechatMenuService();
        $model = M('WechatMenu');
        $menuList = $model->field('id,pid,name,type,code')->where('id<100')->select();

        vendor('Lanewechat.lanewechat');
        $res = \LaneWeChat\Core\Menu::setMenu($menuList);
        if($res==1){
            $this->ajaxReturn();
        }else {
            $this->ajaxReturn($res['errcode'], $res['errmsg']);
        }
    }
}