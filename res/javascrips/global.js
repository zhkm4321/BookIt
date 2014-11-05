/*javascript document*/
$(document).ready(function() {

    // 设置控制banner滚动的按钮区域
    function adjustBannerHandle() {
	$(".js_fullscreen_banner .d_btn").css({
	    "left" : ($(window).width() - 1000) / 2
	});
	$(".js_fullscreen_banner .index").css({
	    "left" : ($(window).width() - 1000) / 2
	});
    };
    // 自我执行
    adjustBannerHandle();
    // 绑定浏览器事件
    $(window).bind("scroll resize", function() {
	// banner滚动的按钮区域的位置
	adjustBannerHandle();
    });

    $("a.dl").on("click",function() {
	$('.menghui').show();
	$('.tc_ceng').show();
    });
    var curinfo = null;
    $("a.dc").on("mouseover",function() {
	curinfo=$(this).html();
	$(this).text("注销登录");
	$(this).css({"padding": "0px 5px 0px 5px"});
    });
    $("a.dc").on("mouseleave",function() {
	$(this).html(curinfo);
    });
    $("a.dc").on("click",function() {//登出登录方法
	window.location.href="/front/login.php?action=logout";
    });

    $(".close").click(function() {
	$('.menghui').hide();
	$('.tc_ceng').hide();
    });
});

function trySet(obj, txt) {
    if (obj.value == "") {
	obj.value = txt;
	obj.style.color = '#8b8b8b';
    } else {
	obj.style.color = '#8b8b8b';
    }
}

function tryClear(obj, txt) {
    if (obj.value == txt) {
	obj.value = '';
	obj.style.color = '#8b8b8b';
    }
}

function docusize() {
    if (document.getElementById("dl")) {
	document.getElementById("dl").style.top = (document.documentElement.clientHeight - 453)
		/ 2 + document.documentElement.scrollTop + 'px';
	document.getElementById("dl").style.left = (document.documentElement.clientWidth - 399)
		/ 2 + 'px';
    }
    if (document.getElementById("menghui")) {
	if (document.documentElement.scrollHeight > document.documentElement.clientHeight) {
	    document.getElementById("menghui").style.height = document.documentElement.scrollHeight
		    + 'px';
	} else {
	    document.getElementById("menghui").style.height = document.documentElement.clientHeight
		    + 'px';
	}
	if (document.documentElement.clientWidth > 1000) {
	    document.getElementById("menghui").style.width = document.documentElement.clientWidth
		    + 'px';
	} else {
	    document.getElementById("menghui").style.width = '1000px';
	}
    }
}

window.onload = docusize;
window.onresize = docusize;

function addPicToBanner(domId) {
    $.get("/front/getPicList.php", {
	modelId : 1
    }, function(result) {
	// alert(result);
	$("#" + domId).html(result);
    });
}
$(function() {
    $(".home").click(function() {
	setHomepage();
    });
});

function setHomepage() {
    var url = 'http://www.baidu.com';
    if (document.all) {
	document.body.style.behavior = 'url(#default#homepage)';
	document.body.setHomePage(url);
    } else if (window.sidebar) {
	if (window.netscape) {
	    try {
		netscape.security.PrivilegeManager
			.enablePrivilege("UniversalXPConnect");
	    } catch (e) {
	    }
	}
	var prefs = Components.classes['@mozilla.org/preferences-service;1']
		.getService(Components.interfaces.nsIPrefBranch);
	prefs.setCharPref('browser.startup.homepage', url);
    } else {
    }
}