// JavaScript Document
function get_height() {
    var page_height = document.documentElement.clientHeight;
    var head_height = document.getElementById('pageHead').clientHeight;
    document.getElementById('left_con').style.height = (page_height - head_height)
	    + 'px';
    if (document.getElementById('ej_con')) {
	document.getElementById('ej_con').style.height = (page_height - head_height)
		+ 'px';
    }
    if (document.getElementById('right_con')) {
	document.getElementById('right_con').style.height = (page_height - head_height)
		+ 'px';
    }
}

window.onload = get_height;
window.onresize = get_height;

function GetRequest() {
    var url = location.search; // 获取url中"?"符后的字串
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
	var str = url.substr(1);
	strs = str.split("&");
	for ( var i = 0; i < strs.length; i++) {
	    theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
	}
    }
    return theRequest;
}
function allCheck(obj) {
    if ($(obj).is(':checked')) {
	$("input[name=ids]").attr("checked", true);
    }else{
	$("input[name=ids]").removeAttr("checked");
    }
}