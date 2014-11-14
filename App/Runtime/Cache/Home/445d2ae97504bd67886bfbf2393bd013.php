<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (($head_title)?($head_title):"优异车品"); ?>-<?php echo ($cate_name); ?></title>
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
	<div class="container">
		<div class="menu_content">
			<div class="menu_content_right widthtz">
				<div class="menu_title">
					<div class="menu_cpfl_title czdq"><?php echo (($cate_name)?($cate_name):'所有分类'); ?></div>
					<ul class="top_right_ul menu_title_ul czdq_783">
						<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="menu_title_bottom">
					<?php echo W('Adv',array('url'=>__SELF__));;?>
					
					<div class="menu_bottom_right">
						<?php echo W('Article',array('count'=>4));;?>
						<div class="fact"><h3><a href="<?php echo U('publish');;?>">我要爆料</a></h3></div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
<!--可能你会感兴趣-->
<div class="container">
	<div class="container_left">
		<div class="interest">
			<!--热门活动-->
			<div class="PopularP_activities">
				<div class="PopularP_activities_left">热门活动</div>
				<div class="PopularP_activities_right">
					<ul class="PopularP_activities_ul">
						<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('lists',array('cate_id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
			</div>
		</div>

		
<!---->		
		<div class="Favourable_activity">
			<div class="menu_news_title hdsad">
				<ul>
					<?php if(is_array($cc)): $i = 0; $__LIST__ = $cc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if ($_GET['type_id'] == $vo['id']): ?>
							 class="menu_news_first"
						<?php endif; ?>><a href="<?php echo U('',array('type_id'=>$vo['id'],'cate_id'=>$_GET['cate_id']));;?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<ul class="Favourable_activity_ul">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<div class="Favourable_activity_title">
						<span class="Stick2">置顶</span>
						<a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><h2><?php echo ($vo["title"]); ?></h2></a>
					</div>
					<div class="watch_image"><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><img src="<?php echo ($vo["img"]); ?>?w=190&h=205" border="0" /></a></div>
					<div class="Favourable_activity_contet">
						<div class="label">
							<p>
								<span>标签：<?php echo ($vo["tag"]); ?></span>&nbsp;
							 	<em class="label_em"><?php echo (date("Y-m-d H:i",$vo["create_time"])); ?></em>
					      </p> 
						</div>
						<div class="activity_contet_t">
							<p>
								<span>
									<?php echo (dsubstr($vo["content"],250)); ?>
								</span>
								<em class="color"><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>">阅读全文</a></em>							
							</p>
						</div>
						<div class="activity_contet_tb"> 
							<a href="#" class="bk1">值<?php echo ($vo["good_number"]); ?> </a> 
							<a href="#" class="bk1">不值 <?php echo number_format($vo['good_number']/5,0); ?> </a> 
							<a href="#" class="bk2"><?php echo ($vo["collection_number"]); ?> </a>						
							<a href="#" class="bk3"><?php echo ($vo["comment_number"]); ?></a>						
							<a href="<?php echo ($vo["out"]); ?>" class="bk4"><?php echo ($vo["urlstring"]); ?></a> 
							</div>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>	
		</div>
		
		
		<div class="pagination">
                  <ul contenteditable="true">
                  	<?php echo ($page); ?>
                  </ul>
           </div>
		
		
	</div>
</div>

<!--右边-->
<!--每周榜单-->
<div class="container_right">
			
	
<!--右边banner-->
	<div class="right_banner">
		<a href="javascript:;"><img src="__PUBLIC__/image/right_banner.png" border="0" /></a> 
	</div>

<!--发现精彩...-->	
	<div class="activeing">
		<?php echo W('Fx');;?>



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