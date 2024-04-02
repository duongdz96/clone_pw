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

$sql = "select * from test";
$result = mysqli_query($connect, $sql);
?>
<form method="post" action="process_insert.php" enctype="multipart/form-data">
	Tên
	<input type="text" name="name">
	<br>
    Mô tả
    <textarea name="description"></textarea>
	Ảnh
	<input type="file" name="photo">
	<br>
	Kỳ thi
	<select name="test_id">
		<?php foreach ($result as $each) { ?>
			<option value="<?php echo $each['id'] ?>">
				<?php echo $each['name'] ?>
			</option>
		<?php } ?>
	</select>
	<br>
	<button>Thêm</button>
</form>
</body>
</html>