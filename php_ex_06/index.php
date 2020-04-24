<html lang="en">
<head>
  <meta charset="utf-8">
  <title>File_Ex 06</title>
  <meta name="description" content="PHP">
  <meta name="author" content="Vy Le">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
    <h1>File upload _ Index</h1>
    <?php 
    require_once('helper.php');
    require_once('define.php');
  ?>
    <form action="multi-delete.php" method="post" name="multiDeleteForm" id="multiDeleteForm" enctype="multipart/form-data">
    <?php

    $allFiles = scandir($fileLocation);
    $noData = false;

    if(count($allFiles) <3){
        $noData = true;
    }

    foreach ($allFiles as $key => $fileName){
        $pattern = "#.txt$#imsU";
        if(preg_match($pattern,$fileName)==false){
            $title = "";
			$description = "";
			$id = "";
            $size = "";
            continue;
        }
        $content = file_get_contents($fileLocation . $fileName);
        $contentArr= explode($seperate,$content);
        
        $title= $contentArr[0];
        $description= $contentArr[1];
        $imagePath= $contentArr[2];
        $id = substr($fileName,0,-4);
        $size= filesize($fileLocation . $fileName) + filesize($imagePath);

    ?>
        <div class='row'>
            <input type="checkbox" name="deleteCheckbox[]" value=<?php echo $fileLocation . $fileName ?>/>
            <p class= 'title'><?php echo $title ?></p>
            <p class="description"><?php echo $description ?></p>
            <div class="image" style='background-image: url(<?php echo $imagePath ?>)'></div>
            <p class= "size-id"><?php echo $id ?></p>
            <p class= "size-id"><?php echo $size ?></p>
            <p class="action">
                <a href="edit.php?id=<?php echo $id ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $id ?>">Delete</a>
            </p>
        </div>

    <?php 
    }
    ?>
    </form>

    <?php
        if ($noData == true) echo "<div class='row'> <p>Please add some contents.</p></div>";
    ?>

    <section class="add-multidelete">
        <button class="add" ><a href="add.php">Add</a></button>
        <button class="multi-delete">Delete</button>
    </section>
  <script src="js/scripts.js"></script>

</body>
</html>