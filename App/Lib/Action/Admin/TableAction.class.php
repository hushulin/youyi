<?php

// 本类由系统自动生成，仅供测试用途

class TableAction extends AdminAction {
    var $rid = 0;

    function _initialize(){
        parent::_initialize();
        $this->rid = I("get.rid","","trim,stripslashes,strip_tags,intval");
        $this->assign('rid',$this->rid);
    }

    public function index(){
        $map=array();
        $Table = D("Table"); // 实例化Table对象
        import("ORG.Util.Page");// 导入分页类
        $count      = $Table->count();// 查询满足要求的总记录数
        $Page       = new Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme'," <span>%totalRow% %header% %nowPage%/%totalPage% 页</span> %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%");
        $show       = $Page->show();// 分页显示输出
        $list = $Table->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('field_type',$Table->field_type);
        $this->display();
    }

    public function add(){
        $Table = D("Table"); // 实例化Table对象
        if(IS_POST){
            if (!$Table->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Table->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $re = $Table->addTable();
                if ($re !== false) {
                    $this->success('数据保存成功！', "/Admin/Table/index/rid/".$this->rid);
                } else {
                    $this->error('数据写入错误！');
                }
            }
        }else{
            $this->assign('field_type',$Table->field_type);
            $this->display();
        }
    }

    public function edit(){
        $Table = D("Table"); // 实例化User对象
        if(IS_POST){
            if (!$Table->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($Table->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $Table->data["field_sort"] = json_encode($Table->data["field_sort"]);
                $re = $Table->saveTable();
                if ($re !== false) {
                    $this->success('数据保存成功！', "/Admin/Table/index/rid/".$this->rid);
                } else {
                    $this->error('数据写入错误！');
                }
            }
        }else{
            $Table = D("Table");
            $id = I("get.id","","trim,stripslashes,strip_tags,intval");
            $map["id"] = $id;
            $doc = $Table->where($map)->find();
            $this->assign('doc',$doc);
            $field_sort = json_decode($doc["field_sort"], true);
            $field_list = D("Field")->where("tbl_id = '{$id}'")->select();
            if(empty($field_sort)){
                $field_list1 = $field_list;
                $field_list = array();
                $field_list2 = array();
            }else{
                foreach ($field_sort[0] as $key => $value) {
                    foreach ($field_list as $key2 => $value2) {
                        if($value == $value2["id"]){
                            $field_list1[] = $value2;
                            unset($field_list[$key2]); 
                        }
                    }
                }
                foreach ($field_sort[1] as $key => $value) {
                    foreach ($field_list as $key2 => $value2) {
                        if($value == $value2["id"]){
                            $field_list2[] = $value2;
                            unset($field_list[$key2]); 
                        }
                    }
                }
            }
            $field_list1 = array_merge($field_list1, $field_list);
            $this->assign('field_list1',$field_list1);
            $this->assign('field_list2',$field_list2);
            $this->assign('field_type',$Table->field_type);
            $this->display();
        }
    }

    public function del(){
        if(IS_POST){
            $Table = D("Table");
            $id = I("get.id","","trim,stripslashes,strip_tags,intval");
            $count = 0;
            if($count > 0){
                $this->error('该分类下面还有子项，不能删除！');
            }else{
                $map = array();
                $map["id"] = $id;
                $re = $Table->where($map)->delTable($this->rid);
                if ($re !== false) {
                    $this->success('数据删除成功！', "/Admin/Table/index/rid/".$this->rid);
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

    public function gen(){
        $id = I("get.id","","trim,stripslashes,strip_tags,intval");
        $re = $this->dogen($id);
        $this->assign('message', $re);
        $this->display();
    }

    public function mgen(){
        $task_list = D("Table")->select();
        $re = "";
        foreach ($task_list as $key => $task) {
            $re .= $this->dogen($task["id"]);
        }
        $this->assign('message', $re);
        $this->display();
    }

    public function dogen($id){
        $table_info = D("Table")->where("id='{$id}'")->find();
        $project_info = D("Project")->where("id='".$table_info["pro_id"]."'")->find();
        $field_list = D("Field")->where("tbl_id='{$id}'")->select();
        
        $_name = $project_info["name"];
        $action_name = ucfirst($table_info["name"]);
        $action_title = $table_info["title"];

        // dump($action_name);
        // die();
        C('TMPL_L_DELIM', '<{');
        C('TMPL_R_DELIM', '}>');
        C('HTML_FILE_SUFFIX', "");

        $this->assign("phpstart", "<?php");
        $this->assign("phpend", "?>");
        $this->assign("extend", 'extend');
        $this->assign("block", "block");
        $this->assign("volist", "volist");

        $this->assign("table_name", $table_info["name"]);
        $this->assign("table_info", $table_info);
        $this->assign("action_name", $action_name);
        $this->assign("action_title", $action_title);
        $this->assign("field_list", $field_list);

        $field_sort = json_decode($table_info["field_sort"], true);

        $list = gen_para($table_info["list"]);
        $bsearch = gen_para($table_info["bsearch"]);
        
        foreach ($field_list as $key => $field) {
            if(in_array($field["type"], array(4,5,6,7))){
                $field["param"] = json_decode($field["para"], true);
                $field_define_list[] = $field;
            }
            if($field["check_type"] != 0){
                $field_check_list[] = $field;
            }
            if($field["default_type"] != 0){
                $field_default_list[] = $field;
            }

        }
        if(empty($field_sort)){
            $field_list1 = $field_list;
            $field_list = array();
            $field_list2 = array();
        }else{
            foreach ($field_sort[0] as $key => $value) {
                foreach ($field_list as $key2 => $value2) {
                    if($value == $value2["id"]){
                        $field_list1[] = $value2;
                        unset($field_list[$key2]); 
                    }
                }
            }
            foreach ($field_sort[1] as $key => $value) {
                foreach ($field_list as $key2 => $value2) {
                    if($value == $value2["id"]){
                        $field_list2[] = $value2;
                        unset($field_list[$key2]); 
                    }
                }
            }
        }
        
        $field_list1 = array_merge($field_list1, $field_list);
        $this->assign('field_list1',$field_list1);
        $this->assign('field_list2',$field_list2);
        $this->assign('field_define_list',$field_define_list);
        $this->assign('field_validate',gen_check_rule($field_check_list));
        $this->assign('field_auto',gen_auto_rule($field_default_list));
        $this->assign('rn',"\r\n");
        $this->assign('t',"\t");
        $this->assign('list',$list);
        $this->assign('bsearch',$bsearch);

        $re = $this->buildHtml("index.html", "./App/Tpl/Admin/{$action_name}/", "Table/0/index")."\r\n\r\n";
        $re .= $this->buildHtml("del.html", "./App/Tpl/Admin/{$action_name}/", "Table/0/del")."\r\n\r\n";
        $re .= $this->buildHtml("edit.html", "./App/Tpl/Admin/{$action_name}/", "Table/0/edit")."\r\n\r\n";
        $re .= $this->buildHtml("add.html", "./App/Tpl/Admin/{$action_name}/", "Table/0/add")."\r\n\r\n";
        $re .= $this->buildHtml($action_name . "Action.class.php", "./App/Lib/Action/Admin/", "Table/0/action")."\r\n\r\n";
        $re .= $this->buildHtml($action_name . "Model.class.php", "./App/Lib/Model/", "Table/0/model")."\r\n\r\n";

        return htmlspecialchars($re);
    }
}