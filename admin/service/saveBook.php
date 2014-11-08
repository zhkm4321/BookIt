<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if (! isset ( $_POST ["id"] )) {
	echo "需要GET参数ID";
	exit ();
}
$book = new Book ();
$book->id = $_POST ["id"];
$book->name=$_POST["bookName"];
$book->author=$_POST["author"];
$book->cover=$_POST["cover"];
$book->zjtj = htmlspecialchars ( $_POST ["zjtj"] );
$book->nrjs = htmlspecialchars ( $_POST ["nrjs"] );
$book->zyzj = htmlspecialchars ( $_POST ["zyzj"] );
$book->jczy = htmlspecialchars ( $_POST ["jczy"] );
//var_dump($book);
$sql = "update b_book set name=:bookName,author=:author,cover=:cover,zjtj=:zjtj,nrjs=:nrjs,zyzj=:zyzj,jczy=:jczy where id=:id";
try {
	$stmt = $dbh->prepare ( $sql );
	$stmt->bindParam ( ":id", $book->id );
	$stmt->bindParam ( ":bookName", $book->name );
	$stmt->bindParam ( ":author", $book->author );
	$stmt->bindParam ( ":cover", $book->cover );
	$stmt->bindParam ( ":zjtj", $book->zjtj );
	$stmt->bindParam ( ":nrjs", $book->nrjs );
	$stmt->bindParam ( ":zyzj", $book->zyzj );
	$stmt->bindParam ( ":jczy", $book->jczy );
	$stmt->execute ();
	echo "SUCCESS";
} catch ( PDOException $e ) {
	echo $e->getTraceAsString()."<br/>";
	echo "FLASE";
}
?>