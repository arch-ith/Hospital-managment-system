<?php
    session_destroy();
 ?>
<?php
  session_start();
  $_SESSION['id'] = $_GET["id"];
?>
  <?php
  $id=$_GET['id'];
  $pass=$_GET['pass'];
  if(empty($_GET['id'])||empty($_GET['pass'])||$fn=='') {
    header("location: login.html");
  }
  $fn=null;
  $con =mysqli_connect("localhost","root","","hospital");
  if ($con -> connect_error) {
    echo "error";
  }
  $q=null;
  $q="select fname from patient where pid in ($id) and pass in ('$pass')";
  $fname=$con->query($q);
  while ($row = $fname->fetch_assoc()) {
    $fn = implode("",$row);
  }
    echo "string".$fn;
    header("location: patientlogin.php");
    mysqli_close($con);
?>
