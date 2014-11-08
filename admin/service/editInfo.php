<?php
include $_SERVER["DOCUMENT_ROOT"] . '/config.php';
header("Content-type: text/html; charset=utf-8");
if (!isset ($_SESSION["user"]))
{
	header("Location: /admin/login/index.php");
	exit;
}
unset ($_SESSION["infoId"]);
$_SESSION["modelId"]=$_SESSION["CURRENT_MODEL"];
if (isset ($_GET["id"]))
{
	$_SESSION["infoId"] = $_GET["id"];
}
else
{
	$_SESSION["infoId"] = NULL;
}
$sql = "select * from b_info where id=:id limit 1";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":id", $_SESSION["infoId"]);
$stmt->execute();
$info = NULL;
if ($row = $stmt->fetch(PDO :: FETCH_ASSOC))
{
	$info = new Info();
	$info->id = (int)$row["id"];
	$info->model_id = (int)$row["model_id"];
	$_SESSION["modelId"] = $info->model_id;
	$info->info_title = $row["info_title"];
	$info->info_author = $row["info_author"];
	$info->info_title_img = $row["info_title_img"];
	$info->info_sort_date = $row["info_sort_date"];
	$info->info_create_date = $row["info_create_date"];
	$info->info_content = formatHTML($row["info_content"]);
}
function formatHTML($str)
{
	$str = htmlspecialchars_decode($str);
	$str = str_replace("\n", "", $str);
	$str = str_replace("\"", "\\\"", $str);
	return str_replace("'", "\\'", $str);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>编辑资讯</title>
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
		标题:<input name="infoTitle" class="infoTitle" value="<?=($info!=null?$info->info_title:"")?>">
		作者:<input name="infoAuthor" class="infoAuthor" value="<?=($info!=null?$info->info_author:"")?>">
	</h2>
	<h2 class="h2_title">标题图</h2>
	<form id="infoTitleImgForm" enctype="multipart/form-data"; action="<?=$base ?>/admin/service/uploadTitleImg.php" target="titleImg_form" method="post">
	<div class="img_content">
	<?php
	if(isset($info)&&isset($info->info_title_img)&&$info->info_title_img!=""){
	?>
		<img src="<?=$base?><?=$info->info_title_img?>" alt="请上传" class="titleImg"/>
	<?php
	}else{
	?>
		<img src="<?=$base?>/admin/res/images/title_img.jpg" alt="请上传" class="titleImg"/>
	<?php
	}
	?>

	</div>
  	<input type="file" id="title_img" name="title_img" style="display:none;" onchange="uploadTitleImg()"/>
	<input type="hidden" name="infoTitleImg" />
	</form>
	<iframe name="titleImg_form" style="display: none;"></iframe>
</div>
	<div class="editor">
		<h2 class="h2_title">文章内容</h2>
		<script id="infoEditor" type="text/plain" style="width:800px;height:250px;">
			<?=isset($info)?$info->info_content:""?>
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
	    var infoEditor = UE.getEditor('infoEditor',{
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
				window.location.href="<?=$base?>/admin/frame/cmsmng.php?action=infoMng";
			}
		    if($(this).attr("class")=="reset"){
				UE.getEditor('agenInfo').setContent('<?=($info?$info->info_content:"") ?>');
			}
			if($(this).attr("class")=="save"){
			    var info=getContent("infoEditor");
				if(info.length>4000000){
					alert("内容超过字数限制，请重新编辑后提交。");
					return false;
				}
				var id=<?=(isset($_SESSION["infoId"])?$_SESSION["infoId"]:"null") ?>;
				var modelId=<?=(isset($_SESSION["modelId"])?$_SESSION["modelId"]:"null") ?>;
				$.ajax({
					type: 'POST',
					url: "<?=$base ?>/admin/service/addInfo.php",
					data: {id:id,
						modelId:modelId,
						infoTitle:$("input[name=infoTitle]").val(),
						infoAuthor:$("input[name=infoAuthor]").val(),
						infoTitleImg:$("input[name=infoTitleImg]").val(),
						infoContent:getContent("infoEditor")},
					success: function(data){
						if(data.success){
							if(id){
								alert("修改成功");
							}else{
								alert("新增成功");
							}
							window.location.href="<?=$base ?>/admin/frame/cmsmng.php?action=infoMng";
						}else{
							if(id){
								alert("修改失败，请检查数据库连接是否正常");
							}else{
								alert("新增失败，请检查数据库连接是否正常");
							}
						}
					},
					dataType : "json"
				});
			}
		});
		$(".img_content").click(function(){
			$("#title_img").click();
		});
	});
function uploadTitleImg() {
    $("#infoTitleImgForm").submit();
}
</script>
</body>
</html>