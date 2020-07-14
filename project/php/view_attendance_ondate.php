<?php
require "connection.php";
$data = json_decode(file_get_contents("php://input"));
$output = array();
$sql = "SELECT attendance.*, student.* FROM `attendance` left join student on attendance.stu_id = student.id WHERE sub_id=".$data->selected_subject->id." AND date = '".$data->date."'";
echo $sql;
//
$res = $conn->query($sql);
if ($res->num_rows > 0){
    while ($row = $res->fetch_assoc())
        array_push($output,$row);
    echo json_encode($output);
}else
    echo 0;
?>