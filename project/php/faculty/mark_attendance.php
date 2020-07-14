<?php
require "../selectLastId.php";
session_start();
$data = json_decode(file_get_contents("php://input"));
//var_dump(boolval($data->student[0]->att));
$flag = 0;
$date = date_create($data->date);
$today_Date = date_create(date('Y-m-d'));
$diff = date_diff($date, $today_Date)->format("%R%a");
if($diff >= 0 && $diff <= 15){
    foreach ($data->student as $x){
//    get the last id for the table attendance
    $last_id = get_last_id("attendance")+1;
//    query for the insertion oeration
    $sql = "INSERT INTO `attendance` (`id`, `date`, `sub_id`,
                                    `stu_id`, `att`)
                                    VALUES
                                    (".$last_id.", '".$data->date."', ".$data->selected_subject->id.",
                                     ".$x->id.",".(int)$x->att.")";
//    echo $sql;
    $conn->query($sql);
    if ($conn->error){
        $flag = 1;
        $errormsg = $conn->error;
        break;
    }
}
if ($flag){
    echo $errormsg;
}else
    echo 1;
}

else
    echo " Date Invalid";

?>
