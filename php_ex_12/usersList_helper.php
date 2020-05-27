<?php 
require_once "connect.php";
require_once "status_helper.php";

function usersList($type){
    $stat = '';
    $html = "";
    global $$type;
    // echo $type;
    // echo "<pre>";
    // print_r($$type);
    // echo "</pre>";
    foreach($$type as $key=>$value ){
        $html .= userHTML($value);
    }
    return $html;
}

function orderList($query){
    global $type;
    if(isset($_GET["$query-list"])){
        if ($_GET["$query-list"] == 'asc'){
            $type = $query. "Asc";
        } elseif ($_GET["$query-list"] == 'desc') {
            $type = $query . "Desc";
        }
        return $type;
    } 
}

function userHTML($value){
    $html ='';
    $html .= "<tr>";
    $html.=  "<th><input type='checkbox' name='check[]' value=$value[id]></th>";
    $html .= "<td>$value[id]</td>";
    $html .= "<td>$value[name]</td>";
    $html .= statusSwitch($value, "td");
    $html .= "<td>$value[ordering]</td>";
    $html .= '<td>
                <button id="editUser" href="edit.php">Edit</button>
                <button id ="deleteUser">Delete</button>
            </td>';
    $html.= "</tr>";
    return $html;
}

?>