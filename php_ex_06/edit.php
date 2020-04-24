<html lang="en">
<head>
  <meta charset="utf-8">
  <title>File_Ex 06</title>
  <meta name="description" content="PHP">
  <meta name="author" content="Vy Le">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
    <h1>File upload _ Edit</h1>
    <?php 
    require_once('helper.php');
    require_once('define.php');
    $success= false;

    $fileName = $_GET['id'];
    $filePath = $fileLocation . $fileName . ".txt";

    $content = file_get_contents($filePath);
    $contentArr = explode($seperate,$content);
    
    $title = $contentArr[0];
    $description = $contentArr[1];
    $imagePath = $contentArr[2];

    $data= "";

    if(isset($_POST['title']) && isset($_POST['description'])){
          $title= $_POST['title'];
          $description= $_POST['description'];

          if($_FILES['image']['error'] == 0){
            echo "isset file";
              $newImage=$_FILES['image'];
              print_r($_FILES['image']);
              @unlink($imagePath);
              $imageNewName = randomName(6);
              $imageNewExt = pathinfo($newImage['name'], PATHINFO_EXTENSION);
              $imageNewPath= $imageLocation. $imageNewName . '.' .$imageNewExt;
              $data= $title . $seperate . $description .$seperate .$imageNewPath;
              @move_uploaded_file($newImage['tmp_name'], $imageNewPath);
          } else{
              $data= $title . $seperate . $description .$seperate .$imagePath;
              echo $data;
          }
      
          if(file_put_contents($filePath,$data)){
            $success = true;
          }
        }
  ?>
    <form action="#" method="post" name="multiDeleteForm" id="multiDeleteForm" enctype="multipart/form-data">
        <div>
        <p><?php if($success) echo 'File edited successfully'?></p>
            <label>Title</label>
            <input type="text" name="title" value=<?php echo $title; ?>/>
            <label>Description</label>
            <textarea type="text" name="description"><?php echo $description; ?></textarea>
            <label>Image File</label>
            <input type="file" name="image">
            <div class="image" style='background-image: url(<?php echo $imagePath; ?>)'></div>
            <p><?php if($success) echo 'File edited successfully'?></p>
            <input type="submit" value="Edit"/>
            <button class="cancel-btn">Cancel</button>
        </div>
    </form>

  <script src="js/scripts.js"></script>

</body>
</html>