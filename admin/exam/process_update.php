<?php
// include '../check_admin_login.php';
include '../connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
// $photo_new = $_FILES['photo_new'];
// if ($photo_new['size'] > 0) {
// 	$folder = "photos/";
// 	$file_extension = explode('.', $photo_new['name'])[1];
// 	$file_name = time() . '.' . $file_extension;
// 	$path_file = $folder . $file_name;
// 	move_uploaded_file($photo_new["tmp_name"], $path_file);
// } else {
// 	$file_name = $photo_old = $_POST['photo_old'];
// }
// $photo_old = $_POST['photo_old'];
$description = $_POST['description'];
$test_id = $_POST['test_id'];

$sql = "update exam
set
name = '$name',
description = '$description',
test_id = '$test_id'
where 
id = '$id'";

mysqli_query($connect, $sql);

echo ('Sửa thành công');
$result = mysqli_query($connect, "SELECT id, name, description FROM exam WHERE id = '$id'");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}
mysqli_close($connect);
echo json_encode($data);