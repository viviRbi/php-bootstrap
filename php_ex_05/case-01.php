<?php

    // Input: Array chứa danh sách khóa học
    // Key: Tên khóa học
    // Value: Thời lượng video của khóa học đó
    
    $array = [
        "zend2"     => 113,
        "php"       => 127,
        "typescript"=> 12,
        "jquery"    => 120,
        "angular"   => 50
    ];
    
    // Requirement: Tìm khóa học có thời lượng video nhiều nhất
    
    // Output: php - 127

    $max = max($array);
    $maxkey= array_search($max,$array);
    echo $maxkey .' - ' . $max;

    

    
  