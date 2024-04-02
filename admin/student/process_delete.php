<?php
if (empty($_GET['id'])) {
    header('location: index.php?error=Phải truyền mã vào');
}

$id = $_GET['id'];

include '../connect.php';

$sql = "delete from user
where id = '$id'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: deleteStudent.php');