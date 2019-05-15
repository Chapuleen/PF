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
               aria-expanded="false" >Pages</a>
              <ul class="dropdown-menu">
                <li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="registration.php">Register</a></li>
              </ul>
            </li>
            <li class="nav-item submenu dropdown active">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
               aria-expanded="false">Admin</a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="addProducts.php">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="editProducts.php">Edit</a></li>
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

    <!-- Page Content -->
    <div class="container">
  <br>  <br>  <br>
      <!-- Page Heading -->
      <h1 class="my-5">Pagina de Administración
        <br><small>Selecciona una Opción</small>
      </h1>

      <div class="row">
        <div class="col-lg-6 col-sm-6 portfolio-item ">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top:10px;">
              <a href="addProducts.php"><img class="card-img-top" src="img/PF/smeg2.jpg" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="addProducts.php">Añadir Productos</a>
              </h4>
              <p class="card-text">Aquí puedes ingresar el registro de nuevos productos en la Base de Datos.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 portfolio-item text-center">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top: 10px;">
              <a href="editProducts.php"><img class="card-img-top" src="img/PF/dyson.jpg" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="editProducts.php">Historial/Modificar Productos</a>
              </h4>
              <p class="card-text">Aquí puedes consultar, modificar o eliminar el registro de los productos en la Base de Datos.</p>
            </div>
          </div>
        </div>

    </div>

    <!-- /.container -->
