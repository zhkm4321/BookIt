<?php
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
session_start();
header("Content-Type:text/html;charset=UTF-8");
//注销登录
if(@$_GET['action']=='logout'){
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
	exit;
}
//登录
if(!isset($_POST['submit'])){
	exit('非法访问!');
}

$user=new User();
$user->username=htmlspecialchars($_POST['username']);
$user->password=$password = MD5($_POST['password']);
//包含数据库连接文件

//检测用户名及密码是否正确
$sql="SELECT * FROM b_user WHERE username=:username and password=:password limit 1";
$stmt=$dbh->prepare($sql);
$stmt->execute(array(':username'=>$user->username,':password'=>$user->password));
if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	//登录成功
	$user->id=$row['id'];
	$user->username=$row['username'];
	$user->realname=$row['realname'];
	$user->organ=$row['organ'];
	$user->sculpture=$row['sculpture'];
	$user->regDate=$row['reg_date'];
	$user->lastLogin=$row['last_login'];
	$user->ip=$row['ip'];
	$_SESSION['user'] = $user;
	$_SESSION['userid'] = $user->id;
	echo $user->username.' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
	echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
} else {
	exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}
$lastLoginLog="UPDATE b_user SET last_login=:lastLogin WHERE id=:id";
$stmt=$dbh->prepare($lastLoginLog);
if(!$stmt->execute(array(':lastLogin'=>time(),':id'=>$user->id))){
	echo '记录登陆时间失败';
}
exit;
?>