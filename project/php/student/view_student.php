<?php
require '../connection.php';
session_start();
$sql = "select * from student where rollno = ".$_SESSION['username']."";
//echo $sql;

echo json_encode(($conn->query($sql))->fetch_assoc());