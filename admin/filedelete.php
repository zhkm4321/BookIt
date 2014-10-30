<?php 
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
session_start();
if(!isset($_POST['id'])){
	echo "FALSE";
	exit;
}
//查询数据库记录
$id=$_POST["id"];//图片ID
$filepath=$_POST["filePath"];//缩略图路径
$fileAbsPath=$_SERVER ["DOCUMENT_ROOT"] . $filepath;
$sql = "SELECT * FROM b_pictures WHERE id=:pid and thumb_path=:thumbPath limit 1";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":pid", $id);
$stmt->bindParam(":thumbPath", $filepath);
$stmt->execute();
$pic=NULL;
if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$pic=new Picture($row["id"],$row["path"],$row["thumb_path"],$row["md5"],$row["model_id"]);
}else{
	echo "nonExist";
	exit;
}
//删除数据库记录
$sql="delete from b_pictures where id=:pid";
$stmt=$dbh->prepare($sql);
$stmt->execute(array(':pid'=>$pic->id));
if($stmt->rowCount()==0){
	echo "FALSE";
	exit;
}
$_tempFile = $_SERVER ["DOCUMENT_ROOT"].$pic->path;
if(is_file($_tempFile)&&(md5($_tempFile)==$pic->md5)){
	unlink($_tempFile);
}
$_tempFile=$_SERVER ["DOCUMENT_ROOT"].$pic->thumb_path;
if(is_file($_tempFile)){
	unlink($_tempFile);
}
unset($_tempFile);
unset($pic);
echo "SUCCESS";
?>