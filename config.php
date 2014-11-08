<?php
    include $_SERVER["DOCUMENT_ROOT"].'/common/CharsetTools.php';
    $filename = $_SERVER["DOCUMENT_ROOT"]."/config.json";
    $fileJson = compress_html(file_get_contents($filename));
    $opt=json_decode($fileJson);
    $droot=$opt->droot;
    $base="http://".$opt->host.$opt->base;
    $siteName=$opt->siteName;
    include $_SERVER["DOCUMENT_ROOT"].'/common/conn.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/user.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/book.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/order.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/model.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/picture.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/employee.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/agen.php';
    include $_SERVER["DOCUMENT_ROOT"].'/common/info.php';
    $jquery=$opt->jquery;
    unset($opt);
    session_start();//要放在类定义之后
    if(!isset($_SESSION["FOOTCONTENT"])){
    	$_SESSION["FOOTCONTENT"] = file_get_contents($droot.'/copyright.txt');
    }
    if(!isset($_SESSION["FRIENDLYLINK"])){
    	$_SESSION["FRIENDLYLINK"] = file_get_contents($droot.'/friendlylink.txt');
    }
    if(!isset($_SESSION["CONTACTUS"])){
    	$_SESSION["CONTACTUS"] = file_get_contents($droot.'/contactus.txt');
    }
?>
