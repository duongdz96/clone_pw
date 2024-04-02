<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    Đây là giao diện quản lý học sinh
    <!-- <a href="form_insert.php">Thêm</a> -->
    <?php
    include '../menu.php';
    ?>
    <?php
    require '../connect.php';
    $sql = "select * from user";
    $result = mysqli_query($connect, $sql);
    ?>
    <table width="100%" border="1">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Password</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each) { ?>
            <tr>
                <td>
                    <?php echo $each['id'] ?>
                </td>
                <td>
                    <?php echo $each['name'] ?>
                </td>
                <td>
                    <?php echo $each['email'] ?>
                </td>
                <td>
                    <?php echo '********' ?>
                </td>
                <td>
                    <a href="editStudent.php?id=<?php echo $each['id'] ?>">
                        Sửa
                    </a>
                </td>
                <td>
                    <a href="process_delete.php?id=<?php echo $each['id'] ?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>