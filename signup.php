<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
	session_start();
	if(isset($_SESSION['error'])) {
	echo $_SESSION['error'];
	unset($_SESSION['error']);
	} ?>
<h1>Form đăng ký</h1>
<form method="post" action="process_signup.php">
	Tên
	<input type="text" name="name">
	<br>
	Email
	<input type="email" name="email">
	<br>
	Mật khẩu
	<input type="password" name="password">
	<br>
	Số điện thoại
	<input type="text" name="phone_number">
	<br>
	Địa chỉ
	<input type="text" name="address">
	<br>
	<button>Đăng ký</button>
</form>
</body>
</html>