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
