<html lang="en">
<head>
  <meta charset="utf-8">
  <title>File_Ex 06</title>
  <meta name="description" content="PHP">
  <meta name="author" content="Vy Le">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
    <h1>File upload _ Add</h1>

    <form action="#" method="post" name="multiDeleteForm" id="multiDeleteForm" enctype="multipart/form-data">
        <div>
            <label>Title</label>
            <input type="text" name="title" value=""/>
            <label>Description</label>
            <textarea type="text" name="description" value=""></textarea>
            <label>Image File</label>
            <input type="file" name="image">
            <input type="submit"/>
            <button class="cancel-btn" >Cancel</button>
        </div>
    </form>

  <script src="js/scripts.js"></script>

</body>
</html>