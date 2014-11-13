<?php if (!defined('THINK_PATH')) exit(); echo ($phpstart); ?>

// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class <?php echo ($action_name); ?>Model extends Model{

	protected $_validate = array(
<?php echo ($field_validate); ?>
	);
	protected $_auto = array ( 
		array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
		array('update_time','time',2,'function'), // 对create_time字段在更新的时候写入当前时间戳
<?php echo ($field_auto); ?>
	);

	function add<?php echo ($action_name); ?>(){
		if($this->custom_insert()){
			D("Table")->updateTable("<?php echo ($table_name); ?>");
			<?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; if($field["type"] == 3){?>
				if (isset($this->data['<?php echo ($field["name"]); ?>'])) $this->data['<?php echo ($field["name"]); ?>'] = strtotime($this->data['<?php echo ($field["name"]); ?>']);
				<?php } endforeach; endif; else: echo "" ;endif; ?>
			return $this->add();			
		}else{
			return false;
		}
	}

	function save<?php echo ($action_name); ?>(){
		if($this->custom_update()){
			D("Table")->updateTable("<?php echo ($table_name); ?>");
			<?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; if($field["type"] == 3){?>
				if (isset($this->data['<?php echo ($field["name"]); ?>'])) $this->data['<?php echo ($field["name"]); ?>'] = strtotime($this->data['<?php echo ($field["name"]); ?>']);
				<?php } endforeach; endif; else: echo "" ;endif; ?>
			return $this->save();
		}else{
			return false;
		}
	}

	function delete<?php echo ($action_name); ?>(){
		if($this->custom_delete()){
			$id = $this->options["where"]["id"];
			D("Table")->updateTable("<?php echo ($table_name); ?>");
			return $this->delete();
		}else{
			return false;
		}
	}

	function custom_insert(){
		$this->fixarray();
		<?php echo ($table_info["custom_code_insert"]); ?>
		return true;
	}

	function custom_update(){
		$this->fixarray();
		<?php echo ($table_info["custom_code_update"]); ?>
		return true;
	}

	function custom_delete(){
		<?php echo ($table_info["custom_code_delete"]); ?>
		return true;
	}
	
	function fixarray(){
		foreach ($this->data as $key => $value) {
			if(is_array($value)){
				$this->data[$key] = implode(",", $this->data[$key]);
			}
		}
	}

<?php echo ($t); ?>function __get($property_name){<?php echo ($rn); ?>
<?php  if($table_info["type"] == 1){ ?>
		if($property_name == 'field_pid'){
			$list = tree_to_list2(list_to_tree(D("<?php echo ($action_name); ?>")->select()));
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["title"];
			}
			return $result;
		}
<?php
 } ?>
<?php if(is_array($field_define_list)): $i = 0; $__LIST__ = $field_define_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; echo ($t); echo ($t); ?>if($property_name == 'field_<?php echo ($field["name"]); ?>'){
<?php  $param = $field["param"]; if($param["type"] == 0){ $data = $param["data"]; $data_arr = gen_para($data); ?>
<?php echo ($t); echo ($t); echo ($t); ?>return array(
<?php if(is_array($data_arr)): $i = 0; $__LIST__ = $data_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($t); echo ($t); echo ($t); echo ($t); ?>"<?php echo ($vo["0"]); ?>" => "<?php echo ($vo["1"]); ?>",<?php echo ($rn); endforeach; endif; else: echo "" ;endif; ?>
<?php echo ($t); echo ($t); echo ($t); ?>);
<?php
 } if($param["type"] == 1){ $table = $param["table"]; $key = $param["key"]; $value = $param["value"]; $tableinfo = D("Table")->where("name = '".strtolower($table)."'")->find(); if($tableinfo["type"] == 1){ ?>
<?php echo ($t); echo ($t); echo ($t); ?>$list = tree_to_list2(list_to_tree(D("<?php echo ($table); ?>")->select()));
<?php
 }else{ ?>
<?php echo ($t); echo ($t); echo ($t); ?>$list = D("<?php echo ($table); ?>")->select();
<?php
 } ?>
<?php echo ($t); echo ($t); echo ($t); ?>foreach($list as $k => $v){
<?php echo ($t); echo ($t); echo ($t); echo ($t); ?>$result[$v["<?php echo ($key); ?>"]] = $v["<?php echo ($value); ?>"];
<?php echo ($t); echo ($t); echo ($t); ?>}
<?php echo ($t); echo ($t); echo ($t); ?>return $result;<?php echo ($rn); ?>
<?php
 } ?>
<?php echo ($t); echo ($t); ?>}<?php echo ($rn); endforeach; endif; else: echo "" ;endif; ?>
	}
}
<?php echo ($phpend); ?>