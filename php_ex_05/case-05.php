<?php
    // Input
    $array = array("maria", "de", "ahhihi", "lanthanhtu", "ozawa", "wer");
    
    // Requirement: Phần tử có chiều dài lớn nhất
     
    // Output: lanthanhtu

    $strCount = [];

    foreach($array as $key => $value){
        $count = strlen($value);
        array_push($strCount, $count);
    }
    $max = max($strCount);

    $maxkey= array_search($max,$strCount);

    echo "Dai nhat la ".$array[$maxkey]. " _$max tu";
    
    
   
