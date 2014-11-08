<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
header ( "Content-type: text/html; charset=utf-8" );
if (isset ( $_GET ["modelId"] )) {
	$modelId = $_GET ["modelId"];
	$sql = "select * from b_pictures where model_id=:modelId";
	$stmt = $dbh->prepare ( $sql );
	$stmt->bindParam ( ":modelId", $modelId );
	$stmt->execute ();

	$picArr = array ();
	$i = 0;
	while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
		$pic = new Picture ();
		$pic->id = $row ['id'];
		$pic->path = $row ['path'];
		$pic->thumb_path = $row ['thumb_path'];
		$pic->link = $row ['link'];
		$pic->md5 = $row ['md5'];
		$pic->model_id = $row ['model_id'];
		$picArr [$i] = $pic;
		$i ++;
	}
	//var_dump ( $picArr );
	for($j = 0; $j < sizeof ( $picArr ); $j ++) {
		echo "<li class='li_01'><a href='' alt='点击了解更多'><span class='pic_0".($j+1)."' style='background:url(".$base.$picArr[$j]->path.") no-repeat center 0;'></span></a></li>";
	}
} else {
	exit ( "缺少GET参数ModelId,请<a href='javascript:history.back()'>返回</a>" );
}
?>