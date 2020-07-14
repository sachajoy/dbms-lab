<?php
function filterName($field)
 {
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
        return TRUE;
    }else{
        return FALSE;
    }
}
function filterContact($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]{10}+$/")))){
        return TRUE;
    }else{
        return FALSE;
    }
}
function filterUsername($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]{9}+$/")))){
        return TRUE;
    }else{
        return FALSE;
    }
}
function filterEmail($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]+@.{1}[a-zA-Z0-9]+\.[a-zA-Z]+$/")))){
//        echo "truw";
        return TRUE;
    }else{
//        echo "false";
        return FALSE;
    }
}
?>