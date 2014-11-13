<?php if (!defined('THINK_PATH')) exit();?><<?php echo ($extend); ?> name="Public:base" />
<<?php echo ($block); ?> name="style"></<?php echo ($block); ?>>
<<?php echo ($block); ?> name="script">
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
</<?php echo ($block); ?>>
<<?php echo ($block); ?> name="body">
	<div id="main" class="g-main">
		<div class="row m-title">
			<h2><?php echo ($action_title); ?>管理</h2>
		</div>
		<div class="row">
			<div class="left">
				<a class="u-btn" href="{:U('/Admin/<?php echo ($action_name); ?>/add')}?rurl={:base64_encode($rurl)}">新 增</a>
			</div>
			<div class="m-form right">
				<?php if ($bsearch){ ?>
				<form id="search_form" method="get">
					<fieldset>
						<div>
							<label class="lab">搜索：</label>
							<div class="ipt">
								<select name="key" class="u-select" style="width:80px;">
									<?php if(is_array($bsearch)): $i = 0; $__LIST__ = $bsearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["0"]); ?>" <?php echo ($phpstart); ?> if($kkey == "<?php echo ($vo["0"]); ?>") echo 'selected="selected"'; <?php echo ($phpend); ?>><?php echo ($vo["1"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								<input name="value" type="text" class="u-ipt" value="{$value}"/>
								<input type="submit" class="u-btn" value="搜索">
							</div>
						</div>
					</fieldset>
				</form>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="row">
			<form id="main_form" action="{:U('/<?php echo ($action_name); ?>/maction')}" method="get">
				<table class="m-table">
					<thead>
						<tr>
							<th class="colid">编号</th>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 0){ ?>
<th><?php echo ($vo["1"]); ?></th>
<?php }else{ ?>
								<th class="cola"><?php echo ($vo["1"]); ?></th>
<?php } endforeach; endif; else: echo "" ;endif; ?>
							<th class="colb">操作</th>
						</tr>
					</thead>
					<tbody>
						<<?php echo ($volist); ?> name = "list" id = "vo">
						<tr>
							<td>{$vo.id}</td>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo ($phpstart); ?> if(isset($field_<?php echo ($vo["0"]); ?>)){echo $field_<?php echo ($vo["0"]); ?>[$vo["<?php echo ($vo["0"]); ?>"]];}else{echo $vo["<?php echo ($vo["0"]); ?>"];}<?php echo ($phpend); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
							
							<td>
								<a href="{:U('/Admin/<?php echo ($action_name); ?>/edit/id/'.$vo['id'])}?rurl={:base64_encode($rurl)}" title="">编辑</a>
								<a href="{:U('/Admin/<?php echo ($action_name); ?>/del/id/'.$vo['id'])}?rurl={:base64_encode($rurl)}" title="">删除</a>
							</td>
						</tr>
						</<?php echo ($volist); ?>>
					</tbody>
				</table>
			</form>
		</div>
		<div class="row">
			<div class="m-page m-page-lt">
				{$page}
			</div>
		</div>
	</div>
</<?php echo ($block); ?>>