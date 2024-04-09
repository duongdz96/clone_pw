<?php
// include '../check_super_admin_login.php';
if (empty($_GET['id'])) {
	echo "Truyen id vao";
}

$id = $_GET['id'];

include '../connect.php';

$sql = "delete from test
where id = '$id'";

mysqli_query($connect, $sql);

echo "Xoa ki thi thanh cong";

$result = mysqli_query($connect, "SELECT id, name, description FROM test");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}
mysqli_close($connect);
echo json_encode($data);