<header id="header">
    <!--header-->


    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="images/home/logo.png" alt=""/></a>
                    </div>
                </div>
                <div class="navbar-custom-menu">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                            if ((isset($_SESSION['alogin']) and strlen($_SESSION['alogin']) > 5)) {

                                echo "<li><a href=profile.php><i class=\"fa fa-user\"></i> Welcome $_SESSION[alogin]</a></li>";
                            } else {

                                echo "<li><a href=login.php><i class=\"fa fa-user\"></i> Account</a></li>";
                            }
                            ?>
                            <li ><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart
                                    <span class="label label-success cart_count">1</span>
                                </a>
                            </li>
                            <?php
                            if ((isset($_SESSION['alogin']) and strlen($_SESSION['alogin']) > 5)) {

                                echo "<li><a href=logout.php><i class=\"fa fa-lock\"></i> Logout</a></li>";
                            } else {

                                echo "<li><a href=login.php><i class=\"fa fa-lock\"></i> Login</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>

                            <li><a href="contact-us.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
