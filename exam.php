<?php 
include 'admin/connect.php';
$test_id = $_GET['id'];
$sql = "select * from exam
where test_id = '$test_id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
mysqli_close($connect);
?>

<style type="text/css">
	.tung_bai_thi {
		width: 33%;
		height: 300px;
		float: left;
		border: 1px solid black;
	}
</style>

<div id="giua">
	<?php if($number_rows > 0) { ?>
		<?php foreach ($result as $each) { ?>
			<div class="tung_bai_thi">
				<h1>
					<?php echo $each['id']?>
					<?php echo $each['name'] ?>
					</a>
				</h1>
				<img src="admin/exam/photos/<?php echo $each['photo'] ?>" height = '100'>
				<p><?php echo $each['description'] ?></p>
				<?php if(!empty($_SESSION['id'])) { ?>
					<br>
					<a href="quiz.php?id=<?php echo $each['id']?>">Vào thi</a>
				<?php } ?>
			</div>
		<?php } ?>
	<?php } else { ?>
		<h1>Tạm thời chưa có bài thi nào thuộc kỳ thi này, vui lòng quay lại sau</h1>
	<?php } ?>
</div>