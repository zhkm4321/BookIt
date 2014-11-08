<?php
/*
 * 数据库链接
 * 实体类定义
 */
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
$user=$_SESSION['user'];
if(!isset($user)){
	header("Location: /admin/login/index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?=$siteName?> - 后台管理</title>
		<link rel="stylesheet" type="text/css" href="<?=$base?>/admin/res/css/reset.css" media="all" />
		<link rel="stylesheet" href="<?=$base?>/admin/res/css/public.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" href="<?=$base?>/admin/res/css/global.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?=$base?>/admin/res/css/common.css" type="text/css" media="all" />
		<script src="<?=$jquery?>" type="text/javascript"></script>
		<script src="<?=$base?>/admin/res/js/public.js" type="text/javascript"></script>
		<script src="<?=$base?>/admin/res/js/bookmng.js" type="text/javascript"></script>
		<!-- 图标列表查询相关js -->
		<script type="text/javascript">
		  $(function() {
		    queryForOrderList(null,'order_date',1,15);//获取行业分类列表
		    $('#left_con').css("width", "0px");
		    $('#right_con').css("margin-left","0px");
		    $('#left_con').show();
		  });
		</script>
	</head>
	<body>
		<div class="wrap">
			<div class="header" id="pageHead">
				<div class="logo"></div>
				<div class="user">
					您好：<?=$user->realname?>&nbsp;&nbsp;
					<a href="/admin/login/login.php?action=logout">退出</a>
				</div>
				<ul class="top_nav">
					<li>
						<a href="<?=$base?>/admin/frame/cmsmng.php?action=indexMng">网站管理</a>
					</li>
					<li class="select">
						<a href="<?=$base?>/admin/frame/bookmng.php">预订管理</a>
					</li>
					<li>
						<a href="<?=$base?>/admin/frame/usermng.php">用户管理</a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="left_con" id="left_con">
			</div>
			<div class="right_con" id="right_con">
				<div class="r_con" id="list_con">

				</div>
			</div>
		</div>
	</body>
</html>
