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
						
	<div id="main" class="g-main">
		<table class="m-table"></table>
		<div class="row m-title">
			<h2>菜单管理 - 编辑菜单</h2>
		</div>
		<div class="row">
			<a class="u-btn" href="<?php echo U('/Admin/Menu');?>">返回列表</a>
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
				<form name="m-form" action="__SELF__" method="post">
					<fieldset>
						<div class="tab tab_1">
							<div><input type="hidden" name="id" value="<?php echo ($doc["id"]); ?>"/></div>
							<div class="formitm">
								<label class="lab">标题:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="title" value="<?php echo ($doc["title"]); ?>"/>
									<p>用于后台显示的配置标题</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">排序:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="sort" value="<?php echo ($doc["sort"]); ?>"/>
									<p>用于分组显示的顺序</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">链接:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="url" value="<?php echo ($doc["url"]); ?>"/>
									<p>U函数解析的URL或者外链</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">上级菜单:</label>
								<div class="ipt">
									<select class="u-select" name="pid"/>
										<option value="0">顶级</option>
										<?php if(is_array($admin_menu_list)): $i = 0; $__LIST__ = $admin_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"<?php if($vo["id"] == $doc["pid"]) echo 'selected="selected"' ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<p>所属的上级菜单</p>
								</div>
							</div>
						</div>
						<div class="tab tab_2">
							<div class="formitm">
								<label class="lab">分组:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="group" value="<?php echo ($doc["group"]); ?>"/>
									<p>用于左侧分组二级菜单</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">是否隐藏:</label>
								<div class="ipt">
									<input type="radio" name="hide" value="1" <?php if($doc["hide"] == 1) echo 'checked="checked"';?> /> 是
									<input type="radio" name="hide" value="0" <?php if($doc["hide"] == 0) echo 'checked="checked"';?> /> 否
									<p></p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">仅开发者模式:</label>
								<div class="ipt">
									<input type="radio" name="is_dev" value="1" <?php if($doc["is_dev"] == 1) echo 'checked="checked"';?> /> 是
									<input type="radio" name="is_dev" value="0" <?php if($doc["is_dev"] == 0) echo 'checked="checked"';?> /> 否
									<p></p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">说明:</label>
								<div class="ipt">
									<textarea class="u-textarea" name="tip"><?php echo ($doc["tip"]); ?></textarea>
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