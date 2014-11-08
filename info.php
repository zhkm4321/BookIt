<?php
/*
 * Created on 2014-11-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$_SESSION['PAGETITLE']="资讯";
$user=NULL;
if(isset($_SESSION["user"])){
	$user=$_SESSION["user"];
}
$sql = "SELECT * FROM b_info where id=:id limit 1";
$stmt = $dbh->prepare ( $sql );
$stmt->execute (array(":id"=>$_GET["id"]));
$info = new Info ();
if ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$info->id = $row ["id"];
	$info->model_id = $row ["model_id"];
	$info->info_title=$row["info_title"];
	$info->info_author=$row["info_author"];
	$info->info_content = $row ["info_content"];
	$info->info_create_date = $row ["info_create_date"];
	$info->info_sort_date = $row ["info_sort_date"];
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$info->info_title?> - <?=$_SESSION['PAGETITLE']?></title>
//<link href="<?=$base ?>/res/css/reset.css" rel="stylesheet" type="text/css" />
<Link href="<?=$base ?>/res/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/column.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/home.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/head.php'?>
<!-- 内容 begin-->
<div class="content">
	<div class="column_con con_wz layer">
    	<div class="lum_content layer">
        	<h3 class="dh_nav"><a href="<?=$base?>">首页</a>&nbsp;>&nbsp;资讯</h3>
            <div class="lum_con">
            	<h2 class="r_title"><?=$info->info_title?></h2>
            	<div class="td_time">作者：<?=$info->info_author==null?'本站编辑':$info->info_author ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发文日期：<?=date('Y-m-d',$info->info_create_date)?></div>
                <div class="td_infor">
                    <?=$info->info_content?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 end-->
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/foot.php'?>
<a class="goTop" href="javascript:void(0);"></a>
<script type="text/javascript" src="<?=$jquery?>"></script>
<script type="text/javascript" src="<?=$base ?>/res/javascrips/global.js"></script>
<script type="text/javascript">
$(function(){
	$(".goTop").click(function(){
			$('html,body').animate({scrollTop: '0px'}, 500);
		});
  $(window).scroll(function(){
			if($(window).scrollTop()>800){
				if($(".goTop").is(":hidden")){
					$(".goTop").fadeIn(300);
				}
			}else{
				if(!$(".goTop").is(":hidden")){
					$(".goTop").fadeOut(300);
				}
			}
});
});
</script>

</body>
</html>
