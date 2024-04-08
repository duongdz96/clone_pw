<?php
if (empty($_GET['id'])) {
    echo "Phai truyen id";
}

$id = $_GET['id'];

include '../connect.php';

$sql = "delete from user
where id = '$id'";

mysqli_query($connect, $sql);

mysqli_close($connect);

echo "Xoa hoc sinh thanh cong";