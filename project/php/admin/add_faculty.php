<?php
require '../validations.php';
require "../selectLastId.php";

//LAST ID OF THE TABLE STUDENT
$last_id = get_last_id("faculty");
$last_id += 1;
// RECEVING THE DATA IN RECEVIED
$recevied = file_get_contents("php://input");

//DECODING THE JSON DATA
$data = json_decode($recevied);
//print_r($data);
//CHECKING FOR THE RECEVIED DATA
if (filterEmail($data->email_id) && filterContact($data->mobno) &&
    filterUsername($data->regno) && filterName($data->fname)
    && filterName($data->add1)&&
    filterName($data->city) && filterName($data->state)) {

//    SQL QUERY TO ENTER DATA INTO THE DATABASE
    $sql = "INSERT INTO `faculty`(`id`, `regno`,`fname`, 
                                  `lname`,`mobno`, `dob`,
                                  `email_id`, `add1`, 
                                  `city`, `state`)
                    VALUES (" . $last_id . ", " . $data->regno . ",'" . $data->fname . "',
                            '" . $data->lname . "','" . $data->mobno . "','". $data->dob ."',
                            '" . $data->email_id . "','" . $data->add1 . "',
                            '" . $data->city . "','" . $data->state . "')";
//    echo $sql;
//
//    EXECUTING THE QUERY IN SQL
    $conn->query($sql);
    if ($conn->errno == 1062) {
        echo "Duplicate Entry of Registration Number";
    } else{
        $last_id = get_last_id('login')+1;
        $password = substr($data->state, -3).substr($data->dob, 8).substr($data->mobno, 7).substr($data->city, -3);
//        var_dump($data->dob);
        $sql = "INSERT INTO `login` (id, username, password, type_id)
                 value 
                 (".$last_id.", '".$data->regno."', '".$password."', 2)";
//        echo $sql;
        $res = $conn->query($sql);
        if ($res)
            echo 1;
        else
            echo 0;
    }

} else
    echo "Invalid Data";

?>
