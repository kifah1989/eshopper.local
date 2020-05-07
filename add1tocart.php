<?php
session_start();
require 'connection.php';

if(isset($_POST["submit"])){
    $cpid= $_POST['cpid'];


    $count = "SELECT no_of_items from products where ID=$cpid";
    $row2 = $db->query($count);
    $row1 = mysqli_fetch_assoc($row2);
    $count1=$row1[0];
    print_r($row1);
    echo $row1['no_of_items'];
    if($row1['no_of_items']<1){
        echo $row1['no_of_items'];
        header('Location: cart.php');
    }
    else{
        $result = $db->query("update cart set no_of_items=no_of_items+1 where pid=$cpid");

        header('Location: cart.php');
    }
    $db->close();

}
?>