function del(id) {
  $.ajax({
    type : "POST",
    url : codeBase + "/message/del.do",
    data : "id=" + id,
    dataType : "json",
    success : function(data) {
      if (data.SUCCESS) {
        list();
        judgeBtn();
      } else {
        alert("删除失败！");
      }
    },
    error : function() {
      alert("网络连接出错！");
    }
  });
}
function deleteAll() {
  $.ajax({
    type : "GET",
    url : codeBase + "/message/delAll.do",
    dataType : "json",
    success : function(data) {
      if (data.SUCCESS) {
        list();
        judgeBtn();
        alert("共删除" + data.count + "条留言");
      } else {
        alert("删除失败！");
      }
    },
    error : function() {
      alert("网络连接出错！");
    }
  });
}
/*
 * pageNo从1开始pagesize从1开始
 */
function list() {
  var offset = (pageNo - 1) * pageSize;
  $.ajax({
    type : "POST",
    url : codeBase + "/message/list.do",
    data : "pageNo=" + pageNo + "&offset=" + offset + "&pageSize="
        + pageSize,
    dataType : "html",
    async : false,
    success : function(data) {
      $("#list_con").html(data);
    },
    error : function() {
      alert("网络连接出错！");
    }
  });
}

function prePage() {
  pageNo = pageNo - 1;
  list();
  judgeBtn();
}

function nextPage() {
  pageNo = pageNo + 1;
  list();
  judgeBtn();
}
function gotoPage(page) {
  pageNo = page;
  list();
  judgeBtn();
}
function judgeBtn() {// 判断是否显示上一页下一页
  if (pageNo <= 1) {
    $('#prePage').hide();
  } else {
    $('#prePage').show();
  }
  if (pageNo >= totalPage) {
    $('#nextPage').hide();
  } else {
    $('#nextPage').show();
  }
}
function showImageBox(boxId, thumb) {
  $("#"+boxId+" img").attr("src", $(thumb).find("img").attr("src"));
  var isIE6 = ($.browser.msie && $.browser.version === "6.0");
  if (isIE6) {
    $("#" + boxId).css({
      'position' : 'absolute',
      'zIindex' : '9999'
    });
  } else {
    $("#" + boxId).css({
      'position' : 'fixed',
      'z-index' : '9999'
    });
  }
  var win = $(window); // 改写本来应该是window
  $("#"+boxId+" img").css({//确定弹出层图片的宽度
    'width' : win.width()-100+"px"
  });
  l = (win.width() - $("#" + boxId).width()) * 0.5, t = (win.height() - $("#" + boxId).height()) * 0.5;
  if (isIE6) {
    l += win.scrollLeft();
    t += win.scrollTop();
  }
  $("#" + boxId).css({
    'left' : l,
    'top' : t,
    'z-index' : 9999,
    "display" : "block"
  });
  $("#"+boxId).fadeIn("fast");
  $("#"+boxId).myDrag(); 
}

//创建蒙版的函数
function addMask(id){
  mask=$("<div id='"+id+"'><div class='close'></div></div>");
  mask.css({
    "position":"absolute",
    "top":0,
    "left":0,
    "background":"#000",
    "opacity":"0.6",
    "height":$(document).height()+"px",
    "display":"none",
    "width":"100%",
    "z-index":"998"
  });
  return mask;
};     
// 调用创建的蒙版
function addMaskElement(id){
  $("body").append( addMask(id));
};
// 删除蒙版的函数
function deleteMaskElement(id){
  $("#"+id).remove();
};

jQuery.fn.myDrag=function(){
  var $div = $(this);
  $div.css('cursor','move');
  /* 绑定鼠标左键按住事件 */
  $div.bind("mousedown",function(event){
    /* 获取需要拖动节点的坐标 */
    var offset_x = $(this)[0].offsetLeft;//x坐标
    var offset_y = $(this)[0].offsetTop;//y坐标
    /* 获取当前鼠标的坐标 */
    var mouse_x = event.pageX;
    var mouse_y = event.pageY;        

    /* 绑定拖动事件 */
    /* 由于拖动时，可能鼠标会移出元素，所以应该使用全局（document）元素 */
    $(document).bind("mousemove",function(ev){
      /* 计算鼠标移动了的位置 */
      var _x = ev.pageX - mouse_x;
      var _y = ev.pageY - mouse_y;
      
      /* 设置移动后的元素坐标 */
      var now_x = (offset_x + _x ) + "px";
      var now_y = (offset_y + _y ) + "px";          
      /* 改变目标元素的位置 */
      $div.css({
        top:now_y,
        left:now_x
      });
    });
  });
  /* 当鼠标左键松开，接触事件绑定 */
  $(document).bind("mouseup",function(){
    $(this).unbind("mousemove");
  });
} 