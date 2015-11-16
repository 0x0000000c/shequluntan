
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title ?><?php echo $sitename ?></title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="description" content="<?php echo $description ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!--IE使用本身版本渲染 -->
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0" />
<meta name="renderer" content="webkit|ie-comp|ie-stand"><!--第三方webkit浏览器优先使用webkit -->
<meta name="apple-mobile-web-app-capable" content="yes"><!--全屏模式运行 -->
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="<?php echo $sitename ?>"> <!-- WEBAPP标题 -->
<link rel="apple-touch-icon-precomposed" href="<?php echo $tpl ?>apple-touch-icon-60x60.jpg" />
<link rel="stylesheet" type="text/css" href="<?php echo $css ?>common.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css ?>icon.css">
<link rel="stylesheet" type="text/css" href="<?php echo $css ?>simditor.css" />
<script type="text/javascript" src="<?php echo $js ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo $tpl ?>assets/layer/layer.js"></script>
<script type="text/javascript" src="<?php echo $js ?>common.js"></script>
<?php if ($loginInfo['uid'] > 0) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $css ?>rebox.css">
	<script type="text/javascript" src="<?php echo $js ?>ImageUpload.js"></script>
	<script type="text/javascript" src="<?php echo $js ?>module.js"></script>
	<script type="text/javascript" src="<?php echo $js ?>hotkeys.js"></script>
	<script type="text/javascript" src="<?php echo $js ?>simditor.js"></script>
	<script type="text/javascript" src="<?php echo $js ?>post.js"></script>
	<script type="text/javascript" src="<?php echo $js ?>rebox.js"></script>
<?php } ?>
<!--[if lt IE 9]>
	<script src="<?php echo $js ?>html5.js"></script>
	<script src="<?php echo $js ?>css3.js"></script>
<![endif]-->
<script type="text/javascript">
	var root = "<?php echo $root ?>";
	var login_uid = "<?php echo $loginInfo['uid'] ?>";
	var login_groupid = "<?php echo $loginInfo['groupid'] ?>";
</script>
<!-- 百度统计 -->
<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "//hm.baidu.com/hm.js?48042604b3c7a9973810a87540843e34";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
</script>
</head>
<body>
<div class="header fixed">
	<div class="main-outlet">
		<h1>
			<a class="logo-mobile" href="<?php echo $root ?>"><i class="icon icon-brandfill x7"></i></a>
			<a class="logo" href="<?php echo $root ?>"><?php echo $sitename ?></a>
		</h1>
		<div class="nav">
			<?php if ($loginInfo['uid'] > 0) { ?>
				<a href="<?php echo $root ?>user/" class="btn-circle" tip-title="我的主页"><img src="<?php echo $loginInfo['avatar'] ?>" alt="<?php echo $loginInfo['username'] ?>" id="myAvatar" style="width:30px; border-radius: 50%;"></a>
				<a href="<?php echo $root ?>notification/" class="btn-circle" tip-title="提醒"><i class="icon icon-notice x2"></i><?php if ($mine['notification'] > 0) { ?><span class="danger"><?php echo $mine['notification'] ?><span><?php } ?></a>
				<a href="<?php echo $root ?>whisper/" class="btn-circle" tip-title="私信"><i class="icon icon-message x2"></i><?php if ($mine['whisper'] > 0) { ?><span class="danger"><?php echo $mine['whisper'] ?><span><?php } ?></a>
				<a href="<?php echo $root ?>setting/" class="btn-circle" tip-title="设置"><i class="icon icon-settings x2"></i></a>
			<?php if ($loginInfo['groupid'] == 9) { ?>
				<a href="<?php echo $root ?>admin/" class="btn-circle" tip-title="后台管理中心"><i class="icon icon-home x2"></i></a>
			<?php } ?>
				<a href="<?php echo $root ?>logout/" class="btn-circle" tip-title="退出登录"><i class="icon icon-square x2"></i></a>
			<?php }else{ ?>
				<a href="<?php echo $root ?>register/" class="btn-circle" tip-title="注册">R</a>
				<a href="<?php echo $root ?>login/" class="btn-circle" tip-title="登陆">L</a>
				<a href="<?php echo $root ?>qqlogin/" class="btn-circle" tip-title="使用QQ一键登录"><i class="icon icon-qq x2"></i></a>
			<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
