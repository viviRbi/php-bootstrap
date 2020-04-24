<html lang="en">
<head>
  <meta charset="utf-8">
  <title>File_Ex 06</title>
  <meta name="description" content="PHP">
  <meta name="author" content="Vy Le">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>


<body>
    <h1>File upload _ Delete</h1>
    <?php 
    require_once('helper.php');
    require_once('define.php');

    if(isset($_GET['id'])){
      $fileName= $_GET['id'];
      $filePath = $fileLocation . $fileName . ".txt";

      $content = file_get_contents($filePath);
      $contentArr = explode($seperate,$content);
      
      $title=$contentArr[0];
      $description=$contentArr[1];
      $imagePath=$contentArr[2];
    }

    $success = false;

    if(isset($_POST['id'])){
        if(unlink($filePath)){
            if(unlink($imagePath)){
                $success=true;
            }
        }
    }
  ?>
    <form action="#" method="post" name="multiDeleteForm" id="multiDeleteForm" enctype="multipart/form-data">
        <div>
            <p><?php if($success) echo 'File Deleted successfully'?></p>
            <label>Title</label>
            <input type="text" name="title" value=<?php echo $title ?>/>
            <label>Description</label>
            <textarea type="text" name="description"><?php echo $description ?></textarea>
            <label>Image File</label>
            <input type="file" name="image">
            <input type="hiden" name="id" value=<?php echo $fileName?>>
            <div class="image" style='background-image: url(<?php echo $imagePath ?>)'></div>
            <p><?php if($success) echo 'File Deleted successfully'?></p>
            <input type="submit" value="Delete"/>
            <button class="cancel-btn">Cancel</button>
        </div>
    </form>

  <script src="js/scripts.js"></script>

</body>
</html>