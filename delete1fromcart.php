<?php
session_start();
include 'connection.php';
$id = $_POST['id'];

if(isset($_SESSION['alogin'])){


    $stmt = $db->prepare("SELECT num_of_item from products_cart where Product_Id=$id") ;
    $stmt->execute();
    $row = $stmt->fetch();
    if($row['num_of_item']<1){
        header('Location: cart.php');
    }
    else{
        $result = $db->prepare("update products_cart set num_of_item=num_of_item-1 where Product_Id=$id");
        $result->execute();
        echo "<script type='text/javascript'> document.location = 'cart.php'; </script>";    }

}
?>