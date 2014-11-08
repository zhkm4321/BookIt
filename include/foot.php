<div class="foot_link">
	<div class="link_con layer">
    	<div class="con_li">
        	<h4>友情链接</h4>
            <p><?=$_SESSION["FRIENDLYLINK"]?></p>
        </div>
        <div class="con_li">
        	<h4>联系我们</h4>
            <p class="p_r"><?=$_SESSION["CONTACTUS"]?></p>
        </div>
        <div class="con_web">
        	<img src="<?=$base ?>/res/images/wx.png"><br>关注微博
        </div>
        <div class="con_web">
        	<img src="<?=$base ?>/res/images/wx.png"><br>关注微信
        </div>
    </div>
</div>
<div class="foot_word"><?=$_SESSION["FOOTCONTENT"]?></div>
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
		<div class="dl_btn">
			<input name="submit" type="submit" value="登 录" />
		</div>
		<div class="dl_sm">请使用您预定时填写的邮箱地址和密码登录</div>
	</div>
	</form>
</div>