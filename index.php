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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
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
									<li class="nav-item"><a class="nav-link" href="category.php">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
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
							<li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
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


	</header>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area">
		<br>
		<br>
		<br>
		<br>
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<?php
									$con = mysqli_connect("localhost","root","","fochi");
									if (mysqli_connect_errno()) {
									  echo "<div class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
									}
									  $result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=29;");
										while($row = mysqli_fetch_array($result)){
											echo "<h1>". $row['nombre'] ."</h1>";
											echo "<p class='card-text'>". $row['descripcion'] ."</p></div></p>";
										}
?>

								</div>

							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/PF/dyson.jpg" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">

							<div class="col-lg-5">
								<div class="banner-content">
									<?php
									$con = mysqli_connect("localhost","root","","fochi");
									if (mysqli_connect_errno()) {
									  echo "<div class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
									}
									  $result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=27;");
										while($row = mysqli_fetch_array($result)){
											echo "<h1>". $row['nombre'] ."</h1>";
											echo "<p class='card-text'>". $row['descripcion'] ."</p></div></p>";
										}
?>

							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/PF/chefman2.jpg" alt="">
								</div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->




	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Products</h1>

						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=1;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
								  echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=2;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=3;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=4;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=5;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
	?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=6;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=7;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=8;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Products</h1>

						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=9;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";

								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=10;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=11;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=12;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=13;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=14;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=15;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<?php
							$con = mysqli_connect("localhost","root","","fochi");
							if (mysqli_connect_errno()) {
								echo "<class=\"btn btn-warning\"> Failed to connect to MySQL: " . mysqli_connect_error();
							}
								$result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto=16;");
								while($row = mysqli_fetch_array($result)){
									echo" <img class='img-fluid' src='". $row['foto'] ."' alt=''>";
									echo "<div h6 class='product-details'>". $row['nombre'] ."</h6>";
									echo "<div h6 price>$". $row['precio'] ."</h6></div>";
								}
?>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->


	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
