<!DOCTYPE html>
<html>
<head>
    <title>Chi Tiết Kết Quả Thi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<a href="index.php">Trở về trang chủ</a>
<?php
include 'admin/connect.php';

session_start();
$user_id = $_GET['uid'];
$exam_id = $_GET['id'];

$sql = "SELECT * FROM `user_respond` 
join `option` on `option`.id = `user_respond`.optionid
WHERE user_id = '$user_id' AND exam_id = '$exam_id'";
$result = mysqli_query($connect, $sql);

$option_map = array(
    'a' => 'optiona',
    'b' => 'optionb',
    'c' => 'optionc',
    'd' => 'optiond'
);

if (mysqli_num_rows($result) > 0) {
    $correct_count = 0;
    $total_questions = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>Câu hỏi: " . $row['question_id'] . "</p>";
        
        $selected_option_field = $option_map[$row['selected_option']];
        $correct_option_field = $option_map[$row['correct_option']];
    
        echo "<p>Câu trả lời của bạn: " . strtoupper($row['selected_option']) . ": " . $row[$selected_option_field] . "</p>";
        echo "<p>Đáp án đúng: " . strtoupper($row['correct_option']) . ": " . $row[$correct_option_field] . "</p>";
        
        if ($row['iscorrect'] == 1) {
            echo "<p>Kết quả: Đúng</p>";
            $correct_count++;
        } else {
            echo "<p>Kết quả: Sai</p>";
        }
        echo "<hr>";
    }

    $score = round(($correct_count / $total_questions) * 10, 2);

    echo "<p>Tổng số câu đúng: $correct_count / $total_questions</p>";
    echo "<p>Điểm số: $score</p>";
} else {
    echo "Không có dữ liệu kết quả cho bài thi này.";
}

mysqli_close($connect);
?>

</body>
</html>
