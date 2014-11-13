<?php if (!defined('THINK_PATH')) exit();?><!--发现精彩...-->	
<div class="activeing">
	<div class="container_right_Listweek">
		<div class="container_Listweek_title">
			<h1>发现精彩...</h1>

		</div>
		<div class="container_activeing_content">
				<div class="Product_content_left activeing_width216">
					<div class="Product_content_leftimg activeing_img wonderful_img">
						<a href="#"><img src="__PUBLIC__/image/recommended_img.png?w=257&h=76" border="0" /></a>
					</div>
				<div class="Product_content2 activeing_top10">
					<ul class="wonderful_ul">
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if (($key+1)%3 == 0): ?>
								class="boder0"
							<?php endif; ?>><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><img src="<?php echo ($vo["img"]); ?>?h=82&w=82" border="0" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				
				</div>

			</div>
		</div>
</div>
</div>