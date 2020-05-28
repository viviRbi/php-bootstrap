<?php 
    require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js"></script>
</head>

<body>
<?php 
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $database->delete($id);
        header("Location: http://localhost/php_exe/php_ex_12/index.php");
    }else{
        header("Location: http://localhost/php_exe/php_ex_12/index.php");
    }
?>
</body>
</html>