<?php

include '../connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$sql = "select * from user
where id = '$id'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) != 1) {
    http_response_code((400));
    echo "khong ton tai tai khoan";
    exit();
}
$sql = "update user
set
name = '$name',
email = '$email',
password = '$password'
where 
id = '$id'";

$count =

    mysqli_query($connect, $sql);

echo "Update thanh cong";
$result = mysqli_query($connect, "SELECT * FROM user WHERE id = '$id'");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
mysqli_close($connect);
echo json_encode($data);