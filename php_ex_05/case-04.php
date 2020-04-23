<?php 

    // Input: Chuỗi khóa học
    $str = "php/127/typescript/12/jquery/120/angular/50";
          // 0   1    2         3   4    5
    
    // Requirement: Chuyển chuỗi thành Array
    
    // Output:
    //     Array
    //     (
    //         [php] => 127
    //         [typescript] => 12
    //         [jquery] => 120
    //         [angular] => 50
    //     )

$array = explode( "/", $str);

echo '<pre>';
print_r( array_flip($array));
echo '</pre>';

