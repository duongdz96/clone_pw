<!DOCTYPE html>
<html>
<head>
    <title>Bài Thi Trắc Nghiệm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include 'admin/connect.php';
$id = $_GET['id'];
$sql = "select 
question.id,
question.content,
`option`.id as oid,
optiona, optionb, optionc, optiond
from question 
join `option`
on `option`.`question_id` = question.id
join `exam-question` on `exam-question`.`question_id` = question.id
where `exam-question`.`exam_id` = '$id'";

$result = mysqli_query($connect, $sql);
?>


<form method="post" action="process_quiz.php?id=<?php echo $id ?>">
    <?php foreach ($result as $question) { ?>
        <p><?php echo $question['content']; ?></p>
        
        <input type="hidden" name="question_numbers[]" value='<?php echo $question['id']?>'>
        <input type="hidden" name="option_ids[]" value='<?php echo $question['oid']; ?>'>
        <label><input type="radio" name="answers[<?php echo $question['id']; ?>]" value="a"> <?php echo $question['optiona']; ?></label><br>
        <label><input type="radio" name="answers[<?php echo $question['id']; ?>]" value="b"> <?php echo $question['optionb']; ?></label><br>
        <label><input type="radio" name="answers[<?php echo $question['id']; ?>]" value="c"> <?php echo $question['optionc']; ?></label><br>
        <label><input type="radio" name="answers[<?php echo $question['id']; ?>]" value="d"> <?php echo $question['optiond']; ?></label><br>
    <?php } ?>
    <button type="submit">Submit</button>
</form>
<?php

mysqli_close($connect);
?>
</body>
</html>