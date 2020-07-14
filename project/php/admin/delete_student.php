<?php
require '../connection.php';
$rescevied = file_get_contents('php://input');
$sql = "delete from student where id = ".$rescevied."";
//echo $sql;
$res = $conn->query($sql);
$sql = "delete from marks where stu_id = ".$rescevied."";
$res = $conn->query($sql);
$sql = "delete from attendance where stu_id = ".$rescevied."";
$res = $conn->query($sql);
?>
