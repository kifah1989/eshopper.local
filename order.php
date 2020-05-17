<?php
   session_start();
   include 'connection.php';
   $custid = $_SESSION['cust_id'];
   $sql = ("SELECT * FROM products_cart, products_table where products_cart.Product_Id = products_table.Product_Id");
   $query = $db->prepare($sql);
   $query->execute();
   $results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        $productid = htmlentities($result->Product_Id);
        $name = htmlentities($result->Product_Name);
        $price = htmlentities($result->Selling_price);
        $quantity = htmlentities($result->num_of_item);
        $total = $quantity * $price;
        $db->query("INSERT INTO orderdetails (order_date, Product_Id, UnitPrice, Quantity, total, customer_id) VALUES(NOW(),$productid,$price, $quantity, $total, $custid)");

    }
    $db->query("DELETE from products_cart where Cust_Id=$custid");
}
header('Location: index.php');
$db->close()
?>
