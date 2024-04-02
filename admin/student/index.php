<ul>
    <li>
        <a href="./addStudent.php">
            Thêm học sinh
        </a>
    </li>
</ul>
<ul>
    <li>
        <a href="./deleteStudent.php">
            Xóa học sinh
        </a>
    </li>
</ul>
<ul>
    <li>
        <a href="../student">
            Chỉnh sửa thông tin
        </a>
    </li>
</ul>

<?php
if (isset($_GET['error'])) {
    ?>

    <span style="color: red;">
        <?php echo $_GET['error']; ?>
    </span>

<?php } ?>

<?php
if (isset($_GET['success'])) {
    ?>

    <span style="color: green;">
        <?php echo $_GET['success']; ?>
    </span>

<?php } ?>