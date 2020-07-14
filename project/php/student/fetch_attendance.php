<?php
require "../connection.php";
session_start();
$data = json_decode(file_get_contents("php://input"));
$output = array();
$sql = "select *, sum(a.att) as attended, count(a.id) as total from attendance a left join student s on a.stu_id = s.id where s.rollno = ".$_SESSION['username']." and a.sub_id = ".$data->selected_subject->id." ";
//echo $sql;
echo json_encode(($conn->query($sql))->fetch_assoc());
?>