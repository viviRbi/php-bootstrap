<?php 
    require_once "connect.php";

    if(isset($_GET['search'])){
        $type= 'search';
        $searchWord= $_GET['search'];
    }
?>