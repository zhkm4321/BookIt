<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
include $_SERVER ["DOCUMENT_ROOT"] . '/common/PictureUtils.php';
session_start (); // !注意要放在类定义之后
$user = $_SESSION ['user'];
if (! isset ( $user )) {
	header ( "Location: /admin/login/index.php" );
	exit ();
}
/**
 * 生成随机文件名的
 *
 * @param unknown $l        	
 * @return Ambigous <NULL, string>
 */
function generate_name($l) {
	$c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	srand ( ( double ) microtime () * 1000000 );
	$str = NULL;
	for($i = 0; $i < $l; $i ++) {
		$str .= $c [rand ( 0, 100 ) % strlen ( $c )];
	}
	return $str;
}
$img_data = $_FILES ['file'] ['tmp_name'];
$dest = NULL; // 图片路径
$thumb_path = NULL; // 缩略图路径
$md5 = md5_file ( $img_data );
$pic = exsistInDB ( $dbh, $md5 ); // 在数据库中查找是否存在MD5一致的文件
if (! isset ( $pic )) {
	$img_name = $_FILES ['file'] ['name']; // 图片名
	$uploadPath = $_SERVER ["DOCUMENT_ROOT"] . "/uploadfile/images/";
	$dest = $uploadPath . time () . '_' . generate_name ( 5 ) . '.' . end ( explode ( '.', $img_name ) ); // 设置文件名为时间戳加上随机数
	if (! move_uploaded_file ( $img_data, $dest )) {
		echo "false";
		exit ();
	}
	chmod ( $dest, 0777 ); // 设置上传的文件属性
	/* ----------以下处理缩略图------------------- */
	$thumb_path = resize ( $dest, 110, 110 );
	$pic = new Picture ();
	$pic->md5 = md5_file ($dest);
	$pic->path = substr($dest, strlen($_SERVER["DOCUMENT_ROOT"]));
	$pic->thumb_path = substr($thumb_path, strlen($_SERVER["DOCUMENT_ROOT"]));
	$pic->model_id = 1;
	$sql = "INSERT INTO b_pictures(path,thumb_path,md5,model_id) VALUES(:path,:thumbPath,:md5,:modelId)";
	$stmt = $dbh->prepare ( $sql );
	$stmt->bindValue ( ":path", $pic->path );
	$stmt->bindValue ( ":thumbPath", $pic->thumb_path );
	$stmt->bindValue ( ":md5", $pic->md5 );
	$stmt->bindValue ( ":modelId", $pic->model_id );
	$stmt->execute ();
	$pic->id = $dbh->lastInsertId ();
	if (! isset ( $pic->id )) {
		echo "db error";
		exit ();
	}
}
var_dump ( $pic );
function exsistInDB($dbh, $md5) {
	$sql = "select * from b_pictures where md5=:md5";
	$stmt = $dbh->prepare ( $sql );
	$stmt->bindValue ( ":md5", $md5 );
	$stmt->execute ();
	$pic = NULL;
	if ($row = $stmt->fetch ( PDO::FETCH_ASSOC )) {
		$pic = new Picture ( $row ['id'], $row ['path'], $row ['thumb_path'], $row ['md5'], $row ['model_id'] );
		return $pic;
	} else {
		return null;
	}
}
?>