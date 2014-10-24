<?php
/*
 * 数据库链接
 * 实体类定义
 */
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
session_start();//!注意要放在类定义之后
$user=$_SESSION['user'];
if(!isset($user)){
	header("Location: /admin/backlogin.php");
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
		<link rel="stylesheet" href="<?=$base?>/admin/res/css/pop.css" type="text/css" />
		<link rel="stylesheet" href="<?=$base?>/admin/res/css/global.css" type="text/css" media="all" />	
		<link rel="stylesheet" href="<?=$base?>/admin/res/css/common.css" type="text/css" media="all" />
		<script src="http://libs.useso.com/js/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
		<script src="<?=$base?>/admin/res/js/public.js" type="text/javascript"></script>
		<script src="<?=$base?>/admin/res/js/global.js" type="text/javascript"></script>
		<!-- 图标列表查询相关js -->
		<script type="text/javascript">
		  $(function() {
		    queryForOrderList(null,'order_date',1,1);//获取行业分类列表
		    $('#left_con').css("width", "0px");
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
					<a href="/admin/login.php?action=logout">退出</a>
				</div>
				<ul class="top_nav">
					<li class="select" id="tb_select">
						<a href="<?=$base?>/admin/cmsmng.php">网站管理</a>
					</li>
					<li class="select" id="tb_select">
						<a href="<?=$base?>/admin/bookmng.php">预订管理</a>
					</li>
					<li id="xt_select">
						<a href="<?=$base?>/admin/usermng.php">用户管理</a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="left_con" id="left_con">
				<!-- 显示行业分类 -->
			</div>
			<div class="right_con" id="right_con">
				<div class="r_con" id="list_con">
					
				</div>
			</div>
		</div>
		<div class="hide">
			<form id="infoPage" action="${codeBase}/res/frame/upload/perfectInfo.page" method='post' style="display: none;">
				<input type="hidden" style="display: none;" name="iconList" id="iconList">
				<input type="hidden" style="display: none;" name="username" id="username" value="${username}">
			</form>
		</div>
		<div class="hide">
			<form id="editPage" action="${codeBase}/res/frame/upload/editGroup.page" method='get' style="display: none;">
				<input type="hidden" style="display: none;" name="editId" id="editId">
				<input type="hidden" style="display: none;" name="username" value="${username}">
			</form>
		</div>
		<div id="top" class="topdiv">
			<div id="load">
				<div id="loading">
					<div id="loadtext">
						loading...
					</div>
				</div>
			</div>
		</div>
		<div id="below" class="belowdiv"></div>
	</body>
</html>
