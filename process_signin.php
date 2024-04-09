<?php

$email = $_POST['email'];
$password = $_POST['password'];

require 'admin/connect.php';

$sql = "select * from user
where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if ($number_rows == 1) {
	session_start();
	$each = mysqli_fetch_array($result);
	$id = $each['id'];
	$_SESSION['id'] = $id;
	$_SESSION['name'] = $each['name'];
	echo $_SESSION['name'] . "<br>";
	echo $email;
	exit;
} else {
	http_response_code(400);
	echo json_encode(["error" => "Ten dang nhap hoac mat khau khong hop le"]);
	exit;
}
// session_start();
// $_SESSION['error'] = "Sai email hoặc mật khẩu";
// header('location:index.php');