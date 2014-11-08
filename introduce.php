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
if(isset($_GET["action"])){
	$_SESSION['type']=$_GET["action"];
}else{
	$_SESSION['type']="zjtj";
}
if(isset($_GET["id"])){
	$_SESSION['bookId']=$_GET["id"];
}
$sql=NULL;
if(isset($_SESSION['bookId'])){
	$sql = "SELECT * FROM b_book where id=:id";
}else{
	$sql = "SELECT * FROM b_book order by id desc limit 1";
}
$stmt = $dbh->prepare ( $sql );
if(isset($_SESSION['bookId'])){
	$stmt->execute (array(":id"=>$_SESSION['bookId']));
}else{
	$stmt->execute ();
}
$book=NULL;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$book=new Book ();
	$book->id = $row ["id"];
	$book->name = $row ["name"];
	$book->author = $row ["author"];
	$book->zjtj = $row ["zjtj"];
	$book->nrjs = $row ["nrjs"];
	$book->zyzj = $row ["zyzj"];
	$book->jczy = $row ["jczy"];
}
//var_dump($book);
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
        	<div class="lum_left">
            	<h3 class="fl_til" value="zjtj">专家推荐</h3>
            	<h3 class="fl_til" value="nrjj">内容简介</h3>
            	<h3 class="fl_til" value="zyzj">主要章节</h3>
            	<h3 class="fl_til" value="jczy">精彩摘要</h3>
            </div>
            <div class="lum_right">
            	<h2 class="r_title">专家推荐</h2>
                <div class="td_infor">
                    <?php
						if($_SESSION['type']=="zjtj"){
							echo htmlspecialchars_decode($book->zjtj);
						}else if($_SESSION['type']=="nrjj"){
							echo htmlspecialchars_decode($book->nrjs);
						}else if($_SESSION['type']=="zyzj"){
							echo htmlspecialchars_decode($book->zyzj);
						}else if($_SESSION['type']=="jczy"){
							echo htmlspecialchars_decode($book->jczy);
						}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 内容 end-->
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/foot.php'?>
<a class="goTop" href="javascript:void(0);"></a>
<script type="text/javascript" charset="utf-8" src="<?=$jquery?>"></script>
<script type="text/javascript" charset="utf-8" src="<?=$base ?>/res/javascrips/global.js"></script>
<script>
	$(document).ready(function(){
		$('h3.fl_til').click(function(){
			window.location.href=window.location.href.substring(0,window.location.href.indexOf('?'))+"?action="+$(this).attr("value");
		});
		var type="<?=$_SESSION['type']?>"
		if(type=="zjtj"){
			$(".lum_left h3:eq(0)").addClass("fl_current");
			$(".r_title").text("专家推荐");
		}else if(type=="nrjj"){
			$(".lum_left h3:eq(1)").addClass("fl_current");
			$(".r_title").text("内容介绍");
		}else if(type=="zyzj"){
			$(".lum_left h3:eq(2)").addClass("fl_current");
			$(".r_title").text("主要章节");
		}else if(type=="jczy"){
			$(".lum_left h3:eq(3)").addClass("fl_current");
			$(".r_title").text("精彩摘要");
		}
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
