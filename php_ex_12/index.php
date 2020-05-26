<?php 
    require_once "connect.php";
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

        <article>
            <button>All</button>
            <button>Active</button>
            <button>Inactive</button>
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
                <th><button><strong>ID</strong></button></th>
                <th><button><strong>Name</strong></button></th>
                <th><button><strong>Status</strong></button></th>
                <th><button><strong>Ordering</strong></button></th>
                <th>Action</th>
            </tr>

            <tr>
                <th><input type='checkbox'name='check[]' value=1></th>
                <td>1</td>
                <td>sdsd</td>
                <td>sdsdsd</td>
                <td>44</td>
                <td>
                    <button href='edit.php'>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>

            <tr>
                <th><input type='checkbox'name='check[]' value=2></th>
                <td>1</td>
                <td>sdsd</td>
                <td>sdsdsd</td>
                <td>44</td>
                <td>
                    <button href='edit.php'>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
        </table>
    </section>

    <br/> <br/>
    <section>
        <p><strong>Pagination</strong></p>
        <p>Number of element on the page: 2</p>
        <p>Showing page 1 of 3 pages</p>
        <div>
            <strong>Total entries: 3 </strong>&nbsp;&nbsp;
            <strong>Total page: 1</strong>
        </div>
        
    </section>
</body>
</html>