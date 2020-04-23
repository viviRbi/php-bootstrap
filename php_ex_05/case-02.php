<?php
    // Input: Chuỗi JSON chứa thông tin của khóa học
    
    $str = '{
                "name": "Angular 2x",
                "author": "ZendVN",
                "info": {
                    "publishDate": "20/08/2016",
                    "requirement": "Typescript",
                    "student": "false"
                }
            }';
    
    // Requirement: In ra thông tin chi tiết của khóa học
    
    // Output:
    // Name: Angular 2x
    // Author: ZendVN
    // PublishDate : 20/08/2016
    // Requirement : Typescript

    $data = json_decode($str);
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

    echo "Name: " .$data ->name;
    echo "Author: " .$data ->author . '<br/>';
    echo "PublishDate: " .$data ->info ->publishDate . '<br/>';
    echo "Requirement: " .$data ->info ->requirement . '<br/>';
    
    
    
    
    
    
    
    
    
    
    
    