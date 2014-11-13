<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'          => '2', //URL模式

	'DB_TYPE' => 'mysqli',
	'DB_HOST' => 'hushulin.mysql.rds.aliyuncs.com',
	'DB_NAME' => 'fanweuec',
	'DB_USER' => 'eric',
	'DB_PWD' => 'hushulin',
	'DB_PORT' => '3306',
	'DB_PREFIX' => 'app_',

	'APP_GROUP_LIST' => 'Home,Admin,Api,Mobile', //项目分组设定
	'DEFAULT_GROUP'  => 'Home', //默认分组

	'TMPL_PARSE_STRING'  =>array(
	     '__PUBLIC__' => '/Public', // 更改默认的__PUBLIC__ 替换规则
	     '__S__' => '/Static', // 增加新的JS类库路径替换规则
	),
	//异常模版
	// 'TMPL_EXCEPTION_FILE' => APP_PATH.'/Tpl/Admin/Public/exception.html',
	'UPLOAD_DIR' => "./Upload/", //文件上传的目录
	'UPLOAD_URL' => "http://115.29.108.94:8089/Upload/",  //文件存放目录访问地址
	'UPLOAD_HOST' => "http://115.29.108.94:8089",  //后面不要加/

	'REDIS_HOST' => 'localhost', 
	'IM_HOST' => 'localhost', 

	'AES_KEY'=>'ddddd',
	'PROJECT_ID_PRE' => 'P',
	'UEC_HOST' =>'http://115.29.108.94:8087',

	// 广告配置
	'ADV_LIST_URL_1' => '/Index/lists',
	'ADV_LIST_1' => '(6,7,8,9)',

	'ADV_LIST_URL_2' => '/Index/lists/type_id/3',
	'ADV_LIST_2' => '(6,7,6,3)',

	// 'ADV_LIST_URL_3' => '/Index/lists',
	// 'ADV_LIST_3' => '(1,1,1)',

	// 'ADV_LIST_URL_4' => '/Index/lists',
	// 'ADV_LIST_4' => '(1,1,1)',
);
?>