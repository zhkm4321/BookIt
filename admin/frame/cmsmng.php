<?php
/*
 * 数据库链接 实体类定义
 */
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
session_start (); // !注意要放在类定义之后
$user = $_SESSION ['user'];
if (! isset ( $user )) {
	header ( "Location: /admin/login/index.php" );
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
<script src="<?=$base?>/admin/res/js/cmsmng.js" type="text/javascript"></script>
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
				<li class="select"><a href="<?=$base?>/admin/frame/cmsmng.php?action=index">网站管理</a></li>
				<li><a href="<?=$base?>/admin/frame/bookmng.php">预订管理</a></li>
				<li><a href="<?=$base?>/admin/frame/usermng.php">用户管理</a></li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="left_con" id="left_con">
			<!-- 显示行业分类 -->
			<ul class="left_nav">
			<?php
			$sql="select * from b_model";
			$stmt=$dbh->prepare($sql);
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
				<li class="noselect"><span action="<?=$row['path'] ?>"><?=$row["model_name"] ?></span></li>
			<?php 
			}
			?>
			</ul>
		</div>
		<div class="right_con" id="right_con">
			<div class="r_con">
				<?php
				if (@$_GET ['action'] == 'indexMng') {
					$_SESSION['CURRENT_MODEL']='1';
					include $_SERVER ["DOCUMENT_ROOT"] . '/admin/cms/indexMng.php';
				} elseif (@$_GET ['action'] == 'bookIntro') {
					$_SESSION['CURRENT_MODEL']='2';
					include $_SERVER ["DOCUMENT_ROOT"] . '/admin/cms/bookIntro.php';
				} elseif (@$_GET ['action'] == 'authorTeam') {
					$_SESSION['CURRENT_MODEL']='3';
					include $_SERVER ["DOCUMENT_ROOT"] . '/admin/cms/authorTeam.php';
				} elseif (@$_GET ['action'] == 'coopAgen') {
					$_SESSION['CURRENT_MODEL']='4';
					include $_SERVER ["DOCUMENT_ROOT"] . '/admin/cms/coopAgen.php';
				} elseif (@$_GET ['action'] == 'infoMng') {
					$_SESSION['CURRENT_MODEL']='5';
					include $_SERVER ["DOCUMENT_ROOT"] . '/admin/cms/infoMng.php';
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>
