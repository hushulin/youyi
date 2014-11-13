<?php if (!defined('THINK_PATH')) exit(); echo ($phpstart); ?>

// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class <?php echo ($action_name); ?>Action extends AdminAction {

	public function index(){
<?php  if($table_info["type"] == 0){ ?>
		$key = I("get.key","","trim,stripslashes,strip_tags");
		$value = I("get.value","","trim,stripslashes,strip_tags");
		$map = array();
		if(!empty($key)){
			if(!empty($value)){
				$map = array($key => array('like', "%{$value}%"));
			}
		}
		$<?php echo ($action_name); ?> = D("<?php echo ($action_name); ?>");  // 实例化<?php echo ($action_name); ?>对象
		import("ORG.Util.Page");                    // 导入分页类
		$count      = $<?php echo ($action_name); ?>->where($map)->count();   // 查询满足要求的总记录数
		$Page       = new Page($count, 10);         // 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('theme'," <span>%totalRow% %header% %nowPage%/%totalPage% 页</span> %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%");
		$show       = $Page->show();                // 分页显示输出
		$list = $<?php echo ($action_name); ?>->where($map)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
		$this->assign('list',$list);                // 输出列表数据
		$this->assign('page',$show);                // 赋值分页输出
<?php if(is_array($field_define_list)): $i = 0; $__LIST__ = $field_define_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; echo ($t); echo ($t); ?>$this->assign('field_<?php echo ($field["name"]); ?>',$<?php echo ($action_name); ?>->field_<?php echo ($field["name"]); ?>);<?php echo ($rn); endforeach; endif; else: echo "" ;endif; ?>
		$this->assign('kkey', $key);					// 搜索字段
		$this->assign('value', $value);				// 搜索值
		$this->assign("rurl", $_SERVER["REQUEST_URI"]);
		$this->display();
<?php
 }else{ ?>
		$<?php echo ($action_name); ?> = D("<?php echo ($action_name); ?>");  // 实例化<?php echo ($action_name); ?>对象
		$list = tree_to_list2(list_to_tree($<?php echo ($action_name); ?>->select()));
		$this->assign('list',$list);                // 输出列表数据
		$this->display();
<?php
 } ?>

	}

	public function add(){
		$<?php echo ($action_name); ?> = D("<?php echo ($action_name); ?>"); // 实例化<?php echo ($action_name); ?>对象
		if(IS_POST){
			if (!$<?php echo ($action_name); ?>->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($<?php echo ($action_name); ?>->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $<?php echo ($action_name); ?>->add<?php echo ($action_name); ?>();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/<?php echo ($action_name); ?>":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($<?php echo ($action_name); ?>->getError());
				}
			}
		}else{
<?php  if($table_info["type"] == 1){ ?>
			$this->assign('field_pid',$<?php echo ($action_name); ?>->field_pid);
<?php
 } ?>
<?php if(is_array($field_define_list)): $i = 0; $__LIST__ = $field_define_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; echo ($t); echo ($t); echo ($t); ?>$this->assign('field_<?php echo ($field["name"]); ?>',$<?php echo ($action_name); ?>->field_<?php echo ($field["name"]); ?>);<?php echo ($rn); endforeach; endif; else: echo "" ;endif; ?>
			$this->display();
		}
	}

	public function edit(){
		$<?php echo ($action_name); ?> = D("<?php echo ($action_name); ?>"); // 实例化<?php echo ($action_name); ?>对象
		if(IS_POST){
			if (!$<?php echo ($action_name); ?>->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($<?php echo ($action_name); ?>->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $<?php echo ($action_name); ?>->save<?php echo ($action_name); ?>();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/Admin/<?php echo ($action_name); ?>":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($<?php echo ($action_name); ?>->getError());
				}
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map["id"] = $id;
			$doc = $<?php echo ($action_name); ?>->where($map)->find();
			$this->assign('doc',$doc);
<?php  if($table_info["type"] == 1){ ?>
			$this->assign('field_pid',$<?php echo ($action_name); ?>->field_pid);
<?php
 } ?>
<?php if(is_array($field_define_list)): $i = 0; $__LIST__ = $field_define_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; echo ($t); echo ($t); echo ($t); ?>$this->assign('field_<?php echo ($field["name"]); ?>',$<?php echo ($action_name); ?>->field_<?php echo ($field["name"]); ?>);<?php echo ($rn); endforeach; endif; else: echo "" ;endif; ?>
			$this->display();
			
		}
	}

	public function del(){
		$<?php echo ($action_name); ?> = D("<?php echo ($action_name); ?>"); // 实例化<?php echo ($action_name); ?>对象
		if(IS_POST){
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map = array();
			$map["id"] = $id;
			$re = $<?php echo ($action_name); ?>->where($map)->delete<?php echo ($action_name); ?>();
			if ($re !== false) {
				$rurl = base64_decode($_GET["rurl"]);
				$rurl = empty($rurl)?"/Admin/<?php echo ($action_name); ?>":$rurl;
				$this->success('数据删除成功！', $rurl);
			} else {
				$this->error($<?php echo ($action_name); ?>->getError());
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$this->assign('id',$id);
			$this->display();
		}
	}
}
<?php echo ($phpend); ?>