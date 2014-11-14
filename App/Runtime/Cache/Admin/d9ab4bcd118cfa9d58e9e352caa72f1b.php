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
	<!--<script type="text/javascript" src="__S__/js/json.js"></script>-->
	
	
	<script>
		$(document).ready(function() {
			$("#chkall").change(function() {
				$obj = this;
				$(".chkall").each(function(index, val) {
					this.checked = $obj.checked;
				});
			});
			$(".chkall").click(function(){
				document.getElementById("chkall").checked = $(".chkall").length == $(".chkall:checked").length ? true : false;
			});
			$(".mdel").click(function(event) {
				if($(".chkall:checked").length > 0){
					$("#main_form").submit();
				}else{
					alert("请选择您要删除的数据！");
				}
			});
		});
	</script>

	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	<div class="g-header">
	<div class="m-logo left">
		<div style="text-align:center;line-height:60px;">
			<img src="__PUBLIC__/image/ycp_logo.png?w=140&h=30" alt="" style="position:relative;top:10px;">
		</div>
	</div>
	<div class="m-topmenu left">
		<ul>
			<?php if(is_array($admin_top_menu)): $i = 0; $__LIST__ = $admin_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (u($vo["url"])); ?>?currnav=<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" <?php if(session("currnav") == $vo["id"]) echo ' class="on" ' ?>><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="m-topaction right">
		<a href="<?php echo U('/Admin/Public/logout');?>" title="<?php echo ($menu["title"]); ?>">Admin</a> | 
		<a href="<?php echo U('/Admin/Public/logout');?>" title="<?php echo ($menu["title"]); ?>">退出登录</a>
	</div>
</div>


	<div class="clear"></div>
	<div>
		<table style="border:0;width:100%;" class="block">
			<tbody>
				<tr>
					<td style="width: 200px;background:#f0f0f0;border-right:1px solid #dedfdf;" valign="top">
						<div class="g-leftbar">
							<ul>
							<?php if(is_array($admin_left_menu)): $i = 0; $__LIST__ = $admin_left_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php if($vo["hchildren"]) echo '&nbsp;&nbsp;+'; else echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?><a href="<?php echo (u($vo["url"])); ?>" title=""><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							
							</ul>
						</div>
					</td>
					<td valign="top">
						
	<div id="main" class="g-main">
		<div class="row m-title">
			<h2>导航管理</h2>
		</div>
		<div class="row">
			<div class="left">
				<a class="u-btn" href="<?php echo U('/Admin/Nav/add');?>?rurl=<?php echo base64_encode($rurl);?>">新 增</a>
			</div>
			<div class="m-form right">
							</div>
			<div class="clear"></div>
		</div>
		<div class="row">
			<form id="main_form" action="<?php echo U('/Nav/maction');?>" method="get">
				<table class="m-table">
					<thead>
						<tr>
							<th class="colid">编号</th>
							<th>URL</th>
								<th class="cola">名称</th>
								<th class="cola">是否显示</th>
								<th class="cola">排序</th>
							<th class="colb">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo["id"]); ?></td>
							<td><?php if(isset($field_url)){echo $field_url[$vo["url"]];}else{echo $vo["url"];}?></td><td><?php if(isset($field_name)){echo $field_name[$vo["name"]];}else{echo $vo["name"];}?></td><td><?php if(isset($field_is_show)){echo $field_is_show[$vo["is_show"]];}else{echo $vo["is_show"];}?></td><td><?php if(isset($field_sort)){echo $field_sort[$vo["sort"]];}else{echo $vo["sort"];}?></td>							
							<td>
								<a href="<?php echo U('/Admin/Nav/edit/id/'.$vo['id']);?>?rurl=<?php echo base64_encode($rurl);?>" title="">编辑</a>
								<a href="<?php echo U('/Admin/Nav/del/id/'.$vo['id']);?>?rurl=<?php echo base64_encode($rurl);?>" title="">删除</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</form>
		</div>
		<div class="row">
			<div class="m-page m-page-lt">
				<?php echo ($page); ?>
			</div>
		</div>
	</div>

					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="clear"></div>
	<div class="g-footer">
	<div class="m-copyright">
        <div class="left">感谢使用<a href="http://www.card7.net" target="_blank">APP定制平台</a></div>
        <div class="right">V1.0.131218</div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>