<?php if (!defined('THINK_PATH')) exit();?><<?php echo ($extend); ?> name="Public:base" />
<<?php echo ($block); ?> name="style"></<?php echo ($block); ?>>
<<?php echo ($block); ?> name="script"></<?php echo ($block); ?>>

<<?php echo ($block); ?> name="body">
	<div id="main" class="g-main">
		<table class="m-table"></table>
		<div class="row m-title">
			<h2><?php echo ($action_title); ?>管理 - 删除<?php echo ($action_title); ?></h2>
		</div>
		<div class="row">
<?php echo ($phpstart); ?> 
$rurl = base64_decode($_GET["rurl"]);
$rurl = empty($rurl)?U("/Admin/<?php echo ($action_name); ?>"):$rurl;
<?php echo ($phpend); ?>
			<a class="u-btn" href="{$rurl}">返回列表</a>
		</div>
		<div class="row">
			<div class="m-form">
				<form name="m-form" method="post">
					<fieldset>
						<div class="formitm">
							<input type="hidden" name="id" value="{$id}">
							您确定要删除 #{$id} 数据吗？
						</div>
						<div class="formitm">
							<button class="u-btn" type="submit">确定</button>
<?php echo ($phpstart); ?> 
$rurl = base64_decode($_GET["rurl"]);
$rurl = empty($rurl)?U("/Admin/<?php echo ($action_name); ?>"):$rurl;
<?php echo ($phpend); ?>
							<a class="u-btn u-btn-c1" href="{$rurl}" title="取消">取消</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</<?php echo ($block); ?>>