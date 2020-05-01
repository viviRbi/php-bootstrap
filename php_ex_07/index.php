
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>The HTML5 Herald</title>
</head>

<body>
<?php
    $usename= "";
    $password= "";

    session_start();

    if(!empty($_SESSION['login'])){
        header('location: process.php');
    }else{
        if(isset($_POST['usename']) && isset($_POST['password'])){
            $usename= $_POST['usename'];
            $password= md5($_POST['password']);
            $data= file('user.txt');
            
            foreach($data as $value){
                $eachDataArr= explode('|',$value);
                if($usename == $eachDataArr[0] && $password == $eachDataArr[1]){
                    $_SESSION['fullname'] = $eachDataArr[2];
                    $_SESSION['login'] = true;
                    $_SESSION['timeout'] = time();
                    if(strtolower($usename) != "admin"){
                        header('location: process.php');
                    } elseif(strtolower($usename) == "admin") {
                        header('location: admin_process.php');
                    }
                } 
            }
        } 
    }
?>
    <form action="#" method="post" name="login-form">
        <input type = "text" name="usename" value=<?php echo $usename;?>/> <br/>
        <input type = "password" name="password" value=<?php echo $password;?>/> <br/>
        <input type = "submit" value="submit"/> <br/>
    </form>
</body>
</html>