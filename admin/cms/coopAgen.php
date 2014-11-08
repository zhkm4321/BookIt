<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$modelId = NULL;
$parentId = $_SESSION['CURRENT_MODEL'];
if (isset ( $_SESSION ["modelId"] )) {
	$modelId = $_SESSION ["modelId"];
} else {
	$modelId = "null";
}
?>

<script type="text/javascript" src="<?=$base ?>/admin/res/js/coopAgenMng.js"></script>
<script type="text/javascript">
showCoopMenu(<?=$parentId ?>,<?=$modelId ?>);
</script>
