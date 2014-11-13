<?php if (!defined('THINK_PATH')) exit();?><!-- 文章 -->
<div class="menu_zc_news">
	<div class="menu_news_title">
	<ul>
	<li class="menu_news_first"><a href="javascript:;">公告</a></li>
	<li><a href="javascript:;">入门</a></li>
	<li><a href="javascript:;">公益</a></li>
	</ul>
	</div>
	<ul class="menu_news_content">
		<?php if(is_array($article_gg)): $i = 0; $__LIST__ = $article_gg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<ul class="menu_news_content" style="display:none;">
		<?php if(is_array($article_rm)): $i = 0; $__LIST__ = $article_rm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<ul class="menu_news_content" style="display:none;">
		<?php if(is_array($article_gy)): $i = 0; $__LIST__ = $article_gy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>

</div>
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.menu_news_title ul a').click(function(event) {
			$(this).parent().parent().find('li').removeClass('menu_news_first');
			$(this).parent().addClass('menu_news_first');
			var tab = $(this).html();
			switch (tab) {
				case '公告':
				$('.menu_news_content').hide();
				$('.menu_news_content:eq(0)').show();
				break;
				case '入门':
				$('.menu_news_content').hide();
				$('.menu_news_content:eq(1)').show();
				break;
				case '公益':
				$('.menu_news_content').hide();
				$('.menu_news_content:eq(2)').show();
				break;
				default:
				$('.menu_news_content').hide();
				$('.menu_news_content:eq(0)').show();
				break;
			}
		});
	});
</script>
<!-- 文章结束 -->