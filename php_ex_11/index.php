<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input, select{
            display: block;
            margin-top: 1vmin;
            margin-bottom: 2vmin;
        }
    </style>
</head>

<body>

    <?php 
    session_start();
    require_once('define.php');
    $source = array();
    $submit = false;
    $errorArr = array();
    $jobArr =array('student', 'teacher', 'developer');

    if(isset($_SESSION['user'])){
        foreach ($_SESSION['user'] as $key=>$value){
            $source[$key]= $value;
        }
    }

    if (isset($_POST['confirm'])){
        $submit = true;
        $_SESSION['user']['job'] = $_POST['job'];
        require_once('Validate.class.php');
        $source = ($_POST);
        $validate = new Validate($source);
        $validate->addRule('name','string',3,20)
                 ->addRule('email','email')
                 ->addRule('pass', 'password',7,19)
                 ->addRule('link','url')
                 ->addRule('confirm','confirm_pass')
                 ->addRule('captcha','captcha')
                 ->run();
        if($error_style == 0){
            foreach($validate->getError() as $value){
                echo "<p style='color:red;>$value</p>";
            }
        } elseif ($error_style == 1) {
            foreach($validate->getError() as $key=>$value){
                $errorArr[$key] = "<p style='color:red;'> ".$value. '</p>' . "<br/>" ;
            }
        }
    } 

    function jobOption($jobArr){
        $result= '';
        foreach($jobArr as $value){
            $result .= "<option ";
            if (isset($_SESSION['user']['job']) && $value == $_SESSION['user']['job'] ){
                $result .= "selected = 'selected'";
            } 
            
            $result .= "value = $value>" . ucwords($value)."</option>";
        }
        echo $result;
    }
    
    ?>

    <form action="#" method='post' name="register">
        <label>Name</label>
        <input name="name" value=<?php echo $source['name']; ?>>
        <?php echo $submit && $error_style == 1? $errorArr['name']:  "" ?> 

        <label>Email</label>
        <input name="email" value=<?php echo $source['email']; ?>>
        <?php echo $submit && $error_style == 1? $errorArr['email']:  "" ?> 

        <label>Password</label>
        <input name="pass" value=<?php echo $source['pass']; ?>>
        <?php echo $submit && $error_style == 1? $errorArr['pass']:  "" ?> 

        <label>Confirm Password</label>
        <input name="confirm" value=<?php echo $source['confirm']; ?>>
        <?php echo $submit && $error_style == 1? $errorArr['confirm']:  "" ?> 

        <label>Job</label>
        <select name = "job" type="checbox" >
        <?php jobOption($jobArr); ?>        
        </select>
        
        <label>Website</label>
        <input name="link" value=<?php echo $source['link']; ?>>
        <?php echo $submit && $error_style == 1? $errorArr['link']:  "" ?> 

        <label>Captcha</label> <br/>
        <img src="securimage/securimage_show.php" id="captcha"/>
        <input type="text" name="captcha" value=<?php echo $source['captcha']; ?>>
        <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
        <?php echo $submit && $error_style == 1? $errorArr['captcha']:  "" ?> 

        <input type="submit" value ='submit'>
    </form>
</body>
</html>