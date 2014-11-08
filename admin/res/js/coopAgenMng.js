var listModelId, listPageNo, listPageSize, listTotalPage;
function queryForAgenList(modelId, pageNo, pageSize) {
    listPageNo = pageNo;
    listPageSize = pageSize;
    listModelId=modelId;
    $.ajax({
	type : 'POST',
	url : "/admin/cms/coopAgenList.php",
	data : {
	    modelId: modelId,
	    pageNo : pageNo,
	    pageSize : pageSize
	},
	success : function(data) {
	    $("#list_con").html(data);
	},
	dataType : "html"
    });
}
$(function(){
	$(".addAgenBtn").live("click",function() {
		$.ajax({
		    type : "POST",
		    dataType : "json",
		    url : "/admin/service/addAgen.php",
		    data : $("#addAgenForm").serialize(),
		    async:false,
		    success : function(data) {
			if (data.success) {
			    window.location.href = BASE + "/admin/service/editAgen.php?id=" + data.data.id;
			}
		    },
		    error : function(data) {
			alert("error:" + data.responseText);
		    }
		});
	});
});

function delAgen(uid) {
    var url = "/admin/service/delAgen.php";
    var data = null;
    if (isNaN(uid)) {
	data = {
	    Arr : uid,
	    action : "delAll"
	};
    } else {
	data = {
	    Uid : uid,
	    action : "one"
	};
    }
    $.ajax({
	type : 'POST',
	url : url,
	data : data,
	success : function(data) {
	    if (data = "TRUE") {
		queryForAgenList(listModelId, listPageNo, listPageSize);
	    } else {
		alert("删除失败");
	    }
	},
	dataType : "text"
    });
}
/*******************************************************************************
 *
 * 合作机构二级菜单
 *
 ******************************************************************************/
function showCoopMenu(parentId, modelId) {
    var data = null;
    $.ajax({
	type : 'GET',
	url : BASE + "/admin/service/findModelsByParentId.php",
	data : {
	    pId : parentId,
	    noCache : new Date().getTime()
	},
	success : function(data) {
	    if (data.success) {
		var second = "<div id=\"ej_con\" class=\"ej_con\">"
			+ "<ul class=\"ej_nav\">";
		$(data.data).each(
			function(i, n) {
			    second += "<li><span value='" + n.id + "'>"
				    + n.modelName + "</span></li>";
			});

		second += "</ul>" + "</div>";
		$("#left_con").after(second);
		get_height();
		$(".ej_nav li span").click(function(){
		    $(this).parent().siblings().removeClass();
		    $(this).parent().addClass("select");
		    var curModel=$(this).attr("value");
		    queryForAgenList(curModel, 1,15);
		});
		$("#ej_con").show();
		if(modelId){
			$(".ej_nav li span[value="+modelId+"]").click();
		}else{
		    $(".ej_nav li:eq(0)").find("span").click();
		}
	    }
	},
	dataType : "json"
    });
}