<?php include '../check_super_admin_login.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">
	.tung_cau_hoi {
		width: 33%;
		height: 300px;
		float: left;
		border: 1px solid black;
	}
</style>
<body>
Xem chi tiết câu hỏi
<?php 
	include '../menu.php';
?>
<?php
    $id = $_GET['id'];
	require '../connect.php';
	$sql = "select
    `exam-question`.question_id as ma_ch,
    question.content as nd_ch
    from `exam-question`
    join question on question.id = `exam-question`.question_id
    where exam_id = '$id'";
	$result = mysqli_query($connect, $sql);
?>
<table width="100%" border="1">
	<tr>
		<th>Mã Câu hỏi</th>
		<th>Tên</th>
		<th>Xóa</th>
	</tr>
	<?php foreach ($result as $each) { ?>
	<tr>
		<td>
			<?php echo $each['ma_ch'] ?>
		</td>
		<td>
			<?php echo $each['nd_ch'] ?>
		</td>	
		<td>
			<a href="delete_question.php?id=<?php echo $each['ma_ch'] ?>&mabaithi=<?php echo $id?>">
				Xóa
			</a>
		</td>	
	</tr>
	<?php } ?>
</table>
<?php
    $sql1 = "select question.id as ma_ch1,
    question.content as nd_ch1
    from question
    where id not in (select question_id from `exam-question`_id
                     where exam_id = '$id')";
    $result1 = mysqli_query($connect, $sql1);

    foreach ($result1 as $eachs) { ?>
        <div class="tung_cau_hoi">
            <h2><?php echo $eachs['ma_ch1']?></h2>
            <img src="photos\images.jpg" height = '100'>
            <p><?php echo $eachs['nd_ch1']?></p>
            <a href="add_to_exam.php?id=<?php echo $eachs['ma_ch1']?>&mabaithi=<?php echo $id?>">Thêm vào bài thi</a>
        </div>
<?php } ?>
</body>
</html>