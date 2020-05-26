<?php 
    require_once "Database.class.php";
    $params = array (
        'server' 	=> 'localhost',
		'username'	=> 'root',
		'password'	=> '',
		'database'	=> 'php_ex_12',
		'table'		=> 'users',
    );
    // Insert data-------------------------------------
    $addin = array('name'=>'Member33', 'status' => 1, 'ordering' => 19);

    // Update data-------------------------------------
    $update = array(
        'name' => 'Member2',
        'status' => 0
    );
    
    $database = new Database($params);

    // TEST CHANGE INFO --------------------------------
    // $database->setConnect(mysqli_connect('localhost','root',''));
    // $database->setDatabase('php_ex_12');
    // $database->setTable('users');
    
    //TEST INSERT --------------------------------------
    // $database->insert($addin);
    
    //TEST UPDATE --------------------------------------
    // $database->update($update, 20);
    // echo $database->affected_row();

    //TEST DELETE --------------------------------------
    // $database->delete(2);
    // $database->delete(array(16,17));
    
?>