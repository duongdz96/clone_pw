<?php include '../check_admin_login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
include '../menu.php';
include '../connect.php';
?>
<form method="post" action="process_insert.php">
    Mã câu hỏi
    <input type="number" name = "q_id">
    <br>
	Nội dung
    <input type="text" name="nd_ch">
    <br>
    Đáp án A
    <input type="text" name="da_a">
    <br>
    Đáp Án B
    <input type="text" name="da_b">
    <br>
    Đáp Án C
    <input type="text" name="da_c">
    <br>
    Đáp Án D
    <input type="text" name="da_d">
    <br>
    Đáp án Đúng
    <select name="da_dung">
        <option value="a">a</option>
        <option value="b">b</option>
        <option value="c">c</option>
        <option value="d">d</option>
    </select>
    <br>
	<button>Thêm</button>
</form>
</body>
</html>