<?php
$dbh = new PDO('mysql:host=localhost;dbname=book', 'root', 'root');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
if(empty($dbh))
{
	die('Could not connect: '.mysql_error());
}
?>