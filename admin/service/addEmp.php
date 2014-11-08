<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if (! isset ( $_POST ['jobId'] )) {
	exit ( "param jobId is require!" );
}
$emp=new Employee();
if(isset($_POST ['eId'])){
	$emp->id = $_POST ['eId']==""?NULL:$_POST ['eId'];
}
$emp->realname = $_POST ['realname'];
$emp->organization = $_POST ['organization'];
$emp->info = $_POST ['info'];
$emp->job = $_POST ['jobId'];
$emp->sculpture = $_POST ['picture'];
if (isset ($emp->id)) {//指定eId则为修改逻辑
	try {
		$sql = "update b_employee set realname=:realname,organization=:organization,info=:info,job=:job,sculpture=:sculpture where id=:eId";
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute ( array (
				":eId" => $emp->id,
				":realname" => $emp->realname,
				":organization" => $emp->organization,
				":info" => $emp->info,
				":job" => $emp->job,
				":sculpture" => $emp->sculpture
		));
		echo json_encode ($emp);
	}catch (Exception $e){
		echo $e;
	}
}else{//位置定eId 则说明是新添加的
	$sql = "select max(sort_id) max from b_employee where job=:job";
	$stmt = $dbh->prepare ( $sql );
	$stmt->execute (  array (":job"=> $emp->job));
	if( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ){
		$emp->sort_id=$row['max']+1;
	}
	try {
		$sql = "insert into b_employee(id,realname,organization,info,job,sculpture,sort_id) value(null,:realname,:organization,:info,:job,:sculpture,:sortId)";
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute ( array (
				":realname" => $emp->realname,
				":organization" => $emp->organization,
				":info" => $emp->info,
				":job" => $emp->job,
				":sculpture" => $emp->sculpture,
				":sortId" => $emp->sort_id
		));
		$emp->id=$dbh->lastInsertId();
		echo json_encode ($emp);
	}catch (Exception $e){
		echo $e;
	}
}
?>