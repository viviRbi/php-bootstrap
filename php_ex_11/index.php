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
    $source = array();
    $submit = false;

    if (isset($_POST['confirm'])){
        $submit = true;
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
        foreach($validate->getError() as $value){
            echo "<p>$value</p>";
        }
    }
    
    
    ?>

    <form action="#" method='post' name="register">
        <label>Name</label>
        <input name="name" value="">
        <!-- <?php echo $submit? "": "Usename khong duoc rong";  ?> -->

        <label>Email</label>
        <input name="email" value="">

        <label>Password</label>
        <input name="pass" value="">

        <label>Confirm Password</label>
        <input name="confirm" value="">

        <label>Job</label>
        <select name = "Job" type="checbox">
            <option>Student</option>
            <option>Teacher</option>
        </select>
        
        <label>Website</label>
        <input name="link" value="">

        <label>Captcha</label> <br/>
        <img src="securimage/securimage_show.php" id="captcha"/>
        <input type="text" name="captcha" value="">
        <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
		

        <input type="submit" value ='submit'>
    </form>
</body>
</html>