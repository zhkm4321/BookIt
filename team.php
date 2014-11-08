<?php
/*
 * Created on 2014-11-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$_SESSION['PAGETITLE']="编写团队";
$user=NULL;
if(isset($_SESSION["user"])){
	$user=$_SESSION["user"];
}
$sql = "select * from b_team where id=1 limit 1";
$stmt = $dbh->prepare ( $sql );
$stmt->execute ();
$teamInfo = NULL;//团队简介
if ($row = $stmt->fetch ( PDO::FETCH_ASSOC )) {
	$teamInfo = $row ["team_info"];
}
//查询团队成员
function findEmpByJob($jobId){
	$filename = $_SERVER["DOCUMENT_ROOT"]."/config.json";
	$fileJson = compress_html(file_get_contents($filename));
    $opt=json_decode($fileJson);
	include $_SERVER ["DOCUMENT_ROOT"] . '/common/conn.php';
	$sql = "select * from b_employee where job=:jobId order by sort_id asc";
	$stmt = $dbh->prepare ( $sql );
	$stmt->execute ( array (
			':jobId' => $jobId
	) );
	$stmt->execute ();
	$teamInfo = NULL;
	$empArr [] = NULL; // 存放雇员列表
	$i = 0;
	while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
		$emp = new Employee ();
		$emp->id = $row ['id'];
		$emp->realname = $row ['realname'];
		$emp->organization = $row ['organization'];
		$emp->info = $row ['info'];
		$emp->job = $row ['job'];
		$emp->sculpture = $row ['sculpture'];
		$empArr [$i] = $emp;
		$i ++;
	}
	unset($opt);
	unset($fileJson);
	unset($filename);
	unset($dbh);
	return $empArr;
}
function findEmpById($id){
	$filename = $_SERVER["DOCUMENT_ROOT"]."/config.json";
	$fileJson = compress_html(file_get_contents($filename));
    $opt=json_decode($fileJson);
	include $_SERVER ["DOCUMENT_ROOT"] . '/common/conn.php';
	$sql = "select * from b_employee where id=:id";
	$stmt = $dbh->prepare ( $sql );
	$stmt->execute ( array (
			':id' => $id
	) );
	$stmt->execute ();
	$teamInfo = NULL;
	$i = 0;
	$emp = new Employee ();
	if ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
		$emp->id = $row ['id'];
		$emp->realname = $row ['realname'];
		$emp->organization = $row ['organization'];
		$emp->info = $row ['info'];
		$emp->job = $row ['job'];
		$emp->sculpture = $row ['sculpture'];
	}
	unset($opt);
	unset($fileJson);
	unset($filename);
	unset($dbh);
	return $empArr;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$_SESSION['PAGETITLE']?></title>
<link href="<?=$base ?>/res/css/reset.css" rel="stylesheet" type="text/css" />
<Link href="<?=$base ?>/res/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/column.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/home.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include $_SERVER["DOCUMENT_ROOT"].'/include/head.php'
?>
<!-- 内容 begin-->
<div class="content">
	<div class="column_con con_td layer">
    	<div class="lum_content layer">
        	<div class="lum_left">
            	<h3 class="fl_til">编写团队</h3>
                <div class="p_list">
                	<a href="team.php" class="current">团队介绍</a>
                </div>
            	<h3 class="fl_til">主编</h3>
                <div class="p_list">
                <?php
                	$zb=findEmpByJob(1);
                	for ($i = 0; $i < sizeof($zb); $i++) {
						echo "<a href=\"emp.php?id=".$zb[$i]->id."\">".$zb[$i]->realname."</a>";
					}
                ?>
                </div>
            	<h3 class="fl_til">副主编</h3>
                <div class="p_list">
                <?php
                	$fzb=findEmpByJob(2);
                	for ($i = 0; $i < sizeof($fzb); $i++) {
						echo "<a href=\"emp.php?id=".$fzb[$i]->id."\">".$fzb[$i]->realname."</a>";
					}
                ?>
                </div>
            	<h3 class="fl_til">策划编辑</h3>
                <div class="p_list">
                <?php
                	$chbj=findEmpByJob(3);
                	for ($i = 0; $i < sizeof($chbj); $i++) {
						echo "<a href=\"emp.php?id=".$chbj[$i]->id."\">".$chbj[$i]->realname."</a>";
					}
                ?>
                </div>
            </div>
            <div class="lum_right">
            	<h2 class="l_title">编写团队</h2>
                <div class="td_infor">
                	<?=$teamInfo?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 end-->
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/foot.php'?>
<script type="text/javascript" src="<?=$jquery?>"></script>
<script type="text/javascript" src="<?=$base ?>/res/javascrips/global.js"></script>
<script>
var empArr = [];
$(document).ready(function(){
	$.ajax({
	    type : 'GET',
	    url : "<?=$base?>/admin/service/findEmpListByJob.php",
	    success : function(data) {
			if (data[0] != null) {
			    $(data).each(function(i, n) {
					empArr.push(n);
				});
			}
	    },
	    dataType : "json"
	});
})
</script>
</body>
</html>