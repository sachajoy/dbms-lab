<?php
require '../connection.php';
session_start();
$result = array('marks'=>array());
$data = json_decode(file_get_contents("php://input"));
$sql = "select sum(marks) as marks_obt, sum(outof) as total, m.*, s.* from marks m left join student s on m.stu_id = s.id where m.sub_id =".$data->id." group by m.stu_id order by s.rollno";
//echo $sql;
$res = $conn->query($sql);
while ($row = $res->fetch_assoc())
    array_push($result['marks'], $row);
echo json_encode($result);
