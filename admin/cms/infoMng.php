<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$modelId = NULL;
$parentId = $_SESSION['CURRENT_MODEL'];
if (isset ( $_SESSION ["modelId"] )) {
	$modelId = $_SESSION ["CURRENT_MODEL"];
} else {
	$modelId = "null";
}
?>

<script type="text/javascript" src="<?=$base ?>/admin/res/js/infoMng.js"></script>
<script type="text/javascript">
var BASE='<?=$base ?>';
queryForInfoList(<?=$modelId ?>,1,15);
</script>
