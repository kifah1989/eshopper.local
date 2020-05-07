<?php
session_start();
include 'connection.php';

$_SESSION['error'] = false;

$id = $_POST['id'];
$quantity = $_POST['quantity'];

if(isset($_SESSION['alogin'])){
    $userid = $_SESSION['alogin'];
    $stmt = $db->prepare("SELECT *, COUNT(*) AS numrows FROM products_cart WHERE Cust_Id=:user_id AND Product_Id=:product_id");
    $stmt->execute(['user_id'=>$_SESSION['cust_id'], 'product_id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] < 1){
        try{
            $stmt = $db->prepare("INSERT INTO products_cart (Cust_Id, Product_Id, num_of_item) VALUES (:user_id, :product_id, :quantity)");
            $stmt->execute(['user_id'=>$_SESSION['cust_id'], 'product_id'=>$id, 'quantity'=>$quantity]);
            $_SESSION['message'] = 'Item added to cart';

        }
        catch(PDOException $e){
            $_SESSION['error'] = true;
            $_SESSION['message'] = $e->getMessage();
        }
    }
    else{
        $_SESSION['error'] = true;
        $_SESSION['message'] = 'Product already in cart';
    }
}

echo "<script type='text/javascript'> document.location = 'index.php'; </script>";