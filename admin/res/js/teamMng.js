var empArr = [];
$(function() {
    /*-----------编写团队----------*/
    $(document)
	    .on(
		    "click",
		    function(e) {
			var drag = $("#select_drop"), dragel = $("#select_drop")[0], target = e.target;
			if (dragel !== target && !$.contains(dragel, target)) {
			    if ($('#select_con').is(":visible")) {
				$('#select_con').fadeOut(200);
			    } else {
				return true;
			    }
			} else {
			    $('#select_con').fadeIn(200);
			}
		    });
    $(".empList a").live("click",function(event) {
		$(this).siblings().removeClass();
		$(this).addClass("selected");
		var emp = empArr[$(this).index()];
		$("input[name='eId']").val(emp.id);
		$("input[name='picture']").val(emp.sculpture);
		$(".p_input[name='realname']").val(emp.realname);
		$(".p_input[name='organization']").val(emp.organization);
		var jobId = $("input[name=jobId]").val();
		$(".p_input[name='job']").val(
			$("#select_con a[value=" + jobId + "]").html());
		$(".p_textarea[name='info']").val(emp.info);
		if(emp.sculpture&&emp.sculpture!=""){
		    $(".person").attr("src", emp.sculpture);
		}else{
		    $(".person").attr("src", "/admin/res/images/sculpture.png");
		}
		$(".delete").show();
		$(".save").show();
		$(".create").show();
		$(".emp_right .msg").hide();
		$(".emp_right .person_infor").show();
	    });
    $("#select_con a").on(
	    "click",
	    function(event) {
		$("#input_text").html($(this).html());
		var jobId = $(this).attr("value");
		$(".empList").html("");
		$.ajax({
		    type : 'GET',
		    url : "/admin/service/findEmpListByJob.php",
		    data : {
			jobId : jobId
		    },
		    success : function(data) {
			if (data[0] != null) {
			    empArr = [];
			    $(data).each(
				    function(i, n) {
					empArr.push(n);
					$(
						"<a href=\"javascript:void(0);\" eid=\""
							+ empArr[i].id + "\">"
							+ empArr[i].realname
							+ "</a>").appendTo(
						".empList");
				    });
			}
			$(".create").show();
			$(".delete").hide();
			$(".save").hide();
			$("input[name=jobId]").val(jobId);
		    },
		    dataType : "json"
		});
		$(".p_input[name='realname']").val("");
		$(".p_input[name='organization']").val("");
		$(".p_input[name='job']").val("");
		$(".p_textarea[name='info']").val("");
		$(".person").attr("src", "/admin/res/images/sculpture.png");
		$(".person_infor").hide();
		$(".emp_right .msg").show();
		event.preventDefault();
	    });
    // 刷新页面即显示第一个职位的人员信息
    $("#select_con a:first").click();
    $(".create").hide();
    $(".delete").hide();
    $(".save").click(function() {
	$(".picture").val($(".person_infor .persion").attr("src"));
	$.ajax({
	    type : 'POST',
	    url : "/admin/service/addEmp.php",
	    data : $('#employeeForm').serialize(),
	    success : function(data) {
		if(data.id){
		    $("#select_con a[value="+$("input[name=jobId]").val()+"]").click();
		    alert("已保存");
		}
	    },
	    dataType : "json"
	});
    });
    $(".delete").click(function() {
	var eId=$("input[name='eId']").val();
	$.ajax({
	    type : 'GET',
	    url : "/admin/service/delEmp.php",
	    data : {
		eId : eId
	    },
	    success : function(data) {
		if (data.success) {
		    $("#select_con a[value="+$("input[name=jobId]").val()+"]").click();
		    alert("已删除");
		}
	    },
	    dataType : "json"
	});
    });
    $(".create,.create_v").click(function() {
		$(".empList a").removeClass();
		$("input[name=eid]").val("");
		$(".p_input[name='realname']").val("");
		$(".p_input[name='organization']").val("");
		var jobId = $("input[name=jobId]").val();
		$(".p_input[name='job']").val(
			$("#select_con a[value=" + jobId + "]").html());
		$(".p_textarea[name='info']").val("");
		$(".person").attr("src", "/admin/res/images/sculpture.png");
		$(".emp_right .msg").hide();
		$(".emp_right .person_infor").show();
		$(".save").show();
		$(".delete").hide();
	    });
    $(".person").click(function() {
	$("#sculpture").click();
    })
    $(".info_save").click(function(){
	$.ajax({
	    type : 'POST',
	    url : "/admin/service/updateTeam.php",
	    data : {
		id:1,
		content:UE.getEditor('teamEditor').getContent()
	    },
	    success : function(data) {
		if (data.success) {
		    alert("已保存");
		}
	    },
	    dataType : "json"
	});
    });
});
function uploadSculpture() {
    $("#sculptureForm").submit();
}