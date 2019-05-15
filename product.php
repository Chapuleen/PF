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
<div class="container">

  <!-- Product -->
  <?PHP
    $con = mysqli_connect("localhost","root","","fochi");
    if (!isset($_POST['id'])){
      header("Location:../PF/category.php");
    }else{
      $id = $_POST['id'];
      $result = mysqli_query($con,"SELECT * FROM producto WHERE idproducto = $id");

      $row = mysqli_fetch_array($result);
        echo "<br><br><br><br><h1 class='my-0' align='middle'>". $row['nombre'] ."  ";
        echo "<small> - ". $row['fabricante'] ."</small></h1>";
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<a href='#'>";
        echo" <br><br><img class='img-fluid' src='". $row['foto'] ."' alt='' style='width:160px' align='right'>";
        echo "</a></div>";
        echo "<div class='col-md-5'><br><br><br>";
        echo "<p style='font-size: 20px;'>". $row['descripcion'] ."</p>";
        echo "<h3> $". $row['precio'] ."</h3><br>";
        echo "<h5 style='color: gray;'> Stock: ". $row['cantidad'] ."</h5><br>";



        if(isset($_SESSION['sess_user'])){
          if($row['cantidad']>0){
            		  echo "<form class='form-inline' action='./addCart.php' method='post'>";
                  echo "<input type='hidden' name='product' value='{$row['idproducto']}'</input>";
                  echo "<button type='submit' class='btn btn-primary'>Add to Cart</button>";
                  echo "<div class='form-group'><h5> &nbsp&nbsp&nbsp Quantity: &nbsp</h5><input type='number' name='cantidad' min=1 max={$row['cantidad']} value=1 class='form-control'></div></form>";

          }
        }
        echo "</div></div>";
    }
  ?>
</div>
