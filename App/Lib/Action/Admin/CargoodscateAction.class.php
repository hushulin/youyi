<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class CargoodscateAction extends AdminAction {

	public function index(){
		$Cargoodscate = D("Cargoodscate");  // 实例化Cargoodscate对象
		$list = tree_to_list2(list_to_tree($Cargoodscate->select()));
		$this->assign('list',$list);                // 输出列表数据
		$this->display();

	}

	public function add(){
		$Cargoodscate = D("Cargoodscate"); // 实例化Cargoodscate对象
		if(IS_POST){
			if (!$Cargoodscate->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Cargoodscate->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Cargoodscate->addCargoodscate();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/Cargoodscate":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Cargoodscate->getError());
				}
			}
		}else{
			$this->assign('field_pid',$Cargoodscate->field_pid);
			$this->display();
		}
	}

	public function edit(){
		$Cargoodscate = D("Cargoodscate"); // 实例化Cargoodscate对象
		if(IS_POST){
			if (!$Cargoodscate->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Cargoodscate->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Cargoodscate->saveCargoodscate();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/Cargoodscate":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Cargoodscate->getError());
				}
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map["id"] = $id;
			$doc = $Cargoodscate->where($map)->find();
			$this->assign('doc',$doc);
			$this->assign('field_pid',$Cargoodscate->field_pid);
			$this->display();
			
		}
	}

	public function del(){
		$Cargoodscate = D("Cargoodscate"); // 实例化Cargoodscate对象
		if(IS_POST){
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map = array();
			$map["id"] = $id;
			$re = $Cargoodscate->where($map)->deleteCargoodscate();
			if ($re !== false) {
				$rurl = base64_decode($_GET["rurl"]);
				$rurl = empty($rurl)?"/Admin/Cargoodscate":$rurl;
				$this->success('数据删除成功！', $rurl);
			} else {
				$this->error($Cargoodscate->getError());
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$this->assign('id',$id);
			$this->display();
		}
	}
}
?>