<?php 
include '../check_admin_login.php';
include '../connect.php';

$id = $_GET['id'];

$sql = "delete from exam
where id = '$id'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location:index.php?success=Xóa thành công');