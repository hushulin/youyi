<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (($head_title)?($head_title):"优异车品"); ?></title>
<link href="__PUBLIC__/css/ycp.css" rel="stylesheet" type="text/css" />
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
			<!-- 车品分类 -->
			<div class="menu_content_left">
				<div class="menu_cpfl_title">车品分类</div>
				<div class="menu_cpfl_lb">
					<ul class="menucpfl_lb_ul">
						<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('lists',array('cate_id'=>$vo['id']));;?>" style="display:inline-block;width:50px;"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<!-- 车品分类结束 -->
			<div class="menu_content_right">
				<!-- 导航 -->
				<div class="menu_title">
					<ul class="top_right_ul menu_title_ul">
						<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<!-- 导航结束 -->
				<div class="menu_title_bottom">
					<!-- 首页大广告 -->
					<div class="menu_bottom_left">
					<a href="<?php echo ($adv_big["url"]); ?>"><img src="<?php echo ($adv_big["img"]); ?>?h=196&w=502" /></a> 
					</div>
					<!-- 首页大广告结束 -->
					<div class="menu_bottom_right">
						<div class="menu_zc_top">
							<div class="menu_zc_img" style="height:40px;"><img src="__PUBLIC__/image/zc_tx.png?h=50&w=50" style="width:50px;height:50px;"/><span style="height:50px;margin-top:0">嘿，欢迎光临优异车品，</br>
                                          	<a href="<?php echo C('UEC_HOST');;?>/index.php?ctl=user&act=login">马上登录</a>，开启轻松车生活把！</span></div>
							<div class="menu_zclb_cotent">
								<ul>
								<li  style="margin-left:0"><a href="<?php echo C('UEC_HOST');;?>/index.php?ctl=user&act=register">注册</a></li>
								<li class="jfth_bc"><a href="<?php echo C('UEC_HOST');;?>/index.php?ctl=uc_money">积分兑换</a></li>
								</ul>
							</div>
						</div>
						<?php echo W('Article',array('count'=>3));;?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
<!--可能你会感兴趣-->
	<div class="container">
		<div class="container_left">
			<div class="interest">
				<div class="interest_title">
				<h1>可能你会感兴趣...</h1>
				
				<!-- <ul class="interest_title2">
					<li class="libghsh"><a href="#">新蒙迪欧试用</a></li>
					<li><a href="#">天蝎男可能喜欢 </a> </li>
					<li><a href="#">新蒙迪欧试用</a></li>
				</ul> -->
				</div>
			<div class="interest_content">
				<ul>
					<?php if(is_array($chepin_xq)): $i = 0; $__LIST__ = $chepin_xq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><li <?php if ($key == 3): ?>
								class="interest_content_li4"
							<?php endif; ?>>
								<div class="interest_content_img">
									<img src="<?php echo ($vo["img"]); ?>?w=166&h=120" style="width:166px;height:120px;"/>
								</div>	
								<div class="interest_content_font">
									<p><span><?php echo ($vo["type_name"]); ?></span> <?php echo ($vo["title"]); ?></p> 
									<p class="numb float">￥<?php echo ($vo["price"]); ?></p>
									<p  class="numb"><em class="em_color"><?php echo ($vo["good_number"]); ?></em>人觉得值</p>
								</div>
							</li></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
<!-- 
		//<div class="activity">
			<div class="activity_title">
				<h1>本地活动</h1>
			</div>
			<div class="activity_content">
				<div class="activity_left">
					<ul>
						<?php if(is_array($chepin_active1)): $i = 0; $__LIST__ = $chepin_active1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($vo["img"]); ?>?w=240&h=160" style="width:240px;height:160px;" />
								<div class="activity_title2">
									<div class="activity_title2_left">
									<span><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></span><em class="em_color2">￥<?php echo ($vo["price"]); ?></em>
									</div>
									<div class="activity_title2_right">
									<a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><img src="__PUBLIC__/image/active_tb.png" border="0" /></a> </div>
								</div>
								<div class="activity_title3"><?php echo ($vo["type_name"]); ?></div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="activity_mid">
					<ul>
						<?php if(is_array($chepin_active2)): $i = 0; $__LIST__ = $chepin_active2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<div class="activity_mid_img">
							<img src="<?php echo ($vo["img"]); ?>?w=100&h=100" style="width:100px;height:100px;" />
							</div>
							<div class="activity_midimg_contet">
								<p class="activity_midimg_titlered"><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></p>
								<p class="activity_midimg_comming">来自：<?php echo (($vo["urlstring"])?($vo["urlstring"]):"本站数据"); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								<p class="activity_numb"><em class="em_color"><?php echo ($vo["good_number"]); ?>人</em>觉得值 <em class="em_color"> <?php echo ($vo["collection_number"]); ?>人</em>已收藏</p>
								<P class="activity_gosee"><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>">去看看</a></P>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="activity_right">
					<ul>
						<li><a href="#"><img src="__PUBLIC__/image/pinpailogo.png" border="0" /></a></li>
						<li><a href="#"><img src="__PUBLIC__/image/pinpailogo.png" border="0" /></a></li>
					</ul>
				</div>
			</div>
		</div>
		 -->
