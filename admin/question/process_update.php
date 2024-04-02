<?php 
include '../check_admin_login.php';
include '../connect.php';

$q_id = $_POST['q_id'];
$nd_ch = $_POST['nd_ch'];
$da_a = $_POST['da_a'];
$da_b = $_POST['da_b'];
$da_c = $_POST['da_c'];
$da_d = $_POST['da_d'];
$da_dung = $_POST['da_dung'];

$sql = "update `question` 
SET`content`='$nd_ch' WHERE  `id`='$q_id'";

mysqli_query($connect, $sql);

$sql1 = "update `option`
set
optiona = '$da_a',
optionb = '$da_b',
optionc = '$da_c',
optiond = '$da_d',
correct_option = '$da_dung'
where question_id = '$q_id'";

mysqli_query($connect, $sql1);

mysqli_close($connect);

header('location:index.php?success=Sửa thành công');