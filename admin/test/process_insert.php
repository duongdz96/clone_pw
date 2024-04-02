<?php 
include '../check_super_admin_login.php';

$name = $_POST['name'];
$photo = $_FILES['photo'];
$description = $_POST['description'];

$folder = "photos/";
$file_extension = explode('.', $photo['name'])[1];
$file_name = time().'.'.$file_extension;
$path_file = $folder.$file_name;
move_uploaded_file($photo["tmp_name"], $path_file);


include '../connect.php';

$sql = "insert into test(name, description, photo)
values('$name', '$description', '$file_name')";

mysqli_query($connect, $sql);

mysqli_close($connect);
header('location:index.php');