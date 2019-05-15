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
<br><br><br><br>

<?PHP
    $con = mysqli_connect("localhost","root","","fochi");
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
   <div class="container">
        <!-- Page Heading -->

        <div class="col-lg-12">
          <div class="card mt-4">
          <div class="card-body">
            <h1 class="my-2">New Product</h1>

            <h6 style="color:red">
   <?php

        if(!isset($_POST['nombre']) || !isset($_POST['origen']) || !isset($_POST['precio']) || !isset($_POST['fabricante']) || !isset($_POST['cantidad']) || !isset($_POST['categoria']) || !isset($_POST['descripcion'])){
          echo "Fill all the inputs.";
        }else{
          $nombre = $_POST['nombre'];
          $origen = $_POST['origen'];
          $precio = $_POST['precio'];
          $fabricante = $_POST['fabricante'];
          $cantidad = $_POST['cantidad'];
          $categoria = $_POST['categoria'];
          $descripcion = $_POST['descripcion'];

          $result = mysqli_query($con,"SELECT * FROM producto ORDER BY idproducto DESC");
          $row = mysqli_fetch_array($result);

          $id = $row['idproducto'] + 1;

          $target_dir = "./img/PF/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if($check !== false) {
                  $uploadOk = 1;
              } else {
                  echo "File is not an image.<br>";
                  $uploadOk = 0;
              }
          }
          // Check if file already exists
          if (file_exists($target_file)) {
              echo "Sorry, file already exists.<br>";
              $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
              echo "Sorry, your file is too large.<br>";
              $uploadOk = 0;
          }
          // Allow certain file formats
          if($imageFileType != "jpg") {
              echo "Sorry, only jpg files are allowed.<br>";
              $uploadOk = 0;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.<br>";
          // if everything is ok, try to upload file
          } else {
            $foto = basename($_FILES["fileToUpload"]["name"]);
            $query =  "INSERT INTO producto VALUES". "(". $id . ",  '$nombre' , '$origen', '$descripcion', $precio, '$fabricante', $cantidad, './img/$foto', '$categoria')";
            $result = mysqli_query($con, $query);

            if($result){
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The product '$nombre' with the image file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the Data Base.<br>";
              } else {
                  echo "Sorry, there was an error uploading your file.<br>";
              }
            }else{
               echo "Fill all the inputs.";
            }
          }
        }

      ?>
    </h6>

  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

    <div class="row">

     <!-- p_nombre -->
      <div class="col-xl-6">
        <div class="form-group">
          <label class="control-label col-sm-12">Product Name</label>
          <div class="col-sm-12">
            <input type="text" maxlength="30" name="nombre" class="form-control" placeholder="Enter email">
          </div>
        </div>
      </div>

     <!-- p_origen -->
      <div class="col-xl-6">
        <div class="form-group">
          <label class="control-label col-sm-12">Country</label>
          <div class="col-sm-12">
            <input type="text" maxlength="20" name="origen" class="form-control" placeholder="Enter country">
          </div>
        </div>
      </div>

     <!-- p_precio -->
      <div class="col-xl-6">
        <div class="form-group">
          <label class="control-label col-sm-12">Price</label>
          <div class="col-sm-12">
            <input type="number" maxlength="11" name="precio" class="form-control" placeholder="Enter price">
          </div>
        </div>
      </div>

     <!-- p_fabricante -->
      <div class="col-xl-6">
        <div class="form-group">
          <label class="control-label col-sm-12">Company</label>
          <div class="col-sm-12">
            <input type="text" maxlength="20" name="fabricante" class="form-control" placeholder="Enter Company">
          </div>
        </div>
      </div>

     <!-- p_cantidad -->
      <div class="col-xl-6">
        <div class="form-group">
          <label class="control-label col-sm-12">Stock</label>
          <div class="col-sm-12">
            <input type="number" maxlength="11" name="cantidad" class="form-control" placeholder="Enter Stock">
          </div>
        </div>
      </div>

     <!-- p_catogoria -->
      <div class="col-xl-6">
        <div class="form-group">
          <label class="control-label col-sm-12">Category</label>
          <div class="col-sm-12">
            <select  class="form-control" name="categoria">
              <option value="cafeteras">Cafeteras</option>
              <option value="procesadores">Procesadores</option>
              <option value="licuadoras">Licuadoras</option>
              <option value="aspiradoras">Aspiradoras</option>
              <option value="hornos">Hornos</option>
              <option value="cocina">Cocinas</option>
            </select>
          </div>
        </div>
      </div>

      <!-- file upload-->
       <div class="col-xl-6">
         <div class="form-group">
           <label class="control-label col-sm-12">Select image to upload:</label>
           <div class="col-sm-12">
               <input type="file" name="fileToUpload" id="fileToUpload">
           </div>
         </div>
       </div>

     <!-- p_descripcion -->
      <div class="col-xl-12">
        <div class="form-group">
          <label class="control-label col-sm-12">Description</label>
          <div class="col-sm-12">
            <textarea type="textarea" rows="5" maxlength="200" name="descripcion" class="form-control" placeholder="Enter a brief description"></textarea>
          </div>
        </div>
      </div>

     <!-- Submit -->
      <div class="col-xl-12">
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Insert Product</button>
          </div>
        </div>
      </div>

    </div>
  </form>
</div>
</div>
