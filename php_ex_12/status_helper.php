<?php 
require_once "connect.php";

function statusSwitch($value, $tag, $space= null){
    switch($value['status']){
        case 0:
            $stat = "Active";
        break;
        case 1:
            $stat = "Inactive";
        break;
    }
    return "<$tag>$stat</$tag> $space";
}

?>