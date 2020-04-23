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

    <form action="multi-delete.php" method="post" name="multiDeleteForm" id="multiDeleteForm" enctype="multipart/form-data">
        <div class='row'>
            <input type="checkbox" name="deleteCheckbox[]" value="">
            <p class= 'title'></p>
            <p class="description"></p>
            <div style='background-image: url()'></div>
            <p class= "size-id"></p>
            <p class= "size-id"></p>
            <p class="action">
                <a href="edit.php?id=">Edit</a> |
                <a href="delete.php?id=">Delete</a>
            </p>
        </div>
    </form>

    <section class="add-multidelete">
        <button class="add" ><a href="add.php">Add</a></button>
        <button class="multi-delete">Delete</button>
    </section>
  <script src="js/scripts.js"></script>

</body>
</html>