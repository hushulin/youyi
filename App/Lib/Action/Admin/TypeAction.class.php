<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class TypeAction extends AdminAction {

	public function index(){
		$key = I("get.key","","trim,stripslashes,strip_tags");
		$value = I("get.value","","trim,stripslashes,strip_tags");
		$map = array();
		if(!empty($key)){
			if(!empty($value)){
				$map = array($key => array('like', "%{$value}%"));
			}
		}
		$Type = D("Type");  // 实例化Type对象
		import("ORG.Util.Page");                    // 导入分页类
		$count      = $Type->where($map)->count();   // 查询满足要求的总记录数
		$Page       = new Page($count, 10);         // 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('theme'," <span>%totalRow% %header% %nowPage%/%totalPage% 页</span> %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%");
		$show       = $Page->show();                // 分页显示输出
		$list = $Type->where($map)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
		$this->assign('list',$list);                // 输出列表数据
		$this->assign('page',$show);                // 赋值分页输出
		$this->assign('kkey', $key);					// 搜索字段
		$this->assign('value', $value);				// 搜索值
		$this->assign("rurl", $_SERVER["REQUEST_URI"]);
		$this->display();

	}

	public function add(){
		$Type = D("Type"); // 实例化Type对象
		if(IS_POST){
			if (!$Type->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Type->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Type->addType();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/Type":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Type->getError());
				}
			}
		}else{
			$this->display();
		}
	}

	public function edit(){
		$Type = D("Type"); // 实例化Type对象
		if(IS_POST){
			if (!$Type->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Type->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Type->saveType();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/Type":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Type->getError());
				}
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map["id"] = $id;
			$doc = $Type->where($map)->find();
			$this->assign('doc',$doc);
			$this->display();
			
		}
	}

	public function del(){
		$Type = D("Type"); // 实例化Type对象
		if(IS_POST){
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map = array();
			$map["id"] = $id;
			$re = $Type->where($map)->deleteType();
			if ($re !== false) {
				$rurl = base64_decode($_GET["rurl"]);
				$rurl = empty($rurl)?"/Admin/Type":$rurl;
				$this->success('数据删除成功！', $rurl);
			} else {
				$this->error($Type->getError());
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$this->assign('id',$id);
			$this->display();
		}
	}
}
?>