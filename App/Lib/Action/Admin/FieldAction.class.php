<?php

// 本类由系统自动生成，仅供测试用途

class FieldAction extends AdminAction {
    var $rid = 0;

    function _initialize(){
        parent::_initialize();
        $this->rid = I("get.rid","","trim,stripslashes,strip_tags,intval");
        $this->assign('rid',$this->rid);
    }

    public function index(){
        $map=array();
        $map["tbl_id"] = $this->rid;
        $Field = D("Field"); // 实例化Field对象
        import("ORG.Util.Page");// 导入分页类
        $count      = $Field->where($map)->count();// 查询满足要求的总记录数
        $Page       = new Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme'," <span>%totalRow% %header% %nowPage%/%totalPage% 页</span> %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%");
        $show       = $Page->show();// 分页显示输出
        $list = $Field->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('field_type',$Field->field_type);
        $this->assign('field_show_type',$Field->field_show_type);
        $this->assign('field_check_type',$Field->field_check_type);
        $this->assign('field_check_time',$Field->field_check_time);
        $this->assign('field_default_type',$Field->field_default_type);
        $this->assign('field_default_time',$Field->field_default_time);
        $this->display();
    }

    public function add(){
        $Field = D("Field"); // 实例化Field对象
        if(IS_POST){
            if (!$Field->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Field->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $re = $Field->addField($this->rid);
                if ($re !== false) {
                    $this->success('数据保存成功！', "/Admin/Field/index/rid/".$this->rid);
                } else {
                    $this->error('数据写入错误！');
                }
            }
        }else{
            $this->assign('field_type',$Field->field_type);
            $this->assign('field_show_type',$Field->field_show_type);
            $this->assign('field_check_type',$Field->field_check_type);
            $this->assign('field_check_time',$Field->field_check_time);
            $this->assign('field_default_type',$Field->field_default_type);
            $this->assign('field_default_time',$Field->field_default_time);
            $this->display();
        }
    }

    public function edit(){
        $Field = D("Field"); // 实例化User对象
        if(IS_POST){
            if (!$Field->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Field->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $re = $Field->saveField($this->rid);
                if ($re !== false) {
                    $this->success('数据保存成功！', "/Admin/Field/index/rid/".$this->rid);
                } else {
                    $this->error('数据写入错误！');
                }
            }
        }else{
            $id = I("get.id","","trim,stripslashes,strip_tags,intval");
            $map["id"] = $id;
            $doc = $Field->where($map)->find();
            $this->assign('doc',$doc);
            $this->assign('field_type',$Field->field_type);
            $this->assign('field_show_type',$Field->field_show_type);
            $this->assign('field_check_type',$Field->field_check_type);
            $this->assign('field_check_time',$Field->field_check_time);
            $this->assign('field_default_type',$Field->field_default_type);
            $this->assign('field_default_time',$Field->field_default_time);
            $this->display();
        }
    }

    public function del(){
        if(IS_POST){
            $Field = D("Field");
            $id = I("get.id","","trim,stripslashes,strip_tags,intval");
            $count = 0;
            if($count > 0){
                $this->error('该分类下面还有子项，不能删除！');
            }else{
                $map = array();
                $map["id"] = $id;
                $re = $Field->where($map)->delField($this->rid);
                if ($re !== false) {
                    $this->success('数据删除成功！', "/Admin/Field/index/rid/".$this->rid);
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