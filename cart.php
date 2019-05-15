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

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <div class="container">
      <div class="row my-3">

        <div class="col-xl-1">
          <h2>Cart</h2>
        </div>

        <div class="col-xl-2">
          <form action="./history.php" method="post">
            <button type='submit' class='btn btn-outline-primary align-middle'>Bought History</button>
          </form>
        </div>

        <div class="col-xl-7">
        </div>

        <div class="col-xl-2">
          <form action="./buyAction.php" method="post">
            <button type='submit' class='btn btn-lg btn-primary btn-block align-middle' style="border-radius: 25px;">Buy</button>
          </form>
        </div>
      </div>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        <!-- Product -->
        <?PHP
          $con = mysqli_connect('localhost','root','','fochi');
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          if(!isset($_SESSION['sess_user'])){
            echo '<meta http-equiv="refresh" content="0; URL=http://localhost/atom/PF/index.php">';
          }else {
            $result = mysqli_query($con,"SELECT DISTINCT u.mail,p.foto, p.nombre, p.precio, up.upcantidad, up.idproducto FROM usupro up, producto p, usuario u WHERE up.idproducto=p.idproducto AND u.mail=up.mail AND up.mail='{$_SESSION['sess_user']}' AND pagado=0;");

            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
                echo" <td><img class='img-fluid' src='". $row['foto'] ."' alt='' style='width:160px'></td>";
                echo "<td class='align-middle'> <h4>{$row['nombre']} </h4></td>";
                echo '<td class="align-middle"> <h4>$'. $row["precio"] .'</h4></td>';
                echo "<td class='align-middle'> <h4>{$row['upcantidad']} </h4></td>";
                echo "<td class='align-middle'><form action='./deleteCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['idproducto']}'</input>";
                echo "<button type='submit' class='btn btn-primary align-middle'>Remove</button></form></td>";
              echo "</tr>";
            }
          }
        ?>

        </tbody>
      </table>
    </div>
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
