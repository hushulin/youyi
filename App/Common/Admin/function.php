<?php

function is_login(){
	$uid = session("auid");
	if(!empty($uid)){
		return $uid;
	}else{
		return false;
	}
}

function gen_para($para){
	if(empty($para)){
		$result = false;
	}else{
		$result = array();
		$arr = explode("\n", $para);
		foreach ($arr as $key => $value) {
			$dd = explode(":", trim($value));
			$result[] = $dd;
		}		
	}
	return $result;
}

function gen_field($field){
	$field_name = $field["name"];
	$field_default = $field["default"];
	$field_show_type = $field["show_type"];
	if(in_array($field_show_type, array(0, 1))){
		if($field["type"] == '0'){ //数字
			$result = '<input type="text" class="u-ipt" name="'.$field_name.'" value="'.$field_default.'"/>';
		}else if($field["type"] == '1'){ //字符串
			$result = '<input type="text" class="u-ipt" name="'.$field_name.'" value="'.$field_default.'"/>';
		}else if($field["type"] == '2'){ //文本框
			$result = '<textarea class="u-textarea" name="'.$field_name.'">'.$field_default.'</textarea>';
		}else if($field["type"] == '3'){ //时间
			$result = '<input type="text" class="u-ipt time" name="'.$field_name.'" value="<?php echo date("Y-m-d h:i", time()); ?>"/>';
		}else if($field["type"] == '4'){ //布尔
			$str = "";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<option value="{$key}" <?php if($key == "'.$field_default.'") echo "selected"; ?>>{$vo}</option>'."\r\n";
			$str .= '</volist>'."\r\n";
			$result = '<select class="u-select" name="'.$field_name.'">'.$str.'</select>';
		}else if($field["type"] == '5'){ //枚举
			$str = "";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<option value="{$key}" <?php if($key == "'.$field_default.'") echo "selected"; ?>>{$vo}</option>'."\r\n";
			$str .= '</volist>'."\r\n";
			$result = '<select class="u-select" name="'.$field_name.'">'.$str.'</select>';
		}else if($field["type"] == '6'){ //单选
			$str = "";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<input type="radio" name="'.$field_name.'" value="{$key}" <?php if($key == 1) echo \'checked="checked"\';?> >&nbsp;&nbsp;{$vo}&nbsp;&nbsp;&nbsp;&nbsp;'."\r\n";
			$str .= '</volist>';
			$result = $str;
		}else if($field["type"] == '7'){ //多选
			$str = "";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<input type="checkbox" name="'.$field_name.'[]" value="{$key}">&nbsp;&nbsp;{$vo}&nbsp;&nbsp;&nbsp;&nbsp;'."\r\n";
			$str .= '</volist>';
			$result = $str;
		}else if($field["type"] == '8'){ //富文本
			$str = "";
			$str .= '<textarea class="u-textarea" name="'.$field_name.'">'.$field_default.'</textarea>';
			$str .= 
	"<script type=\"text/javascript\">
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name=\"{$field_name}\"]', {
							allowFileManager : false,
							themesPath: K.basePath,
							width: '100%',
							height: '500px',
							resizeType: 1,
							pasteType : 2,
							urlType : 'absolute',
							//fileManagerJson : '/admin.php?m=Admin&c=Article&a=fileManagerJson',
							uploadJson : '/Admin/Index/keupload'
						});
					});
				</script>
	";
			$result = $str;
		}else if($field["type"] == '9'){ //上传图片
			$result = '<input type="file" class="u-file" name="'.$field_name.'" />';
		}else if($field["type"] == '10'){ //上传文件
			$result = '<input type="file" class="u-file" name="'.$field_name.'" />';
		}else{
			$result = '<input type="text" class="u-ipt" name="'.$field_name.'" />';
		}

		$result = '							<div class="formitm">
									<label class="lab">'.$field["title"].':</label>
									<div class="ipt">
										'.$result.'
										<p>'.$field["description"].'</p>
									</div>
								</div>
';	
	}else{
		$result = '';
	}
	return $result;
}

