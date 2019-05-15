<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else{
    $admin = $_SESSION['sess_user'];
    if($admin != 'Eduardo'){
        header("Location:../index.php");
    }
  }

    $con = mysqli_connect('localhost','root','','fochi');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"DELETE FROM producto WHERE idproducto={$_POST['idproducto']}");
    header("Location: ./editProducts.php");
?>
