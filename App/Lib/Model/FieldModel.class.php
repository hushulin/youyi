<?php
class FieldModel extends Model{
	var $field_type = array(
		0 => "数字",
		1 => "字符串",
		2 => "文本框",
		3 => "时间",
		4 => "布尔",
		5 => "枚举",
		6 => "单选",
		7 => "多选",
		8 => "富文本编辑器",
		9 => "上传图片",
		10 => "上传附件",
	);
	var $field_show_type = array(
		0 => "始终显示",
		1 => "新增显示",
		2 => "编辑显示",
		3 => "不显示",
	);
	var $field_check_type = array(
		0 => "不验证",
		1 => "必填",
		2 => "正则验证",
		3 => "函数验证",
		4 => "唯一验证",
		5 => "长度验证",
		6 => "范围验证",
		7 => "等于某值",
		8 => "email邮箱",
		9 => "URL地址",
		10 => "货币",
		11 => "数字",
		12 => "表单相同",
	);
	var $field_check_time = array(
		0 => "始终",
		1 => "新增",
		2 => "编辑",
	);
	var $field_default_type = array(
		0 => "不自动完成",
		1 => "函数",
		2 => "字符串",
		3 => "其他字段",
	);
	var $field_default_time = array(
		1 => "新增",
		2 => "编辑",
		3 => "始终",
	);

	protected $_validate = array(
		array('title','require','标题必须填写！'), //默认情况下用正则进行验证
	);
	protected $_auto = array ( 
	    array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
	    array('update_time','time',2,'function'), // 对create_time字段在更新的时候写入当前时间戳
	);

	public function addField($rid){
		$field_name = $this->data["name"];
		$field_define = $this->data["define"];
		$field_title = $this->data["title"];
		$field_default = $this->data["default"];
		$table_list = M()->query("select * from app_table where id = '{$rid}'");
		$table_name = "app_".$table_list[0]["name"];
		if(stristr($field_define, "int")){$default_value = "0";}else{$default_value = "''";}
		$sql = <<<sql
ALTER TABLE `{$table_name}`
ADD COLUMN `{$field_name}` {$field_define} NULL DEFAULT {$default_value} COMMENT '{$field_title}' AFTER `id`;
sql;
		M()->query($sql);
		return $this->add();
	}

	public function delField($rid){
		$table_list = M()->query("select * from app_table where id = '{$rid}'");
		$table_name = "app_".$table_list[0]["name"];
		$id = $this->options["where"]["id"];
		$field_info = M()->query("select * from app_field where id = '{$id}'");
		$field_name = $field_info[0]["name"];
		$sql = <<< sql
ALTER TABLE `{$table_name}`
DROP COLUMN `{$field_name}`;
sql;
		M()->query($sql);
		return $this->delete();
	}

	public function saveField($rid){
		$table_list = M()->query("select * from app_table where id = '{$rid}'");
		$table_name = "app_".$table_list[0]["name"];
		$orname = $_POST["orname"];
		$field_name = $this->data["name"];
		if($orname != $field_name){
			$pre = "`$orname`";
			$mothed = "CHANGE";
		}else{
			$pre = '';
			$mothed = "MODIFY";
		}
		$field_define = $this->data["define"];
		$field_title = $this->data["title"];
		$field_default = $this->data["default"];
		if(stristr($field_define, "int")){$default_value = "0";}else{$default_value = "''";}
		$sql = <<< sql
ALTER TABLE `{$table_name}`
{$mothed} COLUMN {$pre} `{$field_name}` {$field_define} NULL DEFAULT {$default_value} COMMENT '{$field_title}' AFTER `id`;
sql;
		// dump($sql);
		// die();
		M()->query($sql);
		return $this->save();
	}
}