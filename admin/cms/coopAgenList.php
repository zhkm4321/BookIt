<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$DEFINE_PAGESIZE=15;
$agenArr [] = NULL; // 存放书籍列表

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
$sql = "SELECT * FROM b_agen where model_id=:modelId order by sort_id asc";
$stmt = $dbh->prepare ( $sql );
$stmt->execute (array("modelId"=>$modelId));
$i = 0;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$agen = new Agen ();
	$agen->id = $row ["id"];
	$agen->modelId = $row ["model_id"];
	$agen->agenName = $row ["agen_name"];
	$agen->agenInfo = $row ["agen_info"];
	$agenArr [$i] = $agen;
	$i++;
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
	<a href="javascript:void(0);" class="add_agen">新增机构</a><a href="javascript:void(0);" class="del_agen">删除选中</a>
</div>
<div class="pic_list">
	<table cellspacing="0" cellpadding="0" border="0" class="pic_tab">
		<tbody>
			<tr class="head_tr">
				<th style="width: 30px;">
					<input type="checkbox" style="cursor: pointer;" onclick="allCheck(this)" id="all" name="all">
				</th>
				<th style="width: 60px;"><label style="cursor: pointer;" for="all">ID</label></th>
				<th>机构名称</th>
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
				echo "<td><input type='checkbox' value='".$agenArr [$i]->id."' name='ids' uid='".$agenArr[$i]->id."'></td>";
				echo "<td>".$agenArr [$i]->id . "</td>";
				echo "<td>" . $agenArr [$i]->agenName . "</td>";
				echo "<td><a href='javascript:delAgen(".$agenArr [$i]->id.");'>删除</a>&nbsp;".
						"<a href='".$base."/admin/service/editAgen.php?id=".$agenArr[$i]->id."'>编辑</a></td>";
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
<div id="addAgenBox" class="addAgenBox">
<form enctype="multipart/form-data"; method="post" action="<?=$base?>/admin/service/addAgen.php" id="addAgenForm">
	<table>
		<tr>
			<td width="80"><label for="agenName" class="label">机构名称</label></td>
			<td width="150"><input id="agenName" name="agenName" type="text" class="input" /></td>
		</tr>
		<tr height="40">
		<td colspan="3" align="center">
		<input name="modelId" type="hidden" value="<?=$_SESSION['modelId'] ?>"/>
		<input name="id" type="hidden" />
		<input type="buttom" name="submit" value="新增并编辑" class="addAgenBtn" />
		</td>
		</tr>
	</table>
</form>
</div>
<script type="text/javascript">
 $(function(){
 	$("#artwl_mask").remove();
 	$("#artwl_boxcontain").remove();
	// 绑定添加用户弹出层事件
    $.artwl_bind({
	showbtnid : ".add_agen",
	title : "新增书籍",
	content : "#addAgenBox"
    });
    $("#artwl_close").on("click", function() {
		queryForAgenList(listModelId, listPageNo, listPageSize);
    });
    $(".page_nr a").on("click", function(event) {
	var con = $(this).html();
	var pageNo = 0;
	if (pageNo = parseInt(con)) {
	    queryForAgenList(listModelId, pageNo, listPageSize);
	} else {
	    if ($(this).attr("id") == "nextPage") {
		listPageNo++;
	    } else if ($(this).attr("id") == "prePage") {
		listPageNo--;
	    }
	    if (listPageNo < 1) {
		listPageNo = 1;
	    }
	    if (listPageNo > listTotalPage) {
		listPageNo = listTotalPage;
	    }
	    queryForAgenList(listModelId, listPageNo, listPageSize);
	}
	event.preventDefault();
    });
    $(".del_agen").on("click", function(event) {
		var Arr = "";
		$("[name=ids]").each(function(i, n) {
		    if ($(n).is(":checked")) {
			Arr += $(n).attr("uid") + ',';
		    }
		});
		if (Arr == "") {
		    alert("请选择删除项");
		    return;
		}
		delAgen(Arr.substring(0, Arr.length - 1));
    });
 });
</script>
