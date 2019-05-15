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
<br><br><br><br>
<div class="container">
    <!-- Page Heading -->
    <h1 class="my-3">Product Catalog</h1>
      <div class='row my-6' >
          <div class="col-xl-1 titlebox box">
            Nombre
          </div>

          <div class="col-xl-1 titlebox box">
            Pais
          </div>

          <div class="col-xl-3 titlebox box">
            Descripción
          </div>

          <div class="col-xl-1 titlebox box">
            Precio
          </div>

          <div class="col-xl-1 titlebox box" style="font-size:13px">
           Fabricante
          </div>

          <div class="col-xl-1 titlebox box" style="font-size:14px">
            Cantidad
          </div>

          <div class="col-xl-1 titlebox box">
            Foto
          </div>

          <div class="col-xl-1 titlebox box" style="font-size:14px">
            Categoria
          </div>


          <div class="col-xl-1 titlebox box">
          </div>
    </div>
<?PHP
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else{
    $admin = $_SESSION['sess_user'];
    if($admin != 'Eduardo'){
        header("Location:../index.php");
    }
  }
 ?>

 <?php
        $con = mysqli_connect("localhost","root","","fochi");
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


          $result = mysqli_query($con,"SELECT * FROM producto");


          while($row = mysqli_fetch_array($result)) {
                         echo "<form action='./eraseProduct.php' method='post'>";
            echo "<div class='row my-6' >";

            echo "<div class='col-xl-1 box'><p style='font-size:12px;'>{$row['nombre']}</div>";
            echo "<div class='col-xl-1 box'><p>{$row['origen']}</div>";
            echo "<div class='col-xl-3 box'><p style='font-size:12px;'>{$row['descripcion']}</div>";
            echo "<div class='col-xl-1 box'><p>".'$'."{$row['precio']}</div>";
            echo "<div class='col-xl-1 box'><p>{$row['fabricante']}</div>";
            echo "<div class='col-xl-1 box'><p>{$row['cantidad']}</div>";
            echo "<div class='col-xl-1 box'><img class='img-fluid' src='". $row['foto'] ."' alt='' style='max-width:100%; display:block; max-height:100%;'></img></div>";
            echo "<div class='col-xl-1 box'><p style='font-size:14px;'>{$row['categoria']}</div>";
            echo "<div class='col-xl-1 box'><button class='btn btn-primary btn-sm' name='idproducto' value ={$row['idproducto']} type='submit'>Eliminar</div>";
            echo "<input type='hidden' value='{$row['idproducto']}'>";

            echo "</div>";
            echo "</form>";
          }

    ?>