<!--爱车中心-->
	<div class="lovecar">
		<div class="interest_title">
					<h1>爱车中心</h1>
					</div>
					<div class="interest_content">
				<ul>
					<?php if(is_array($chepin_aiche)): $i = 0; $__LIST__ = $chepin_aiche;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if ($key == 3): ?>
							 class="interest_content_li4"
						<?php endif; ?>>
							<div class="interest_content_img love_car_img">
								<img src="<?php echo ($vo["img"]); ?>" style="width:166px;height:201px;" />
							</div>	
							<div class="interest_content_font hight">
								<p><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><?php echo (dsubstr($vo["title"],34)); ?></a></p> 
								<p><?php echo (dsubstr($vo["content"],44)); ?></p>
								<p class="numb float">￥<?php echo ($vo["price"]); ?> <span class="remove">￥<?php echo $vo['price']*1.4;?></span></p>
								<p class="numb love_car_yuding"><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>">预定</a></p>
								<p class="numb love_car_nubmr"><em class="em_color"><?php echo ($vo["good_number"]); ?></em>人觉得值</p>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>

<!--产品logo-->
	<div class="product_logo" style="height:0px;">
		<!-- <ul>
			<li><a href="#"><img src="__PUBLIC__/image/product.png" border="0" /></a></li>
			<li><a href="#"><img src="__PUBLIC__/image/product.png" border="0" /></a></li>
			<li><a href="#"><img src="__PUBLIC__/image/product.png" border="0" /></a></li>
			<li><a href="#"><img src="__PUBLIC__/image/product.png" border="0" /></a></li>
			<li><a href="#"><img src="__PUBLIC__/image/product.png" border="0" /></a></li>
		</ul> -->
	</div>
	<!-- 广告 -->
	<div class="mid_banner"	>
		<a href="<?php echo ($adv_banner1["url"]); ?>"><img src="<?php echo ($adv_banner1["img"]); ?>" width="722" height="115" /></a>
	</div>
	<!-- 广告 -->
			
<!--产品推荐-->	
		<div class="Product">
				<div class="interest_title">
					<h1>车品推荐</h1>
					<ul class="interest_title2 width300">
						<li><a href="#">电器·导航</a></li>
						<li><a href="#">保养·机油  </a> </li>
						<li><a href="#"> 改装·轮胎</a></li>
					</ul>
					<div class="interest_title3">
						热门：<a href="#">雪莱特</a> <a href="#">灰壳</a> <a href="#">美孚1号</a> <a href="#">全合成</a>
					</div>
					<div class="interest_title3_more">更多...</div>
				</div>
				<div class="Product_content">
					<div class="Product_content_left">
						<div class="Product_content_leftimg">
							<img src="__PUBLIC__/image/recommended_img.png" width="178" height="206" />
							<!-- <span><a href="#">【活动】〖广州〗好快省华南大区店庆酬宾！</a></span> -->
						</div>
					<div class="Product_content2">
						<div class="activity_mid margin0">
							<ul>
							<li class="padding-bottom10px">
								<div class="activity_mid_img width64">
								<img src="__PUBLIC__/image/active_img_mid.png">
								</div>
								<div class="activity_midimg_contet width104">
									<p class="activity_midimg_titlered"><a href="#">澳马脚垫大酬宾！仅299元，即可获得原价201元的全套加厚环保脚垫！</a></p>
									<p class="activity_numb top0"><span class="em_color">￥199.00</span><span class="em_color"> 41人</			                               span><em class="color_ccc">觉得值</em></p>
								</div>
							</li>
						<!-- 
							<li class="hight25"><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
							<li><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
							<li><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						 -->
							<li class="padding-bottom10px padding-top30px">
								<div class="activity_mid_img width64 width80">
								<img src="__PUBLIC__/image/active_img_mid.png">
								</div>
								<div class="activity_midimg_contet width104 width88">
									<h1>格道车品&nbsp;</h1>
									<p class="gdzp_titile"><img src="__PUBLIC__/image/jia.png" /></p>
									<p class="activity_midimg_titlered"><a href="#">主营PAPAGO、博世、雪莱特...</a></p>
									<p class="activity_numb top0  store"><a href="#">进入店铺</a></p>
								</div>
							</li>
					</ul>
				</div>
					</div>

					</div>
									
				<div class="Product_content_right">
					<div class="activity_left width256">
					<ul>
						<?php if(is_array($chepin_tj)): $i = 0; $__LIST__ = $chepin_tj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="imgwidth <?php if ($key%2 == 0): ?>
								margin-right22
							<?php endif; ?>"><img src="<?php echo ($vo["img"]); ?>" style="width:256px;height:240px;">
								<div class="activity_title2 width236">
									<div class="activity_title2_left">
									<span><a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></span>
									<span class="moni"><strong>￥<?php echo ($vo["price"]); ?></strong></span>
									<span class="moni"><em><?php echo ($vo["good_number"]); ?>人</em>觉得值</span>
									</div>
									<div class="activity_title2_right">
									<a href="<?php echo U('detail',array('id'=>$vo['id']));;?>"><img src="__PUBLIC__/image/active_tb.png" border="0"  style="width:38px; height:36px;"></a> </div>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
					</ul>
				</div>	
				</div>
				
								
				</div>
				
			
