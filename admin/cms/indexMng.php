<?php
include_once $_SERVER ["DOCUMENT_ROOT"].'/config.php';
$user = $_SESSION ['user'];
if (! isset ( $user )) {
	header ( "Location: /admin/login/index.php" );
	exit ();
}
$sql = "select * from b_pictures where model_id=:modelId";
$stmt = $dbh->prepare ( $sql );
$stmt->bindParam ( "modelId", $_SESSION ["CURRENT_MODEL"] );
$stmt->execute ();
?>
<div>首页焦点滚动图</div>
<ul class="pic_list">
<?php
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
?>
<li><img src="<?=$row['thumb_path']?>" alt="图片"/></li>
<?php
}
?>
</ul>
<div id="add_pic" class="select_pic">添加</div>