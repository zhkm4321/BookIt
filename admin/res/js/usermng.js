var listLevel, listOrderBy, listPageNo, listPageSize, listTotalPage, rowCount;
function queryForUserList(level, orderBy, pageNo, pageSize) {
    if (!level) {
	level = -1;
    }
    listLevel = level;
    if (!orderBy) {
	orderBy = "reg_date";
    }
    listOrderBy = orderBy;
    if (!pageNo) {
	pageNo = 1;
    }
    listPageNo = pageNo;
    if (!pageSize) {
	pageSize = 20;
    }
    listPageSize = pageSize;
    $.ajax({
	type : 'POST',
	url : "/admin/frame/userlist.php",
	data : {
	    level : level,
	    orderBy : orderBy,
	    pageNo : pageNo,
	    pageSize : pageSize
	},
	success : function(data) {
	    $("#list_con").html(data);
	    $(".add_user").on("click", function(event) {
		alert("来找我吧");
	    });
	    $(".del_user").on(
		    "click",
		    function(event) {
			alert($("input:checked").length);
			$("[name=ids]:checkbox").find("input:checked").each(
				function(n, i) {
				    alert(n + "  " + i);
				});
		    });
	    $(".page_nr a").on(
		    "click",
		    function(event) {
			var con = $(this).html();
			var pageNo = 0;
			if (pageNo = parseInt(con)) {
			    queryForUserList(listLevel, listOrderBy, pageNo,
				    listPageSize);
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
			    queryForUserList(listLevel, listOrderBy,
				    listPageNo, listPageSize);
			}
			event.preventDefault();
		    });
	    $("input[name=ids]").click(function() {
		rowCount = $("table tr").length - 1;
		if (checkedCount("ids") == rowCount) {
		    if (!$("input[name=all").is(":checked")) {
			$("input[name=all").attr("checked", true);
		    }
		} else {
		    if ($("input[name=all").is(":checked")) {
			$("input[name=all").removeAttr("checked");
		    }
		}
	    });
	},
	dataType : "html"
    });
}

function delUser(uid) {
    var url = "/admin/service/delUser.php";
    var data = null;
    if (isNaN(uid)) {
	url += "?action=delAll";
	data = {
	    "Arr" : uid
	};
    } else {
	url += "?action=one";
	data = {
	    "Uid" : uid
	};
    }
    $.ajax({
	type : 'POST',
	url : url,
	data : data,
	success : function(data) {
	    if (data = "TRUE") {
		window.location.reload();
	    } else {
		alert("删除失败");
	    }
	},
	dataType : "text"
    });
}

function checkedCount(name) {
    var batchChecks = document.getElementsByName(name);
    var count = 0;
    for ( var i = 0; i < batchChecks.length; i++) {
	if (batchChecks[i].checked) {
	    count++;
	}
    }
    return count;
}