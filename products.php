<?php 
include 'admin/connect.php';

$sql = "select * from products";
$result = mysqli_query($connect, $sql);

mysqli_close($connect);
?>

<style type="text/css">
	.tung_bai_tin_tuc {
		width: 33%;
		height: 300px;
		float: left;
		border: 1px solid black;
	}
</style>

<div id="giua">
	<?php foreach ($result as $each) { ?>
		<div class="tung_bai_tin_tuc">
			<h1><?php echo $each['name'] ?></h1>
			<img src="admin/products/photos/<?php echo $each['photo'] ?>" height = '100'>
			<p><?php echo $each['price'] ?></p>
			<a href="product.php?id=<?php echo $each['id'] ?>">Xem chi tiết >>>></a>
			<?php if(!empty($_SESSION['id'])) { ?>
				<br>
				<a href="add_to_cart.php?id=<?php echo $each['id'] ?>">Thêm vào giỏ hàng</a>
			<?php } ?>
		</div>
	<?php } ?>
</div>