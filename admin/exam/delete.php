<?php
// include '../check_admin_login.php';
include '../connect.php';

$id = $_GET['id'];

$sql = "delete from exam
where id = '$id'";

mysqli_query($connect, $sql);

echo "Xoa bai thi thanh cong";
$result = mysqli_query($connect, "SELECT id, name, description FROM exam");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
mysqli_close($connect);
echo json_encode($data);