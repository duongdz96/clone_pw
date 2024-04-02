<?php include '../check_super_admin_login.php';
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

$id = $_GET['id'];
$sql = "select * from test
where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

// $sql1 = "select * from manufacturers";
// $manufacturers = mysqli_query($connect, $sql1);
?>
<form method="post" action="process_update.php" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
	Tên
	<input type="text" name="name" value="<?php echo $each['name'] ?>">
	<br>
	Đổi ảnh mới 
	<input type="file" name="photo_new">
	<br>
	Giữ ảnh cũ
	<img src="photos\<?php echo $each['photo'] ?>" height = "100">
	<input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
	<br>
	<br>
	Mô tả
	<textarea name="description"><?php echo $each['description'] ?></textarea>
	<br>
	<br>
	<button>Sửa</button>
</form>
</body>
</html>