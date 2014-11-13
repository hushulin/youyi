<?php if (!defined('THINK_PATH')) exit();?><<?php echo ($extend); ?> name="Public:base" />
<<?php echo ($block); ?> name="style"></<?php echo ($block); ?>>
<<?php echo ($block); ?> name="script">
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
</<?php echo ($block); ?>>

<<?php echo ($block); ?> name="body">
	<link rel="stylesheet" href="__S__/kindeditor/default/default.css">
	<script charset="utf-8" src="__S__/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="__S__/kindeditor/zh_CN.js"></script>
	<div id="main" class="g-main">
		<table class="m-table"></table>
		<div class="row m-title">
			<h2><?php echo ($action_title); ?>管理 - 新增<?php echo ($action_title); ?></h2>
		</div>
		<div class="row">
<?php echo ($phpstart); ?> 
$rurl = base64_decode($_GET["rurl"]);
$rurl = empty($rurl)?U("/Admin/<?php echo ($action_name); ?>"):$rurl;
<?php echo ($phpend); ?>
			<a class="u-btn" href="{$rurl}">返回列表</a>
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
<?php
 if(count($field_list2) > 0){ ?>
					<li rel="tab_2">
						<a href="#">扩展</a>
					</li>
<?php
 } ?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="m-form">
				<form name="m-form" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="tab tab_1">
<?php  if($table_info["type"] == 1){ ?>
							<div class="formitm">
								<label class="lab">上级菜单:</label>
								<div class="ipt">
									<select class="u-select" name="pid">
										<option value="0">顶级</option>
										<<?php echo ($volist); ?> name = "field_pid" id="vo">
										<option value="{$key}">{$vo}</option>	
										</<?php echo ($volist); ?>>				
									</select>
									<p>所属的上级菜单</p>
								</div>
							</div>
<?php
 } ?>
<?php if(is_array($field_list1)): $i = 0; $__LIST__ = $field_list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; echo (gen_field($field)); endforeach; endif; else: echo "" ;endif; ?>
						</div>
<?php
 if(count($field_list2) > 0){ ?>
						<div class="tab tab_2">
<?php if(is_array($field_list2)): $i = 0; $__LIST__ = $field_list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; echo (gen_field($field)); endforeach; endif; else: echo "" ;endif; ?>
						</div>
<?php
 } ?>
						<div class="formitm formitm-1">
							<button class="u-btn" type="submit">保存</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<link href="__S__/css/datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="__S__/css/dropdown.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="__S__/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="__S__/js/bootstrap-datetimepicker.zh-CN.js"></script>
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
</<?php echo ($block); ?>>