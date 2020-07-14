<?php
require '../connection.php';
session_start();
$result = array('marks'=>array());
$data = json_decode(file_get_contents("php://input"));
$sql = "select sum(a.att) as attended, count(a.id) as total, a.*, s.* from attendance a left join student s on a.stu_id = s.id where a.sub_id = ".$data->id." group by a.stu_id order by s.rollno";
//echo $sql;
$res = $conn->query($sql);
while ($row = $res->fetch_assoc())
    array_push($result['marks'], $row);
echo json_encode($result);