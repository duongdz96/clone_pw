<?php 
include 'admin/connect.php';

$sql = "select * from test";
$result = mysqli_query($connect, $sql);

mysqli_close($connect);
?>

<style type="text/css">
	.tung_ky_thi {
		width: 33%;
		height: 300px;
		float: left;
		border: 1px solid black;
	}
</style>

<div id="giua">
	<?php foreach ($result as $each) { ?>
		<div class="tung_ky_thi">
			<h1>
				<?php if(!empty($_SESSION['id'])) { ?>
					<a href="view_exam.php?id=<?php echo $each['id']?>">
					<?php echo $each['name'] ?>
					</a>
				<?php } else {?>
					<h1><?php echo $each['name']?></h1>
				<?php } ?>
			</h1>
			<img src="admin/test/photos/<?php echo $each['photo'] ?>" height = '100'>
			<p><?php echo $each['description'] ?></p>
		</div>
	<?php } ?>
</div>