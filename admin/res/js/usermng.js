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
	    $(".del_user").on("click",function(event) {
		    var Arr="";
			$("[name=ids]").each(function(i,n) {
			    if($(n).is(":checked")){
					Arr+=$(n).attr("uid")+',';
			    }
			});
			if(Arr==""){
				alert("请选择删除项");
				return;
			}
			delUser(Arr.substring(0,Arr.length-1));
		});
		//绑定添加用户弹出层事件
		$.artwl_bind({ showbtnid: ".add_user", title: "添加用户", content: "#addUserBox"});
		debugger;
		$.artwl_close({ callback: queryForUserList(listLevel, listOrderBy, 1, listPageSize)});
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
		$(".addBtn").click(function(){
			$.ajax({
               type: "POST",
               dataType: "html",
               url: "/admin/service/addUser.php",
               data: $("#addUserForm").serialize(),
               success: function (data) {
					$("#artwl_close").click();
               },
               error: function(data) {
                   alert("error:"+data.responseText);
               }
           });
		});
	},
	dataType : "html"
    });
}

function delUser(uid) {
    var url = "/admin/service/delUser.php";
    var data = null;
    if (isNaN(uid)) {
		data = {Arr : uid,action:"delAll"};
    } else {
		data = {Uid : uid,action:"one"};
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