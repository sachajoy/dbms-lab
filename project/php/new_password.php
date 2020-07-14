<?php
require 'selectLastId.php';
session_start();
$data = json_decode(file_get_contents("php://input"));
$sql = "UPDATE `login` SET `password`='".$data->newpass."' WHERE username = '".$_SESSION['username']."' and type_id = ".$_SESSION['type_id']."";
//echo $sql;
$res = $conn->query($sql);
if($res)
    echo "../";
else
    echo 0;
?>