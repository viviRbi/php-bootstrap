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

    // load xml file
    if(simplexml_load_file('time.xml')){
        $xml=simplexml_load_file('time.xml') or die('Fail to load XML');
        $xml-> asXML();
        $deadline=$xml;
    } else{
        $deadline=20;
    }

    if(!empty($_SESSION) && $_SESSION['login'] == true){
        if($_SESSION['timeout']+$deadline >time()){
            $fullname = $_SESSION['fullname'];
            echo "<h2>Hi $fullname</h2>";
        } else{session_unset();}
    }else {
        header('location: index.php');
    }

    if(isset($_POST)){
        session_unset();
        header('location: index.php');
    }
?>
    <form action="index.php" method="post" name="logout">
        <h3>Time remain login: <?php $deadline ?></h3>
        <input type="hidden" name="logout" value="dfdsfdsf" readonly/>
        <input type="submit" value="Log Out"/>
    </form>

</body>
</html>