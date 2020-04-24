<html lang="en">
<head>
  <meta charset="utf-8">
  <title>File_Ex 06</title>
  <meta name="description" content="PHP">
  <meta name="author" content="Vy Le">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
  <?php 
    require_once('helper.php');
    require_once('define.php');
  ?>
  <?php 
  $success= false;
  if(isset($_POST['title']) && isset($_POST['description']) && isset($_FILES['image'])){
    $title= $_POST['title'];
    $description= $_POST['description'];
    $image= $_FILES['image'];
    $imageExt = pathinfo($image['name'], PATHINFO_EXTENSION);

    $fileName = randomName(5);
    $imageName = randomName(6);

    $filePath= $fileLocation .$fileName .'.txt'; echo '<br/>';
    $imagePath= $imageLocation. $imageName . '.' .$imageExt;

    $data= $title . $seperate . $description .$seperate .$imagePath;

    if(file_put_contents($filePath,$data)){
      if(@move_uploaded_file($image['tmp_name'], $imagePath)){
        $success = true;
      }
    }
  }

  ?>
    <h1>File upload _ Add</h1>

    <form action="#" method="post" name="multiDeleteForm" id="multiDeleteForm" enctype="multipart/form-data">
        <div>
          <p><?php if($success) echo 'File uploaded successfully'?></p>
            <label>Title</label>
            <input type="text" name="title" value=""/>
            <label>Description</label>
            <textarea type="text" name="description" value=""></textarea>
            <label>Image File</label>
            <input type="file" name="image">
            <p><?php if($success) echo 'File uploaded successfully'?></p>
            <input type="submit"/>
            <button class="cancel-btn" >Cancel</button>
        </div>
    </form>

  <script src="js/scripts.js"></script>

</body>
</html>