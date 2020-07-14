<?php
require '../connection.php';
session_start();
$data = json_decode(file_get_contents("php://input"));
$sql = "select id from faculty where regno = ".$_SESSION['username']."";
//echo $sql;
//var_dump($_SESSION);
$data = array('faculty_details'=>array());
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$sql = "select faculty_branch_subject.*, subject.* from `faculty_branch_subject` left join `subject` on faculty_branch_subject.subject_id = subject.id where faculty_id =".$row['id']."";
//echo $sql;
$res = $conn->query($sql);
while($row = $res->fetch_assoc())
    array_push($data['faculty_details'],$row);
echo json_encode($data);
?>
