<?php include '../check_admin_login.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
		include '../menu.php';
		include '../connect.php';

		$sql = "select 
		exam.*,
		test.name as ten
		from exam
		join test on test.id = exam.test_id";
		$result = mysqli_query($connect, $sql);
	?>
<h1>Đây là khu vực quản bài thi</h1>
<br>
<a href="form_insert.php">Thêm</a>
<table border="1" width="100%">
	<tr>
		<th>Mã</th>
		<th>Tên</th>
		<th>Mô tả</th>
		<th>Ảnh</th>
		<th>Tên kỳ thi</th>
		<th>Sửa</th>
		<th>Xóa</th>
		<th>Xem chi tiết</th>
	</tr>
<?php foreach ($result as $each) {?>
	<tr>
		<td><?php echo $each['id'] ?></td>
		<td><?php echo $each['name'] ?></td>
        <td><?php echo $each['description']?></td>
		<td>
			<img src="photos/<?php echo $each['photo'] ?>" height = "100">
		</td>
		<td><?php echo $each['ten'] ?></td>
		<td>
			<a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
		</td>
		<td>
			<a href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a>
		</td>
		<td>
			<a href="view_detail.php?id=<?php echo $each['id'] ?>">Xem chi tiết</a>
		</td>
	</tr>
<?php } ?>
</table>
</body>
</html>