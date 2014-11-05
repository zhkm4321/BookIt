<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/config.php';
header("Content-Type:text/html;charset=UTF-8");
if(!isset($_POST['submit'])){
	exit('非法访问!');
}
function generate_name($l){
	$c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	srand((double)microtime()*1000000);
	$str=NULL;
	for($i=0; $i<$l; $i++) {
		$str.= $c[rand(0,100)%strlen($c)];
	}
	return $str;
}

$user=new User();
$user->username= $_POST['username'];
$user->password=$_POST['password'];
$user->realname=$_POST['realname'];
$user->organ=$_POST['organ'];
$user->regDate=time();
$regIp=$_SERVER["REMOTE_ADDR"];
//头像上传
if(isset($_FILES['sculpture'])){
	$uptypes=array('image/jpg','image/jpeg','image/png','image/gif','image/bmp','image/x-png');//定义图片格式类型
	$uploadPath=$_SERVER["DOCUMENT_ROOT"].'/uploadfile/';//上传路径
	if(is_uploaded_file($_FILES['sculpture']['tmp_name'])){
		$sculpFile=$_FILES['sculpture'];
		echo '$sculpFile';
		if(!in_array($sculpFile['type'],$uptypes)){
			echo "文件类型不符合上传要求".$sculpFile['type']."<br/>";
			exit;
		}

		$filename=$sculpFile['tmp_name'];
		$imagesSize=getimagesize($filename);
		//随机生成一个新文件名
		$pInfo=pathinfo($filename);
		echo 'pathinfo($sculpFile["tmp_name"])';
		$dest_dir=$uploadPath.date("Ymd");
		echo $dest_dir."<br/>";
		if(!file_exists($dest_dir)){
			mkdir($dest_dir,0777,true);
		}
		$dest=$uploadPath.date("Ymd").'/'.time().'_'.generate_name(5).'.'.end(explode('.', $sculpFile['name']));//设置文件名为时间戳加上随机数
		echo $dest."<br/>";
		echo $sculpFile['tmp_name']."<br/>";
		if(!move_uploaded_file($sculpFile['tmp_name'], $dest)){
			echo "文件上传失败"."<br/>";
			exit;
		}
		chmod($dest, 0777);//设置上传的文件属性
		$user->sculpture=substr($dest, strlen($_SERVER["DOCUMENT_ROOT"]));//将绝对路径转换成相对路径截取前面的字符串
		if(is_file($dest)){
			echo "上传成功"."<br/>";
		}
	}
}else{
	$user->sculpture=NULL;
}
//注册信息判断
/*
 if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $user->username)){
 exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
 }
 */
if(strlen($user->password) < 6){
	exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(!preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $user->username)){
	exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>');
}

//检测用户名是否已经存在
$sql="SELECT id FROM b_user WHERE username=:username limit 1";
$stmt=$dbh->prepare($sql);
$stmt->execute(array(':username'=>$user->username));
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	echo '错误：用户名 '.$user->username.' 已存在。<a href="javascript:history.back(-1);">返回</a>';
	exit;
}
//写入数据
$user->password=MD5($user->password);
$user->regdate=time();
$sql="INSERT INTO b_user(username,password,realname,organ,sculpture,ip,reg_date,level) VALUES(:username,:password,:realname,:organ,:sculpture,:regip,:regDate,:level)";
$stmt=$dbh->prepare($sql);
$stmt->execute(array(
':username'=>$user->username,
':password'=>$user->password,
':realname'=>$user->realname,
':organ'=>$user->organ,
':sculpture'=>$user->sculpture,
':regip'=>$regIp,
':regDate'=>$user->regdate,
':level'=>4
));
if($dbh->lastinsertid()){
	exit('用户注册成功！点击此处 <a href="/user/login.html">登录</a>');
} else {
	echo '抱歉！添加数据失败：'.mysql_error().'<br />';
	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
?>