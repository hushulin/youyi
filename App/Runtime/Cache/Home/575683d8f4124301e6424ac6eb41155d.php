<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (($head_title)?($head_title):"优异车品"); ?>-<?php echo ($goods["title"]); ?></title>
<link href="__PUBLIC__/css/ycp.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/info.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
</head>

<body>
	<!--top-->
<div class="top">
	<div class="container">
    	<div class="top_container_left">
        	长沙<!-- <span><a href="<?php echo C('UEC_HOST');;?>/index.php?ctl=city">[更换地区]</a></span> -->
        </div>
        <div class="top_container_right">
			<ul class="top_right_ul">
				<li class="top_li_first">您好，欢迎光临优异车品！
					<!-- <span><a href="#">[退出] </a></span> -->
				</li>
				<li><a href="#">个人中心</a></li>
<!-- 				<li><a href="#">车保宝</a></li>
				<li><a href="#">消息</a></li> -->
			</ul>
        </div>
    </div>
</div>

<div class="container">
	<div class="logo">
		<div class="logo_left">
			<a href="/"><img src="__PUBLIC__/image/ycp_logo.png" width="196" height="52" /></a> 
		</div>
		<div class="logo_right">
			<input style="border:0 none;height:26px;width:240px;color: rgb(187, 187, 187);" type="text" name="keyword" placeholder="请输入您要搜索的关键词">
			<div class="logo_right_sousou">
				<input type="submit" class="search_btn s_b_width" style="border:0 none;background-color:#666666;font-size:14px;color:white;padding-top:8px;cursor:pointer;" id="search_btn" value="搜 索">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	(function($){
		$('.s_b_width').click(function(event) {
			var keywords = $('input[name=keyword]').val();
			if (keywords == '') {
				alert('请输入您要搜索的关键词');
				return false;
				// throw new Error();
			}
			window.location.href = '<?php echo U("lists");;?>' + '?keywords=' + keywords;
		});
	})(jQuery);
</script>
<!--menu-->
	<div class="container">
		<div class="menu_content">
			<div class="menu_content_right widthtz">
				<div class="menu_title">
					<div class="menu_cpfl_title czdq">车品世界</div>
					<ul class="top_right_ul menu_title_ul czdq_783">
						<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
	
<!--可能你会感兴趣-->
	<div class="container">
		<div class="container_left">
			<div class="interest">
				<!--热门活动-->
				<div class="position">
					<p>当前位置:
						<a href="/">首页</a><i>></i>
						<em class="wzxqc"><?php echo ($goods["title"]); ?></em>
					</p>
				</div>
<!--文章详情-->			
			<div class="article_details">
				<div class="article_details_title">
					<a href="<?php echo ($goods["out"]); ?>"><h1><?php echo ($goods["title"]); ?></h1></a>
					<p class="article_details__auth">推荐人：<?php echo ($goods["tuijian_user"]); ?>    分类： <?php echo ($goods["tag"]); ?>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo ($goods["out"]); ?>" style="color:red"><?php echo ($goods["urlstring"]); ?>有售</a></p>
				</div>
				
				<div class="article_details_content">
					<div style="text-align:center;">
						<img src="<?php echo ($goods["img"]); ?>?w=500&h=300">
					</div>
					<div style="padding:20px;"><?php echo ($goods["content"]); ?></div>
					
					
					<div class="contrast">
						<div class="zhi_red">值</div>
						<div class="time"><?php echo ($goods["good_number"]); ?>:<?php echo (($goods["good_numbers"])?($goods["good_numbers"]):0); ?></div>
						<div class="zhi_black">值</div>
					</div>
					<div class="previous_posts">
						<div class="previous_posts_left">
							<p><em>上一篇</em> <a href="<?php echo U('detail',array('id'=>$goods_prev['id']));;?>"> <?php echo ($goods_prev["title"]); ?></a></p>
							<p><em>下一篇</em><a href="<?php echo U('detail',array('id'=>$goods_next['id']));;?>"> <?php echo ($goods_next["title"]); ?></a></p>	
						</div>
						<div class="previous_posts_right">
							<div class="activity_contet_tb padding_top0"> 
								<a href="#" class="bk2 dlk"><?php echo ($goods["collection_number"]); ?></a>						
								<a href="#" class="bk3 dlk"><?php echo ($goods["comment_number"]); ?></a>						
								<div class="bshare-custom"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
							</div>
						</div>
					</div>
