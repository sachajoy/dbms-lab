<?php
require '../connection.php';
$data = array();
$sql = "select * from student  order by rollno";
$res = $conn->query($sql);
while($row = $res->fetch_assoc())
    array_push($data, $row);
echo json_encode($data);