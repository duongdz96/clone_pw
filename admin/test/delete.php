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

mysqli_close($connect);

echo "Xoa ki thi thanh cong";