$(function() {
    var p = GetRequest();
    if (p.action) {
	$("#left_con ul li").removeClass("select");
	$("#left_con ul li").find("span[action=" + p.action + "]").parent()
		.addClass("select");
    }
    $("#left_con ul li span").click(
	    function() {
		var clickParam = $(this).attr("action");
		var param = window.location.search;
		window.location.href = window.location.href.replace(param,
			"?action=" + clickParam);
	    });
});

/*******************************************************************************
 * 
 * 弹出层 start
 * 
 ******************************************************************************/

// 创建蒙版的函数
function addMask(id) {
    mask = $("<div id='" + id + "'></div>");
    mask.css({
	"position" : "absolute",
	"top" : 0,
	"left" : 0,
	"background" : "#000",
	"opacity" : "0.6",
	"height" : $(document).height() + "px",
	"display" : "none",
	"width" : "100%",
	"z-index" : "998"
    });
    return mask;
};
// 调用创建的蒙版
function addMaskElement(id) {
    $("body").append(addMask(id));
};
// 删除蒙版的函数
function deleteMaskElement(id) {
    $("#" + id).remove();
};
// 弹出层调用方法
function alginPopup(targetId, maskId) {
    var isIE6 = ($.browser.msie && $.browser.version === "6.0");
    if (isIE6) {
	$("#" + targetId).css({
	    'position' : 'absolute',
	    'zIindex' : '9999'
	});
    } else {
	$("#" + targetId).css({
	    'position' : 'fixed',
	    'z-index' : '9999'
	});
    }
    ;
    var win = $(window); // 改写本来应该是window
    l = (win.width() - $("#" + targetId).width()) * 0.5, t = (win.height() - $(
	    "#" + targetId).height()) * 0.5;
    if (isIE6) {
	l += win.scrollLeft();
	t += win.scrollTop();
    }
    $("#" + targetId).css({
	'left' : l,
	'top' : t,
	'z-index' : 9999,
	"display" : "block"
    });
    addMaskElement(maskId)
    $("#" + maskId).fadeIn("fast");
};
function rePosition(targetId, maskId) {
    var isIE6 = ($.browser.msie && $.browser.version === "6.0");
    var win = $(window); // 改写本来应该是window
    l = (win.width() - $("#" + targetId).width()) * 0.5, t = (win.height() - $(
	    "#" + targetId).height()) * 0.5;
    if (isIE6) {
	l += win.scrollLeft();
	t += win.scrollTop();
    }
    $("#" + targetId).css({
	'left' : l,
	'top' : t,
	'z-index' : 9999,
	"display" : "block"
    });
    $("#" + maskId).css({
	"height" : $(document).height() + "px"
    });
}
/*******************************************************************************
 * 
 * 弹出层 end
 * 
 ******************************************************************************/
function removePic(imgId, imgPath, con) {
    $.post(BASE + "/admin/filedelete.php", {
	id : imgId,
	filePath : imgPath
    }, function(result) {
	if (result == "SUCCESS") {
	    $("#" + con + " li").find("img[pid=" + imgId + "]").parent()
		    .remove();
	} else if (result = "nonExist") {
	    $("#" + con + " li").find("img[pid=" + imgId + "]").parent()
		    .remove();
	} else {
	    alert("删除失败");
	}
    });
}