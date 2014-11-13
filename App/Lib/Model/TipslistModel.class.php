<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class TipslistModel extends Model{

	protected $_validate = array(
	);
	protected $_auto = array ( 
		array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
		array('update_time','time',2,'function'), // 对create_time字段在更新的时候写入当前时间戳
	);

	function addTipslist(){
		if($this->custom_insert()){
			D("Table")->updateTable("tipslist");
							if (isset($this->data['time'])) $this->data['time'] = strtotime($this->data['time']);
							return $this->add();			
		}else{
			return false;
		}
	}

	function saveTipslist(){
		if($this->custom_update()){
			D("Table")->updateTable("tipslist");
							if (isset($this->data['time'])) $this->data['time'] = strtotime($this->data['time']);
							return $this->save();
		}else{
			return false;
		}
	}

	function deleteTipslist(){
		if($this->custom_delete()){
			$id = $this->options["where"]["id"];
			D("Table")->updateTable("tipslist");
			return $this->delete();
		}else{
			return false;
		}
	}

	function custom_insert(){
		$this->fixarray();
				return true;
	}

	function custom_update(){
		$this->fixarray();
				return true;
	}

	function custom_delete(){
				return true;
	}
	
	function fixarray(){
		foreach ($this->data as $key => $value) {
			if(is_array($value)){
				$this->data[$key] = implode(",", $this->data[$key]);
			}
		}
	}

	function __get($property_name){
		if($property_name == 'field_position_id'){
			$list = D("position")->select();
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["name"];
			}
			return $result;
		}
		if($property_name == 'field_cargoods_id'){
			$list = D("cargoods")->select();
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["title"];
			}
			return $result;
		}
		if($property_name == 'field_is_effect'){
			return array(
				"1" => "审核通过",
				"0" => "审核不通过",
			);
		}
		if($property_name == 'field_user_id'){
			$list = D("User")->select();
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["user_name"];
			}
			return $result;
		}
	}
}
?>