<?php
require_once '../config.php';
header("Content-Type:text/html;charset=UTF-8");
//检测是否登录，若没登录则转向登录界面
session_start();
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
$user = $_SESSION['user'];
echo '用户信息<br />';
echo '<img src="'.$user->sculpture.'" width=80 height=100 alt="头像"><br/>';
echo '用户名：',$user->username.'<br />';
echo '姓名：',$user->realname.'<br />';
echo '上次登陆日期：',date("Y-m-d", $user->lastLogin),'<br />';
echo '<a href="/book/order.php">预订图书</a><br />';
echo '<a href="/book/list.php">我的预订</a><br />';
echo '<a href="/user/login.php?action=logout">注销</a>登录<br />';
?>