<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if(!isset($_POST['action'])){
    echo "FALSE";
    exit;
}
if ($_POST['action']=='delAll')
{
    $id=$_POST['Arr'];
    if($dbh->query('DELETE FROM b_agen WHERE id in ('.$id.')')){
      exit("TRUE");
    }
}else if($_POST['action']=='one'){
    $_POST['Uid']?$id=$_POST['Uid']:exit('FALSE');
    if($dbh->query('DELETE FROM b_agen WHERE id in ('.$id.')')){
        exit("TRUE");
    }
}
?>
