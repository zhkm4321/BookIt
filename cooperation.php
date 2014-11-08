<?php
/*
 * Created on 2014-11-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$_SESSION['PAGETITLE']="合作机构";
header("Content-Type:text/html;charset=UTF-8");
unset($_SESSION['agenId']);
if(isset($_GET["id"])){
	$_SESSION['agenId']=$_GET["id"];
}
$sql=NULL;
if(isset($_SESSION['agenId'])){
	$sql = "SELECT * FROM b_agen where id=:id";
}else{
	$sql = "SELECT * FROM b_agen where model_id=6 order by sort_id asc limit 1";
}
$stmt = $dbh->prepare ( $sql );
if(isset($_SESSION['agenId'])){
	$stmt->execute (array(":id"=>$_SESSION['agenId']));
}else{
	$stmt->execute ();
}
$agen=NULL;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$agen=new Agen ();
	$agen->id = $row ["id"];
	$agen->modelId = $row ["model_id"];
	$agen->agenName = $row ["agen_name"];
	$agen->agenInfo = $row ["agen_info"];
}
$titleName=NULL;
if($agen->modelId==6){
	$titleName="发起单位";
}else if($agen->modelId==7){
	$titleName="指导单位";
}else if($agen->modelId==8){
	$titleName="战略合作单位";
}else if($agen->modelId==9){
	$titleName="支持单位";
}

function findAgenByModel($modelId){
	$filename = $_SERVER["DOCUMENT_ROOT"]."/config.json";
	$fileJson = compress_html(file_get_contents($filename));
    $opt=json_decode($fileJson);
	include $_SERVER ["DOCUMENT_ROOT"] . '/common/conn.php';
	$sql = "select * from b_agen where model_id=:modelId order by sort_id asc";
	$stmt = $dbh->prepare ( $sql );
	$stmt->execute ( array (
			':modelId' => $modelId
	) );
	$stmt->execute ();
	$agenArr [] = NULL; // 存放雇员列表
	$i = 0;
	while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
		$agen = new Agen ();
		$agen->id = $row ["id"];
		$agen->modelId = $row ["model_id"];
		$agen->agenName = $row ["agen_name"];
		$agen->agenInfo = $row ["agen_info"];
		$agenArr [$i] = $agen;
		$i ++;
	}
	unset($opt);
	unset($fileJson);
	unset($filename);
	unset($dbh);
	return $agenArr;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>合作机构</title>
<link href="<?=$base ?>/res/css/reset.css" rel="stylesheet" type="text/css" />
<Link href="<?=$base ?>/res/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/column.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/home.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/head.php'?>
<!-- 内容 begin-->
<div class="content">
	<div class="column_con con_hz layer">
    	<div class="lum_content layer">
        	<div class="lum_left">
            	<h3 class="fl_til">发起单位</h3>
                <div class="p_list">
                <?php
                	$fqdw=findAgenByModel(6);
                	for ($i = 0; $i < sizeof($fqdw); $i++) {
						echo "<a href=\"cooperation.php?id=".$fqdw[$i]->id."\" ".($agen->id==$fqdw[$i]->id?"class='current'":'').">".$fqdw[$i]->agenName."</a>";
					}
                ?>
                </div>
            	<h3 class="fl_til">指导单位</h3>
                <div class="p_list">
                <?php
                	$fqdw=findAgenByModel(7);
                	for ($i = 0; $i < sizeof($fqdw); $i++) {
						echo "<a href=\"cooperation.php?id=".$fqdw[$i]->id."\" ".($agen->id==$fqdw[$i]->id?"class='current'":'').">".$fqdw[$i]->agenName."</a>";
					}
                ?>
                </div>
            	<h3 class="fl_til">战略合作单位</h3>
                <div class="p_list">
                <?php
                	$fqdw=findAgenByModel(8);
                	for ($i = 0; $i < sizeof($fqdw); $i++) {
						echo "<a href=\"cooperation.php?id=".$fqdw[$i]->id."\" ".($agen->id==$fqdw[$i]->id?"class='current'":'').">".$fqdw[$i]->agenName."</a>";
					}
                ?>
                </div>
            	<h3 class="fl_til">支持单位</h3>
                <div class="p_list">
                <?php
                	$fqdw=findAgenByModel(9);
                	for ($i = 0; $i < sizeof($fqdw); $i++) {
						echo "<a href=\"cooperation.php?id=".$fqdw[$i]->id."\" ".($agen->id==$fqdw[$i]->id?"class='current'":'').">".$fqdw[$i]->agenName."</a>";
					}
                ?>
                </div>
            </div>
            <div class="lum_right">
            	<h2 class="r_title"><?=$titleName?></h2>
                <div class="td_infor">
                	<h4><?=$agen->agenName?></h4>
                    <?=$agen->agenInfo?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 end-->
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/foot.php'?>
<script type="text/javascript" charset="utf-8" src="<?=$jquery?>"></script>
<script type="text/javascript" charset="utf-8" src="<?=$base ?>/res/javascrips/global.js"></script>
<script>
	$(document).ready(function(){

	})
</script>
</body>
</html>
