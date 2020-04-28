<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
  

    session_start();
    $fullname = "";
    if(!empty($_SESSION) && $_SESSION['login'] == true){
        if($_SESSION['timeout']+20 >time()){
            $fullname = $_SESSION['fullname'];
            echo "<h2>Hi $fullname</h2>";
        } else{session_unset();}
    }else {
        header('location: index.php');
    }

    if(isset($_POST)){
        session_unset();
        print_r($_POST);
    }
?>
    <form action="index.php" method="post" name="logout">
        <h3>Time remain login:  </h3>
        <input type="hidden" name="logout" value="dfdsfdsf" readonly/>
        <input type="submit" value="Log Out"/>
    </form>

</body>
</html>