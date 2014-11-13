<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
	var $admin_top_menu;
    var $admin_left_menu;
    function _initialize(){
    	if(!is_login()){
    		$this->redirect("/Admin/Public/login");
    	}
        if(isset($_GET["currnav"])){
            session("currnav", $_GET["currnav"] * 1);
        }
        $pid = session("currnav");
    	$this->admin_top_menu = list_to_tree(D("Menu")->select());
        foreach ($this->admin_top_menu as $key => $menu) {
            if($menu["id"] == $pid){
                $this->admin_left_menu = $menu["_child"];
            }
        }
    	$this->admin_left_menu = tree_to_list2($this->admin_left_menu);
    	$this->assign('admin_top_menu', $this->admin_top_menu);
        $this->assign('admin_left_menu', $this->admin_left_menu);
        if(MODULE_NAME != "Index"){
            $this->upload();
        }
    }

    function upload(){
        if(IS_POST){
            $re = uploadImage();
            foreach ($re as $key => $value) {
                $_POST[$value["key"]] = $value["savepath"].$value["savename"];
            }
            $re = uploadFile();
            foreach ($re as $key => $value) {
                $_POST[$value["key"]] = $value["savepath"].$value["savename"];
            }
        }
    }
}