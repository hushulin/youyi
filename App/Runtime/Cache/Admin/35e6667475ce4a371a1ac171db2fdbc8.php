<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>APP定制平台--ITZI</title>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="viewport" content="width=device-width"/>
	<link rel="stylesheet" href="__S__/css/reset.css"/>
	<link rel="stylesheet" href="__S__/css/style.css"/>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="__S__/js/jquery-1.10.2.min.js"></script>
	<![endif]-->
	<!--[if gte IE 9]>
	<!-->
	<script type="text/javascript" src="__S__/js/jquery-2.0.3.min.js"></script>
	<!--<![endif]-->
	<script type="text/javascript" src="__S__/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="__S__/js/json.js"></script>
	
	
	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	
	<div id="main" class="g-main">
		<table class="m-table"></table>
		<div class="row m-title">
			<h2>字段管理 - 删除字段</h2>
		</div>
		<div class="row">
			<a class="u-btn" href="<?php echo U('/Admin/Field/index/rid/'.$rid.'');?>">返回列表</a>
		</div>
		<div class="row">
			<div class="m-form">
				<form name="m-form" action="__SELF__" method="post">
					<fieldset>
						<div class="formitm">
							<input type="hidden" name="id" value="<?php echo ($id); ?>">
							您确定要删除 #<?php echo ($id); ?> 数据吗？
						</div>
						<div class="formitm">
							<button class="u-btn" type="submit">确定</button>
							<a class="u-btn u-btn-c1" href="<?php echo U('/Admin/Field/index/rid/'.$rid.'');?>" title="取消">取消</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

</body>
</html>