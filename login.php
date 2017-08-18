<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->

<link href="static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />

<link href="static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />

<link href="static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />

<link href="lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/public.css"/>
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<!--<input type="hidden" id="TenantId" name="TenantId" value="" />-->
<!--<div class="header"></div>-->



<div class="loginWraper">
  <div id="loginform" class="loginBox">
  	<div class="errMsg"></div>
    <form class="form form-horizontal"  method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="user" name="user" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <!--<div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
          <img src=""> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>
      </div>-->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value=""> 使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3"><button type="button" id="login"  class="btn btn-success radius size-L">&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;</button>
          <a href="/admin/reg.php" class="btn btn-default radius size-L" id="reg">&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;</a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'ajaxLoad.php' ?>

<!--<div class="footer">213213123</div>-->



<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>

<script src="js/public.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
			$('#login').on('click', function() {
				var param = {};
				param['user'] = document.getElementById('user').value;
				param['password'] = document.getElementById('password').value;
				if(param['user'] == '') {
					errMsg('请输入用户名');
					return;
				}
				if(param['password'] == '') {
					errMsg('请输入密码');
					return;
				}
				$.ajax({
					type: "POST",
					url: "/data/login.php",
					data: param,
					beforesend:Load.loadShow(),
					success: function(msg, status) {
						Load.loadHide();
						if(msg == '登陆成功') {
							//alert('登陆成功');
							window.location = '/admin/index.php';
							return;
						}
						errMsg('用户名或密码错误');
					}
				});
			});
		</script>
</body>
</html>