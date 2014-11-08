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

function strCut($str,$length)//$str为要进行截取的字符串，$length为截取长度（支持汉字）
{
	$i = 0;
	$start=0;
    //完整排除之前的UTF8字符
    while($i < $start) {
        $ord = ord($str{$i});
        if($ord < 192) {
            $i++;
        } elseif($ord <224) {
            $i += 2;
        } else {
            $i += 3;
        }
    }
    //开始截取
    $result = '';
    while($i < $start + $length && $i < strlen($str)) {
        $ord = ord($str{$i});
        if($ord < 192) {
            $result .= $str{$i};
            $i++;
        } elseif($ord <224) {
            $result .= $str{$i}.$str{$i+1};
            $i += 2;
        } else {
            $result .= $str{$i}.$str{$i+1}.$str{$i+2};
            $i += 3;
        }
    }
    if($i < strlen($str)) {
        $result .= '...';
    }
    return $result;
}
/**

 * PHP清除html、css、js格式并去除空格的PHP函数,并具有截取UTF-8字符串的作用

 */

function htmlCut($string, $sublen){
  $string = strip_tags($string);
  $string = preg_replace ('/\n/is', '', $string);
  $string = preg_replace ('/ |　/is', '', $string);
  $string = preg_replace ('/&nbsp;/is', '', $string);
  preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string);
  if(count($t_string[0]) - 0 > $sublen) $string = join('', array_slice($t_string[0], 0, $sublen))."…";
  else $string = join('', array_slice($t_string[0], 0, $sublen));
  return $string;
 }
?>