<?php
class TableModel extends Model{
	var $field_type = array(
		0 => "列表",
		1 => "树形",
	);
	protected $_validate = array(
		array('title','require','标题必须填写！'), //默认情况下用正则进行验证
	);
	protected $_auto = array ( 
	    array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
	    //array('update_time','time',2,'function'), // 对create_time字段在更新的时候写入当前时间戳
	);

	public function addTable(){
		$table_type = $this->data["type"];
		$table_name = "app_".$this->data["name"];
		if($table_type == 0){
			//列表
			$sql = <<<sql
CREATE TABLE `{$table_name}` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `create_time` int(11) DEFAULT 0  COMMENT '创建时间',
  `update_time` int(11) DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
sql;
		}else if($table_type == 1){
			//树形
			$sql = <<<sql
CREATE TABLE `{$table_name}` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(10) DEFAULT '0' COMMENT '上级分类ID',
  `create_time` int(11) DEFAULT 0  COMMENT '创建时间',
  `update_time` int(11) DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
sql;
		}
		M()->query($sql);
		return $this->add();
	}

	public function delTable($rid){
		$table_list = M()->query("select * from app_table where id = '".$this->options["where"]["id"]."'");
		$table_name = "app_".$table_list[0]["name"];
		$sql = <<<sql
DROP TABLE {$table_name};
sql;
		M()->query($sql);
		return $this->delete();
	}

	public function saveTable(){
        $this->data["field_sort"] = json_encode($this->data["field_sort"]);
		return $this->save();
	}

    function updateTable($tablename){
        $data["update_time"] = time();
        $this->where("pro_id = 1 and name = '{$tablename}'")->save($data);
    }

    function getLastUpdate(){
        return $this->where("pro_id = '1'")->field("id,title,name,update_time")->select();
    }
}