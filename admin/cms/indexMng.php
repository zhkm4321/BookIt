<?php
include_once $_SERVER ["DOCUMENT_ROOT"].'/config.php';
$user = $_SESSION ['user'];
if (! isset ( $user )) {
	header ( "Location: /admin/login/index.php" );
	exit ();
}
$sql = "select * from b_pictures where model_id=:modelId";
$stmt = $dbh->prepare ( $sql );
$stmt->bindParam ( "modelId", $_SESSION ["CURRENT_MODEL"] );
$stmt->execute ();
?>
<script type="text/javascript">
$(function(){
    $("#index_pic_list li span").on("click",function(){
	    $_thumb=$(this).siblings("img");
		removePic($_thumb.attr("pid"),$_thumb.attr("src"),"index_pic_list");
    });
});
</script>
<div class="form_head">
	<h2 class="title_h2">首页焦点滚动图</h2><div id="add_pic" class="select_pic">添加</div>
</div>
<ul class="pic_list" id="index_pic_list">
<?php
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
?>
<li><img pid="<?=$row['id']?>" src="<?=$row['thumb_path']?>" alt="图片"/><span><a href="javascript:void(0);">&nbsp;</a></span></li>
<?php
}
?>
</ul>
