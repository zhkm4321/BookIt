<?php
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
header("Content-Type:text/html;charset=UTF-8");
if(!isset($_POST['submit'])){
	header("Location:../user/login.html");
	exit();
}
$order=new Order();
$order->userId=$_POST["userId"];
$order->realname=$_POST["realname"];
$order->organ=$_POST["organ"];
$order->position=$_POST["position"];
$order->email=$_POST["email"];
$order->phone=$_POST["phone"];
$order->quantity=$_POST["quantity"];
$order->bookId=$_POST["bookId"];
//验证表单
if(!(preg_match('/^1[358]\d{9}$/', $order->phone)||
	preg_match('/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/', $order->phone))){
	echo preg_match('/^1[358]\d{9}$/', '13476875187').'<br/>';
	echo preg_match('/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/', '0715-5359037').'<br/>';
	exit('错误：手机号格式错误。<a href="javascript:history.back(-1);">返回</a>');
}
if(!is_numeric($order->quantity)){
	exit('错误：数量错误。<a href="javascript:history.back(-1);">返回</a>');
}else{
	$order->quantity=intval($order->quantity);
}
if(!preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $order->email)){
	exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>');
}

var_dump($order);
$insertSql="INSERT INTO b_order(user_id,realname,organ,position,email,phone,quantity,book_id,order_date) value(:userId, :realname,:organ,:position,:email,:phone,:quantity,:bookId,:orderDate)";
$stmt=$dbh->prepare($insertSql);
$stmt->bindParam(":userId", $order->userId);
$stmt->bindParam(':realname', $order->realname);
$stmt->bindParam(':organ', $order->organ);
$stmt->bindParam(':position', $order->position);
$stmt->bindParam(':email', $order->email);
$stmt->bindParam(':phone', $order->phone);
$stmt->bindParam(':quantity', $order->quantity);
$stmt->bindParam(':bookId', $order->bookId);
$stmt->bindParam(':orderDate', time());
$stmt->execute();
if($dbh->lastinsertid()){
	exit('预订成功！点击此处 <a href="/book/order.php">继续预订</a>');
} else {
	echo '抱歉！添加数据失败：'.mysql_error().'<br />';
	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
?>