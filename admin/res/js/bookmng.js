var listBookId,listOrderBy,listPageNo,listPageSize,listTotalPage;
function queryForOrderList(bookId,orderBy,pageNo,pageSize) {
	if(!bookId){
		bookId=-1;
	}
	listBookId=bookId;
	if(!orderBy){
		orderBy="order_date";
	}
	listOrderBy=orderBy;
	if(!pageNo){
		pageNo=1;
	}
	listPageNo=pageNo;
	if(!pageSize){
		pageSize=20;
	}
	listPageSize=pageSize;
	$.ajax({
		type: 'POST',
		url: "/admin/frame/booklist.php",
		data: {bookId:bookId,orderBy:orderBy,pageNo:pageNo,pageSize:pageSize},
		success: function(data){
			$("#list_con").html(data);
			$(".add_user").on("click", function(event) {
				alert("来找我吧");
		    });
		    $(".del_order").on("click",function(event) {
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
				delOrder(Arr.substring(0,Arr.length-1));
			});
			$(".page_nr a").on("click",function(event){
				var con=$(this).html();
				var pageNo=0;
				if(pageNo=parseInt(con)){
					queryForOrderList(listBookId, listOrderBy, pageNo, listPageSize);
				}else{
					if($(this).attr("id")=="nextPage"){
						listPageNo++;
					}else if($(this).attr("id")=="prePage"){
						listPageNo--;
					}
					if(listPageNo<1){
						listPageNo=1;
					}
					if(listPageNo>listTotalPage){
						listPageNo=listTotalPage;
					}
					queryForOrderList(listBookId, listOrderBy, listPageNo, listPageSize);
				}
				event.preventDefault();
			});
		},
		dataType: "html"
	});
}

function delOrder(uid) {
    var url = "/admin/service/delOrder.php";
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