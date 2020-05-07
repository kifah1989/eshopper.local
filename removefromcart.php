<?php


if(isset($_POST["submit"])){
        $pid= $_POST['pid'];
        require_once 'connection.php';
        

        $result = $db->query("update cart set no_of_items=no_of_items-1 where pid=$pid");
        $result2 = $db->query("update products set no_of_items=no_of_items+1 where ID=$pid");
        $count = $db->query("select count(1) FROM cart where no_of_items<1 and pid=$pid");
        $row = mysqli_fetch_array($count);

        $total = $row[0];
        echo $total;
        if($total > 0 ){
            $q = "delete FROM cart where pid=$pid";
            $insert = $db->query($q);
        }
            header('Location: cart.php');
        
        
    $db->close();
}
?>