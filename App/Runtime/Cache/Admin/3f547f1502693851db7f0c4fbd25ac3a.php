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
	
	
	<script src="__S__/js/jquery.dragsort-0.5.1.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$(".m-hd li").click(function(event) {
				$(".tab").hide();
				$("."+$(this).attr("rel")).show();
				$(".m-hd li").removeClass('z-crt');
				$(this).addClass('z-crt');
			});
			$("#field_manager").click(function(event) {
				$("#field_layer").show(); 
				$("#field_frame").attr('src', '<?php echo U('/Admin/Field/index/rid/'.$doc['id'].'');?>');
			});
			$(".lyclose").click(function(event) {
				$("#field_layer").hide();
				location.reload();
			});
			//拖曳插件初始化
			$(".dragsort").dragsort({
			     dragSelector:'li',
			     placeHolderTemplate: '<li class="draging-place">&nbsp;</li>',
			     dragBetween:true,	//允许拖动到任意地方
			     dragEnd:function(){
			    	 var self = $(this);
			    	 self.find('input').attr('name', 'field_sort[' + self.closest('ul').data('group') + '][]');
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
		<table class="m-table"></table>
		<div class="row m-title">
			<h2>模型管理 - 编辑模型</h2>
		</div>
		<div class="row">
			<a class="u-btn" href="<?php echo U('/Admin/Table/index/rid/'.$rid.'');?>">返回列表</a>
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
					<!-- <li rel="tab_2">
						<a href="#">扩展</a>
					</li> -->
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
								<label class="lab">名称:</label>
								<div class="ipt">
									<span class="u-ipt"><?php echo ($doc["title"]); ?></span>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">标识:</label>
								<div class="ipt">
									<span class="u-ipt"><?php echo ($doc["name"]); ?></span>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">模型类型:</label>
								<div class="ipt">
									<span class="u-ipt"><?php echo $field_type[$doc["type"]];?></span>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">字段管理:</label>
								<div class="ipt">
									<div class="edit_sort">
										<div> &nbsp;&nbsp; 基本</div>
										<ul class="dragsort" data-group="0" data-listidx="0">
											<?php if(is_array($field_list1)): $i = 0; $__LIST__ = $field_list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><li>
												<input type="hidden" name="field_sort[0][]" value="<?php echo ($field["id"]); ?>">
												<em><?php echo ($field["title"]); ?> [<?php echo ($field["name"]); ?>]</em>
											</li><?php endforeach; endif; else: echo "" ;endif; ?>						
										</ul>
									</div>
									<div class="edit_sort">
										<div> &nbsp;&nbsp; 扩展</div>
										<ul class="dragsort" data-group="1" data-listidx="0">						<?php if(is_array($field_list2)): $i = 0; $__LIST__ = $field_list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><li>
												<input type="hidden" name="field_sort[1][]" value="<?php echo ($field["id"]); ?>">
												<em><?php echo ($field["title"]); ?> [<?php echo ($field["name"]); ?>]</em>
											</li><?php endforeach; endif; else: echo "" ;endif; ?>
										</ul>
									</div>
									<div class="clear" style="margin-top:10px;">
										<a class="u-btn u-btn-c2" href="#" style="color:#fff;" id="field_manager">字段管理</a>
									</div>
								</div>
								
							</div>
							<div class="formitm">
								<label class="lab">列表定义:</label>
								<div class="ipt">
									<textarea name="list" class="u-textarea"><?php echo ($doc["list"]); ?></textarea>
									<p>默认列表模板的展示规则</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">搜索定义:</label>
								<div class="ipt">
									<textarea class="u-textarea" name="bsearch"><?php echo ($doc["bsearch"]); ?></textarea>
									<p>默认列表模板的默认搜索项</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">自定义插入代码:</label>
								<div class="ipt">
									<textarea class="u-textarea" name="custom_code_insert" style="width:100%;"><?php echo ($doc["custom_code_insert"]); ?></textarea>
									<p>用来自定义插入代码</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">自定义更新代码:</label>
								<div class="ipt">
									<textarea class="u-textarea" name="custom_code_update" style="width:100%;"><?php echo ($doc["custom_code_update"]); ?></textarea>
									<p>用来自定义更新代码</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">自定义删除代码:</label>
								<div class="ipt">
									<textarea class="u-textarea" name="custom_code_delete" style="width:100%;"><?php echo ($doc["custom_code_delete"]); ?></textarea>
									<p>用来自定义删除代码</p>
								</div>
							</div>
							
						</div>
						<!-- <div class="tab tab_2">
							
						</div> -->
						<div class="formitm formitm-1">
							<button class="u-btn" type="submit">保存</button>
						</div>
					</fieldset>
				</form>
			</div>	
		</div>
	</div>

	<div class="m-layer" id="field_layer">
	    <div class="lymask"></div>
	    <table class="lytable"><tbody><tr><td class="lytd">
	    <div class="lywrap" style="width:720px;">
		    <div class="lytt"><h2 class="u-tt">字段管理</h2><span class="lyclose">×</span></div>
		    <div class="lyct">
		    	<iframe src="about:blank" style="width:700px;height:400px;" id="field_frame"></iframe>
		    </div>
		    <!-- <div class="lybt">
		        <div class="lyother">
		            <p></p>
		        </div>
		        <div class="lybtns">
		            <button type="button" class="u-btn">确定</button>
		            <button type="button" class="u-btn u-btn-c4">取消</button>
		        </div>
		    </div> -->
	    </div></td></tr></tbody></table>
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