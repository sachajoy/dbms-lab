<?php
require "../connection.php";
session_start();
$data = json_decode(file_get_contents("php://input"));
$output = array();
$sql = "select *, sum(m.marks) as marks_obt, sum(m.outof) as total from marks m left join student s on m.stu_id = s.id where s.rollno = ".$_SESSION['username']." and m.sub_id = ".$data->selected_subject->id." group by s.id;";
//echo $sql;
echo json_encode(array(($conn->query($sql))->fetch_assoc()));
?>
