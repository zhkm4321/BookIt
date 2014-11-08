<?php
/**
 * 新闻资讯查询类
 */
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$DEFINE_PAGESIZE=15;
$infoArr [] = NULL; // 存放文章

$listPageSize = NULL;
$listPageSize = NULL;
$listTotalSize = NULL;
$listTotalPage = NULL;
$modelId=NULL;
if(!isset($_POST["modelId"])){
	exit("param modelId is require");
}else{
	$modelId=$_POST["modelId"];
	$_SESSION["modelId"]=$modelId;
}
if(isset($_POST ["pageNo"])){
	// 获取列表当前页码
	$listPageNo = $_POST ["pageNo"];
}
if(isset($_POST ['pageSize'])){
	// 获取列表页数
	$listPageSize = $_POST ['pageSize'];
}
if (! isset ( $listPageNo )) {
	$_SESSION ['pageNo'] = 1;
	$listPageNo = $_SESSION ['pageNo'];
} else {
	$_SESSION ['pageNo'] = $listPageNo;
}
if (! isset ( $listPageSize )) {
	$_SESSION ['pageSize'] = $DEFINE_PAGESIZE;
	$listPageSize = $_SESSION ['pageSize'];
} else {
	$_SESSION ['pageSize'] = $listPageSize;
}
$sql = "SELECT * FROM b_info where model_id=:modelId order by info_create_date desc";
$stmt = $dbh->prepare ( $sql );
$stmt->execute (array("modelId"=>$modelId));
$i = 0;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$info = new Info ();
	$info->id = $row ["id"];
	$info->model_id = $row ["model_id"];
	$info->info_title=$row["info_title"];
	$info->info_content = $row ["info_content"];
	$info->info_create_date = $row ["info_create_date"];
	$info->info_sort_date = $row ["info_sort_date"];
	$infoArr [$i] = $info;
	$i ++;
}
$listTotalSize = $i;
if ($listTotalSize % $listPageSize != 0) {
	$listTotalPage = floor ( $listTotalSize / $listPageSize ) + 1;
} else {
	$listTotalPage = floor ( $listTotalSize / $listPageSize );
}
$first = ($listPageNo - 1) * $listPageSize;
$offset = $listPageSize;
?>
<div class="form_head">
	<a href="javascript:void(0);" class="add_info">新增资讯</a><a href="javascript:void(0);" class="del_info">删除选中</a>
</div>
<div class="pic_list">
	<table cellspacing="0" cellpadding="0" border="0" class="pic_tab">
		<tbody>
			<tr class="head_tr">
				<th style="width: 30px;">
					<input type="checkbox" style="cursor: pointer;" onclick="allCheck(this)" id="all" name="all">
				</th>
				<th style="width: 60px;"><label style="cursor: pointer;" for="all">ID</label></th>
				<th>文章标题</th>
				<th>发布时间</th>
				<th style='width: 80px;'>操作</th>
			</tr>
			<?php
			if($first+$offset>$listTotalSize){
				$max=$listTotalSize;
			}else{
				$max=$first+$offset;
			}
			for($i = $first; $i < $max; $i ++) {
				echo "<tr>";
				echo "<td><input type='checkbox' value='".$infoArr [$i]->id."' name='ids' uid='".$infoArr[$i]->id."'></td>";
				echo "<td>".$infoArr [$i]->id . "</td>";
				echo "<td>" . $infoArr [$i]->info_title . "</td>";
				echo "<td>" . date('Y-m-d',$infoArr [$i]->info_create_date). "</td>";
				echo "<td><a href='javascript:delInfo(".$infoArr [$i]->id.");'>删除</a>&nbsp;".
						"<a href='".$base."/admin/service/editInfo.php?id=".$infoArr[$i]->id."'>编辑</a></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
	<div class="page">
		<div class="page_nr">
		<?php if($listPageNo!=1){?>
		<a id="prePage" class="pre" href="javascript:void(0);">上一页</a>
		<?php }?>
		<?php
		$range = 3; // 显示当前页码左右范围页码
		if ($listPageNo - $range <= 2) {
			$max = $listPageNo + $range > $listTotalPage ? $listTotalPage : $listPageNo + $range;
			for($j = 1; $j <= $max; $j ++) {
				echo '<a class="';
				if ($listPageNo == $j) {
					echo 'num_select';
				} else {
					echo 'num_normal';
				}
				echo '" href="javascript:void(0);">' . $j . '</a>';
				if ($listTotalPage > $listPageNo + $range + 1 && $j == $listPageNo + $range) {
					echo '<span class="syh">...</span>';
					echo '<a class="num_normal" href="javascript:void(0);">' . $listTotalPage . '</a>';
				}
			}
		} else if ($listPageNo + $range >= $listTotalPage - 1) {
			for($j = $listPageNo - $range; $j <= $listTotalPage; $j ++) {
				if ($j == $listPageNo - $range) {
					echo '<a class="num_normal" href="javascript:void(0);">1</a>';
					echo '<span class="syh">...</span>';
				}
				echo '<a class="';
				if ($listPageNo == $j) {
					echo 'num_select';
				} else {
					echo 'num_normal';
				}
				echo '" href="javascript:void(0);">' . $j . '</a>';
			}
		} else {
			echo '<a class="num_normal" href="javascript:void(0);">1</a>';
			echo '<span class="syh">...</span>';
			for($j = $listPageNo - $range; $j <= $listPageNo + $range; $j ++) {
				echo '<a class="';
				if ($listPageNo == $j) {
					echo 'num_select';
				} else {
					echo 'num_normal';
				}
				echo '" href="javascript:void(0);">' . $j . '</a>';
			}
			echo '<span class="syh">...</span>';
			echo '<a class="num_normal" href="javascript:void(0);">' . $listTotalPage . '</a>';
		}
		?>
		<?php if($listPageNo!=$listTotalPage&&$listTotalPage>1){?>
		<a id="nextPage" class="next" href="javascript:void(0);">下一页</a>
		<?php }else{?>
		<a class="btn_block" href="javascript:void(0);"></a>
		<?php }?>
		</div>
	</div>
</div>