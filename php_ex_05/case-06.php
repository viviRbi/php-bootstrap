<?php
    // Input
    $str = "1A|http://zend.vn/porn/video1a.mp4
            1B|http://zend.vn/porn/video1b.mp4
            http://zend.vn/porn/video2.mp4
            http://zend.vn/porn/video3.mp4
            4A|http://zend.vn/porn/video4A.mp4
            http://zend.vn/porn/video5.mp4
            6A|http://zend.vn/porn/video9A.mp4
            http://zend.vn/porn/video10.mp4
        ";
    
    /* Oupt: Array (
        [1A] => http://zend.vn/porn/video1a.mp4
        [1B] => http://zend.vn/porn/video1b.mp4
        [2]  => http://zend.vn/porn/video2.mp4
        [3]  => http://zend.vn/porn/video3.mp4
        [4A] => http://zend.vn/porn/video4A.mp4
        [5]  => http://zend.vn/porn/video5.mp4
        [6A] => http://zend.vn/porn/video9A.mp4
        [7]  => http://zend.vn/porn/video10.mp4
    ) */
    
    $array = explode(".mp4",$str);
    $array = array_map("trim", $array);
    array_pop($array);
    $newArr = [];

    foreach ($array as $key=>$value){
        if(strpos($value, "|") == true){
            // echo strpos($value,"|") . "<br/>";
            // echo strlen($value);
            $key= substr($value,0,strpos($value,"|"));
            $value= substr($value,strpos($value,"|")+1,strlen($value));
        }
        $value=$value.".mp4";
        $value=trim($value);
        $newArr[$key]=$value;
    }

    echo "<pre>";
    print_r($newArr);
    echo "</pre>";
  