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
        question.id as ma_ch, 
        question.content as nd_ch,
        `option`.optiona as da_a,
        `option`.optionb as da_b,
        `option`.optionc as da_c,
        `option`.optiond as da_d,
        `option`.correct_option as da_dung
		from question
        join `option` on `option`.question_id = question.id";
		$result = mysqli_query($connect, $sql);
	?>
<h1>Đây là khu vực quản câu hỏi</h1>
<br>
<a href="form_insert.php">Thêm</a>
<table border="1" width="100%">
	<tr>
		<th>Mã</th>
		<th>Nội dung</th>
		<th>Đáp án A</th>
		<th>Đáp án B</th>
		<th>Đáp án C</th>
		<th>Đáp án D</th>
        <th>Đáp án đúng</th>
        <th>Sửa</th>
		<th>Xóa</th>
	</tr>
<?php foreach ($result as $each) {?>
	<tr>
		<td><?php echo $each['ma_ch'] ?></td>
		<td><?php echo $each['nd_ch'] ?></td>
        <td><?php echo $each['da_a']?></td>
        <td><?php echo $each['da_b']?></td>
        <td><?php echo $each['da_c']?></td>
        <td><?php echo $each['da_d']?></td>
        <td><?php echo $each['da_dung']?></td>
        <td>
			<a href="form_update.php?id=<?php echo $each['ma_ch'] ?>">Sửa</a>
		</td>
		<td>
			<a href="delete.php?id=<?php echo $each['ma_ch'] ?>">Xóa</a>
		</td>
	</tr>
<?php } ?>
</table>
</body>
</html>