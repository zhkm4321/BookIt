<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
session_start ();
$user=NULL;
if(isset($_SESSION["user"])){
	$user=$_SESSION["user"];
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>易服通惠 - 首页</title>
<link href="<?=$base ?>/res/css/reset.css" rel="stylesheet" type="text/css" />
<Link href="<?=$base ?>/res/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?=$base ?>/res/css/home.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- 头部 begin-->
	<div class="head">
		<table cellpadding="0" cellspacing="0" border="0" class="head_td">
			<tr>
				<td class="td_bg">&nbsp;</td>
				<td class="td_logo" width="497">&nbsp;</td>
				<td class="td_bg">&nbsp;</td>
			</tr>
		</table>
		<div class="head_title">ITSS运维通用要求解读与应用</div>
		<div class="head_cz">
			<?php
			if(isset($user)){
				echo '<a href="javascript:void(0);" class="dc">你好：'.$user->realname.'</a>';
			}else{
				echo '<a href="javascript:void(0);" class="dl">登录</a>';
			}
			?>
			<a title="设为首页" class="home" href="javascript:void(0);">设为首页</a><a href="javascript:void(0);" class="about">关于我们</a>
		</div>
	</div>
	<!-- 头部 end-->
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
				<a href="#"><img src="<?=$base ?>/res/images/plink_01.jpg"></a> <a href="#"><img src="<?=$base ?>/res/images/plink_02.jpg"></a> <a href="#"><img
					src="<?=$base ?>/res/images/plink_03.jpg"></a>
			</div>
			<div class="gd_images">
				<a href="javascript:void(0)" class="btn_img left_btn" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"></a>
				<div class="mar_con" id="ISL_Cont">
					<div style="width: 100000px;">
						<div id="List1">
							<div class="pic">
								<img src="<?=$base ?>/res/images/xpic01.jpg" class="pic_img" />
								<div class="pic_ms">
									<h3>文章标题文字</h3>
									<p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容...</p>
									<h4>2014-06-15</h4>
								</div>
							</div>
							<div class="pic">
								<img src="<?=$base ?>/res/images/xpic02.jpg" class="pic_img" />
								<div class="pic_ms">
									<h3>文章标题文字</h3>
									<p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容...</p>
									<h4>2014-06-15</h4>
								</div>
							</div>
							<div class="pic">
								<img src="<?=$base ?>/res/images/xpic03.jpg" class="pic_img" />
								<div class="pic_ms">
									<h3>文章标题文字</h3>
									<p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容...</p>
									<h4>2014-06-15</h4>
								</div>
							</div>
						</div>
						<div id="List2"></div>
					</div>
				</div>
				<a href="javascript:void(0)" class="btn_img right_btn" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"></a>
			</div>
		</div>
	</div>
	<!-- 内容 end-->
	<div class="foot_link">
		<div class="link_con layer">
			<div class="con_li">
				<h4>友情链接</h4>
				<p>
					<a href="#">中关村在线</a> <a href="#">电脑包</a> <a href="#">电子计算机硬件与技术</a>
				</p>
			</div>
			<div class="con_li">
				<h4>联系我们</h4>
				<p class="p_r">
					地址：xxx<br> 邮箱：xxx<br> 电话：xxx
				</p>
			</div>
			<div class="con_web">
				<img src="<?=$base ?>/res/images/wx.png"><br>关注微博
			</div>
			<div class="con_web">
				<img src="<?=$base ?>/res/images/wx.png"><br>关注微信
			</div>
		</div>
	</div>
	<div class="foot_word">版权信息文字</div>
	<!--蒙灰开始-->
	<div class="menghui" id="menghui">
		<iframe width="100%" height="99%" class="iframe" frameborder="0" marginheight="0" marginwidth="0"></iframe>
	</div>
	<!--蒙灰结束-->

	<div class="tc_ceng" id="dl">
		<div class="tc_til">
			<a href="javascript:void(0)"><img src="<?=$base ?>/res/images/close.png" class="close" /></a>
		</div>
		<form id="loginForm" action="/front/login.php" method="post">
		<div class="dl_k">
			<h3>邮箱：</h3>
			<input name="username" type="text" class="dl_input" />
			<h3>密码：</h3>
			<input name="password" type="password" class="dl_input" />
			<div class="error">
				<span>用户名或密码错误，请重新输入</span>
			</div>
			<div class="dl_btn">
				<input name="submit" type="submit" value="登 录" />
			</div>
			<div class="dl_sm">请使用您预定时填写的邮箱地址和密码登录</div>
		</div>
		</form>
	</div>
	<script type="text/javascript" src="<?=$base ?>/res/javascrips/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?=$base ?>/res/javascrips/banner.min.js"></script>
	<script type="text/javascript" src="<?=$base ?>/res/javascrips/global.js"></script>
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
