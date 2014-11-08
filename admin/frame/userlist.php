<?php
include $_SERVER["DOCUMENT_ROOT"].'/config.php';
unset($_SESSION['pageNo']);
unset($_SESSION['pageSize']);
unset($_SESSION['userLevel']);
unset($_SESSION['orderBy']);

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
//获取显示用户级别
$listUserLevel=$_POST['level'];
if(!isset($listUserLevel)){
	$listUserLevel=$_SESSION['userLevel'];
}else{
	$_SESSION['userLevel']=$listUserLevel;
}

$listTotalSize=NULL;//用户总数量
$listTotalPage=NULL;//总页数
$userArr[]=NULL;//存放用户列表

$countSql="SELECT count(*) as c FROM b_user";
$sql="SELECT * FROM b_user";
if($listUserLevel!=-1){
	$sql.=" WHERE level=:level";
	$countSql.=" WHERE level=:level";
}
$sql.=" order by :orderBy desc";
$countSql.=" order by :orderBy desc";
//计算记录总条数
$stmt=$dbh->prepare($countSql);
if($listUserLevel!=-1){
	$stmt->bindParam(":level", $listUserLevel);
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
//echo "OrderBy".$listOrderBy."  userLevel".$listUserLevel."  PageNo".$listPageNo."  PageSize".$listPageSize."  TotalSize".$listTotalSize." TotalPage".$listTotalPage."<br/>";
$first=($listPageNo-1)*$listPageSize;
$offset=$listPageSize;
//echo "first".$first."  last".$offset."<br/>";
$sql.=" limit $first,$offset";
//echo $sql;
//查询记录
$stmt=$dbh->prepare($sql);
if($listUserLevel!=-1){
	$stmt->bindParam(":level", $listUserLevel);
}
$stmt->bindParam(":orderBy", $listOrderBy);
$stmt->execute();
$i=0;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$user=new User();
	$user->id=$row['id'];
	$user->username=$row['username'];
	$user->password=$row['password'];
	$user->realname=$row['realname'];
	$user->organ=$row['organ'];
	$user->sculpture=$row['sculpture'];
	$user->lastLogin=$row['last_login'];
	$user->regDate=$row['reg_date'];
	$user->regIp=$row['ip'];
	$user->level=$row['level'];
	$userArr[$i]=$user;
	$i++;
}
?>
<script type="text/javascript">
listTotalPage=<?=$listTotalPage?>;
</script>
<div class="form_head">
	<a href="javascript:void(0);" class="add_user">添加用户</a><a href="javascript:void(0);" class="del_user">删除选中</a>
</div>
<div class="pic_list">
	<table cellspacing="0" cellpadding="0" border="0" class="pic_tab">
		<tbody>
			<tr class="head_tr">
				<th style="width: 30px;"><input type="checkbox" style="cursor: pointer;" onclick="allCheck(this)" id="all" name="all"></th>
				<th style="width: 70px;"><label style="cursor: pointer;" for="all"> ID </label></th>
			    <th>用户名</th>
			    <th>姓名</th>
			    <th>单位</th>
			    <!-- <th>头像</th>  -->
			    <th>最后登录时间</th>
			    <th>注册时间</th>
			    <th>注册IP</th>
			    <th>操作</th>
			</tr>
			<?php
				for ($i=0;$i<sizeof($userArr);$i++){
					echo "<tr>";
					echo "<td><input type='checkbox' value='".$userArr[$i]->id."' name='ids' uid='".$userArr[$i]->id."'></td>";
					echo "<td>".$userArr[$i]->id."</td>";
					echo "<td>".$userArr[$i]->username."</td>";
					echo "<td>".$userArr[$i]->realname."</td>";
					echo "<td>".$userArr[$i]->organ."</td>";
					/*
					if($userArr[$i]->sculpture==NULL){
						echo "<td><img src='/admin/res/images/nosculpture.gif' alt='暂无'/></td>";
					}else{
						echo "<td><img src='".$userArr[$i]->sculpture."' alt='暂无'/></td>";
					}
					*/
					echo "<td>".date('Y-m-d',$userArr[$i]->lastLogin)."</td>";
					echo "<td>".date('Y-m-d',$userArr[$i]->regDate)."</td>";
					echo "<td>".$userArr[$i]->regIp."</td>";
					echo "<td style='width: 50px;'><a href='javascript:delUser(".$userArr[$i]->id.");'>删除</a></td>";
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
		<?php if($listPageNo!=$listTotalPage&&$listTotalPage>1){?>
		<a id="nextPage" class="next" href="javascript:void(0);">下一页</a>
		<?php }else{?>
		<a class="btn_block" href="javascript:void(0);"></a>
		<?php }?>
		</div>
	</div>
</div>
<div id="addUserBox" class="addUserBox">
<form enctype="multipart/form-data"; method="post" action="reg.php" id="addUserForm">
	<table>
		<tr>
			<td width="70"><label for="username" class="label">邮箱</label></td>
			<td width="150"><input id="username" name="username" type="text" class="input" /></td>
			<td width="200"><span class="msg">用户名必须是邮箱</span></td>
		</tr>
		<tr>
			<td><label for="password" class="label">密码</label></td>
			<td><input id="password" name="password" type="password" class="input" /></td>
			<td><span class="msg"></span></td>
		</tr>
		<tr>
			<td><label for="realname" class="label">姓名</label></td>
			<td><input id="realname" name="realname" type="text" class="input" /></td>
			<td><span class="msg">请填写真实姓名</span></td>
		</tr>
		<tr>
			<td><label for="organ" class="label">单位</label></td>
			<td><input id="organ" name="organ" type="text" class="input" /></td>
			<td><span class="msg"></span></td>
		</tr>
		<!--
		<tr>
			<td><label for="sculpture" class="label">头像</label></td>
			<td><input id="sculpture" name="sculpture" type="file" class="input"/></td>
			<td><span class="msg">大小不要超过2M</span></td>
		</tr>
		 -->
		<tr height="40"><td colspan="3" align="center"><input type="buttom" name="submit" value="注册" class="addBtn" /></td></tr>
	</table>
</form>
</div>