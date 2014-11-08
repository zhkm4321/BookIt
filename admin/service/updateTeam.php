<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$id=NULL;
$info=NULL;
if (! isset ( $_POST ['id'] )) {
	exit ( "param id is require!" );
}else{
	$id=$_POST ['id'];
}
if(isset($_POST ['content'])){
	$info=$_POST ['content'];
}
if (isset ($id)) {//指定eId则为修改逻辑
	try {
		$sql = "update b_team set team_info=:info where id=:id";
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute ( array (
				":id" => $id,":info" => $info
		));
		echo json_encode (array("success"=>true));
	}catch (Exception $e){
		echo json_encode (array("success"=>false));
	}
}
?>