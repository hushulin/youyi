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
		<div class="row m-title">
			<h2>字段管理</h2>
		</div>
		<div class="row">
			<a class="u-btn" href="<?php echo U('/Admin/Field/add/rid/'.$rid.'');?>">新 增</a>
		</div>
		<div class="row">
			<table class="m-table">
				<thead>
					<tr>
						<th class="cola">编号</th>
						<th>名称</th>
						<th class="cola">标识</th>
						<th class="cola">类型</th>
						<th class="colb">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($vo["id"]); ?></td>
						<td><?php echo ($vo["title"]); ?></td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo $field_type[$vo["type"]];?></td>
						<td>
							<a href="<?php echo U('/Admin/Field/edit/rid/'.$rid.'/id/'.$vo['id']);?>" title="">编辑</a>
							<a href="<?php echo U('/Admin/Field/del/rid/'.$rid.'/id/'.$vo['id']);?>" title="">删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="m-page m-page-lt">
			    <?php echo ($page); ?>
			</div>
		</div>
	</div>

</body>
</html>