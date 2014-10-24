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
		url: "/admin/booklist.php",
		data: {bookId:bookId,orderBy:orderBy,pageNo:pageNo,pageSize:pageSize},
		success: function(data){
			$("#list_con").html(data);
		},
		dataType: "html"
	});
}
$(function(){
	$(".page_nr a").live("click",function(){
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
	});
});