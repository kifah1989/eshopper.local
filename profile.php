<?php
session_start();
error_reporting(true);
include('connection.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:../login.php');
} else {

    if (isset($_POST['submit'])) {


        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobileno = $_POST['mobile'];
        $designation = $_POST['designation'];
        $idedit = $_POST['editid'];
        $image = $_POST['image'];
    }
}

$email = $_SESSION['alogin'];
$sql = "SELECT * from client where username = (:username);";
$query = $db->prepare($sql);
$query->bindParam(':username', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$cnt = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

</head><!--/head-->

<body>

<?php include 'include/header.php';?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">

                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2><?php echo htmlentities($result->f_name); ?></h2>
                            <p><?php echo htmlentities($result->username); ?></p>
                            <p><b>Mobile:</b> <?php echo htmlentities($result->Contact_no); ?></p>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->


                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <div class="table-responsive cart_info">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr class="cart_menu">
                                            <td class="image">Item</td>
                                            <td class="description">Name</td>
                                            <td class="price">Price</td>
                                            <td class="quantity">Quantity</td>
                                            <td class="total">Total</td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $alltotal = 0;
                                        if(isset($_SESSION['cust_id']))
                                        {
                                            $custid = $_SESSION['cust_id'];
                                            $sql = "SELECT * FROM orderdetails products_table where customer_id=$custid";
                                            $query = $db->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                                    $productid = htmlentities($result->Product_Id);
                                                    $orderdate = htmlentities($result->order_date);
                                                    $name = htmlentities($result->Product_Name);
                                                    $price = htmlentities($result->Selling_price);
                                                    $quantity = htmlentities($result->Quantity);
                                                    $total = $quantity*$price;
                                                    $alltotal +=$total;
                                                    echo "<tr>
							<td class='cart_product'>
								<a href=''><img src='images/$name.jpg' height='110' width='110' alt=''></a>
							</td>
							<td class='cart_description'>
								<h4><a href=''>$name</a></h4>
								<p>$orderdate</p>
							</td>
							<td class='cart_price'>
								<p>$price</p>
							</td>
							<td class='cart_quantity'>

							<form action='add1tocart.php' method='post'>
							<input type='hidden' name='id' value='$productid'>
							<button class='cart_quantity_button' type='submit' name='submit'>+</button>
							</form>
							<form action='delete1fromcart.php' method='post'>
							<input type='hidden' name='id' value='$productid'>
							<button class='cart_quantity_button' type='submit' name='submit'>-</button>
							<input class='cart_quantity_input' type='text' value='$quantity' autocomplete='off' size='2' disabled>
                            </form>
                            </td>
							<td class='cart_total'>
								<p class='cart_total_price'>L.L$total</p>
							</td>
							<td class='cart_delete'>
							    <form method='post' action='removefromcart.php'>
							    <button class='cart_quantity_delete' type='submit'><i class='fa fa-times'></i></button>
                                </form>
								
							</td>
						</tr>";
                                                }

                                            }

                                        }
                                        else
                                            echo "";
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                                <p><b>Write Your Review</b></p>

                            </div>
                        </div>



            </div>
        </div>
    </div>
</section>




<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>