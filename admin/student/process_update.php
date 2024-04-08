<?php

include '../connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$sql = "update user
set
name = '$name',
email = '$email',
password = '$password'
where 
id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);

echo "Cap nhat hoc sinh thanh cong";