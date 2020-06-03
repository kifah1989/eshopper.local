<?php
session_start();
include('connection.php');
if (isset($_POST['login'])) {
    $email = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM client WHERE username=:email and password=:password";
    $query = $db->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetch();

    if ($query->rowCount() > 0) {
        $_SESSION['cust_id'] = $results['Cust_id'];
        $_SESSION['alogin'] = $results['username'];
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {

        echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";

    }

}
if (isset($_POST['register']))
{
    $registeremail = $_POST['registeremail'];
    $registerlastname =$_POST['registerlastname'];
    $registerpassword = md5($_POST['registerpassword']);
    $registername = $_POST['registername'];
    $registerphone = $_POST['registerphone'];
    $registeraddress = $_POST['registeraddress'];
    $sql = "SELECT * FROM client WHERE username=$registeremail";
    $query = $db->prepare($sql);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "<script>alert('email already exists');</script>";
    } else {
        $sql = "INSERT INTO `client`(`f_name`, `l_name`, `username`, `password`, `Address`, `Contact_no`) VALUES ('$registername', '$registerlastname', '$registeremail', '$registerpassword', '$registeraddress', '$registerphone')";
        $query = $db->prepare($sql);
        $query->execute();
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php include 'include/header.php';?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post">
							<input type="text" placeholder="Name" name="username" />
							<input type="password" placeholder="Password" name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="post">
							<input type="text" placeholder="Name" name="registername"/>
                            <input type="text" placeholder="Last Name" name="registerlastname"/>
                            <input type="email" placeholder="Email" name="registeremail"/>
							<input type="password" placeholder="password" name="registerpassword"/>
                            <input type="text" placeholder="Address" name="registeraddress"/>
                            <input type="text" placeholder="phone" name="registerphone"/>

                            <button type="submit" name="register" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	


  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>