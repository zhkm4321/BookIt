<?php
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$siteName?> - 后台登陆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=$base?>/admin/res/css/public_index.css" type="text/css" rel="stylesheet" />
<script src="<?=$jquery?>" type="text/javascript"></script>
<script src="<?=$base?>/admin/res/js/login_page.js" type="text/javascript"></script>
<?php
if(isset($_SESSION['msg'])){
?>
<script type="text/javascript">
$(function(){
	$("#msg").css("color","red").html("<?=$_SESSION['msg']?>");
});
</script>
<?php
}
?>
</head>
<body class="login_body">
	<div class="login">
        <div class="login_dl">
        	<form action='<?=$base?>/admin/login/login.php' method="post" name="form_login">
        	<div class="dl_k">
            	<img src="<?=$base?>/admin/res/images/person.gif" class="person" />
                <input name="username" id="username" type="text" class="login_input" value='请输入用户名' onblur="trySet(this,'请输入用户名');" onfocus="tryClear(this,'请输入用户名');" />
            </div>
        	<div class="dl_k">
            	<img src="<?=$base?>/admin/res/images/lock.gif" class="lock" />
                <input id="password" name="password" type="text" class="login_input" value='请输入密码' onfocus="trySetPassword(this);" />
            </div>
            <div class="msg_box" id="msg"></div>
           	<input type="submit" class="dl_but" name="submit" value=""/>
            </form>
        </div>
    </div>
</body>
</html>
