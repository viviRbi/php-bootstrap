
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>The HTML5 Herald</title>
</head>

<body>
<?php
    
    session_start();
    $usename= "";
    $password= "";
    $user = file_get_contents('user.json');

    if(!empty($_SESSION['login'])){
        if($_SESSION['fullname'] == 'Admin'){
            header('location: admin_process.php');
        }else{
            header('location: process.php');
        }
    }else{
        if(isset($_POST['usename']) && isset($_POST['password'])){
            $usename= $_POST['usename'];
            $password= md5($_POST['password']);
            $data= json_decode($user, true);
            foreach($data as $value){
                $id = $value['id'];
                $pass = $value['pass'];
                if($usename == $id && $password == $pass){
                    $_SESSION['fullname'] = $value['fullName'];
                    $_SESSION['login'] = true;
                    $_SESSION['timeout'] = time();
                    echo $value["role"];
                    if(strtolower($value["role"]) == "user") {
                        header('location: process.php');
                    } elseif (strtolower($value["role"]) == "admin"){
                        header('location: admin_process.php');
                    }
                } 
            }
            echo "Wrong user name or password";
            $usename= "";
            $password= "";
        } 
    }
?>
    <form action="#" method="post" name="login-form">
        <input type = "text" name="usename"placeholder="Usename" value=<?php echo $usename;?> > <br/>
        <input type = "password" name="password" placeholder="Password" value=<?php echo $password;?> > <br/>
        <input type = "submit" value="submit"/> <br/>
    </form>
</body>
</html>