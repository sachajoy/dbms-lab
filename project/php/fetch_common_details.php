<?php
require "connection.php";
session_start();
$data = array('subject'=>array(),'student'=>array(),'branch'=>array(), 'login_user'=>array(), 'faculty'=>array());
$sql = "SELECT sub.id, sub.name, sub.max_marks, sub.branch, br.name as 'branch_name' FROM subject sub LEFT JOIN branch br ON sub.branch = br.id ORDER BY name";
$res  = $conn->query($sql);
//CHECK THE NO OF ROWS
if($res->num_rows > 0){
    while ($row = $res->fetch_assoc()){
        array_push($data["subject"], $row);
    }
    //echo json_encode($data);
}
$sql = "SELECT * FROM `student` ORDER BY rollno";
$res  = $conn->query($sql);
//CHECK THE NO OF ROWS
if($res->num_rows > 0){
    while ($row = $res->fetch_assoc()){
        array_push($data["student"], $row);
    }
   // echo "data out";
   //echo json_encode($data);
}
$sql = "SELECT * FROM `branch` ORDER BY name";
$res  = $conn->query($sql);
//echo $sql;
//CHECK THE NO OF ROWS
if($res->num_rows > 0){
    while ($row = $res->fetch_assoc()){
        array_push($data["branch"], $row);
    }
    // echo "data out";
    //echo json_encode($data);
}
//var_dump($data);
$sql = "SELECT * FROM `faculty` ORDER BY fname, lname";
$res  = $conn->query($sql);
//CHECK THE NO OF ROWS
if($res->num_rows > 0){
    while ($row = $res->fetch_assoc()){
        array_push($data["faculty"], $row);
    }
}
array_push($data['login_user'], $_SESSION);
echo json_encode($data);
?>