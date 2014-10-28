 $(function() {
	 var p = GetRequest();
	 if(p.action){
		 $("#left_con ul li").removeClass("select");
		 $("#left_con ul li").find("span[action="+p.action+"]").parent().addClass("select");
	 }
	 $("#left_con ul li span").live("click",function(){
		 var clickParam=$(this).attr("action");
		 var param=window.location.search;
		 window.location.href=window.location.href.replace(param,"?action="+clickParam);
	 });
 });