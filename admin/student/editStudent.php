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
    $sql = "select * from user
where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <form method="post" action="process_update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        Email
        <input type="text" name="email" value="<?php echo $each['email'] ?>">
        <br>
        Password
        <input type="password" name="password" value="<?php echo $each['password'] ?>">
        <br>
        <button>Sửa</button>
    </form>
</body>

</html>