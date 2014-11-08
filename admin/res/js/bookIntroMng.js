var listPageNo, listPageSize, listTotalPage;
function queryForBookList(pageNo, pageSize) {
    listPageNo = pageNo;
    listPageSize = pageSize;
    $.ajax({
	type : 'POST',
	url : "/admin/cms/bookIntroList.php",
	data : {
	    pageNo : pageNo,
	    pageSize : pageSize
	},
	success : function(data) {
	    $("#list_con").html(data);
	    $(".del_book").on("click", function(event) {
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
		delBook(Arr.substring(0, Arr.length - 1));
	    });
	    // 绑定添加用户弹出层事件
	    $.artwl_bind({
		showbtnid : ".add_book",
		title : "新增书籍",
		content : "#addBookBox"
	    });
	    $("#artwl_close").on("click", function() {
		queryForBookList(listPageNo, listPageSize);
	    });
	    $(".addBtn").click(
		    function() {
			$.ajax({
			    type : "POST",
			    dataType : "html",
			    url : "/admin/service/addBook.php",
			    data : $("#addBookForm").serialize(),
			    success : function(data) {
				// $("#artwl_close").click();
				if (parseInt(data)) {
				    window.location.href = BASE + "/admin/service/editBook.php?id=" + data;
				}
			    },
			    error : function(data) {
				alert("error:" + data.responseText);
			    }
			});
		    });
	    $(".page_nr a").on("click", function(event) {
		var con = $(this).html();
		var pageNo = 0;
		if (pageNo = parseInt(con)) {
		    queryForBookList(pageNo, listPageSize);
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
		    queryForBookList(listPageNo, listPageSize);
		}
		event.preventDefault();
	    });
	},
	dataType : "html"
    });
}
function delBook(uid) {
    var url = "/admin/service/delBook.php";
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
		queryForBookList(listPageNo, listPageSize);
	    } else {
		alert("删除失败");
	    }
	},
	dataType : "text"
    });
}