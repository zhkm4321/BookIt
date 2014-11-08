<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$user = $_SESSION ['user'];
if (! isset ( $user )) {
	header ( "Location: /admin/login/index.php" );
	exit;
}

if(!isset($_GET['eId'])){
    echo json_encode(array("success"=>false));
    exit;
}
$eId=$_GET['eId'];
if($dbh->query('DELETE FROM b_employee WHERE id='.$eId)){
   exit(json_encode(array("success"=>true,"id"=>$eId)));
}
?>
