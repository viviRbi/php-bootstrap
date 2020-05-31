
<?php 
    session_start();
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
    
?>

    <h2>Add Page</h2>
    <form action="#" method="post" name="add-form">

        <label>Name</label></br>
        <!-- value bi mat chu sau khoang trang -->
        <input type="text" name="name" value="" ?> </br></br>

        <label>Status</label></br>
        <select name="status">
            <option value='0' >Active</option>
            <option value='1' >Inactive</option>
        </select></br></br>

        <label>Ordering</label></br>
        <input type="number" name="ordering" value = "" ></br></br>

        <input type="submit" value = "Submit">
    </form>
  
    <a href="http://localhost/php_exe/php_ex_12/index.php">Back</a>

</body>

</html>