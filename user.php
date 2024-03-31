<?php 
session_start();
if(empty($_SESSION['id'])) {
	$_SESSION['error'] = "Vui lòng đăng nhập";
	header('location:signin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
Đây là trang người dùng. Xin chào bạn 
<?php echo $_SESSION['name'] ?>

<a href="signout.php">Ơ đăng xuất rồi à?</a>
</body>
</html>