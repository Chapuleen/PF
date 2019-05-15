<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="registration.php">Register</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>

						</ul>
						<ul class="nav navbar-nav navbar-right">

						<?php
					session_start();
					if(isset($_SESSION['sess_user'])){
						echo "<li class='nav-item active'>";
							echo "<a class='nav-link' href='./cart.php'> |&nbsp &nbsp {$_SESSION['sess_user']}</a>";
						echo "</li>";

						echo "<li class='nav-item active'>";
							echo "<a class='nav-link' href='./logout.php'>Logout</a>";
						echo "</li>";
					}else{
						echo "<li class='nav-item active'>";
							echo "<a class='nav-link' href='./login.php'>|&nbsp &nbsp Login</a>";
						echo "</li>";
					}
					?>
					</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>

	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="registration.PHP">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Register</h3>
						<form class="row login_form"  method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombreUsuario" name="user" placeholder="Username(correo)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="passUsuario" name="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<input type="number" class="form-control" id="nombreUsuario" name="year" placeholder="Edad" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Edad'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombreUsuario" name="address" placeholder="Direccion" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Direccion'">
							</div>
							<div class="col-md-12 form-group">
								<input type="number" class="form-control" id="nombreUsuario" name="postal" placeholder="Codigo Postal" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Codigo Postal'">
							</div>
							<div class="col-md-12 form-group">
								<input type="number" class="form-control" id="nombreUsuario" name="cc" placeholder="Tarjeta" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Codigo Postal'">
							</div>


							<div class="col-md-12 form-group">
							
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="submit" value="submit" class="primary-btn">Log In</button>
								<?php
								        if(isset($_POST["submit"])){
								          if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['year']) && !empty($_POST['address']) && !empty($_POST['postal'])){
								          $mail = $_POST['user'];
								          $password = $_POST['pass'];
								          $fechna = $_POST['year'];
								          $direccion = $_POST['address'];
								          $postal = $_POST['postal'];
								          $tarjeta = $_POST['cc'];

								          $conn = mysqli_connect('localhost','root','','fochi');
								          // Check connection
								          if (mysqli_connect_errno()) {
								            echo "Failed to connect to MySQL: " . mysqli_connect_error();
								          }

								          //Selecting Database
								          $query = mysqli_query($conn, "SELECT * FROM usuario WHERE mail='".$mail."'");
								          $numrows = mysqli_num_rows($query);

								            if($numrows == 0){
								              //Insert to Mysqli Queryss')";
								              $sql = "INSERT INTO usuario VALUES ('$mail', '$password', $fechna, '$direccion', $postal, $tarjeta)";
								              $result = mysqli_query($conn, $sql);
								              //Result Message
								              if($result){
								                echo "Your Account Created Successfully";
								              }else{
								                echo "Failure!";
								              }
								            }else{
								              echo "That Username already exists! Please try again.";
								            }

								          }else{
								            ?>
								            <!--Javascript Alert -->
								            <script>alert('Required all fields');</script>
								            <?php
								          }
								        }
								        ?>

								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- End footer Area -->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
