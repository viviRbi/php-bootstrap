<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>

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
        <p style="display:inline-block;"><strong>List Item</strong></p><input  type='checkbox' name='checkAll' onchange="checkAll(this)">

        <form name="bullActionForm" action="http://localhost/php_exe/php_ex_12/multi_action.php" method='post'>
            <select name="bullaction" onchange="actionOption(this)">
                <option value = "null">Choose action</option>
                <option value = "active">Active</option>
                <option value = "inactive">Inactive</option>
                <option value = "multi-delete">Multi-Delete</option>
            </select>
            <input type="submit" id="actionSubmit" value="Apply" disabled="disabled"/>
        <!-- </form> -->
        <!-- <button id="actionSubmit" onclick="multiSubmit(this)" disabled="disabled">Apply</button><br/> -->

    <!-- User info -->
    <?php 
        require_once "connect.php";
        require_once "status_helper.php";
        require_once "usersList_helper.php";
    ?>

    </br></br></br>
        <table>
            <tr>
            <!-- <th><input type='radio' name='checkAll' onchange="checkAll(this)"></th> -->

            <!-- cannot create function with check & radio input "checkAll is not a function" -->
                <th><p></p></th>
                <th><button ><strong><a <?php urlQuery("id"); ?>>ID</a></strong></button></th>
                <th><button ><strong><a <?php urlQuery("name"); ?>>Member Name</strong></button></th>
                <th><button ><strong><a <?php urlQuery("status"); ?>>Member Status</a></strong></button></th>
                <th><button ><strong><a <?php urlQuery("order"); ?>>Ordering</a></strong></button></th>
                <th>Action</th>
            </tr>

            <!-- WHERE: userList_helper.php -->

            <?php 

            // status
            $type = "list";
            if (isset($_GET['status'])){
                $type= $_GET['status']; 
            }
            // use $type for searchbox
            
            // getQuery
            orderList("id");
            orderList("name");
            orderList("order");
            orderList("status");
            
            ?>
            <!-- <form id="form2" name='checkEachForm' action="http://localhost/php_exe/php_ex_12/multi_action.php" method='post'> -->
                <?php echo usersList($type); ?>
            </form>

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

    <script>
    // if value of select action = 'null', disabled. If not, remove attr
    // Call script2 not work. Can only paste the script here
        const actionSubmitBtn = document.querySelector('#actionSubmit')

        function actionOption(self){
            if(self.value == "null"){
                actionSubmitBtn.setAttribute('disabled',true)
            } else {
                if(actionSubmitBtn.getAttribute('disabled')){
                    actionSubmitBtn.removeAttribute('disabled')
                }
            }
        }
        // check all checkboxes and take all values

        function checkAll(self){
            const checkboxes = document.getElementsByName('check[]');
            for(let i=0; i< checkboxes.length; i++){
                checkboxes[i].checked = self.checked;
            }
        }

    </script>
    
</body>
</html>