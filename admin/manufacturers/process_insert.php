<?php 
include '../check_super_admin_login.php';
include '../connect.php';

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])) {
	header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
}


$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

$sql = "insert into manufacturers(name, address, phone, photo)
values('$name', '$address', '$phone', '$photo')";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location:index.php?sucess=Thêm thành công');