function getCookie(name) {
  var search;
  search = name + "="
  offset = document.cookie.indexOf(search)
  if (offset != -1) {
    offset += search.length;
    end = document.cookie.indexOf(";", offset);
    if (end == -1)
      end = document.cookie.length;
    return document.cookie.substring(offset, end);
  } else
    return "";
}
function fixCookieDate(date) {
  var base = new Date(0);
  var skew = base.getTime();
  if (skew > 0)
    date.setTime(date.getTime() - skew);
}
/**
 * @param name  必需。规定 cookie 的名称。
 * @param value 必需。规定 cookie 的值。
 * @param path  可选。规定 cookie 的服务器路径。
 * @param domain  可选。规定 cookie 的域名。
 * @param secure  可选。规定是否通过安全的 HTTPS 连接来传输 cookie。
 * @return
 */
function setCookie(name, value, path, domain, secure) {
  var expdates = new Date();
  fixCookieDate(expdates);
  expdates.setTime(expdates.getTime() + (3 * 60 * 60 * 24 * 1000));//expire  可选。规定 cookie 的有效期。默认三天
  document.cookie = name + "=" + (value) + ((expdates) ? "; expires=" + expdates.toGMTString() : "") + ((path) ? "; path=" + path : "")
      + ((domain) ? "; domain=" + domain : "") + ((secure) ? "; secure" : "");
}