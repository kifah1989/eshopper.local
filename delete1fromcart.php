<?php


if(isset($_POST["submit"])){
        $pid= $_POST['pid'];
        require_once 'connection.php';

        
        
        $count = "SELECT no_of_items from cart where pid=$pid";
        $row2 = $db->query($count);
        $row1 = mysqli_fetch_assoc($row2);

        $pcount = "SELECT no_of_items from products where ID=$pid";
        $prow2 = $db->query($pcount);
        $prow1 = mysqli_fetch_assoc($prow2);
        $add= $prow1['no_of_items']+$row1['no_of_items'];

        $sql1 = "update products set no_of_items=$add where ID=$pid";

        $result = $db->query($sql1);
        echo $add;
        $result1 = $db->query("delete FROM cart where pid=$pid");
            header('Location: cart.php');
        
        

    $db->close();
}
?>