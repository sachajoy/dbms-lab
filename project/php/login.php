<?php

require "connection.php";
session_start();
$data = json_decode(file_get_contents("php://input"));
$username=mysqli_real_escape_string($conn,$data->username);
$password = mysqli_real_escape_string($conn,$data->password);
$sql = "SELECT l.id, l.username, l.type_id, ut.path_to_open, ut.type, l.login_count, ut.newpass_path FROM login l LEFT JOIN user_type ut on l.type_id = ut.id WHERE l.username = '".$username."' and l.password = '".$password."'";
//echo $sql;
$res = $conn->query($sql);
if ($res->num_rows > 0){
    $row = $res->fetch_assoc();
    $_SESSION['username'] = $data->username;
    $_SESSION['type_id'] = $row['type_id'];
    $_SESSION['path_to_open'] = $row['path_to_open'];
    $_SESSION['login_count'] = $row['login_count'];
    if ($row['type_id'] == 2 || $row['type_id'] == 3){
        $row['login_count']  += 1;
        $sql = "UPDATE `login` SET `login_count`=".$row['login_count']." WHERE username = '".$row['username']."' and password = '".$data->password."'";
        $res = $conn->query($sql);
//        echo $sql;
    }
    $row['success'] = 1;
    echo json_encode($row);
//    print_r($_SESSION);

}
else
    echo 0;
?>
