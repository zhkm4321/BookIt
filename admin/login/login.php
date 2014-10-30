<?php
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
session_start();//!注意要放在类定义之后
header("Content-Type:text/html;charset=UTF-8");
//注销登录
if(@$_GET['action']=='logout'){
	unset($_SESSION['userid']);
	unset($_SESSION['user']);
	header("Location: /admin/login/index.php");
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
	//找到用户
	$user->id=$row['id'];
	$user->username=$row['username'];
	$user->realname=$row['realname'];
	$user->organ=$row['organ'];
	$user->sculpture=$row['sculpture'];
	$user->regDate=$row['reg_date'];
	$user->lastLogin=$row['last_login'];
	$user->ip=$row['ip'];
	$user->level=$row['level'];
	if($user->level==0){
		$_SESSION['user'] = $user;
		$_SESSION['userid'] = $user->id;
		Header("Location: /admin/frame/cmsmng.php?action=indexMng");
		exit;
	}else{
		unset($_SESSION['userid']);
		unset($_SESSION['user']);
		$_SESSION['msg']="您没有权限登陆后台";
		header("Location: /admin/login/index.php");
		exit;
	}
} else {
	unset($_SESSION['userid']);
	unset($_SESSION['user']);
	$_SESSION['msg']="用户名密码错误";
	header("Location: /admin/login/index.php");
	exit;
	exit;
}
$lastLoginLog="UPDATE b_user SET last_login=:lastLogin WHERE id=:id";
$stmt=$dbh->prepare($lastLoginLog);
if(!$stmt->execute(array(':lastLogin'=>time(),':id'=>$user->id))){
	echo '记录登陆时间失败';
}
exit;
?>