<?php
/**
 * 缩略图主函数
 * @param string $src 图片路径
 * @param int $w 缩略图宽度
 * @param int $h 缩略图高度
 * @return mixed 返回缩略图路径
 *
 **/
function resize($src, $w, $h) {
	$temp = pathinfo ( $src );
	$name = $temp ["basename"]; // 文件名
	$dir = $temp ["dirname"]; // 文件所在的文件夹
	$extension = $temp ["extension"]; // 文件扩展名
	$savepath = "{$dir}/thumb_{$name}"; // 缩略图保存路径
	                                 
	// 获取图片的基本信息
	$info = getimagesize ( $src );
	$width = $info [0]; // 获取图片宽度
	$height = $info [1]; // 获取图片高度
	if (! isset ( $h )) {
		$h = intval ( 200 * $height / $width ); // 等比缩放图片高度
	}
	$temp_img = imagecreatetruecolor ( $w, $h ); // 创建画布
	$im = create ( $src );
	imagecopyresampled ( $temp_img, $im, 0, 0, 0, 0, $w, $h, $width, $height );
	
	imagejpeg ( $temp_img, $savepath, 100 );
	imagedestroy ( $im );
	return $savepath;
}

/**
 * 创建图片，返回资源类型
 * 
 * @param string $src
 *        	图片路径
 * @return resource $im 返回资源类型
 *         *
 */
function create($src) {
	$info = getimagesize ( $src );
	echo $src;
	switch ($info [2]) {
		case 1 :
			$im = imagecreatefromgif ( $src );
			break;
		case 2 :
			$im = imagecreatefromjpeg ( $src );
			break;
		case 3 :
			$im = imagecreatefrompng ( $src );
			break;
	}
	return $im;
}
?>