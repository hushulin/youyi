<?php
/**
 *
 * @name decodeUnicode
 * @todo json字符串转中文
 * @param string $str
 * @return string
 */
function decodeUnicode($str)
{
//    $str = str_replace("null",'""',$str);
    $str = str_replace("font-size",'font_size',$str);
    $str = str_replace("font-color",'font_color',$str);
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', create_function('$matches', 'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'), $str);
}

function aes_decode($str){
    if (! empty($str)) {
        import('@.Common.AES');
        $aes = new AES(true); // 把加密后的字符串按十六进制进行存储
        $keys = $aes->makeKey(C("AES_KEY"));
        return $aes->decryptString($str, $keys);
    } else {
        return false;
    }
}

function aes_encode($str){
    import('@.Common.AES'); // 加载AES加解密模块
    $aes = new AES(true); // 把加密后的字符串按十六进制进行存储
    $thisTime = floor(time() / (24 * 3600 * 14)); // 根据当前时间取得时间戳
    $keys = $aes->makeKey(C("AES_KEY"));
    return $aes->encryptString($str, $keys);
}

function des_encode($str){
    import('@.Common.DES'); // 加载DES加解密模块
    $des = new DES();
    return $des->encrypt($str);
}

function des_decode($str){
    import('@.Common.DES'); // 加载DES加解密模块
    $des = new DES();
    return $des->decrypt($str);
}
function mysession($key){
    $return = false;
    if(!empty($_GET["token"])){
        $arr = json_decode(aes_decode($_GET["token"]), true);
        $return = $arr[$key];
        $rr = session($key);
        if (empty($rr)) {
        	session($key,$arr[$key]);
        }
    }else{
        $rr = session($key);
        if(!empty($rr)){
            $return = $rr;
        }        
    }
    return $return;
}

/**
* 对查询结果集进行排序
* @access public
* @param array $list 查询结果
* @param string $field 排序的字段名
* @param array $sortby 排序类型
* asc正向排序 desc逆向排序 nat自然排序
* @return array
*/
function list_sort_by($list,$field, $sortby='asc') {
   if(is_array($list)){
	   $refer = $resultSet = array();
	   foreach ($list as $i => $data)
		   $refer[$i] = &$data[$field];
	   switch ($sortby) {
		   case 'asc': // 正向排序
				asort($refer);
				break;
		   case 'desc':// 逆向排序
				arsort($refer);
				break;
		   case 'nat': // 自然排序
				natcasesort($refer);
				break;
	   }
	   foreach ( $refer as $key=> $val)
		   $resultSet[] = &$list[$key];
	   return $resultSet;
   }
   return false;
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function list_to_tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
	// 创建Tree
	$tree = array();
	if(is_array($list)) {
		// 创建基于主键的数组引用
		$refer = array();
		foreach ($list as $key => $data) {
			$refer[$data[$pk]] =& $list[$key];
		}
		foreach ($list as $key => $data) {
			// 判断是否存在parent
			$parentId =  $data[$pid];
			if ($root == $parentId) {
				$tree[] =& $list[$key];
			}else{
				if (isset($refer[$parentId])) {
					$parent =& $refer[$parentId];
					$parent[$child][] =& $list[$key];
				}
			}
		}
	}
	return $tree;
}

/**
 * 将list_to_tree的树还原成列表
 * @param  array $tree  原来的树
 * @param  string $child 孩子节点的键
 * @param  string $order 排序显示的键，一般是主键 升序排列
 * @param  array  $list  过渡用的中间数组，
 * @return array        返回排过序的列表数组
 * @author yangweijie <yangweijiester@gmail.com>
 */
function tree_to_list($tree, $child = '_child', $order='id', &$list = array()){
	if(is_array($tree)) {
		$refer = array();
		foreach ($tree as $key => $value) {
			$reffer = $value;
			if(isset($reffer[$child])){
				unset($reffer[$child]);
				tree_to_list($value[$child], $child, $order, $list);
			}
			$list[] = $reffer;
		}
		$list = list_sort_by($list, $order, $sortby='asc');
	}
	return $list;
}

