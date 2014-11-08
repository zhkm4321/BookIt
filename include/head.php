<!-- 头部 begin-->
<div class="head">
	<table cellpadding="0" cellspacing="0" border="0" class="head_td">
		<tr>
			<td class="td_bg">&nbsp;</td>
			<td class="td_logo" width="497">&nbsp;</td>
			<td class="td_bg">&nbsp;</td>
		</tr>
	</table>
	<div class="head_title"><span><?=$_SESSION['PAGETITLE']?></span>ITSS标准解读系列丛书</div>
	<div class="head_cz">
		<?php
		if(isset($_SESSION["user"])){
			echo '<a href="javascript:void(0);" class="dc">你好：'.$_SESSION["user"]->realname.'</a>';
		}else{
			echo '<a href="javascript:void(0);" class="dl">登录</a>';
		}
		?>
		<a title="设为首页" class="home" href="javascript:void(0);">设为首页</a><a href="javascript:void(0);" class="about">关于我们</a>
	</div>
</div>
<!-- 头部 end-->