<?php 
require_once "connect.php";

function statusSwitch($value, $tag, $space= null){
    $stat = '';
    $stat= statusCheck($value['status'],$stat);
    return "<$tag>$stat</$tag> $space";
}

function statusCheck($num){
    $stat = '';
    switch($num){
        case 0:
            $stat = "Active";
        break;
        case 1:
            $stat = "Inactive";
        break;
    }
    return $stat;
}

?>