<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
$order_id = $_GET['id'];
require '../connect.php';
$sql = "select * from order_product
join products on order_product.product_id = products.id
where order_id = '$order_id'";
$result = mysqli_query($connect, $sql);
$sum = 0;
?>
<table border="1" width="100%">
	<tr>
		<th>Ảnh</th>
		<th>Tên</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
	</tr>
	<?php foreach ($result as $each) { ?>
		<tr>
			<td><img src="../products/photos/<?php echo $each['photo'] ?>" height='100'></td>
			<td><?php echo $each['name'] ?></td>
			<td><?php echo $each['price'] ?></td>
			<td>
				<?php echo $each['quantity'] ?>
			</td>
			<td>
				<?php 
					echo $each['quantity']*$each['price'];
					$sum += $each['quantity']*$each['price'];
				?>	
			</td>
		</tr>
	<?php } ?>
</table>
<h1>Tổng tiền của đơn này là <?php echo $sum ?></h1>
</body>
</html>