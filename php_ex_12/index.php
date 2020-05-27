<?php 
    require_once "connect.php";
    require_once "status_helper.php";
    require_once "usersList_helper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js"></script>
</head>
<body>
    <h2>Item Management</h2>

    <!-- Search and filter -->
    <section>
        <p><strong>Search and Filter</strong></p>

        <article id="statusFilter">
            <a href="http://localhost/php_exe/php_ex_12/index.php">All</a>
            <a href="http://localhost/php_exe/php_ex_12/index.php/?status=active">Active</a>
            <a href="http://localhost/php_exe/php_ex_12/index.php/?status=inactive">Inactive</a>
        </article>

        <br/>

        <article>
            <input name="search" value = "">
            <button>Clear</button>
            <button>Search</button>
        </article>
    </section>

    <br/><br/>

    <!--List item -->
    <section>
        <p><strong>List Item</strong></p>
        <article>
            <select>
                <option>Choose action</option>
                <option>Active</option>
                <option>Inactive</option>
                <option>Ordering</option>
            </select>
            <button>Apply</button>
        </article>

        <br/>

        <article>
            <input name="search" value = "">
            <button>Clear</button>
            <button>Search</button>
        </article>

        <br/><br/>

    <!-- User info -->
        <table>
            <tr>
                <th><input type='checkbox' name='checkAll' onclick="checkAll(this)"></th>
                <?php 
                // echo "<pre>"; 
                // print_r($_SERVER);
                // echo "</pre>";
                function urlQuery($query){
                    if (isset($_SERVER['QUERY_STRING'])){
                        if ($_SERVER['QUERY_STRING'] == "$query-list=asc"){
                            echo "href='http://localhost/php_exe/php_ex_12/index.php/?$query-list=desc'";
                        } elseif($_SERVER['QUERY_STRING'] == "$query-list=desc") {
                            echo "href='http://localhost/php_exe/php_ex_12/index.php/?$query-list=asc'";
                        } elseif(strpos($_SERVER['QUERY_STRING'], "$query-list") == false) {
                            echo "href='http://localhost/php_exe/php_ex_12/index.php/?$query-list=asc'";
                        }
                    }
                }
               
                ?> 
                <th><button ><strong><a <?php urlQuery("id"); ?>>ID</a></strong></button></th>
                <th><button ><strong><a <?php urlQuery("name"); ?>>Member Name</strong></button></th>
                <th><button ><strong><a <?php urlQuery("status"); ?>>Member Status</a></strong></button></th>
                <th><button ><strong><a <?php urlQuery("order"); ?>>Ordering</a></strong></button></th>
                <th>Action</th>
            </tr>

            <!-- in userList_helper.php -->
            <?php 

            // status
            $type = "list";
            if (isset($_GET['status'])){
                $type= $_GET['status']; 
            }
            
            // getQuery
            
            orderList("id");
            orderList("name");
            orderList("order");
            orderList("status");

            echo usersList($type);
            ?>

        </table>
    </section>

    <br/> <br/>
    <section>
        <p><strong>Pagination</strong></p>
        <p>Number of element on the page: 2</p>
        <p>Showing page 1 of 3 pages</p>
        <div>
            <strong>Total entries: <?php echo $database->countResult();?> </strong>&nbsp;&nbsp;
            <strong>Total page: 1</strong>
        </div>
        
    </section>
    <script src="script2.js"></script>
</body>
</html>