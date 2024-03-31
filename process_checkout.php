<?php 

$name_receiver = $_POST['name_receiver'];
$phone_number_receiver = $_POST['phone_number_receiver'];
$address_receiver = $_POST['address_receiver'];

require 'admin/connect.php';

session_start();
$cart = $_SESSION['cart'];
$customer_id = $_SESSION['id'];
$status = 0;
$total_price = 0;
foreach ($cart as $each) {
	$total_price += $each['quantity'] * $each['price'];
}

$sql = "insert into
 orders(customer_id, name_receiver, phone_number_receiver, address_receiver, status, total_price)
values('$customer_id', '$name_receiver', '$phone_number_receiver', '$address_receiver', '$status', '$total_price')";

mysqli_query($connect, $sql);

$sql = "select max(id) from orders
where customer_id = '$customer_id'";

$result = mysqli_query($connect, $sql);
$order_id = mysqli_fetch_array($result)['max(id)'];

foreach ($cart as $id => $each) {
	$quantity = $each['quantity'];
	$sql = "insert into order_product(order_id, product_id, quantity)
	values('$order_id','$id','$quantity')";
	mysqli_query($connect, $sql);
}

mysqli_close($connect);
unset($_SESSION['cart']);

header('location:index.php');