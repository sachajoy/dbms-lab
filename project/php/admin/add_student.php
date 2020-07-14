<?php
require '../validations.php';
require "../selectLastId.php";

//LAST ID OF THE TABLE STUDENT
$last_id = get_last_id("student");
$last_id += 1;
// RECEVING THE DATA IN RECEVIED
$recevied = file_get_contents("php://input");

//DECODING THE JSON DATA
$data = json_decode($recevied);
if (filterUsername($data->rollno) && filterContact($data->mobno)
    && filterEmail($data->email_id) && filterName($data->fname)
    && filterName($data->father_name)
    && filterName($data->mother_name) && filterName($data->add1)
    && filterName($data->add2) && filterName($data->city) && filterName($data->state)){

//    SQL QUERY TO ENTER DATA INTO THE DATABASE
    $sql = "INSERT INTO `student`(`id`, `fname`, `lname`, 
                                  `father_name`, `mother_name`, `mobno`, 
                                  `email_id`, `rollno`, `add1`, 
                                  `add2`, `city`, `state`, 
                                  `branch`)
                    VALUES (".$last_id.",'".$data->fname."','".$data->lname."',
                            '".$data->father_name."','".$data->mother_name."','".$data->mobno."',
                            '".$data->email_id."',".$data->rollno.",'".$data->add1."',
                            '".$data->add2."','".$data->city."','".$data->state."',
                            '".$data->branch."')";

//    EXECUTING THE QUERY IN SQL
    $conn->query($sql);
    if ($conn->errno == 1062){
        echo "Duplicate Entry of Roll Number";
    }else{
        $last_id = get_last_id('login')+1;
        $password = substr($data->state, -3).substr($data->fname, -3).substr($data->mobno, 7).substr($data->city, -3);
//        var_dump($data->dob);
        $sql = "INSERT INTO `login` (id, username, password, type_id)
                 value 
                 (".$last_id.", '".$data->rollno."', '".$password."', 3)";
//        echo $sql;
        $res = $conn->query($sql);
        if ($res)
            echo 1;
        else
            echo 0;

    }

}else
    echo "Entered Invalid Data";

?>