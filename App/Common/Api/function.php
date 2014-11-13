<?php
/**
 * @name O
 * @todo 输出信息
 * @param integer $result
 * @param string $msg
 * @param array $data
 */
function O($result, $msg, $data = null)
{
    $uid = session("uid");
    if(empty($data))$data = array();
    if(!is_array($data))$data = array(0=>array("iid"=>$data));
    $message_count = 0;
    $redis = new Redis();
    $redis->connect(C('REDIS_HOST'));
    $uid = mysession("uid");
    $message_count  = $redis->lSize("m_user_{$uid}");
    $redis->close();
    $result_arr = array(
        'id' => $_POST['post_id'],
        'result' => $result,
        'msg' => $msg,
        'data' => $data,
        'mcount' => $message_count
    );
    $result_json = decodeUnicode(json_encode($result_arr));
    // $result_json = json_encode($result_arr);
    echo $result_json;
    die();
}

/**
 *
 * @name getfunc
 * @todo 取得某类的方法列表
 * @param string $className            
 * @return array
 */
function getfunc()
{
    $class_methods = get_class_methods(MODULE_NAME . "Action");
    $result = array();
    for ($i = 1; $i < count($class_methods) - 8; $i ++) {
        $result[] = array(
            "href" => U("/".GROUP_NAME."/".MODULE_NAME."/{$class_methods[$i]}", '', true, false, true),
            "txt" => U("/".GROUP_NAME."/".MODULE_NAME."/{$class_methods[$i]}", '', true, false, true),
            "desc" => ""
        );
    }
    return $result;
}

/**
 *
 * @name buildForm
 * @todo 构造表单
 * @param array $param            
 * @return string
 */
function buildForm($param)
{
    $result = "";
    foreach ($param as $key => $item) {
        $result .= "<li>";
        $remark = (isset($item['require']) or isset($item['reg']) or isset($item['len'])) ? "<em style='color: red;font-weight: 800;'> * </em>" : "";
        if (is_array($item)) {
            if ($item['type'] == "select") {
                $result .= "<span>{$key}</span><span>{$remark}{$item['label']}: </span><select name='{$key}' id='{$key}'>";
                $tmp = explode(",", $item['value']);
                foreach ($tmp as $tmpitem) {
                    $result .= "<option value='{$tmpitem}'>{$tmpitem}</option>";
                }
                $result .= "</select>";
            } else 
                if ($item['type'] == "textarea") {
                    $result .= "<span>{$key}</span><span>{$remark}{$item['label']}: </span><textarea name='{$key}' id='{$key}'>";
                    $result .= $item['value'];
                    $result .= "</textarea>";
                } else {
                    $result .= "<span>{$key}</span><span>{$remark}{$item['label']}: </span><input type='{$item['type']}' name='{$key}' id='{$key}' value='{$item['value']}'/>";
                }
        } else {
            $result .= "<span>{$key}</span><span>{$remark}{$item}: </span><input type='text' name='{$key}' id='{$key}'/>";
        }
        $result .= "</li>";
    }
    return $result;
}



/**
 *
 * @name filterPOST
 * @todo 过滤post提交的数据
 * @param array $param            
 */
function filterPOST($param)
{
    foreach ($param as $key => $value) {
        
        if (isset($_POST[$key]))
            $_POST[$key] = trim($_POST[$key]);
        
        if (isset($value["reg"])) {
            if (! preg_match($value["reg"], $_POST[$key]))
                O(0, $value["label"] . "参数错误!");
        }
        
        if (isset($value["len"])) {
            $arr = explode(",", $value["len"]);
            if ((mb_strlen($_POST[$key]) < $arr[0]) or (mb_strlen($_POST[$key]) > $arr[1]))
                O(0, $value["label"] . "参数错误!");
        }
        
        if (isset($value["require"])) {
            if ((! isset($_POST[$key])) or ($_POST[$key] == ""))
                O(0, $value["label"] . "参数错误!");
        }
        
        // if(empty($_POST[$key])) unset($_POST[$key]);
        // 这里还可以对每个参数做其他的过滤操作
    }
}

