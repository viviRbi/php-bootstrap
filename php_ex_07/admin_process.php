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

    // Save input to xml files
    $deadlineTemp=10;
    if(isset($_POST['timeoutValue'])){
        $deadlineTemp= $_POST['timeoutValue'];
        $strXML = "<?xml version='1.0' encoding='UTF-8'?>";
        $strXML .= "<time>$deadlineTemp</time>";
        file_put_contents('time.xml',$strXML);
        $deadline = $deadlineTemp;
    } 

    // If time out-> unset session -> log out
    if(!empty($_SESSION['login'])){
        if($_SESSION['timeout']+$deadline >time()){
            $fullname = $_SESSION['fullname'];
            echo "Hi $fullname";
            echo time();
        }else {
            session_unset();
            header('location: index.php');
        }
    }else {
        header('location: index.php');
    }

    // log out by click Log out button
    if(isset($_POST['logout'])){
        session_unset();
        header('location: index.php');
    }


?>
    <form action="index.php" method="post" name="logout">
        <h3>Time remain login: <?php echo $deadline; ?></h3>
        <input type="hidden" name="logout" value="dfdsfdsf" readonly/>
        <input type="submit" value="Log Out"/>
    </form>

    <form action="#" method="post" name="time">
        <h3>Input login time</h3>
        <input type="number" name="timeoutValue" value=<?php echo $deadline;?>/>
        <input type="submit" value="Submit"/>
    </form>

</body>
</html>