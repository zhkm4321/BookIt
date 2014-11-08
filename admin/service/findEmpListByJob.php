<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/config.php';
if (!isset ($_GET['jobId']))
{
	try
	{
		$sql = "select * from b_employee";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$teamInfo = NULL;
		$empArr[] = NULL; // 存放雇员列表
		$i = 0;
		while ($row = $stmt->fetch(PDO :: FETCH_ASSOC))
		{
			$emp = new Employee();
			$emp->id = $row['id'];
			$emp->realname = $row['realname'];
			$emp->organization = $row['organization'];
			$emp->info = $row['info'];
			$emp->job = $row['job'];
			$emp->sculpture = $row['sculpture'];
			$empArr[$i] = $emp;
			$i++;
		}
		echo json_encode($empArr);
	}
	catch (Exception $e)
	{
		echo $e;
	}
}
else
{
	try
	{
		$sql = "select * from b_employee where job=:jobId order by sort_id asc";
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array (
			':jobId' => $_GET['jobId']
		));
		$stmt->execute();
		$teamInfo = NULL;
		$empArr[] = NULL; // 存放雇员列表
		$i = 0;
		while ($row = $stmt->fetch(PDO :: FETCH_ASSOC))
		{
			$emp = new Employee();
			$emp->id = $row['id'];
			$emp->realname = $row['realname'];
			$emp->organization = $row['organization'];
			$emp->info = $row['info'];
			$emp->job = $row['job'];
			$emp->sculpture = $row['sculpture'];
			$empArr[$i] = $emp;
			$i++;
		}
		echo json_encode($empArr);
	}
	catch (Exception $e)
	{
		echo $e;
	}
}
?>