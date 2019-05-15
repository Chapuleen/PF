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
<br><br><br>
<?PHP


  if(!isset($_SESSION['sess_user'])){
    header("Location:admin.php");
  }else {
    $con = mysqli_connect('localhost','root','','fochi');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $valido = true;
    $borrar=mysqli_query($con,"SELECT p.idproducto, p.cantidad, up.upcantidad FROM producto p, usupro up WHERE p.idproducto=up.idproducto AND mail='{$_SESSION['sess_user']}' AND pagado=0;");

    while($row = mysqli_fetch_array($borrar)){
      echo "Producto: {$row['idproducto']}<br>";
      echo "Carrito: {$row['upcantidad']}<br>";
      echo "Usuario: {$row['cantidad']}<br>";

      $stock = $row['cantidad'] - $row['upcantidad'];
      if($stock < 0){
        $valido = false;
      }
      echo "Resultado: $stock<br><br><br>";
    }

    if($valido == true){
      echo "Compra valida<br><br>";

      $ejecutar=mysqli_query($con,"SELECT p.idproducto, p.cantidad, up.upcantidad FROM producto p, usupro up WHERE p.idproducto=up.idproducto AND mail='{$_SESSION['sess_user']}' AND pagado=0;");
      while($fila = mysqli_fetch_array($ejecutar)){
        $stock = $fila['cantidad'] - $fila['upcantidad'];
        mysqli_query($con,"UPDATE producto SET cantidad=$stock WHERE idproducto={$fila['idproducto']}");
      }

      $result = mysqli_query($con,"UPDATE usupro SET pagado=1,  fechacompra='". date("h:i:sa") ." ". date("Y/m/d") ."' WHERE mail='{$_SESSION['sess_user']}' AND pagado=0");
      echo '<meta http-equiv="refresh" content="0; URL=http://localhost/atom/PF/history.php">';
    }else{
      echo '<meta http-equiv="refresh" content="0; URL=http://localhost/atom/PF/buyError.php">';
    }

  }
?>
