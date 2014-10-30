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
?>