function gen_field2($field){
	$field_name = $field["name"];
	$field_show_type = $field["show_type"];
	if(in_array($field_show_type, array(0, 2))){
		if($field["type"] == '0'){ //数字
			$result = '<input type="text" class="u-ipt" name="'.$field_name.'" value="{$doc.'.$field_name.'}"/>';
		}else if($field["type"] == '1'){ //字符串
			$result = '<input type="text" class="u-ipt" name="'.$field_name.'" value="{$doc.'.$field_name.'}"/>';
		}else if($field["type"] == '2'){ //文本框
			$result = '<textarea class="u-textarea" name="'.$field_name.'">{$doc.'.$field_name.'}</textarea>';
		}else if($field["type"] == '3'){ //时间
			$result = '<input type="text" class="u-ipt time" name="'.$field_name.'" value="{$doc.'.$field_name.'|date="Y-m-d h:i",###}"/>';
		}else if($field["type"] == '4'){ //布尔
			$str = "";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<option value="{$key}" <?php if($key == $doc["'.$field_name.'"]) echo \'selected="selected"\'; ?> >{$vo}</option>'."\r\n";
			$str .= '</volist>'."\r\n";
			$result = '<select class="u-select" name="'.$field_name.'">'.$str.'</select>';
		}else if($field["type"] == '5'){ //枚举
			$str = "";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<option value="{$key}" <?php if($key == $doc["'.$field_name.'"]) echo \'selected="selected"\'; ?> >{$vo}</option>'."\r\n";
			$str .= '</volist>'."\r\n";
			$result = '<select class="u-select" name="'.$field_name.'">'.$str.'</select>';
		}else if($field["type"] == '6'){ //单选
			$str = "";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<input type="radio" name="'.$field_name.'" value="{$key}" <?php if($key == $doc["'.$field_name.'"]) echo \'checked="checked"\'; ?> >&nbsp;&nbsp;{$vo}&nbsp;&nbsp;&nbsp;&nbsp;'."\r\n";
			$str .= '</volist>';
			$result = $str;
		}else if($field["type"] == '7'){ //多选
			$str = '<?php $arr = explode(",", $doc["'.$field_name.'"]); ?>'."\r\n";
			$str .= '<volist name = "field_'.$field_name.'" id = "vo">'."\r\n";
			$str .= '<input type="checkbox" name="'.$field_name.'[]" value="{$key}" <?php if(in_array($key, $arr)) echo \'checked="checked"\'; ?> >&nbsp;&nbsp;{$vo}&nbsp;&nbsp;&nbsp;&nbsp;'."\r\n";
			$str .= '</volist>';
			$result = $str;
		}else if($field["type"] == '8'){ //富文本
			$str = "";
			$str .= '<textarea class="u-textarea" name="'.$field_name.'">{$doc.'.$field_name.'}</textarea>';
			$str .= 
	"<script type=\"text/javascript\">
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name=\"{$field_name}\"]', {
							allowFileManager : false,
							themesPath: K.basePath,
							width: '100%',
							height: '500px',
							resizeType: 1,
							pasteType : 2,
							urlType : 'absolute',
							//fileManagerJson : '/admin.php?m=Admin&c=Article&a=fileManagerJson',
							uploadJson : '/Admin/Index/keupload'
						});
					});
				</script>
	";
			$result = $str;
		}else if($field["type"] == '9'){ //上传图片
			$str = "";
			$str = '<input type="file" class="u-file" name="'.$field_name.'" />';
			$str .= '<div><img src="{$doc.'.$field_name.'}" style="height:100px;"></div>';
			$result = $str;
		}else if($field["type"] == '10'){ //上传文件
			$str = "";
			$str = '<input type="file" class="u-file" name="'.$field_name.'" />';
			$str .= '<div>{$doc.'.$field_name.'}</div>';
			$result = $str;
		}else{
			$result = '<input type="text" class="u-ipt" name="'.$field_name.'" value="{$doc.'.$field_name.'}" />';
		}

		$result = '							<div class="formitm">
									<label class="lab">'.$field["title"].':</label>
									<div class="ipt">
										'.$result.'
										<p>'.$field["description"].'</p>
									</div>
								</div>
';
	}else{
		$result = '';
	}
	return $result;
}


function gen_check_rule($field_check_list){
	$result = '';
	foreach ($field_check_list as $key => $field) {
		$field_name = $field["name"];
		$field_title = $field["title"];
		$field_check_type = $field["check_type"];
		$field_check_rule = $field["check_rule"];
		$field_check_msg = $field["check_msg"];
		$field_check_time = $field["check_time"];
		if(in_array($field_check_type, array(1, 8, 9, 10, 11))){
			$str = '';
			switch ($field_check_type) {
				case 1:
					$rule1 = "require";
					break;
				case 8:
					$rule1 = "email";
					break;
				case 9:
					$rule1 = "url";
					break;
				case 10:
					$rule1 = "currency";
					break;
				case 11:
					$rule1 = "number";
					break;
				default:
					$rule1 = "require";
					break;
			}
			$time = empty($field_check_msg)?"3":$field_check_time;
			$msg = empty($field_check_msg)?"{$field_title}填写不对！":$field_check_msg;
			$str .= "\t\tarray('{$field_name}', '{$rule1}', '{$msg}'), //\r\n";	
		}
		if(in_array($field_check_type, array(2, 3, 4, 5, 6, 7, 12))){
			$str = '';
			$rule1 = $field_check_rule;
			switch ($field_check_type) {
				case 2:
					$rule2 = "regex";
					break;
				case 3:
					$rule2 = "function";
					break;
				case 4:
					$rule2 = "unique";
					break;
				case 5:
					$rule2 = "length";
					break;
				case 6:
					$rule2 = "between";
					break;
				case 7:
					$rule2 = "equal";
					break;
				case 12:
					$rule2 = "confirm";
					break;
				default:
					$rule1 = "regex";
					break;
			}
			$time = empty($field_check_msg)?"3":$field_check_time;
			$msg = empty($field_check_msg)?"{$field_title}填写不对！":$field_check_msg;
			$str .= "\t\tarray('{$field_name}', '{$rule1}', '{$msg}', 0, '{$rule2}', {$time}), //\r\n";	
		}
		$result .= $str;
	}
	return $result;
}
function gen_auto_rule($field_default_list){
	$result = '';
	foreach ($field_default_list as $key => $field) {
		$field_name = $field["name"];
		$field_title = $field["title"];
		$field_default_type = $field["default_type"];
		$field_default_rule = $field["default_rule"];
		$field_default_time = $field["default_time"];
		$str = '';
		switch ($field_default_type) {
			case 1:
				$type = "function";
				break;
			case 2:
				$type = "string";
				break;
			case 3:
				$type = "field ";
				break;
			default:
				$type = "string";
				break;
		}
		$str .= "\t\tarray('{$field_name}', '{$field_default_rule}', {$field_default_time}, '{$type}'), //\r\n";
		$result .= $str;
	}
	return $result;
}