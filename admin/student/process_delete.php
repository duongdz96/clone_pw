<?php
if (empty($_GET['id'])) {
    echo "Phai truyen id";
}

$id = $_GET['id'];

include '../connect.php';

$sql = "delete from user
where id = '$id'";

mysqli_query($connect, $sql);

echo "Xoa hoc sinh thanh cong";
$result = mysqli_query($connect, "SELECT * FROM user");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
mysqli_close($connect);
echo json_encode($data);