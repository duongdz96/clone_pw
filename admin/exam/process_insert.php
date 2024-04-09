<?php
// include '../check_admin_login.php';

$name = $_POST['name'];
// $photo = $_FILES['photo'];
$description = $_POST['description'];
$test_id = $_POST['test_id'];

// $folder = "photos/";
// $file_extension = explode('.', $photo['name'])[1];
// $file_name = time() . '.' . $file_extension;
// $path_file = $folder . $file_name;
// move_uploaded_file($photo["tmp_name"], $path_file);


include '../connect.php';

$sql = "insert into exam(name, description, test_id)
values('$name',  '$description', '$test_id')";

mysqli_query($connect, $sql);


echo "Them bai thi ";
echo $name;
echo " thanh cong";

$result = mysqli_query($connect, "SELECT id, name, description FROM exam");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
mysqli_close($connect);
echo json_encode($data);