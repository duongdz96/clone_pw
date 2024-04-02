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
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    } ?>
    <h1>Thêm học sinh</h1>
    <form method="post" action="process_addStudent.php">
        Tên
        <input type="text" name="name">
        <br>
        Email
        <input type="email" name="email">
        <br>
        Mật khẩu
        <input type="password" name="password">
        <br>
        <button>Thêm học sinh</button>
    </form>
</body>

</html>