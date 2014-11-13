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
			$(".m-hd li").click(function(event) {
				$(".tab").hide();
				$("."+$(this).attr("rel")).show();
				$(".m-hd li").removeClass('z-crt');
				$(this).addClass('z-crt');
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
						
	<link rel="stylesheet" href="/Static/kindeditor/default/default.css">
	<script charset="utf-8" src="/Static/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/Static/kindeditor/zh_CN.js"></script>
	<div id="main" class="g-main">
		<table class="m-table"></table>
		<div class="row m-title">
			<h2>车品管理 - 新增车品</h2>
		</div>
		<div class="row">
<?php  $rurl = base64_decode($_GET["rurl"]); $rurl = empty($rurl)?U("/Admin/Cargoods"):$rurl; ?>			<a class="u-btn" href="<?php echo ($rurl); ?>">返回列表</a>
		</div>
		<div class="row">
			<div class="m-hd m-hd-bg">
				<h2 class="u-tt"></h2>
				<div class="more">
					<!-- <a href="#">更多&raquo;</a> -->
				</div>
				<ul>
					<li class="z-crt" rel="tab_1">
						<a href="#">基本</a>
					</li>
					<li rel="tab_2">
						<a href="#">扩展</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="m-form">
				<form name="m-form" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="tab tab_1">
							<div class="formitm">
									<label class="lab">标题:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="title" value=""/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">推荐人:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="tuijian_user" value=""/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">分类:</label>
									<div class="ipt">
										<select class="u-select" name="cate_id"><?php if(is_array($field_cate_id)): $i = 0; $__LIST__ = $field_cate_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == "") echo "selected"; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">来自频道:</label>
									<div class="ipt">
										<select class="u-select" name="type_id"><?php if(is_array($field_type_id)): $i = 0; $__LIST__ = $field_type_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == "") echo "selected"; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">标签:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="tag" value=""/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">封面:</label>
									<div class="ipt">
										<input type="file" class="u-file" name="img" />
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">正文:</label>
									<div class="ipt">
										<textarea class="u-textarea" name="content"></textarea><script type="text/javascript">
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name="content"]', {
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
	
										<p></p>
									</div>
								</div>
						</div>
						<div class="tab tab_2">
							<div class="formitm">
									<label class="lab">价格:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="price" value=""/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">外链:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="out" value=""/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">外链类型:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="urlstring" value=""/>
										<p></p>
									</div>
								</div>
						</div>
						<div class="formitm formitm-1">
							<button class="u-btn" type="submit">保存</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<link href="/Static/css/datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="/Static/css/dropdown.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/Static/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/Static/js/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.time').datetimepicker({
				format: 'yyyy-mm-dd hh:ii',
				language:"zh-CN",
				minView:2,
				autoclose:true
			});
		});		
	</script>

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