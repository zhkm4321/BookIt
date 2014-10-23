<?php
$dbh = new PDO('mysql:host=192.168.56.1;dbname=book', 'root', 'root');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
if(empty($dbh))
{
	die('Could not connect: '.mysql_error());
}
?>