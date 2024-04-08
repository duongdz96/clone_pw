<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

include '../connect.php';

$sql = "select count(*) from user
where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if ($number_rows == 1) {
    session_start();
    http_response_code(400);
    echo ('hoc sinh da duoc them');
    exit;
}

$sql = "insert into user(name, email, password)
values('$name','$email','$password')";
mysqli_query($connect, $sql);

$sql = "select id from user
where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

mysqli_close($connect);
echo 'them hoc sinh ';
echo $_SESSION['name'];
echo ' thanh cong';
