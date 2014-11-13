<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>APP定制平台--ITZI</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width"/>
<link rel="stylesheet" href="__S__/css/reset.css"/>
<link rel="stylesheet" href="__S__/css/style.css"/>
<link rel="stylesheet" href="__S__/css/login.css"/>
<!--[if lt IE 9]>
<script type="text/javascript" src="__S__/js/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="__S__/js/jquery-2.0.3.min.js"></script>
<!--<![endif]-->


<link rel="shortcut icon" href="/favicon.ico"/>
<link rel="apple-touch-icon" href="/touchicon.png"/>
</head>
<body>
	<div id="main-content">
		<div class="login-body">
			
			<div class="m-form">
			    <form name="loginform" action="__SELF__" method="post">
			        <fieldset>
			            <legend style="text-align:center;">欢迎使用优异车品后台管理系统</legend>
			            <div class="formitm">
			                <label class="lab">账号：</label>
			                <div class="ipt">
			                    <input type="text" name="username" class="u-ipt"/>
			                </div>
			            </div>
			            <div class="formitm">
			                <label class="lab">密码：</label>
			                <div class="ipt">
			                    <input type="password" name="pwd" class="u-ipt"/>
			                </div>
			            </div>
			            <div class="formitm">
			                <label class="lab">验证码：</label>
			                <div class="ipt">
			                    <input type="text" name="chkcode" class="u-ipt"/>
			                    <p class="tip"><img class="code-img" src="<?php echo U('/Admin/Public/verify');?>" alt="验证码"/><a href="#" class="f-ib">换一张</a>
			                    </p>
			                </div>
			            </div>
			            <div class="formitm formitm-1"><input class="u-btn" type="submit" style="width: 168px;" value="登录"></div>
			        </fieldset>
			    </form>
			</div>
		</div>
	</div>
</body>
</html>