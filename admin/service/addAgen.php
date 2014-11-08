<?php
// 新增和更新
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if (! isset ( $_POST ['modelId'] )) {
	exit ( "param modelId is require!" );
}
$agen = new Agen ();
if (isset ( $_POST ['id'] )) {
	$agen->id = $_POST ['id'];
}
$agen->modelId = $_POST ['modelId'];
$agen->agenName = $_POST ['agenName'];
if (isset ( $_POST ['agenInfo'] )) {
	$agen->agenInfo = $_POST ['agenInfo'];
}else{
	$agen->agenInfo="";
}
if (isset ( $agen->id ) && $agen->id != "") { // 指定id则为修改逻辑
	try {
		$sql = "update b_agen set model_id=:modelId,agen_name=:agenName,agen_info=:agenInfo where id=:id";
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute ( array (
				":id" => $agen->id,
				":modelId" => $agen->modelId,
				":agenName" => $agen->agenName,
				":agenInfo" => $agen->agenInfo 
		) );
		echo json_encode ( array (
				"success" => true,
				"data" => $agen 
		) );
	} catch ( Exception $e ) {
		echo json_encode ( array (
				"success" => false 
		) );
	}
} else { // 位置定id 则说明是新添加的
	$sql = "select max(sort_id) max from b_agen where model_id=:modelId";
	$stmt = $dbh->prepare ( $sql );
	$stmt->execute ( array (
			":modelId" => $agen->modelId 
	) );
	if ($row = $stmt->fetch ( PDO::FETCH_ASSOC )) {
		$agen->sortId = $row ['max'] + 1;
	} else {
		$agen->sortId = 1;
	}
	try {
		$sql = "insert into b_agen(id,model_id,agen_name,agen_info,sort_id) value(null,:modelId,:agenName,:agenInfo,:sortId)";
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute ( array (
				":modelId" => $agen->modelId,
				":agenName" => $agen->agenName,
				":agenInfo" => $agen->agenInfo,
				":sortId" => $agen->sortId 
		) );
		$agen->id = $dbh->lastInsertId ();
		echo json_encode ( array (
				"success" => true,
				"data" => $agen 
		) );
	} catch ( Exception $e ) {
		echo json_encode ( array (
				"success" => false 
		) );
	}
}
?>