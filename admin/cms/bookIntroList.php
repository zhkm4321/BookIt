<?php 
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
if($_SERVER['REQUEST_METHOD']=="GET"){
?>
	<script type="text/javascript">
	$(function(){
	    queryForBookList(1, 15);
	})
	</script>
<?php
}else{
include_once $_SERVER ["DOCUMENT_ROOT"] . '/config.php';
$DEFINE_PAGESIZE=15;
$bookArr [] = NULL; // 存放书籍列表

$listPageSize = NULL;
$listPageSize = NULL;
$listTotalSize = NULL;
$listTotalPage = NULL;
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
$sql = "SELECT id,name,author FROM b_book";
$stmt = $dbh->prepare ( $sql );
$stmt->execute ();
$i = 0;
while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
	$book = new Book ();
	$book->id = $row ["id"];
	$book->name = $row ["name"];
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
<div class="form_head">
	<a href="javascript:void(0);" class="add_book">新增书籍</a><a href="javascript:void(0);" class="del_book">删除选中</a>
</div>
<div class="pic_list">
	<table cellspacing="0" cellpadding="0" border="0" class="pic_tab">
		<tbody>
			<tr class="head_tr">
				<th style="width: 30px;">
					<input type="checkbox" style="cursor: pointer;" onclick="allCheck(this)" id="all" name="all">
				</th>
				<th style="width: 60px;"><label style="cursor: pointer;" for="all">ID</label></th>
				<th>书名</th>
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
				echo "<td><input type='checkbox' value='".$bookArr [$i]->id."' name='ids' uid='".$bookArr[$i]->id."'></td>";
				echo "<td>".$bookArr [$i]->id . "</td>";
				echo "<td>" . $bookArr [$i]->name . "</td>";
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
		<?php if($listPageNo!=$listTotalPage){?>
		<a id="nextPage" class="next" href="javascript:void(0);">下一页</a>
		<?php }else{?>
		<a class="btn_block" href="javascript:void(0);"></a>
		<?php }?>
		</div>
	</div>
</div>
<div id="addBookBox" class="addBookBox">
<form enctype="multipart/form-data"; method="post" action="addBook.php" id="addBookForm">
	<table>
		<tr>
			<td width="50"><label for="bookname" class="label">书名</label></td>
			<td width="150"><input id="bookname" name="bookname" type="text" class="input" /></td>
		</tr>
		<tr>
			<td><label for="author" class="label">作者</label></td>
			<td><input id="author" name="author" type="text" class="input" /></td>
		</tr>
		<tr height="40"><td colspan="3" align="center"><input type="buttom" name="submit" value="新增并编辑" class="addBtn" /></td></tr>
	</table>
</form>
</div>
<?php 
}
?>