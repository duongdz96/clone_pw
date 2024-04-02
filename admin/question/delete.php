<?php 
include '../check_admin_login.php';
include '../connect.php';

$id = $_GET['id'];

$sql = "delete from question
where id = '$id'";

mysqli_query($connect, $sql);

$sql1 = "delete from `option`
where `question_id` = '$id'";

mysqli_query($connect, $sql1);

mysqli_close($connect);

header('location:index.php?success=Xóa thành công');