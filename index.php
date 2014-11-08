<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$_SESSION['PAGETITLE']="";
$user=NULL;
if(isset($_SESSION["user"])){
	$user=$_SESSION["user"];
}
$infoArr=array();
//查询资讯列表
$sql = "SELECT * FROM b_info where model_id=:modelId order by info_create_date desc limit 0,6";
$stmt = $dbh->prepare ( $sql );
$stmt->execute (array("modelId"=>5));
$i = 0;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$info = new Info ();
	$info->id = $row ["id"];
	$info->model_id = $row ["model_id"];
	$info->info_title=$row["info_title"];
	$info->info_content = $row ["info_content"];
	$info->info_title_img = $row ["info_title_img"];
	$info->info_create_date = $row ["info_create_date"];
	$info->info_sort_date = $row ["info_sort_date"];
	$infoArr [$i] = $info;
	$i ++;
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>易服通惠 - 首页</title>
<link href="<?=$base ?>/res/css/reset.css" rel="stylesheet" type="text/css" />
<Link href="<?=$base ?>/res/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/home.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php include $_SERVER["DOCUMENT_ROOT"].'/include/head.php'?>
	<!-- 内容 begin-->
	<div class="content">
		<div class="full_screen">
			<div class="js_fullscreen_banner">
				<ul class="con" id="pic_banner">
					<?php include $_SERVER ["DOCUMENT_ROOT"] . '/front/getIndexPic.php';?>
				</ul>
				<div class="d_btn">
					<span class="sp_pre">前一张</span> <span class="sp_next">后一张</span>
				</div>
				<ul class="index">
					<li class="on"><a href="javascript:void(0);"></a></li>
					<li><a href="javascript:void(0);"></a></li>
					<li><a href="javascript:void(0);"></a></li>
					<li><a href="javascript:void(0);"></a></li>
				</ul>
				<!-- index end -->
			</div>
			<!-- js_fullscreen_banner end -->
		</div>
		<!-- full_screen end -->
		<div class="sy_con layer">
			<div class="con_link layer">
				<a href="<?=$base?>/booklist.php" target="_blank"><img src="<?=$base ?>/res/images/plink_01.jpg"></a>
				<a href="<?=$base?>/team.php" target="_blank"><img src="<?=$base ?>/res/images/plink_02.jpg"></a>
				<a href="<?=$base?>/cooperation.php" target="_blank"><img src="<?=$base ?>/res/images/plink_03.jpg"></a>
			</div>
			<div class="gd_images">
				<a href="javascript:void(0)" class="btn_img left_btn" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"></a>
				<div class="mar_con" id="ISL_Cont">
					<div style="width: 100000px;">
						<div id="List1">
							<?php
							for ($j = 0; $j < sizeof($infoArr); $j++) {
								echo "<div class=\"pic\">";
								echo "<a href=\"".$base."/info.php?id=".$infoArr[$j]->id."\" target=\"_blank\"><img src=\"".$base.$infoArr[$j]->info_title_img."\" class=\"pic_img\" /></a>";
								echo "<div class=\"pic_ms\">";
								echo "<h3><a href=\"".$base."/info.php?id=".$infoArr[$j]->id."\" target=\"_blank\">".strCut($infoArr[$j]->info_title,27)."</a></h3>";
								echo "<p>".htmlCut($infoArr[$j]->info_content,38)."</p>";
								echo "<h4>".date('Y-m-d',$infoArr[$j]->info_create_date)."</h4>";
								echo "</div></div>";
							}
							?>
						</div>
						<div id="List2"></div>
					</div>
				</div>
				<a href="javascript:void(0)" class="btn_img right_btn" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"></a>
			</div>
		</div>
	</div>
	<?php include $_SERVER["DOCUMENT_ROOT"].'/include/foot.php'?>

	<script type="text/javascript" charset="utf-8" src="<?=$jquery?>"></script>
	<script type="text/javascript" charset="utf-8" src="<?=$base ?>/res/javascrips/banner.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?=$base ?>/res/javascrips/global.js"></script>
	<script type="text/javascript">
		$(".js_fullscreen_banner").addBanner({
			effect : "twin",
			index : 0,
			selectedClass : "on",
			classType : "only",
			mouseType : "click",
			tweenTime : 1000,
			delay : 4000,
			autoPlay : true,
			handlePrev:".sp_pre",
			handleNext:".sp_next",
			ease : "swing",
			isVertical:false,
			isFullScreen:true,
			callBack : function(index){

				},
			handleContain:".d_btn"
		});
</script>
	<script language="javascript" type="text/javascript">
//图片滚动列表 mengjia 070816
var Speed = 10; //速度(毫秒)
var Space = 5; //每次移动(px)
var PageWidth = 310; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false;
var MoveTimeObj;
var Comp = 0;
var AutoPlayObj = null;
GetObj("List2").innerHTML = GetObj("List1").innerHTML;
GetObj('ISL_Cont').scrollLeft = fill;
GetObj("ISL_Cont").onmouseover = function(){clearInterval(AutoPlayObj);}
GetObj("ISL_Cont").onmouseout = function(){AutoPlay();}
AutoPlay();
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}}
function AutoPlay(){ //自动滚动
 clearInterval(AutoPlayObj);
 AutoPlayObj = setInterval('ISL_GoDown();ISL_StopDown();',2000); //间隔时间
}
function ISL_GoUp(){ //上翻开始
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 MoveTimeObj = setInterval('ISL_ScrUp();',Speed);
}
function ISL_StopUp(){ //上翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0){
  Comp = fill - (GetObj('ISL_Cont').scrollLeft % PageWidth);
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrUp(){ //上翻动作
 if(GetObj('ISL_Cont').scrollLeft <= 0){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft + GetObj('List1').offsetWidth}
 GetObj('ISL_Cont').scrollLeft -= Space ;
}
function ISL_GoDown(){ //下翻
 clearInterval(MoveTimeObj);
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 ISL_ScrDown();
 MoveTimeObj = setInterval('ISL_ScrDown()',Speed);
}
function ISL_StopDown(){ //下翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0 ){
  Comp = PageWidth - GetObj('ISL_Cont').scrollLeft % PageWidth + fill;
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrDown(){ //下翻动作
 if(GetObj('ISL_Cont').scrollLeft >= GetObj('List1').scrollWidth){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft - GetObj('List1').scrollWidth;}
 GetObj('ISL_Cont').scrollLeft += Space ;
}
function CompScr(){
 var num;
 if(Comp == 0){MoveLock = false;return;}
 if(Comp < 0){ //上翻
  if(Comp < -Space){
   Comp += Space;
   num = Space;
  }else{
   num = -Comp;
   Comp = 0;
  }
  GetObj('ISL_Cont').scrollLeft -= num;
  setTimeout('CompScr()',Speed);
 }else{ //下翻
  if(Comp > Space){
   Comp -= Space;
   num = Space;
  }else{
   num = Comp;
   Comp = 0;
  }
  GetObj('ISL_Cont').scrollLeft += num;
  setTimeout('CompScr()',Speed);
 }
}
</script>
</body>
</html>
