<?php 
	session_start();
	include 'admin/connect.php';
	if(isset($_COOKIE['remember'])) {
		$token = $_COOKIE['remember'];
		$sql = "select * from customers
		where token = '$token'";
		$result = mysqli_query($connect, $sql);
		$number_rows = mysqli_num_rows($result);
		if($number_rows == 1) {
			$each = mysqli_fetch_array($result);
			$_SESSION['id'] = $each['id'];
			$_SESSION['name'] = $each['id'];
		}
	}
	if(isset($_SESSION['id'])) {
		header('location:user.php');
		exit;
	}
	if(isset($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
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
<h1>Trang đăng nhập</h1>
<form method="post" action="process_signin.php">
	Email
	<input type="email" name="email">
	<br>
	Mật khẩu
	<input type="password" name="password">
	<br>
	Ghi nhớ đăng nhập
	<input type="checkbox" name="remember">
	<br>
	<button>Đăng nhập</button>
</form>
</body>
</html>