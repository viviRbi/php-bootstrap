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
    // $addin = array('name'=>'Member33', 'status' => 1, 'ordering' => 19);

    // Update data-------------------------------------
    // $update = array(
    //     'name' => 'Member2',
    //     'status' => 0
    // );
    
    $database = new Database($params);
    $list = $database->listRecord("SELECT * FROM `$params[table]`");
    // $status = $database->listRecord("SELECT DISTINCT `status` FROM `$params[table]`");

    $active = $database->listRecord("SELECT * FROM `$params[table]` WHERE `status` = 0");
    $inactive = $database->listRecord("SELECT * FROM `$params[table]` WHERE `status` = 1");

    $statusAsc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `status` ASC");
    $statusDesc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `status` DESC");

    $idAsc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `id` ASC");
    $idDesc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `id` DESC");

    $nameAsc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `name` ASC");
    $nameDesc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `name` DESC");

    $orderAsc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `ordering` ASC");
    $orderDesc = $database->listRecord("SELECT * FROM `$params[table]` ORDER BY `ordering` DESC");
    
    






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
    
    //TEST SHOW ROWS
    // $query = "SELECT * FROM `users` WHERE `id`> 12 ORDER BY id ASC";
    // $database->listRecord($query);

    // TEST COUNT RESULT
?>