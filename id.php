<?php 
$id = $_GET['id'];

include 'admin/connect.php';
$sql = "select * from products
where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
mysqli_close($connect);
?>

<div id="giua">
	<h1><?php echo $each['name'] ?></h1>
	<img src="admin/products/photos/<?php echo $each['photo'] ?>" height = '100'>;
	<p><?php echo $each['price'] ?></p>
	<p><?php echo $each['description'] ?></p>
</div>