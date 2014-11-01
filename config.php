<?php
	include $_SERVER["DOCUMENT_ROOT"].'/common/CharsetTools.php';
	$filename = $_SERVER["DOCUMENT_ROOT"]."/config.json";
	$fileJson = compress_html(file_get_contents($filename));
	$opt=json_decode($fileJson);
	$droot=$opt->droot;
	$base=$opt->base;
	$siteName=$opt->siteName;
	include $_SERVER["DOCUMENT_ROOT"].'/common/conn.php';
	include $_SERVER["DOCUMENT_ROOT"].'/common/user.php';
	include $_SERVER["DOCUMENT_ROOT"].'/common/book.php';
	include $_SERVER["DOCUMENT_ROOT"].'/common/order.php';
	include $_SERVER["DOCUMENT_ROOT"].'/common/model.php';
	include $_SERVER["DOCUMENT_ROOT"].'/common/picture.php';
?>