/**
 * 将list_to_tree的树还原成列表
 * @param  array $tree  原来的树
 * @param  string $child 孩子节点的键
 * @param  string $order 排序显示的键，一般是主键 升序排列
 * @param  array  $list  过渡用的中间数组，
 * @return array        返回排过序的列表数组
 * @author yangweijie <yangweijiester@gmail.com>
 */
function tree_to_list2($tree, $child = '_child', $order='id', $level = 0, &$list = array()){
	if(is_array($tree)) {
		$level++;
		$refer = array();
		foreach ($tree as $key => $value) {
			$reffer = $value;
			unset($reffer[$child]);
			$reffer["level"] = $level;
			$reffer["title"] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).$reffer["title"];
			$reffer["hchildren"] = isset($value[$child])?"1":"0";
			$list[] = $reffer;
			if(isset($value[$child])){
				tree_to_list2($value[$child], $child, $order, $level, $list);
			}
		}
	}
	return $list;
}

// 循环创建目录
function mk_dir($dir, $mode = 0777) {
	if (is_dir($dir) || @mkdir($dir, $mode))
		return true;
	if (!mk_dir(dirname($dir), $mode))
		return false;
	return @mkdir($dir, $mode);
}

function uploadImage(){
	$dir = C("UPLOAD_DIR")."images/".date("Y_m/d/", time());
	if (! is_dir($dir))
		mk_dir($dir);
	import("ORG.Net.UploadFile"); // 导入上传类
	$upload = new UploadFile();
	$upload->maxSize = 5242880; // 设置上传文件大小
	$upload->allowExts = explode(',', 'jpg,gif,png,jpeg,card'); // 设置上传文件类型
	// $upload->thumb = true; // 设置需要生成缩略图，仅对图像文件有效
	// $upload->imageClassPath = 'ORG.Util.Image'; // 设置引用图片类库包路径
	// $upload->thumbPrefix = 'thum_'; // 设置需要生成缩略图的文件后缀//生产2张缩略图

	// $upload->thumbMaxWidth = '500'; // 设置缩略图最大宽度
	// $upload->thumbMaxHeight = '300'; // 设置缩略图最大高度
	// $upload->thumbRemoveOrigin = false; // 不删除原图    
	$upload->savePath = $dir; // 设置附件上传目录
	$upload->saveRule = 'uniqid';//设置上传文件规则 函数名 或者直接字符串
	$upload->uploadReplace = true; // 设置已存在覆盖。

	if (! $upload->upload()) {
		// 捕获上传异常
		//var_dump($upload->getErrorMsg()) ;
		return false;
	} else {
		// 取得成功上传的文件信息
		$resultsss = $upload->getUploadFileInfo();
		foreach ($resultsss as $key => $value) {
			$resultsss[$key]["savepath"] = str_replace(C("UPLOAD_DIR"), C("UPLOAD_URL"), $value["savepath"] );
		}
		return $resultsss;
	}
}

function uploadFile(){
	$dir = C("UPLOAD_DIR")."files/".date("Y_m/d/", time());
	if (! is_dir($dir))
		mk_dir($dir);
	import("ORG.Net.UploadFile"); // 导入上传类
	$upload = new UploadFile();
	$upload->maxSize = 5242880; // 设置上传文件大小
	$upload->allowExts = explode(',', 'txt,rar,zip,mp3,mar'); // 设置上传文件类型
	$upload->savePath = $dir; // 设置附件上传目录
	$upload->saveRule = 'uniqid';//设置上传文件规则 函数名 或者直接字符串
	$upload->uploadReplace = true; // 设置已存在覆盖。

	if (! $upload->upload()) {
		// 捕获上传异常
		//var_dump($upload->getErrorMsg()) ;
		return false;
	} else {
		// 取得成功上传的文件信息
		$resultsss = $upload->getUploadFileInfo();
		foreach ($resultsss as $key => $value) {
			$resultsss[$key]["savepath"] = str_replace(C("UPLOAD_DIR"), C("UPLOAD_URL"), $value["savepath"] );
		}
		return $resultsss;
	}
}

