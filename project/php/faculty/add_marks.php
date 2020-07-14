<?php
require "../selectLastId.php";

session_start();

//fetching content from javascript
$recevied = file_get_contents("php://input");
$data = json_decode($recevied);
$flag = 0;
$student = "";
foreach ($data->student as $x){
    if($x->marks > $data->outof){
        $flag = 1;
        $student = $x->fname;
    }

}
if ($flag){
    echo "Marks Greater than Out of ".$student;
}else{
    foreach ($data->student as $x){

        //  LAST ID OF THE TABLE MARKS
        $last_id = get_last_id("marks")+1;

        //making the query for the inserion operation
        $sql = "INSERT INTO `marks`(`id`, `stu_id`, `sub_id`,
                            `date`,`outof`,`marks`) 
                            VALUES 
                            (".$last_id.",".$x->id.",".$data->selected_subject->id.",
                            '".$data->date."',".$data->outof.",".$x->marks.");";
//    echo $sql;
        $conn->query($sql);
        if ($conn->errno){
            $flag = 1;
            $errormsg = $conn->error;
            break;
        }
    }
    if($flag){
        echo $errormsg;
    }else
        echo 1;
}


?>
