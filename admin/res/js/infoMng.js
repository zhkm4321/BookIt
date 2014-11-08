var listModelId, listPageNo, listPageSize, listTotalPage;
function queryForInfoList(modelId, pageNo, pageSize) {
    listPageNo = pageNo;
    listPageSize = pageSize;
    listModelId=modelId;
    $.ajax({
	type : 'POST',
	url : BASE+"/admin/cms/infoList.php",
	data : {
	    modelId: modelId,
	    pageNo : pageNo,
	    pageSize : pageSize
	},
	success : function(data) {
	    $("#list_con").html(data);
	    $(".del_info").on("click", function(event) {
		var Arr = "";
		$("[name=ids]").each(function(i, n) {
		    if ($(n).is(":checked")) {
			Arr += $(n).attr("uid") + ',';
		    }
		});
		if (Arr == "") {
		    alert("请选择删除项");
		    return;
		}
		delInfo(Arr.substring(0, Arr.length - 1));
	    });
	    // 绑定添加新闻事件
	    $(".add_info").click(function() {
			window.location.href=BASE+"/admin/service/editInfo.php";
		});
	    $(".page_nr a").on("click", function(event) {
		var con = $(this).html();
		var pageNo = 0;
		if (pageNo = parseInt(con)) {
		    queryForInfoList(listModelId, pageNo, listPageSize);
		} else {
		    if ($(this).attr("id") == "nextPage") {
			listPageNo++;
		    } else if ($(this).attr("id") == "prePage") {
			listPageNo--;
		    }
		    if (listPageNo < 1) {
			listPageNo = 1;
		    }
		    if (listPageNo > listTotalPage) {
			listPageNo = listTotalPage;
		    }
		    queryForInfoList(listModelId, listPageNo, listPageSize);
		}
		event.preventDefault();
	    });
	},
	dataType : "html"
    });
}
function delInfo(uid) {
    var url = BASE+"/admin/service/delInfo.php";
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
		queryForInfoList(listModelId, listPageNo, listPageSize);
	    } else {
		alert("删除失败");
	    }
	},
	dataType : "text"
    });
}