<?php
require_once '../config.php';
header("Content-Type:text/html;charset=UTF-8");
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
$orderArr[]=NULL;//存放订单列表
$userId=$_SESSION['userid'];
$sql="SELECT * FROM v_order_list o WHERE o.user_id=:userId";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":userId", $userId);
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
<table border="1">
  <tr>
    <th>订单编号</th>
    <th>用户ID</th>
    <th>姓名</th>
    <th>单位</th>
    <th>职位</th>
    <th>email</th>
    <th>电话</th>
    <th>数量</th>
    <th>下单日期</th>
    <th>书名</th>
  </tr>
<?php
for ($i=0;$i<sizeof($orderArr);$i++){
	echo "<tr>";
	echo "<td>".$orderArr[$i]->id."</td>";
	echo "<td>".$orderArr[$i]->userId."</td>";
	echo "<td>".$orderArr[$i]->realname."</td>";
	echo "<td>".$orderArr[$i]->organ."</td>";
	echo "<td>".$orderArr[$i]->position."</td>";
	echo "<td>".$orderArr[$i]->email."</td>";
	echo "<td>".$orderArr[$i]->phone."</td>";
	echo "<td>".$orderArr[$i]->quantity."</td>";
	echo "<td>".date('Y-m-d',$orderArr[$i]->orderDate)."</td>";
	echo "<td>".$orderArr[$i]->bookName."</td>";
	echo "</tr>";
}
?>
</table>
<?php
/*
$stmt->bindParam(':realname', $order->realname);
$stmt->bindParam(':organ', $order->organ);
$stmt->bindParam(':position', $order->position);
$stmt->bindParam(':email', $order->email);
$stmt->bindParam(':phone', $order->phone);
$stmt->bindParam(':quantity', $order->quantity);
$stmt->bindParam(':bookId', $order->bookId);
$stmt->bindParam(':orderDate', time());
*/
?>
<a href="/user/my.php">返回个人中心</a>