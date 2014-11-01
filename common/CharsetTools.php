<?php
//编码,编码后为小写
function escape($str){
	preg_match_all("/[\x80-\xff].|[\x01-\x7f]+/",$str,$newstr);
	$ar = $newstr[0];
	foreach($ar as $k=>$v){
		if(ord($ar[$k])>=127){
			$tmpString=bin2hex(iconv("GBK","ucs-2//IGNORE",$v));
			if (!eregi("WIN",PHP_OS)){
				$tmpString = substr($tmpString,2,2).substr($tmpString,0,2);
			}
			$reString.="%u".$tmpString;
		}else{
			$reString.= rawurlencode($v);
		}
	}
	return $reString;
}

//解码为HTML实体字符
function unescape ($source){
	$decodedStr = "";
	$pos = 0;
	$len = strlen ($source);
	while ($pos < $len){
		$charAt = substr ($source, $pos, 1);
		if ($charAt == '%'){
			$pos++;
			$charAt = substr ($source, $pos, 1);
			if ($charAt == 'u'){
				// we got a unicode character
				$pos++;
				$unicodeHexVal = substr ($source, $pos, 4);
				$unicode = hexdec ($unicodeHexVal);
				$entity = "&#". $unicode . ';';
				$decodedStr .= utf8_encode ($entity);
				$pos += 4;
			}else{
				// we have an escaped ascii character
				$hexVal = substr ($source, $pos, 2);
				$decodedStr .= chr (hexdec ($hexVal));
				$pos += 2;
			}
		}else{
			$decodedStr .= $charAt;
			$pos++;
		}
	}
	return $decodedStr;
}
/**
 * 压缩html : 清除换行符,清除制表符,去掉注释标记
 * @param $string
 * @return 压缩后的$string
 * */
function compress_html($string) {
	$string = str_replace("\r\n", '', $string); //清除换行符
	$string = str_replace("\n", '', $string); //清除换行符
	$string = str_replace("\t", '', $string); //清除制表符
	$pattern = array (
			"/> *([^ ]*) *</", //去掉注释标记
			"/[\s]+/",
			"/<!--[^!]*-->/",
			"/\" /",
			"/ \"/",
			"'/\*[^*]*\*/'"
	);
	$replace = array (
			">\\1<",
			" ",
			"",
			"\"",
			"\"",
			""
	);
	return preg_replace($pattern, $replace, $string);
}
?>