<?php
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
header("Content-Type:text/html;charset=UTF-8");

$user=new User();
if(isset($_SESSION['userid'])){
	$userid=$_SESSION['userid'];
}
$user=$_SESSION['user'];
?>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>input</title>
<script type="text/javascript" src="<?=$jquery?>"></script>
<script type="text/javascript">
function checkReceive(){
	if(!isChinese($("input[name='realname']").val())){
		$("input[name='realname']").parent().append("<font color=red>姓名必须为中文</font>")
		return false;
	}
	var emailReg = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
	if(!emailReg.test($("input[name='email']").val())){
		$("input[name='email']").parent().append("<font color=red>邮箱格式不对</font>")
		return false;
	}
	var phoneReg = '/^(\d{3,4}-)?\d{7,8})$|(13[0-9]{9}$/';
	if(!phoneReg.test($("input[name='phone']").val())){
		$("input[name='phone']").parent().append("<font color=red>请填写正确的电话号码</font>")
		return false;
	}
	return true;
}
function isChinese(temp){
	var re=/[^\u4e00-\u9fa5]/;
	if(re.test(temp)){
		return false;
	}
	return true;
}
</script>
</head>
<body>
<form method="POST" action="/book/receive.php" onSubmit="checkReceive()">
<input type="hidden" name="userId" value="<?=$user->id ?>" />
<p>姓名: <input type="text" name="realname" value="<?=$user->realname ?>" /></p>
<p>单位: <input type="text" name="organ" value="<?=$user->organ ?>" /></p>
<p>职务: <input type="text" name="position" value="" /></p>
<p>EMAIL:<input type="text" name="email" value="<?=$user->username ?>" /></p>
<p>手机: <input type="text" name="phone" value="" /></p>

<p>书籍: <select name="bookId">
<?php
$bookQuery="SELECT * FROM b_book";
$stmt=$dbh->prepare($bookQuery);
$stmt->execute();
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	?>
	<option value="<?=$row['id']?>"><?=$row["name"]?></option>
	<?php
}
?>
</select></p>
<p>数量: <input type="text" name="quantity" value=""></p>
<p><input type="submit" value="提交" name="submit"></p>
</form>
</body>
</html>
