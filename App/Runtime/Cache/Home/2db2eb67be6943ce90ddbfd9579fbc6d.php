<?php if (!defined('THINK_PATH')) exit();?><!--明星商户-->
<div class="star">
	<div class="container_Listweek_title">
		<h1>明星商户</h1>
	</div>
	<div class="star_content">
		<ul class="star_content_ul">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo C('UEC_HOST');;?>/youhui.php?ctl=store&act=view&id=<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["preview"]); ?>" border="0" /></a>
					<div class="star_content_title">
						<h3><a href="<?php echo C('UEC_HOST');;?>/youhui.php?ctl=store&act=view&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></h3>
						<div class="star_addr">
							<ul class="star_addr_ul">
								<li class="star_addr_bg">网</li>
								<li class="star_addr_bg color1">售</li>
								<li class="star_addr_bg color2">修</li>
								<li class="star_addr_sy"><?php echo ($vo["name_match_row"]); ?></li>
							</ul>
							<span class="star_enter" onclick="window.location.href='<?php echo C('UEC_HOST');;?>/youhui.php?ctl=store&act=view&id=<?php echo ($vo["id"]); ?>'">进入店铺</span>
						</div>
				      </div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>