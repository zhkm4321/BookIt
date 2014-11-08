<?php
include $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if(! isset ( $_SESSION ["user"] )){
	header ( "Location: /admin/login/index.php" );
	exit;
}
if (! isset ( $_GET ["id"] )) {
	echo "需要GET参数ID";
	exit ();
}
$agenId = $_GET ["id"];
$sql="select * from b_agen where id=:id limit 1";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":id", $agenId);
$stmt->execute();
$agen=NULL;
if ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$agen=new Agen();
	$agen->id=$row["id"];
	$agen->modelId=$row["model_id"];
	$_SESSION["modelId"]=$agen->modelId;
	$agen->agenName=formatHTML($row["agen_name"]);
	$agen->agenInfo=$row["agen_info"];
	$agen->sortId=$row["sort_id"];
}
if(!isset($agen)){
	header("Content-type: text/html; charset=utf-8");
	exit("不存在的书籍,请<a href='javascript:history.back()'>返回</a>");
}
function formatHTML($str){
	$str=htmlspecialchars_decode($str);
	$str=str_replace("\n", "", $str);
	$str=str_replace("\"", "\\\"", $str);
	return str_replace("'", "\\'", $str);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>完整demo</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="<?=$base?>/admin/res/css/common.css" type="text/css" media="all" />
<script src="<?=$jquery?>" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="<?=$base?>/thirdparty/ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=$base?>/thirdparty/ueditor1_4_3/ueditor.all-min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?=$base?>/thirdparty/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
	<div class="editor">
		<h2 class="h2_title">
			单位名称:<input name="agenName" class="agenName" value="<?=$agen->agenName ?>">
		</h2>
	</div>
	<div class="editor">
		<h2 class="h2_title">单位简介</h2>
		<script id="agenInfo" type="text/plain" style="width:800px;height:250px;">
			<?=$agen->agenInfo?>
		</script>
	</div>
	<div class="toolbar">
	  <ul>
	    <li><a href="javascript:void(0);" class="gotop"></a></li>
	    <li><a href="javascript:void(0);" class="back"></a></li>
	    <li><a href="javascript:void(0);" class="reset"></a></li>
	    <li><a href="javascript:void(0);" class="save"></a></li>
	  </ul>
	</div>
	<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	    var agenInfo = UE.getEditor('agenInfo',{
		"toolbars": [['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'underline',
				'fontborder', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset',
				'blockquote', 'pasteplain', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'forecolor', 'backcolor', 'insertorderedlist',
				'insertunorderedlist', 'cleardoc','lineheight',
				'paragraph'],
				['simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'pagebreak', 'template', 'background', '|',
			            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
			            'inserttable', 'deletetable', 'insertparagraphbeforetable','|',
			            'print', 'preview', 'searchreplace', 'drafts','fontfamily', 'fontsize']
		],
	    autoHeightEnabled: true,
	    autoFloatEnabled: true,
	    fontsize:[["小六",8],["六号",10],["小五",12],["五号",14],["小四",16],["四号",18],["小三",20],
		  	    ["三号",21],["小二",24],["二号",29],["小一",32],["一号",34],["小初",48],["初号",56]]
	});
    function getContent(ueditor) {
        return UE.getEditor(ueditor).getContent();
    }
    $(function(){
		$(".toolbar ul li a").click(function(){
		    if($(this).attr("class")=="gotop"){
				$('html,body').animate({scrollTop: '0px'}, 500);
			}
		    if($(this).attr("class")=="back"){
				window.location.href="<?=$base?>/admin/frame/cmsmng.php?action=coopAgen";
			}
		    if($(this).attr("class")=="reset"){
				UE.getEditor('agenInfo').setContent('<?=$agen->agenInfo ?>');
			}
			if($(this).attr("class")=="save"){
			    var info=getContent("agenInfo");
				if(info.length>4000000){
					alert("内容超过字数限制，请重新编辑后提交。");
					return false;
				}
				$.ajax({
					type: 'POST',
					url: "<?=$base ?>/admin/service/addAgen.php",
					data: {id:<?=$agenId?>,modelId:<?=$agen->modelId ?>,agenName:$("input[name=agenName]").val(),agenInfo:getContent("agenInfo")},
					success: function(data){
						if(data.success){
							alert("修改成功");
							window.location.href="<?=$base ?>/admin/frame/cmsmng.php?action=coopAgen";
						}else{
							alert("修改失败，请检查数据库连接是否正常");
						}
					},
					dataType : "json"
				});
			}
		});
	});
</script>
</body>
</html>