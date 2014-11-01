<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';

session_start ();
if (! isset ( $_POST ["id"] )) {
	echo "需要GET参数ID";
	exit ();
}
$book = new Book ();
$book->id = $_POST ["id"];
$book->zjtj = htmlspecialchars ( $_POST ["zjtj"] );
$book->nrjs = htmlspecialchars ( $_POST ["nrjs"] );
$book->zyzj = htmlspecialchars ( $_POST ["zyzj"] );
$book->jczy = htmlspecialchars ( $_POST ["jczy"] );
// var_dump($book);
$sql = "update b_book set zjtj=:zjtj,nrjs=:nrjs,zyzj=:zyzj,jczy=:jczy where id=:id";
try {
	$stmt = $dbh->prepare ( $sql );
	$stmt->bindParam ( ":id", $book->id );
	$stmt->bindParam ( ":zjtj", $book->zjtj );
	$stmt->bindParam ( ":nrjs", $book->nrjs );
	$stmt->bindParam ( ":zyzj", $book->zyzj );
	$stmt->bindParam ( ":jczy", $book->jczy );
	$stmt->execute ();
	echo "SUCCESS";
} catch ( PDOException $e ) {
	echo sizeof($book->zjtj)."\r\n";
	echo $e->getTraceAsString()."<br/>";
	echo "FLASE";
}
?>