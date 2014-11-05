function trySet(obj, txt) {
  if (obj.value == "") {
    obj.value = txt;
    obj.style.color = '#aaaaaa';
  } else {
    obj.style.color = '#6f7278';
  }
}

function tryClear(obj, txt) {
  if (obj.value == txt) {
    obj.value = '';
    obj.style.color = '#6f7278';
  }
}
function trySetPassword(obj){
	if(obj.type=="text"){
		var passInput=$("<input name=\"password\" type=\"password\" class=\"login_input\" onblur=\"trySetText(this);\">");
		$(obj).parent().append(passInput);
    	$(obj).remove();
		passInput.css("color",'#6f7278');
		passInput.select();
	}
}
function trySetText(obj) {
  if (obj.value == "") {
  	var textInput=$("<input id=\"password\" name=\"password\" type=\"text\" class=\"login_input\" value=\"请输入密码\" onfocus=\"trySetPassword(this);\">");
    textInput.css("color",'#aaaaaa');
	$(obj).parent().append(textInput);
    $(obj).remove();
  }
}