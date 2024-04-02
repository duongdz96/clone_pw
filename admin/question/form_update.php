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

$id = $_GET['id'];
$sql = "select 
question.id as q_id,
question.content as nd_ch,
`option`.optiona as da_a,
`option`.optionb as da_b,
`option`.optionc as da_c,
`option`.optiond as da_d,
`option`.correct_option as da_dung
from question
join `option` on `option`.question_id = question.id
where question.id = '$id'
";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

$sql1 = "select * from `option`";
$options = mysqli_query($connect, $sql1);
?>
<form method="post" action="process_update.php">
	<input type="hidden" name="q_id" value="<?php echo $each['q_id'] ?>">
    <br>
	Nội dung
    <input type="text" name="nd_ch" value="<?php echo $each['nd_ch'] ?>">
    <br>
    Đáp án A
    <input type="text" name="da_a" value="<?php echo $each['da_a'] ?>">
    <br>
    Đáp Án B
    <input type="text" name="da_b" value="<?php echo $each['da_b'] ?>">
    <br>
    Đáp Án C
    <input type="text" name="da_c" value="<?php echo $each['da_c'] ?>">
    <br>
    Đáp Án D
    <input type="text" name="da_d" value="<?php echo $each['da_d'] ?>">
    <br>
    Đáp án Đúng
    <select name="da_dung">
		<option value="a" <?php if ($each['da_dung'] == 'a') echo 'selected'; ?>>a</option>
		<option value="b" <?php if ($each['da_dung'] == 'b') echo 'selected'; ?>>b</option>
		<option value="c" <?php if ($each['da_dung'] == 'c') echo 'selected'; ?>>c</option>
		<option value="d" <?php if ($each['da_dung'] == 'd') echo 'selected'; ?>>d</option>
	</select>
    <br>
	<button>Sửa</button>
</form>
</body>
</html>