<!--你可能还喜欢-->					
					<div class="also_like">
						<h2>你可能还喜欢</h2>
							<ul class="also_like_ul">
								<li>
									<div class="also_like_img">
										<a href="#"><img src="__PUBLIC__/image/fgbn.png" width="217" height="131" /></a>
									</div>
									<p><a href="#">LAB SERIES 朗士美国官网海淘男士护肤品 </a><span>满100元包邮</span></p>
								</li>
								
								<li>
									<div class="also_like_img">
										<a href="#"><img src="__PUBLIC__/image/fgbn.png" width="217" height="131" /></a>
									</div>
									<p><a href="#">LAB SERIES 朗士美国官网海淘男士护肤品 </a><span>满100元包邮</span></p>
								</li>
								
								<li class="julnd">
									<div class="also_like_img">
										<a href="#"><img src="__PUBLIC__/image/fgbn.png" width="217" height="131" /></a>
									</div>
									<p><a href="#">LAB SERIES 朗士美国官网海淘男士护肤品 </a><span>满100元包邮</span></p>
								</li>
							</ul>
						</div>

						<div class="comments">
							
							<!-- UY BEGIN -->
							<div id="uyan_frame"></div>
							<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>
							<!-- UY END -->
						</div>
				</div>

			</div>
			
		</div>
	</div>

<!--右边-->
<!--每周榜单-->
			<div class="container_right">
<!--公告  入门-->
				<div class="menu_bottom_right pat20">
					<!-- 文章 -->
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
					<div class="fact"><h3><a href="javascript:;">我要爆料</a></h3></div>
				</div>			
	
<!--右边banner-->
	<div class="right_banner">
		<a href="#"><img src="__PUBLIC__/image/right_banner.png" border="0" /></a> 
	</div>


<!--浏览最多-->
<?php echo W('Biz');;?>
<!--晒心得-->
<?php echo W('Sai');;?>
</div>

</div>
	<!--底部-->	
<div class="ycp_bottomn">
 	<div class="container ycp_bottomn_padding20">
		<div class="ontainer ycp_bottomn_content1">
			<div class="ycp_bottomn_frist">
				<ul class="ycp_bottomn_fristul">
					<li class="ycp_bottomn_title1"><a href="javascript:;">关于我们</a></li>
					<?php if(is_array($about_us)): $i = 0; $__LIST__ = $about_us;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			
			<div class="ycp_bottomn_frist">
				<ul class="ycp_bottomn_fristul">
					<li class="ycp_bottomn_title1"><a href="javascript:;">商户合作</a></li>
					<?php if(is_array($hezuo)): $i = 0; $__LIST__ = $hezuo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			
			<div class="ycp_bottomn_frist">
				<ul class="ycp_bottomn_fristul">
					<li class="ycp_bottomn_title1"><a href="javascript:;">保养维护</a></li>
					<?php if(is_array($baoyang)): $i = 0; $__LIST__ = $baoyang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			
			<div class="ycp_bottomn_frist">
				<ul class="ycp_bottomn_fristul">
					<li class="ycp_bottomn_title1"><a href="javascript:;">车品导购</a></li>
					<?php if(is_array($buy)): $i = 0; $__LIST__ = $buy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			
			<div class="ycp_bottomn_frist">
				<div class="ycp_bottomn_three">
					<img src="__PUBLIC__/image/erweima.png" />
					<span>优异车品官方微博</span>	
				</div>
			</div>
			
			<div class="ycp_bottomn_frist">
				<div class="ycp_bottomn_three">
					<img src="__PUBLIC__/image/erweima.png" />
					<span>微信公众号</span>	
				</div>
			</div>
			
						<div class="ycp_bottomn_frist width163">
				<div class="ycp_bottomn_seven">
					<h1>400-818-6060</h1>  
					<span>周一到周六：9：00-18-00</span>
					<p><a href="/">优异车品</a></p>	
				</div>
			</div>

			
		</div>
	<div class="ontainer ycp_bottomn_content2">Copyright © 2014 uechepin.com 车优异车品版权所有 | 全国汽车用品导购 &本地汽车保养服务平台 |  湘ICP备12006742号-2</div>
	</div>
</div>	
	
</body>
</html>