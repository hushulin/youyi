<?php if (!defined('THINK_PATH')) exit();?><!--活动正在发生-->	
<div class="activeing" style="padding-bottom:30px;">
	<div class="container_right_Listweek">
		<div class="container_Listweek_title">
			<h1>活动&正在发生的...</h1>
		</div>
		<div class="container_activeing_content">
				<div class="Product_content_left activeing_width216">
				<div class="Product_content2 activeing_top10">
					<div class="activity_mid margin0">
						<ul>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><?php echo ($key+1); ?>. <?php echo ($vo["title"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
			</div>
				</div>

				</div>
		</div>
</div>
</div>