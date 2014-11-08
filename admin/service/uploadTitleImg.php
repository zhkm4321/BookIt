<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/config.php';
function generate_name($l) {
	$c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	srand ( ( double ) microtime () * 1000000 );
	$str = NULL;
	for($i = 0; $i < $l; $i ++) {
		$str .= $c [rand ( 0, 100 ) % strlen ( $c )];
	}
	return $str;
}

$uptypes = array (
		'image/jpg',
		'image/jpeg',
		'image/png',
		'image/gif',
		'image/bmp',
		'image/x-png'
); // 定义图片格式类型
$uploadPath = $_SERVER ["DOCUMENT_ROOT"] . '/uploadfile/info/'; // 上传路径
try{
	if (is_uploaded_file ( $_FILES ['title_img'] ['tmp_name'] )) {
		$sculpFile = $_FILES ['title_img'];
		if (! in_array ( $sculpFile ['type'], $uptypes )) {
			echo "文件类型不符合上传要求" . $sculpFile ['type'] . "<br/>";
			exit ();
		}

		$filename = $sculpFile ['tmp_name'];
		$imagesSize = getimagesize ( $filename );
		// 随机生成一个新文件名
		$pInfo = pathinfo ( $filename );
		$dest_dir = $uploadPath . date ( "Ymd" );
		if (! file_exists ( $dest_dir )) {
			mkdir ( $dest_dir, 0777, true );
		}
		$dest = $uploadPath . date ( "Ymd" ) . '/' . time () . '_' . generate_name ( 5 ) . '.' . end ( explode ( '.', $sculpFile ['name'] ) ); // 设置文件名为时间戳加上随机数
		if (! move_uploaded_file ( $sculpFile ['tmp_name'], $dest )) {
			echo "文件上传失败" . "<br/>";
			exit ();
		}
		chmod ( $dest, 0777 ); // 设置上传的文件属性
		$arr = array ();
		if (is_file ( $dest )) {
			$arr ['path'] = substr ( $dest, strlen ( $_SERVER ["DOCUMENT_ROOT"] ) );
			$arr ['success'] = true;
		}
		var_dump($arr);
		$picJson=json_encode( $arr );
	}
}
catch(Exception $e){
	print_r($e->getMessage());
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>pic</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" charset="utf-8" src="<?=$jquery?>"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript">
$(function(){
    var d=eval('(<?=$picJson ?>)');
    if(d.success){
	    $('.img_content .titleImg', parent.document).attr("src","<?=$base ?>"+d.path);
	    $('#infoTitleImgForm input[name=infoTitleImg]', parent.document).val(d.path);
    }
})
</script>
</head>
<body>
</body>
</html>