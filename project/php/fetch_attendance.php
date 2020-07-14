<?php
require "connection.php";
$data = json_decode(file_get_contents("php://input"));
$output = array();
$sql = "SELECT * FROM `attendance` WHERE stu_id = ".$data->selected_student->id." AND  sub_id = ".$data->selected_subject->id."";
//echo $sql;
$res = $conn->query($sql);
if ($res->num_rows > 0){
    while ($row = $res->fetch_assoc())
        array_push($output, $row);
    echo json_encode($output);
}else
    echo "No Record";
?>