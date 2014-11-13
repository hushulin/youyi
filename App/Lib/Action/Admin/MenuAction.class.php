<?php

// 本类由系统自动生成，仅供测试用途

class MenuAction extends AdminAction {

    public function index(){
        $list = tree_to_list2(list_to_tree(D("Menu")->select()));
        $this->assign('list',$list);
        $this->display();
    }

    public function add(){
        if(IS_POST){
            $Menu = D("Menu"); // 实例化Menu对象
            if (!$Menu->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Menu->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $re = $Menu->add();
                if ($re !== false) {
                    $this->success('数据保存成功！', "/Admin/Menu");
                } else {
                    $this->error('数据写入错误！');
                }
            }
        }else{
            $admin_menu_tree = list_to_tree(D("Menu")->select());
            $admin_menu_list = tree_to_list2($admin_menu_tree);
            $this->assign('admin_menu_tree', $admin_menu_tree);
            $this->assign('admin_menu_list', $admin_menu_list);
            $this->display();
        }
    }

    public function edit(){

        if(IS_POST){
            $Menu = D("Menu"); // 实例化User对象
            if (!$Menu->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Menu->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $re = $Menu->save();
                if ($re !== false) {
                    $this->success('数据保存成功！', "/Admin/Menu");
                } else {
                    $this->error('数据写入错误！');
                }
            }
        }else{
            $id = I("get.id","","trim,stripslashes,strip_tags,intval");
            $map["id"] = $id;
            $doc = D("Menu")->where($map)->find();
            $this->assign('doc',$doc);
            $admin_menu_tree = list_to_tree(D("Menu")->select());
            $admin_menu_list = tree_to_list2($admin_menu_tree);
            $this->assign('admin_menu_tree', $admin_menu_tree);
            $this->assign('admin_menu_list', $admin_menu_list);
            $this->display();
        }
    }

    public function del(){
        if(IS_POST){
            $id = I("get.id","","trim,stripslashes,strip_tags,intval");
            $map = array();
            $map["pid"] = $id;
            $count = D("Menu")->where($map)->count();
            if($count > 0){
                $this->error('该分类下面还有子项，不能删除！');
            }else{
                $map = array();
                $map["id"] = $id;
                $re = D("Menu")->where($map)->delete();
                if ($re !== false) {
                    $this->success('数据删除成功！', "/Admin/Menu");
                } else {
                    $this->error('数据删除错误！');
                }
            }
        }else{
            $id = I("get.id","","trim,stripslashes,strip_tags,intval");
            $this->assign('id',$id);
            $this->display();
        }
    }
}