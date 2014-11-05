<?php
$dbh = new PDO($opt->dbUrl, $opt->dbUser, $opt->dbPass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
if(empty($dbh))
{
	die('Could not connect: '.mysql_error());
}
?>