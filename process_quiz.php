<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'admin/connect.php';
    session_start();
    $user_id = $_SESSION['id'];
    $exam_id = $_GET['id'];
    $user_respond_data = array();

    foreach ($_POST['question_numbers'] as $key => $question_id) {
        $selected_option = $_POST['answers'][$question_id];
        $option_id = $_POST['option_ids'][$key];

        $correct_option = get_correct_option_from_database($question_id);
        $iscorrect = ($selected_option == $correct_option) ? 1 : 0;

        $user_respond_data[] = "('$user_id', '$exam_id', '$question_id', '$selected_option', '$option_id', '$iscorrect')";
    }

    $sql = "INSERT INTO `user_respond` (user_id, exam_id, question_id, selected_option, optionid, iscorrect) 
            VALUES " . implode(", ", $user_respond_data);

    if (mysqli_query($connect, $sql)) {
        echo "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công!";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }

    mysqli_close($connect);

} else {
    header("Location: quiz.php");
    exit;
}

function get_correct_option_from_database($question_id) {
    include 'admin/connect.php';

    $sql = "SELECT correct_option FROM `option` WHERE question_id = $question_id";

    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $correct_option = $row['correct_option'];
        
        mysqli_close($connect);
        
        return $correct_option;
    } else {
        return null;
    }
}
?>
<a href="view_detail.php?id=<?php echo $exam_id ?>&uid=<?php echo $user_id?>">Xem kết quả chi tiết</a>