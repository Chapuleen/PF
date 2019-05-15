<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    echo '<meta http-equiv="refresh" content="0; URL=http://localhost/atom/PF/index.php">';
  }else {
    $product = $_POST['product'];
    $cantidad = $_POST['cantidad'];

    $con = mysqli_connect('localhost','root','','fochi');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $quantity = mysqli_query($con,"SELECT cantidad FROM usupro WHERE mail='{$_SESSION['sess_user']}' AND idproducto=$product AND pagado=0");

    $resul_cant = mysqli_fetch_array($quantity);
    if($resul_cant['cantidad']>0){
      echo "act";
      $cantidad = $cantidad + $resul_cant['cantidad'];
      mysqli_query($con,"UPDATE usupro SET cantidad = $cantidad WHERE mail='{$_SESSION['sess_user']}' AND idproducto=$product AND pagado=0");
    }else{
      echo "ins";
      $insert = "INSERT INTO usupro VALUES"."("."$product, 0, $cantidad,'{$_SESSION['sess_user']}', NULL)";
      $result = mysqli_query($con,$insert);
    }

    header("Location:./cart.php");

  }
?>
