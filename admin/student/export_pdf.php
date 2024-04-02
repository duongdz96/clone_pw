<?php
require_once("../connect.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
extract($_POST);

if(isset($submit)){
    $sql = "SELECT  distinct
                `user_respond`.`user_id` as id,
                `user`.`name` as fullname,
                `exam`.`name` as exam,
                `user_respond`.`result` as score
            FROM 
                `user_respond`
            JOIN 
                `user` ON `user_respond`.`user_id` = `user`.id
            JOIN 
                `exam` ON `user_respond`.`exam_id` = `exam`.id";

    $querry = mysqli_query($connect,$sql);
    $html = '';
    $html .= '
    <h2 align="center">Export Data To PDF File</h2>
    <table style="width:100%; border-collapse:collapse;">
        <tr>
            <th style="border:1px solid #ddd; padding:8px; text-align:left;">ID</th>
            <th style="border:1px solid #ddd; padding:8px; text-align:left;">Full Name</th>
            <th style="border:1px solid #ddd; padding:8px; text-align:left;">Exam</th>
            <th style="border:1px solid #ddd; padding:8px; text-align:left;">Score</th>
        </tr>
    ';
    if(mysqli_num_rows($querry) > 0){
        $count = 1;
        foreach($querry as $data){
            $html .= '
            <tr> 
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["id"].'</td>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["fullname"].'</td>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["exam"].'</td>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["score"].'</td>
            </tr>
            ';
            $count++;
        }
    } else {
        $html .= '
        <tr>
            <td colspan="4" style="border:1px solid #ddd; padding:8px; text-align:left;">No Data</td>
        </tr>
        ';
    }
    $html .= '</table>';
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4", "portrait");
    $dompdf->render();
    $dompdf->stream("data.pdf");
}
?>
