<?php 
include '../check_admin_login.php';

include '../connect.php';

$id = $_GET['id'];
$mabaithi = $_GET['mabaithi'];

$sql = "delete from `exam-question`
where question_id = '$id'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header("location:view_detail.php?id=$mabaithi&success=Xóa thành công");