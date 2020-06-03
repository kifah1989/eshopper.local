<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php include 'include/header.php';?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
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
                            $sql = "SELECT * FROM products_cart, products_table where products_cart.Product_Id = products_table.Product_Id";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            $productid = htmlentities($result->Product_Id);
                            $productcode = htmlentities($result->ProductCode);
                            $name = htmlentities($result->Product_Name);
                            $price = htmlentities($result->Selling_price);
                            $quantity = htmlentities($result->num_of_item);
                            $total = $quantity*$price;
                            $alltotal +=$total;
                            echo "<tr>
							<td class='cart_product'>
								<a href=''><img src='images/$name.jpg' height='110' width='110' alt=''></a>
							</td>
							<td class='cart_description'>
								<h4><a href=''>$name</a></h4>
								<p>$productcode</p>
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
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total <span><?php echo "L.L".$alltotal ?></span></li>
						</ul>
                        <form method="post" action="order.php">
                            <button class="btn btn-default check_out" type="submit">Check Out</button>
                        </form>

					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->




    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>