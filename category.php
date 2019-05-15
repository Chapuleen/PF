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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="category">

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

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Categories</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->

				<!-- End Best Seller -->
				<!-- Start Filter Bar -->

				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-2">
			<form action='' method='post'>
				<?php include './sortMenu.php';?>
			</form>
		</div>


		<div class="col-xl-10" style="padding-left:40px;">
			<?PHP
				$con = mysqli_connect("localhost","root","","fochi");
				if (isset($_POST['submit']) && isset($_POST['category'])  && !isset($_POST['sort'])){
					$categoria = $_POST['category'];
					$result = mysqli_query($con,"SELECT * FROM producto WHERE categoria = '$categoria'");
				}else if (isset($_POST['submit']) && !isset($_POST['category'])  && isset($_POST['sort'])){
					$sort = $_POST['sort'];
					$result = mysqli_query($con,"SELECT * FROM producto ORDER BY $sort");
				}else if (isset($_POST['submit']) && isset($_POST['category'])  && isset($_POST['sort'])){
					$categoria = $_POST['category'];
					$sort = $_POST['sort'];
					$result = mysqli_query($con,"SELECT * FROM producto WHERE categoria = '$categoria' ORDER BY $sort");
				}else{
					$result = mysqli_query($con,"SELECT * FROM producto");
				}

				while($row = mysqli_fetch_array($result)) {
					echo "<div class='row'>";
						echo "<div class='col-lg-4 px-12'>";
							echo "<a href='#'>";
								echo" <img class='img-fluid' src='". $row['foto'] ."' alt='' style='width:160px' align='right'>";
							echo "</a>";
						echo "</div>";
						echo "<div class='col-lg-6'>";
							echo "<h3>{$row['nombre']}</h3>";
							echo "<p>{$row['descripcion']}.</p>";
							echo "<h3> $". $row['precio'] ."</h3>";
							echo "<p class='text-muted'>{$row['fabricante']} - {$row['origen']}</p><br>";
							echo "<p><form action='./product.php' method='post'>";
								echo "<button class='btn btn-primary' type='submit' name='id' value={$row['idproducto']} style='position:absolute; bottom: 5px;'> View Product </button>";
							echo "</form></p>";
						echo "</div>";

					echo "</div>";
					echo "<hr>";
				}
			?>
		</div>
	</div>
</div>
	<!-- Start related-product Area -->




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
