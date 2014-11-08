<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$DEFINE_PAGESIZE=15;
$bookArr [] = NULL; // 存放书籍列表

$listPageSize = NULL;
$listPageSize = NULL;
$listTotalSize = NULL;
$listTotalPage = NULL;
if (isset ( $_POST ['pageNo'] )) {
	// 获取列表当前页码
	$listPageNo = $_POST ['pageNo'];
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
$sql = "SELECT id,name,author FROM b_book";
$stmt = $dbh->prepare ( $sql );
$stmt->execute ();
$i = 0;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$book = new Book ();
	$book->id = $row ["id"];
	$book->name = $row ["name"];
	$book->cover = $row ["cover"];
	$book->author = $row ["author"];
	$bookArr [$i] = $book;
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
<script type="text/javascript">
var listPageNo=<?=$_SESSION ['pageNo'] ?>;
var listPageSize=<?=$_SESSION ['pageSize'] ?>;
var listTotalPage=<?=$listTotalPage ?>;
function queryForBookList(pageNo,pageSize) {
	listPageNo=pageNo;
	listPageSize=pageSize;
	$.ajax({
		type: 'POST',
		url: "/admin/cms/bookIntro.php",
		data: {pageNo:pageNo,pageSize:pageSize},
		success: function(data){
			$("#list_con").html(data);
		},
		dataType: "html"
	});
}
</script>
<div class="pic_list">
	<table cellspacing="0" cellpadding="0" border="0" class="pic_tab">
		<tbody>
			<tr class="head_tr">
				<th style="width: 60px;"><input type="checkbox" style="cursor: pointer;" onclick="allCheck(this)" id="all" name="all"> &nbsp; <label
					style="cursor: pointer;" for="all"> ID </label></th>
				<th>书名</th>
				<th>封面</th>
				<th>作者</th>
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
				echo "<td><input type='checkbox' value='" . $bookArr [$i]->id . "' name='ids'>&nbsp;" . $bookArr [$i]->id . "</td>";
				echo "<td>" . $bookArr [$i]->name . "</td>";
				echo "<td><img src=\"" . $base.$bookArr [$i]->cover . "\" alt=\"封面\" ></td>";
				echo "<td>" . $bookArr [$i]->author . "</td>";
				echo "<td><a href='javascript:delBook(".$bookArr [$i]->id.");'>删除</a>&nbsp;".
						"<a href='".$base."/admin/cms/editBook.php?id=".$bookArr[$i]->id."'>编辑</a></td>";
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
<script type="text/javascript">
$(function(){
	$(".page_nr a").on("click", function(event) {
		var con = $(this).html();
		var pageNo = 0;
		if (pageNo = parseInt(con)) {
		    queryForBookList(pageNo, listPageSize);
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
		    queryForBookList(listPageNo, listPageSize);
		}
		event.preventDefault();
	});
});
</script>