/**
 * @name 发送消息函数,  请复制该函数 到 自己的项目中,  然后调用!
 * 	    	$message = array(
 *				'send_time' => time() + rand(10,200),
 *				'message' => "这是一个测试消息".date("Y m d H:i:s"),
 *				'to_username' => "testname",
 *				'to_userid' => "20216",
 *				'oid' => "123456",
 *				'order_title' => "123456",
 *				'tag' => "泰国游",
 *			);
 * 
 * */
function send_message($message){
	if(class_exists("Redis")){
		$redis = new Redis();
		$redis->connect(C('REDIS_HOST'));
		$msg = $message;
		$message_id = M("Message")->add($msg);
		if($message_id){
			$msg["id"] = $message_id;
			echo date("Y m d H:i:s", $msg["send_time"])."\n";
			$redis->rPush("m_date_".date("Y_m_d_H", $msg["send_time"]), $message_id);//
			$redis->set('m_'.$message_id, json_encode($msg));
			$redis->expireAt('m_'.$message_id, time() + 3600 * 24 * 30); //30天后过期
		}
		$redis->close();		
	}else{
		echo "Redis 没有安装!";
	}
}

//截取字符串 去HTML标签
function dsubstr($string, $length, $suffix = '', $start = 0)
{
    //后添加正则去除html标
    //$string = preg_replace("/<(?!img|a|p).(.*?)>/is",'',$string);
    $string = preg_replace("/<(.*?)>/is", '', $string);
    if ($start) {
        $tmp = dsubstr($string, $start);
        $string = substr($string, strlen($tmp));
    }
    $strlen = strlen($string);
    if ($strlen <= $length) return $string;
    $string = str_replace(array('&quot;', '&nbsp;', '&lt;', '&gt;'), array('"', '', '<', '>'), $string);
    $length = $length - strlen($suffix);
    $str = '';
    $n = $tn = $noc = 0;
    while ($n < $strlen) {
        $t = ord($string{$n});
        if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
            $tn = 1;
            $n++;
            $noc++;
        } elseif (194 <= $t && $t <= 223) {
            $tn = 2;
            $n += 2;
            $noc += 2;
        } elseif (224 <= $t && $t <= 239) {
            $tn = 3;
            $n += 3;
            $noc += 2;
        } elseif (240 <= $t && $t <= 247) {
            $tn = 4;
            $n += 4;
            $noc += 2;
        } elseif (248 <= $t && $t <= 251) {
            $tn = 5;
            $n += 5;
            $noc += 2;
        } elseif ($t == 252 || $t == 253) {
            $tn = 6;
            $n += 6;
            $noc += 2;
        } else {
            $n++;
        }
        if ($noc >= $length) break;
    }
    if ($noc > $length) $n -= $tn;
    $str = substr($string, 0, $n);

    $str = str_replace(array('"', '<', '>'), array('&quot;', '&lt;', '&gt;'), $str);
    return $str == $string ? $str : $str . $suffix;
}

// 取车品
function getChepin($type='', $limit = 4)
{
	$tipslist = D('tipslist');
	$cargoods_id_list = $tipslist->where("`position_id` = {$type}")->select();
	foreach ($cargoods_id_list as $key => $value) {
		$cargoods_ids[] = $value['cargoods_id'];
	}
	$cargoods_ids_clear = array_unique($cargoods_ids);
	$cargoods = D('cargoods');
	$where['id'] = array('IN',$cargoods_ids_clear);
	$list = $cargoods->where($where)->order("`create_time` desc")->limit($limit)->select();
	foreach ($list as $key => $value) {
		$list[$key]['type_name'] = D('Type')->getFieldById($value['type_id'],'name');
		$list[$key]['good_number'] = D('Worth')->where("`goods_id` = {$value['id']}")->count();
		$list[$key]['comment_number'] = D('Comment')->where("`goods_id` = {$value['id']}")->count();
		$list[$key]['collection_number'] = D('Collection')->where("`goods_id` = {$value['id']}")->count();

		$list[$key]['comment_list'] = D('Comment')->where("`goods_id` = {$value['id']}")->select();
	}
	return $list;
}

function getCate($value='')
{
	return D('ArticleCate')->getFieldById($value,'name');
}