<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/config.php';
header("Content-Type:text/html;charset=UTF-8");
if(!isset($_POST['submit'])){
	exit('非法访问!');
}

$book=new Book();
$book->name =$_POST['bookname'];
$book->author=$_POST['author'];

//写入数据
$sql="INSERT INTO b_book(id,name,author,zjtj,nrjs,zyzj,jczy) VALUES(null,:bookname,:author,null,null,null,null)";
$stmt=$dbh->prepare($sql);
$stmt->execute(array(
':bookname'=>$book->name,
':author'=>$book->author,
));
$id=null;
if($id=$dbh->lastinsertid()){
	exit($id);
} else {
	echo '抱歉！添加数据失败：'.mysql_error().'<br />';
	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
?>