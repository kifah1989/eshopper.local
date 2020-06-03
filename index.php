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
    <title>Home | E-Shopper</title>
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
</head>
<!--/head-->

<body>
<?php include 'include/header.php';?>
<!--/header-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->

                        <?php
                        $sql = "SELECT * FROM category";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                                $name = htmlentities($result->categoryname);
                                echo "<div class='panel panel-default'>
                                <div class='panel-heading'>
                                    <h4 class='panel-title'><a href='index.php?category=$name'>$name</a></h4>
                                </div>
                            </div>";
                            }
                        }
                        ?>

                    </div>
                    <!--/category-products-->

                </div>
            </div>
            <!--product_items-->
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Products</h2>
                    <?php
                    $sql = "SELECT * FROM products_table";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            $productid = htmlentities($result->Product_Id);
                            $name = htmlentities($result->Product_Name);
                            $price = htmlentities($result->Selling_price);
                            if(isset($_SESSION['message'])){
                                $status = $_SESSION['message'];

                            }
                            else
                                $status = "";
                            echo "<div class=\"col-sm-4\">
                                    <div class='product-image-wrapper'>
                                        <div class='single-products'>
                                            <div class='productinfo text-center'>
                                            <h2>$status</h2>
                                                <img src='images/$name.jpg' alt='product'/>
                                                <h2>L.L$price</h2>
                                                <p>$name</p>
                                                <form class='form-inline' method='post' action='add_cart.php'>
							                        <input type='hidden' value='$productid' name='id'>
							                        <input type='hidden' value='1' name='quantity'>
							                        <input type='hidden' value='$price' name='price'>
							                        
			            			                <button type='submit' class='btn btn-default get'><i class='fa fa-shopping-cart'></i> Add to Cart</button>
		            		                    </form>
                                            </div>
                                        </div>
                                     </div>
                                     </div>
                                 ";
                        }
                    }
                    ?>


                <!--product_items-->
            </div>
</section>

<!--/Footer-->


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>

</html>
