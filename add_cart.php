<?php
session_start();
include 'connection.php';
$id = $_POST['id'];
$quantity = $_POST['quantity'];



    if(isset($_SESSION['alogin']))
    {
        $user_id = $_SESSION['cust_id'];
        $query = $db->prepare("SELECT Product_Id Cust_Id FROM products_cart");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $productid = $result->Product_Id;
        $custid = $result->Cust_Id;
        if ($query->rowCount() != 0) {
            foreach ($results as $result) {
                if($result->Product_Id = $id && $result->Cust_Id = $user_id){
                    $_SESSION['message'] = 'Product already in cart';
                    header('Location: index.php');
                }
                else{
                    $query = $db->prepare("INSERT INTO products_cart (Cust_Id, Product_Id, num_of_item) VALUES ($user_id, $id, $quantity)");
                    $query->execute();
                    $_SESSION['message'] = 'Item added to cart';
                    header('Location: index.php');

                }
            }
        }
        else{
            $query = $db->prepare("INSERT INTO products_cart (Cust_Id, Product_Id, num_of_item) VALUES ($user_id, $id, $quantity)");
            $query->execute();
            $_SESSION['message'] = 'Item added to cart';
            header('Location: index.php');
        }
    }
    else
        {
        echo "<script>
alert('log in first');
window.location.href = \"index.php\";
</script>";

    }




































