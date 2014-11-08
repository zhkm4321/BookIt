<?php
/*
 * Created on 2014-11-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$_SESSION['PAGETITLE']="图书介绍";
header("Content-Type:text/html;charset=UTF-8");
$sql=NULL;
$sql = "SELECT * FROM b_book order by id desc";
$stmt = $dbh->prepare ( $sql );
$stmt->execute ();
$bookArr=array();
$i=0;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$book=new Book ();
	$book->id = $row ["id"];
	$book->name = $row ["name"];
	$book->cover= $row ["cover"];
	$book->author = $row ["author"];
	$book->zjtj = $row ["zjtj"];
	$book->nrjs = $row ["nrjs"];
	$book->zyzj = $row ["zyzj"];
	$book->jczy = $row ["jczy"];
	$bookArr[$i]=$book;
	$i++;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>图书介绍</title>
<link href="<?=$base ?>/res/css/reset.css" rel="stylesheet" type="text/css" />
<Link href="<?=$base ?>/res/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/column.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/home.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include $_SERVER["DOCUMENT_ROOT"].'/include/head.php'
?>
<!-- 内容 begin-->
<div class="content">
	<div class="column_con con_js layer">
    	<div class="lum_content layer">
            <div class="lum_center">
            <?php
            	for ($i = 0; $i < sizeof($bookArr); $i++) {
            		if($i==0){
            			echo "<div class=\"row\">\n";
            		}
					echo "<div class=\"book_item\">\n<a href=\"introduce.php?id=".$bookArr[$i]->id."\" target=\"_blank\">\n<img src=\"".$base.$bookArr[$i]->cover."\" alt=\"封面\"/></a>".
							"\n<h3>\n<a href=\"introduce.php?id=".$bookArr[$i]->id."\" target=\"_blank\">".$bookArr[$i]->name."</a>\n</h3>\n</div>\n";
					if(($i+1)%4==0&&($i+1)<sizeof($bookArr)){
						echo "</div>\n<div class=\"row\">\n";
					}else if(($i+1)==sizeof($bookArr)){
						echo "</div>\n";
					}
				}
            ?>
            <div style="clear:both"></div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 end-->
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/foot.php'?>
<a class="goTop" href="javascript:void(0);"></a>
<script type="text/javascript" charset="utf-8"  src="<?=$jquery?>"></script>
<script type="text/javascript" charset="utf-8"  src="<?=$base ?>/res/javascrips/global.js"></script>
<script>
	$(document).ready(function(){
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
	})
</script>
</body>
</html>
