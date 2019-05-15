
<?php

  session_start();

  if(!isset($_SESSION['sess_user'])){
    echo '<meta http-equiv="refresh" content="0; URL=http://localhost/atom/PF/index.php">';
  }else {
    $product = $_POST['product'];
    $conn = mysqli_connect('localhost','root','','fochi');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($conn,"DELETE FROM usupro WHERE idproducto=$product AND mail='{$_SESSION['sess_user']}';");
    header("Location:./cart.php");
  }
?>
