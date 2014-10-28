var listLevel,listOrderBy,listPageNo,listPageSize,listTotalPage;
function queryForUserList(level,orderBy,pageNo,pageSize) {
	if(!level){
		level=-1;
	}
	listLevel=level;
	if(!orderBy){
		orderBy="reg_date";
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
		url: "/admin/frame/userlist.php",
		data: {level:level,orderBy:orderBy,pageNo:pageNo,pageSize:pageSize},
		success: function(data){
			$("#list_con").html(data);
		},
		dataType: "html"
	});
}
$(function(){
	$(".page_nr a").live("click",function(event){
		var con=$(this).html();
		var pageNo=0;
		if(pageNo=parseInt(con)){
			queryForUserList(listLevel,listOrderBy, pageNo, listPageSize);
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
			queryForUserList(listLevel,listOrderBy, listPageNo, listPageSize);
		}
		event.preventDefault();
	});
});