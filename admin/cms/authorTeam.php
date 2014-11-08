<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$sql = "select * from b_team where id=1 limit 1";
$stmt = $dbh->prepare ( $sql );
$stmt->execute ();
$teamInfo = NULL;
if ($row = $stmt->fetch ( PDO::FETCH_ASSOC )) {
	$teamInfo = $row ["team_info"];
}
?>
<script src="<?=$base?>/admin/res/js/teamMng.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="<?=$base?>/thirdparty/ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=$base?>/thirdparty/ueditor1_4_3/ueditor.all-min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?=$base?>/thirdparty/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
<div class="teamEditor">
	<h2 class="h2_title">团队简介<input type="button" class="info_save" value="保存" /></h2>
	<script id="teamEditor" type="text/plain">
		<?=$teamInfo?>
	</script>
</div>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var teamEditor = UE.getEditor('teamEditor',{
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
</script>
<div class="teamEmployee">
	<h2 class="h2_title">人员编辑</h2>
	<div class="emp_left">
		<div class="fd_select_gx">
			<div id="input_text" class="input_text">选择一个职位</div>
	        <span id="select_drop" class="select_drop"></span>
	        <div style="display: none;" class="select_con" id="select_con">
	            <a value="1" href="javascript:void(0)">主编</a>
	            <a value="2" href="javascript:void(0)">副主编</a>
	            <a value="3" href="javascript:void(0)">策划编辑</a>
	        </div>
		</div>
		<ul class="empList"></ul>
	</div>
	<form id="sculptureForm" enctype="multipart/form-data"; action="<?=$base ?>/admin/service/uploadSculpture.php" target="sculpture_form" method="post">
	<input type="file" style="display: none;" name="sculpture" id="sculpture" onchange="uploadSculpture()"/>
	</form>
	<div class="emp_right">
	<form id="employeeForm" >
		<div class="person_infor">
			<img src="/admin/res/images/sculpture.png" class="person">
			<iframe name="sculpture_form" style="display: none;"></iframe>
			
			<div class="person_con">
				<div class="p_li">
					<h5>姓名：</h5>
					<span><input name="realname" class="p_input"/></span>
				</div>
				<div class="p_li">
					<h5>单位：</h5>
					<span><input name="organization" class="p_input"/></span>
				</div>
				<div class="p_li">
					<h5>职务：</h5>
					<span><input name="job" class="p_input" disabled="disabled"/></span>
				</div>
				<div class="p_li">
					<h5>介绍：</h5>
					<span class="textarea">
					<textarea name="info" rows="5" cols="10" class="p_textarea"></textarea>
					</span>
				</div>
			</div>
		</div>
		<div class="msg"><span>点击</span><a href="javascript:void(0)" class="create_v">新建</a><span>添加人员</span></div>
		<div class="operate">
			<input type="hidden" name="jobId" value="" />
			<input type="hidden" name="eId" value="" />
			<input type="hidden" name="picture" value="" />
			<input type="button" class="create" value="新建" />
			<input type="button" class="save" value="保存" />
			<input type="button" class="delete" value="删除" />
		</div>
	</form>
	</div>
</div>