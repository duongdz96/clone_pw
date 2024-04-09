<?php
// include '../check_super_admin_login.php';

$name = $_POST['name'];
// $photo = $_FILES['photo'];
$description = $_POST['description'];

// $folder = "photos/";
// $file_extension = explode('.', $photo['name'])[1];
// $file_name = time() . '.' . $file_extension;
// $path_file = $folder . $file_name;
// move_uploaded_file($photo["tmp_name"], $path_file);


include '../connect.php';

$sql = "insert into test(name, description)
values('$name', '$description')";

mysqli_query($connect, $sql);

echo "Them bai kiem tra ";
echo $name;
echo " thanh cong";
echo "Mo ta: ";
echo $description;

$result = mysqli_query($connect, "SELECT id, name, description FROM test");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
mysqli_close($connect);
echo json_encode($data);