<!--大家正在问-->			
			<div class="asking">
				<div class="interest_title">
					<h1>大家正在问</h1>
					<div class="interest_title3_more">更多...</div>
				</div>
                  <div class="asking_content">
			
						<div class="activity_mid margin0 width351 asking_margin_right20">
							<ul class="asking_list_style">
							<li class="padding-bottom10px">
								<div class="activity_mid_img width64 width122">
								<img src="__PUBLIC__/image/active_img_mid.png">
								</div>
								<div class="activity_midimg_contet width104 width214">
									<h1><a href="#">东风风神A60仪表怎么看不见水温表？</a></h1>
									<p class="activity_numb top0 widthh1">风神A60没有真正的水温表，只有水温过低或过高的提示，即码表上冷启动...</p>
								</div>
							</li>
						
							<li class="hight25"><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
							<li><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
							<li><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
					</ul>
				</div>
				
						<div class="activity_mid margin0 width351">
							<ul class="asking_list_style">
							<li class="padding-bottom10px">
								<div class="activity_mid_img width64 width122">
								<img src="__PUBLIC__/image/active_img_mid.png">
								</div>
								<div class="activity_midimg_contet width104 width214">
									<h1><a href="#">东风风神A60仪表怎么看不见水温表？</a></h1>
									<p class="activity_numb top0 widthh1">风神A60没有真正的水温表，只有水温过低或过高的提示，即码表上冷启动...</p>
								</div>
							</li>
						
							<li class="hight25"><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
							<li><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
							<li><a href="#">广播：行车必备品轮胎充气泵</a> </li>
						
					</ul>
				</div>
				
			</div>
		</div>


	<!-- 广告 -->
	<div class="mid_banner"	>
		<a href="<?php echo ($adv_banner2["url"]); ?>"><img src="<?php echo ($adv_banner2["img"]); ?>" border="0" width="742" height="115" /></a>
	</div>
	<!-- 广告 -->


<!--市场知识-->
		<div class="knowledge">
			<div class="interest_title">
					<h1>汽车后市场的那点知识</h1>
			</div>
			<div class="knowledge_content">
				<div class="knowledge_content_ first">
					<ul class="knowledge_first_ul">
						<li class="li_style1">
						<span>保养维修</span>
						<img src="__PUBLIC__/image/zhishi.png?w=351&h=184" />
						</li>
						<?php if(is_array($knowlege_desc)): $i = 0; $__LIST__ = $knowlege_desc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li_style"><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
						
				</div>
				
				<div class="knowledge_content_ second">
					<ul class="knowledge_first_ul">
						<li class="li_style1">
						<span>汽车美容</span>
						<img src="__PUBLIC__/image/zhishi.png?w=351&h=184" />
						</li>
						<?php if(is_array($knowlege_asc)): $i = 0; $__LIST__ = $knowlege_asc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li_style"><a href="<?php echo U('article',array('id'=>$vo['id']));;?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
						
				</div>

			</div>

		</div>



				
	</div>
		
		</div>	
			



</div>
		
		
</div>

<!--右边-->
<div class="container_right">

<?php echo W('Act');;?>
<!--右边banner-->
<div class="right_banner">
<a href="#"><img src="__PUBLIC__/image/right_banner.png" border="0" /></a> 
</div>

<?php echo W('Sai');;?>
<?php echo W('Fx');;?>

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