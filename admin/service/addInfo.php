<?php

// 新增和更新
include_once $_SERVER["DOCUMENT_ROOT"] . '/config.php';
if (!isset ($_POST['modelId']))
{
	exit ("param modelId is require!");
}
$info = new Info();
if (isset ($_POST['id']))
{
	$info->id = (int)$_POST['id'];
}
$info->model_id = (int)$_POST['modelId'];
$info->info_author = $_POST['infoAuthor'];
$info->info_title = $_POST['infoTitle'];
if (isset ($_POST['infoContent']))
{
	$info->info_content = $_POST['infoContent'];
}
else
{
	$info->info_content = "";
}
$info->info_title_img = $_POST['infoTitleImg'];
if (isset ($info->id) && $info->id != "")
{ // 指定id则为修改逻辑
	try
	{
		$sql = "UPDATE b_info SET model_id=:modelId,info_title=:infoTitle,info_title_img=:infoTitleImg,info_author=:infoAuthor,info_content=:infoContent where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array (
			":id" => $info->id,
			":modelId" => $info->model_id,
			":infoTitle" => $info->info_title,
			":infoTitleImg" => $info->info_title_img,
			":infoAuthor" => $info->info_author,
			":infoContent" => $info->info_content
		));
		echo json_encode(array (
			"success" => true,
			"data" => $info
		));
	}
	catch (Exception $e)
	{
		print "Error: " . $e->getMessage() . "<br/>";
		echo json_encode(array (
			"success" => false
		));
	}
}
else
{ // 位置定id 则说明是新添加的
	$info->info_create_date = time();
	$info->info_sort_date = time();
	try
	{
		$sql = "INSERT INTO b_info(id,model_id,info_title,info_title_img,info_author,info_content,info_create_date,info_sort_date) VALUES(null,:modelId,:infoTitle,:infoTitleImg,:infoAuthor,:infoContent,:infoCreateDate,:infoSortDate)";
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array (
			":modelId" => $info->model_id,
			":infoTitle" => $info->info_title,
			":infoTitleImg" => $info->info_title_img,
			":infoAuthor" => $info->info_author,
			":infoContent" => $info->info_content,
			":infoCreateDate" => $info->info_create_date,
			":infoSortDate" => $info->info_sort_date
		));
		$info->id = $dbh->lastInsertId();
		echo json_encode(array (
			"success" => true,
			"data" => $info
		));
	}
	catch (Exception $e)
	{
		echo json_encode(array (
			"success" => false
		));
	}
}
?>