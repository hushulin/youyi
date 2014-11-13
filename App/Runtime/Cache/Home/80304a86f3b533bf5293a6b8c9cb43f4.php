<?php if (!defined('THINK_PATH')) exit();?><div class="electrical_img">
	<ul>
		<?php if(is_array($adv_list)): $i = 0; $__LIST__ = $adv_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> 
				<a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["img"]); ?>?w=237&h=155" /></a>
				<div class="activity_title2 electrical_title2">
					<div class="activity_title2_left electrical_title2_left ">
					<span><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["text"]); ?></a></span>
					</div>
				</div>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>

	</ul>	
</div>