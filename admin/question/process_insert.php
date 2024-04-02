<?php 
include '../check_admin_login.php';

$q_id = $_POST['q_id'];
$nd_ch = $_POST['nd_ch'];
$da_a = $_POST['da_a'];
$da_b = $_POST['da_b'];
$da_c = $_POST['da_c'];
$da_d = $_POST['da_d'];
$da_dung = $_POST['da_dung'];



include '../connect.php';

$sql = "insert into question(id, content)
values('$q_id', '$nd_ch')";

mysqli_query($connect, $sql);

$sql1 = "insert INTO `option`(`question_id`, `optiona`, `optionb`, `optionc`, `optiond`, `correct_option`) 
VALUES ('$q_id','$da_a','$da_b','$da_c','$da_d','$da_dung')";

mysqli_query($connect, $sql1);

mysqli_close($connect);

header('location:index.php?success=Thêm thành công');