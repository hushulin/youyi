<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class CargoodsAction extends AdminAction {

	public function index(){
		$key = I("get.key","","trim,stripslashes,strip_tags");
		$value = I("get.value","","trim,stripslashes,strip_tags");
		$map = array();
		if(!empty($key)){
			if(!empty($value)){
				$map = array($key => array('like', "%{$value}%"));
			}
		}
		$Cargoods = D("Cargoods");  // 实例化Cargoods对象
		import("ORG.Util.Page");                    // 导入分页类
		$count      = $Cargoods->where($map)->count();   // 查询满足要求的总记录数
		$Page       = new Page($count, 10);         // 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('theme'," <span>%totalRow% %header% %nowPage%/%totalPage% 页</span> %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%");
		$show       = $Page->show();                // 分页显示输出
		$list = $Cargoods->where($map)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
		$this->assign('list',$list);                // 输出列表数据
		$this->assign('page',$show);                // 赋值分页输出
		$this->assign('field_cate_id',$Cargoods->field_cate_id);
		$this->assign('field_type_id',$Cargoods->field_type_id);
		$this->assign('kkey', $key);					// 搜索字段
		$this->assign('value', $value);				// 搜索值
		$this->assign("rurl", $_SERVER["REQUEST_URI"]);
		$this->display();

	}

	public function add(){
		$Cargoods = D("Cargoods"); // 实例化Cargoods对象
		if(IS_POST){
			if (!$Cargoods->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Cargoods->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Cargoods->addCargoods();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/Cargoods":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Cargoods->getError());
				}
			}
		}else{
			$this->assign('field_cate_id',$Cargoods->field_cate_id);
			$this->assign('field_type_id',$Cargoods->field_type_id);
			$this->display();
		}
	}

	public function edit(){
		$Cargoods = D("Cargoods"); // 实例化Cargoods对象
		if(IS_POST){
			if (!$Cargoods->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Cargoods->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Cargoods->saveCargoods();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/Cargoods":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Cargoods->getError());
				}
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map["id"] = $id;
			$doc = $Cargoods->where($map)->find();
			$this->assign('doc',$doc);
			$this->assign('field_cate_id',$Cargoods->field_cate_id);
			$this->assign('field_type_id',$Cargoods->field_type_id);
			$this->display();
			
		}
	}

	public function del(){
		$Cargoods = D("Cargoods"); // 实例化Cargoods对象
		if(IS_POST){
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map = array();
			$map["id"] = $id;
			$re = $Cargoods->where($map)->deleteCargoods();
			if ($re !== false) {
				$rurl = base64_decode($_GET["rurl"]);
				$rurl = empty($rurl)?"/Admin/Cargoods":$rurl;
				$this->success('数据删除成功！', $rurl);
			} else {
				$this->error($Cargoods->getError());
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$this->assign('id',$id);
			$this->display();
		}
	}
}
?>