<?php 
    function randomName($length){
        $allArr = array_merge(range("a","z"), range("A","Z"), range(0,9));
        $all = implode($allArr,"");
        $all= str_shuffle($all);
        $timestamp = getdate()[0];
        $name= substr($all,0,$length) .$timestamp;
        return $name;
    }
?>