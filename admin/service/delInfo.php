<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if(!isset($_POST['action'])){
    echo "FALSE";
    exit;
}
if ($_POST['action']=='delAll')
{
    $id=$_POST['Arr'];
    $stmt=$dbh->query('SELECT info_title_img FROM b_info WHERE id in ('.$id.')');
    while(list($info_title_img)=$stmt->fetch(PDO::FETCH_NUM)){
		if(file_exists($droot.$info_title_img)){
			unlink($droot.$info_title_img);
		}
	}
    if($dbh->query('DELETE FROM b_info WHERE id in ('.$id.')')){
		exit("TRUE");
    }
}else if($_POST['action']=='one'){
    $_POST['Uid']?$id=$_POST['Uid']:exit('FALSE');
    $stmt=$dbh->query('SELECT info_title_img FROM b_info WHERE id='.$id);
    if(list($info_title_img)=$stmt->fetch(PDO::FETCH_NUM)){
		if(file_exists($droot.$info_title_img)){
			unlink($droot.$info_title_img);
		}
	}
    if($dbh->query('DELETE FROM b_info WHERE id in ('.$id.')')){
        exit("TRUE");
    }
}
?>
