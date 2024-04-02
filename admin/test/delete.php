<?php
include '../check_super_admin_login.php';
if(empty($_GET['id'])) {
	header('location:index.php?error=Phải truyền mã vào');
}

$id = $_GET['id'];

include '../connect.php';

$sql = "delete from test
where id = '$id'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location:index.php?sucess=Xóa thành công');