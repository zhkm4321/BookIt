<?php
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
session_start();
if(!isset($_POST['orderBy'])){
	exit('非法访问!');
}
//获取列表排序参数
$listOrderBy=$_POST['orderBy'];
if(!isset($listOrderBy)){
	$listOrderBy=$_SESSION['orderBy'];
}else{
	$_SESSION['orderBy']=$listOrderBy;
}
//获取按书籍bookId查询
$listBookId=$_POST['bookId'];
if(!isset($listBookId)){
	$listPageSize=$_SESSION['bookId'];
}else{
	$_SESSION['bookId']=$listBookId;
}
//获取列表当前页码
$listPageNo=$_POST['pageNo'];
if(!isset($listPageNo)){
	$listPageNo=$_SESSION['pageNo'];
}else{
	$_SESSION['pageNo']=$listPageNo;
}
//获取列表页数
$listPageSize=$_POST['pageSize'];
if(!isset($listPageSize)){
	$listPageSize=$_SESSION['pageSize'];
}else{
	$_SESSION['pageSize']=$listPageSize;
}

$listTotalSize=NULL;//订单总数量
$listTotalPage=NULL;//总页数
$orderArr[]=NULL;//存放订单列表

$countSql="SELECT count(*) as c FROM v_order_list";
$sql="SELECT * FROM v_order_list";
if($listBookId!=-1){
	$sql.=" WHERE book_id=:bookId";
	$countSql.=" WHERE book_id=:bookId";
}
$sql.=" order by :orderBy desc";
$countSql.=" order by :orderBy desc";
//计算记录总条数
$stmt=$dbh->prepare($countSql);
if($listBookId!=-1){
	$stmt->bindParam(":bookId", $listBookId);
}
$stmt->bindParam(":orderBy", $listOrderBy);
$stmt->execute();
if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$listTotalSize=$row['c'];//获取到总记录数量
}
if($listTotalSize%$listPageSize!=0){
	$listTotalPage=floor($listTotalSize/$listPageSize)+1;
}else{
	$listTotalPage=floor($listTotalSize/$listPageSize);
}
//echo "OrderBy".$listOrderBy."  BookId".$listBookId."  PageNo".$listPageNo."  PageSize".$listPageSize."  TotalSize".$listTotalSize." TotalPage".$listTotalPage."<br/>";
$first=($listPageNo-1)*$listPageSize;
$offset=$listPageSize;
//echo "first".$first."  last".$offset."<br/>";
$sql.=" limit $first,$offset";
//echo $sql;
//查询记录
$stmt=$dbh->prepare($sql);
if($listBookId!=-1){
	$stmt->bindParam(":bookId", $listBookId);
}
$stmt->bindParam(":orderBy", $listOrderBy);
$stmt->execute();
$i=0;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$order=new Order();
	$order->id=$row['id'];
	$order->userId=$row['user_id'];
	$order->realname=$row['realname'];
	$order->organ=$row['organ'];
	$order->position=$row['position'];
	$order->email=$row['email'];
	$order->phone=$row['phone'];
	$order->quantity=$row['quantity'];
	$order->orderDate=$row['order_date'];
	$order->bookId=$row['book_id'];
	$order->bookName=$row['bookName'];
	$orderArr[$i]=$order;
	$i++;
}
?>
<script type="text/javascript">
listTotalPage=<?=$listTotalPage?>;
</script>
<div class="form_head">
	<a href="javascript:void(0);" class="del_order">删除选中</a>
</div>
<div class="pic_list">
	<table cellspacing="0" cellpadding="0" border="0" class="pic_tab">
		<tbody>
			<tr class="head_tr">
				<th style="width: 30px;"><input type="checkbox" style="cursor: pointer;" onclick="allCheck(this)" id="all" name="all"></th>
				<th style="width: 70px;"><label style="cursor: pointer;" for="all">订单号</label></th>
			    <th>姓名</th>
			    <th>单位</th>
			    <th>职位</th>
			    <th>email</th>
			    <th>电话</th>
			    <th>数量</th>
			    <th>下单日期</th>
			    <th>书名</th>
			    <th>操作</th>
			</tr>
			<?php
				for ($i=0;$i<sizeof($orderArr);$i++){
					echo "<tr>";
					echo "<td><input type='checkbox' value='".$orderArr[$i]->id."' name='ids' uid='".$orderArr[$i]->id."'></td>";
					echo "<td style='width: 70px;'>".$orderArr[$i]->id."</td>";
					echo "<td>".$orderArr[$i]->realname."</td>";
					echo "<td>".$orderArr[$i]->organ."</td>";
					echo "<td>".$orderArr[$i]->position."</td>";
					echo "<td>".$orderArr[$i]->email."</td>";
					echo "<td>".$orderArr[$i]->phone."</td>";
					echo "<td>".$orderArr[$i]->quantity."</td>";
					echo "<td>".date('Y-m-d',$orderArr[$i]->orderDate)."</td>";
					echo "<td>".$orderArr[$i]->bookName."</td>";
					echo "<td style='width: 50px;'><a href='javascript:delOrder(".$orderArr[$i]->id.");'>删除</a></td>";
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
		$range=3;//显示当前页码左右范围页码
		if($listPageNo-$range<=2){
			$max=$listPageNo+$range>$listTotalPage?$listTotalPage:$listPageNo+$range;
			for ($j=1;$j<=$max;$j++){
				echo '<a class="';
				if($listPageNo==$j){
					echo 'num_select';
				}else{
					echo 'num_normal';
				}
				echo '" href="javascript:void(0);">'.$j.'</a>';
				if($listTotalPage>$listPageNo+$range+1 && $j==$listPageNo+$range){
					echo '<span class="syh">...</span>';
					echo '<a class="num_normal" href="javascript:void(0);">'.$listTotalPage.'</a>';
				}
			}
		}else if($listPageNo+$range>=$listTotalPage-1){
			for ($j=$listPageNo-$range;$j<=$listTotalPage;$j++){
				if($j==$listPageNo-$range){
					echo '<a class="num_normal" href="javascript:void(0);">1</a>';
					echo '<span class="syh">...</span>';
				}
				echo '<a class="';
				if($listPageNo==$j){
					echo 'num_select';
				}else{
					echo 'num_normal';
				}
				echo '" href="javascript:void(0);">'.$j.'</a>';
			}
		}else{
			echo '<a class="num_normal" href="javascript:void(0);">1</a>';
			echo '<span class="syh">...</span>';
			for ($j=$listPageNo-$range;$j<=$listPageNo+$range;$j++){
				echo '<a class="';
				if($listPageNo==$j){
					echo 'num_select';
				}else{
					echo 'num_normal';
				}
				echo '" href="javascript:void(0);">'.$j.'</a>';
			}
			echo '<span class="syh">...</span>';
			echo '<a class="num_normal" href="javascript:void(0);">'.$listTotalPage.'</a>';
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