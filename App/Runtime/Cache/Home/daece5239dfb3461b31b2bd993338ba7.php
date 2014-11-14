<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (($head_title)?($head_title):"优异车品"); ?>-我要爆料</title>
<link href="__PUBLIC__/css/ycp.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/info.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<link rel="stylesheet" href="/Static/kindeditor/default/default.css">
	<script charset="utf-8" src="/Static/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/Static/kindeditor/zh_CN.js"></script>
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
					<div class="menu_cpfl_title czdq">用户频道</div>
					<ul class="top_right_ul menu_title_ul czdq_783">
						<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="menu_title_bottom">
					<?php echo W('Adv',array('url'=>__SELF__));;?>
					
					<div class="menu_bottom_right">
						<?php echo W('Article',array('count'=>8));;?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
<!--可能你会感兴趣-->
<div class="container">
	<div class="container_left">
		<div class="interest">
		<!-- 爆料频道 -->
		<div class="Favourable_activity">

			<div class="m-hd m-hd-bg m-hd-rt">
			    <h2 class="u-tt">用户爆料中心</h2>
			    <ul>
			        <li class="z-crt"><a href="javascript:;">我要晒单</a></li>
			        <li><a href="javascript:;">我要分享经验</a></li>
			        <li><a href="javascript:;">我要发文章</a></li>
			    </ul>
			</div>

			<!-- 表单 -->
			<div class="m-slide m-slide-x" style="width:100%;min-height:1000px;">
			    <ol>
			        <li class="z-crt">
			        	<div style="width:100%;min-height:800px;">
			        		
			        		<div class="m-form">
			        		    <form name="" method="post">
			        		        <fieldset>
			        		            <div class="formitm">
			        		                <label class="lab">购买链接：</label>
			        		                <div class="ipt">
			        		                    <input type="text" name="url" class="u-ipt" style="width:70%;"/>
			        		                    <input type="hidden" name="position_id" value="7">

			        		                </div>
			        		            </div>
			        		            <div class="formitm">
											<label class="lab">车品名:</label>
											<div class="ipt">
												<select class="u-select" name="cargoods_id"><?php if(is_array($field_cargoods_id)): $i = 0; $__LIST__ = $field_cargoods_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == "") echo "selected"; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
												<p></p>
											</div>
										</div>
			        		            <div class="formitm">
			        		            	<label class="lab">晒单内容：</label>
			        		            	<div class="ipt">
			        		            		<textarea class="u-textarea" name="content"></textarea><script type="text/javascript">
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name="content"]', {
							allowFileManager : false,
							themesPath: K.basePath,
							width: '98%',
							height: '500px',
							resizeType: 1,
							pasteType : 2,
							urlType : 'absolute',
							//fileManagerJson : '/admin.php?m=Admin&c=Article&a=fileManagerJson',
							uploadJson : '/Admin/Index/keupload'
						});
					});
				</script>
			        		            	</div>
			        		            </div>
			        		            <div class="formitm">
			        		                <label class="lab">验证码：</label>
			        		                <div class="ipt">
			        		                    <input type="text" name="verify" class="u-ipt"/><img class="code-img" src="<?php echo U('/Admin/Public/verify');?>" alt="验证码"/><a href="javascript:window.location.reload();" class="f-ib">换一张</a>
			        		                    <p class="tip"><input type="checkbox" checked="checked" id="agree"/><label for="agree">同意“服务条款”和“隐私权保护和个人信息利用政策”</label></p>
			        		                </div>
			        		            </div>
			        		            <div class="formitm formitm-1"><button class="u-btn" type="submit">晒单</button></div>
			        		        </fieldset>
			        		    </form>
			        		</div>
			        	</div>
			        </li>
			        <li>
			        	<div style="width:100%;min-height:800px;">
			        		<div class="m-form">
			        		    <form name="" method="post">
			        		        <fieldset>
			        		            <div class="formitm">
			        		                <label class="lab">购买链接：</label>
			        		                <div class="ipt">
			        		                    <input type="text" name="url" class="u-ipt" style="width:70%;"/>
			        		                    <input type="hidden" name="position_id" value="8">

			        		                </div>
			        		            </div>
			        		            <div class="formitm">
											<label class="lab">车品名:</label>
											<div class="ipt">
												<select class="u-select" name="cargoods_id"><?php if(is_array($field_cargoods_id)): $i = 0; $__LIST__ = $field_cargoods_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == "") echo "selected"; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
												<p></p>
											</div>
										</div>
			        		            <div class="formitm">
			        		            	<label class="lab">经验：</label>
			        		            	<div class="ipt">
			        		            		<textarea class="u-textarea" name="content"></textarea><script type="text/javascript">
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name="content"]', {
							allowFileManager : false,
							themesPath: K.basePath,
							width: '98%',
							height: '500px',
							resizeType: 1,
							pasteType : 2,
							urlType : 'absolute',
							//fileManagerJson : '/admin.php?m=Admin&c=Article&a=fileManagerJson',
							uploadJson : '/Admin/Index/keupload'
						});
					});
				</script>
			        		            	</div>
			        		            </div>
			        		            <div class="formitm">
			        		                <label class="lab">验证码：</label>
			        		                <div class="ipt">
			        		                    <input type="text" name="verify" class="u-ipt"/><img class="code-img" src="<?php echo U('/Admin/Public/verify');?>" alt="验证码"/><a href="javascript:window.location.reload();" class="f-ib">换一张</a>
			        		                    <p class="tip"><input type="checkbox" checked="checked" id="agree"/><label for="agree">同意“服务条款”和“隐私权保护和个人信息利用政策”</label></p>
			        		                </div>
			        		            </div>
			        		            <div class="formitm formitm-1"><button class="u-btn" type="submit">分享经验</button></div>
			        		        </fieldset>
			        		    </form>
			        		</div>
			        	</div>
			        </li>
			        <li>
			        	<div style="width:100%;min-height:1000px;">
			        		<div class="m-form">
				<form name="m-form" action="<?php echo U('articleadd');;?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="tab tab_1">
							<div class="formitm">
									<label class="lab">标题:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="title" style="width:80%;" value=""/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">简短标题:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="sub_title" value=""/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">正文:</label>
									<div class="ipt">
										<textarea class="u-textarea" name="content"></textarea><script type="text/javascript">
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name="content"]', {
							allowFileManager : false,
							themesPath: K.basePath,
							width: '100%',
							height: '500px',
							resizeType: 1,
							pasteType : 2,
							urlType : 'absolute',
							//fileManagerJson : '/admin.php?m=Admin&c=Article&a=fileManagerJson',
							uploadJson : '/Admin/Index/keupload'
						});
					});
				</script>
	
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">分类:</label>
									<div class="ipt">
										<select class="u-select" name="cate_id"><?php if(is_array($field_cate_id)): $i = 0; $__LIST__ = $field_cate_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == "") echo "selected"; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">作者:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="author" value=""/>
										<p></p>
									</div>
								</div>
						</div>
						<div class="formitm formitm-1">
							<button class="u-btn" type="submit">发布</button>
						</div>
					</fieldset>
				</form>
			</div>
			        	</div>
			        </li>
			    </ol>
			</div>
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
	
	<script type="text/javascript">
		(function(li){
			$.each(li, function(index, val) {
				 $(val).bind('click', function(event) {
				 	$(li).removeClass('z-crt');
				 	$(this).addClass('z-crt');
				 	$('.m-slide ol li').removeClass('z-crt');
				 	$('.m-slide ol li').eq(index).addClass('z-crt');
				 });
			});
		})($('.m-hd ul li'));
	</script>
</body>
</html>