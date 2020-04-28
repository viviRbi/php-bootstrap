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
    $deadline = 20;
    if(!empty($_SESSION['login'])){
        if($_SESSION['timeout']+$deadline >time()){
            $fullname = $_SESSION['fullname'];
            echo "Hi $fullname";
        } else {
            session_unset();
        }
    }

    if(isset($_POST)){
        session_unset();
        print_r($_POST);
    }
?>
    <form action="index.php" method="post" name="logout">
        <h3>Time remain login: <?php echo $deadline; ?></h3>
        <input type="hidden" name="logout" value="dfdsfdsf" readonly/>
        <input type="submit" value="Log Out"/>
    </form>

</body>
</html>