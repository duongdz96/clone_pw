<?php include '../check_super_admin_login.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
Đây là giao diện quản lý kỳ thi
<a href="form_insert.php">Thêm</a>
<?php 
	include '../menu.php';
?>
<?php 
	require '../connect.php';
	$sql = "select DISTINCT
    `user_respond`.`user_id` as id,
       `user`.`name` as name,
      `exam`.`name` as ename,
      `user_respond`.`result` as result
       from `user_respond`
       join `user` on  `user_respond`.`user_id` = `user`.id
       join `exam` on `user_respond`.`exam_id` = `exam`.id
    ";
	$result = mysqli_query($connect, $sql);
?>
<form action="export_pdf.php" method = "post" class = "mb-2">
    <input type="submit" name="submit" class="btn btn-outline-danger" value="Export to PDF">
</form>
<table width="100%" border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Exam ID</th>
		<th>Score</th>
	</tr>
	<?php foreach ($result as $each) { ?>
	<tr>
		<td>
			<?php echo $each['id'] ?>
		</td>
		<td>
			<?php echo $each['name'] ?>
		</td>	
		<td>
			<?php echo $each['ename'] ?>
		</td>	
		<td>
			<?php echo $each['result']?>
		</td>
	</tr>
	<?php } ?>
</table>
</body>
</html>