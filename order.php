<?php
   session_start();
   require_once 'connection.php';
   $query = ("SELECT * FROM cart");
   $result = $db->query($query);
 while ($row = $result->fetch_assoc()) {
      
     
      $ppid = $row["pid"]; 
      $pno_of_items = $row["no_of_items"];  
      $total = $row["no_of_items"]*$row["cost_of_item"]; 
      $today1 = date("Y-m-d H:i:s");

      $var1=$_SESSION['cid12'];
      $_SESSION['cid12'] = null;
      echo $var1;
      $db->query("INSERT INTO purchase VALUES($var1,$ppid,$pno_of_items,$total,NOW())");
      
  }
  $db->query("DELETE from cart where pid>=0");
    $db->query("DELETE from purchase where no_of_items=0");

header('Location: index.php');
$db->close()
?>
