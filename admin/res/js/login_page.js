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
function tryPasswordClear(obj, txt){
	if(obj.value==txt){
		obj.value = '';
		$(obj).attr("type","password");
		$(obj).select();
	}
	obj.style.color = '#6f7278';
}
function tryPasswordSet(obj, txt) {
  if (obj.value == "") {
    obj.value = txt;
    $(obj).attr("type","text");
    obj.style.color = '#aaaaaa';
  } else {
	$(obj).attr("type","password");
    obj.style.color = '#6f7278';
  }
}