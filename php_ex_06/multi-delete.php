<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
<?php 
    require_once('helper.php');
    require_once('define.php');

    $idArr=[];
    $success = false;

    if(isset($_POST['deleteCheckbox'])){
        $idArr = $_POST['deleteCheckbox'];
        foreach ($idArr as $key=>$filePath){
            $filePath= substr($filePath,0,-1);
            $content = file_get_contents($filePath);
            $contentArr = explode($seperate, $content);
            $imagePath = $contentArr[2];
            
            if(unlink($filePath)){
                if(unlink($imagePath)){
                    $success = true;
                }
            }
        }
    }

    // somehow got "/" at the end: [0] => ./files/FmS7n1587678837.txt/

    
  ?>
  <?php 
    if($success){
  ?>

<div id="wrapper">
    	<div class="title">PHP FILE</div>
        <div id="form">   
       		<p>Dữ liệu đã được xóa thành công! Click vào <button class="cancel-btn" >đây</button> đê quay về trang chủ.</p>       
        </div>
    </div>

<?php } else{?>
    <div id="wrapper">
    	<div class="title">PHP FILE</div>
        <div id="form">   
       		<p>Something went wrong! <button class="cancel-btn" >Return to main page</button></p>       
        </div>
    </div>
    <?php } ?>
    
    <script src="js/scripts.js"></script>
</body>

</html>