<?php 
include '../check_admin_login.php';

include '../connect.php';

$id = $_GET['id'];
$mabaithi = $_GET['mabaithi'];

$sql = "insert into `exam-question`(question_id, exam_id)
values('$id',  '$mabaithi')";

mysqli_query($connect, $sql);

mysqli_close($connect);

header("location:view_detail.php?id=$mabaithi&success=Thêm thành công");