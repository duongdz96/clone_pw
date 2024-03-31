<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php  
session_start();
if(empty($_SESSION['cart'])) {
?>
<h1>Giỏ hàng của bạn hiện chưa có gì, vui lòng đặt thử một vài món hàng nhé</h1>
<br>
<p>
	<a href="index.php">Trở về trang chủ</a>
</p>
<?php } else {
	$cart = $_SESSION['cart'];
	$sum = 0;
?>

<table border="1" width="100%">
	<tr>
		<th>Ảnh</th>
		<th>Tên</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
		<th>Xóa</th>

	</tr>
	<?php foreach ($cart as $id => $each) { ?>
		<tr>
			<td><img src="admin/products/photos/<?php echo $each['photo'] ?>" height='100'></td>
			<td><?php echo $each['name'] ?></td>
			<td><?php echo $each['price'] ?></td>
			<td>
				<a href="update_quantity.php?id=<?php echo $id ?>&type=dec">-</a>
				<?php echo $each['quantity'] ?>
				<a href="update_quantity.php?id=<?php echo $id ?>&type=inc">+</a>
			</td>
			<td>
				<?php 
					echo $each['quantity']*$each['price'];
					$sum += $each['quantity']*$each['price'];
				?>	
			</td>
			<td>
				<a href="delete_from_cart.php?id=<?php echo $id ?>">X</a>
			</td>
		</tr>
	<?php } ?>
</table>
<h1>
	Tổng tiền hóa đơn của bạn:
	$<?php echo $sum ?>
</h1>
<?php 
$id = $_SESSION['id'];
require 'admin/connect.php';
$sql = "select * from customers
where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<form method="post" action="process_checkout.php">
	Tên người nhận
	<input type="text" name="name_receiver" value="<?php echo $each['name'] ?>">
	<br>
	SĐT người nhận
	<input type="text" name="phone_number_receiver" value="<?php echo $each['phone_number'] ?>">
	<br>
	Địa chỉ người nhận
	<input type="text" name="address_receiver" value="<?php echo $each['address'] ?>">
	<br>
	<button>Đặt hàng</button>
</form>
<?php } ?>
</body>
</html>