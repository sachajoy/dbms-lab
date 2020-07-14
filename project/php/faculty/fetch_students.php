<?php
require '../connection.php';
session_start();
$data = json_decode(file_get_contents("php://input"));
$stu = array();
$sql = "select * from student where branch = ".$data->branch." order by rollno";
//echo $sql;
$res = $conn->query($sql);
while($row = $res->fetch_assoc())
    array_push($stu,$row);
echo json_encode($stu);
?>