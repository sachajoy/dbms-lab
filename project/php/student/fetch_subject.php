<?php
require '../connection.php';
session_start();
$sql = "select * from student where rollno = ".$_SESSION['username']."";
//echo $sql;

$data = array();
$sql = "select * from subject where branch = ".(($conn->query($sql))->fetch_assoc())['branch']."";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc())
    array_push($data, $row);
echo json_encode($data);
//echo $sql;