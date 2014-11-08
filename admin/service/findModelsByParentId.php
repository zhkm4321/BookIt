<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if (! isset ( $_GET ['pId'] )) {
	exit ( "param pId is require!" );
}
try {
	$sql = "select * from b_model where parent_id=:pId order by sortId asc";
	$stmt = $dbh->prepare ( $sql );
	$stmt->execute ( array (
			':pId' => $_GET ['pId'] 
	) );
	$stmt->execute ();
	$modelArr [] = NULL; // 存放雇员列表
	$i = 0;
	while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
		$mod = new Model ();
		$mod->id = $row ['id'];
		$mod->parentId=$row ['parent_id'];
		$mod->modelName = $row ['model_name'];
		$mod->path = $row ['path'];
		$modelArr [$i] = $mod;
		$i ++;
	}
	echo json_encode ( array("success"=>true,"data"=>$modelArr));
}catch (Exception $e){
	echo json_encode ( array("success"=>false));
}
?>