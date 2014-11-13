<?php if (!defined('THINK_PATH')) exit();?><!--晒心得-->
<div class="tips">
	<div class="container_Listweek_title">
		<h1>他们的晒物心得</h1><span class="hyh_style"> <a href="#">换一换</a></span>	
	</div>
	<div class="tips_content">
		<ul class="tips_content_ul">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<img src="<?php echo ($vo["img"]); ?>?h=77&w=77" />
					<div class="tips_hight">
						<p><a href="<?php echo U('detail',array('id'=>$vo['goods_id']));;?>"><?php echo (dsubstr($vo["content"],40)); ?></a></p>
						<span>赞44&nbsp;&nbsp;&nbsp;&nbsp;品论57</span>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>