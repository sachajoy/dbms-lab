<?php
require '../selectLastId.php';
$last_id = get_last_id("faculty_branch_subject")+1;
$data = json_decode(file_get_contents("php://input"));
$sql = "select * from faculty_branch_subject where subject_id = ".$data->subject_id."";
$res = $conn->query($sql);
if ($res->num_rows > 0)
    echo 0;
else {
    $sql = "INSERT INTO `faculty_branch_subject`
        (`id`, `faculty_id`, `subject_id`) 
        VALUES 
        (" . $last_id . "," . $data->faculty_id . "," . $data->subject_id . ")";
//echo $sql;
    $res = $conn->query($sql);
    if ($res) {
        echo 1;
    }
}

?>
