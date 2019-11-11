
<?php
  session_start();
  $_SESSION['id'] = $_GET["id"];
?>
  <?php
  $id=$_GET['id'];
  $pass=$_GET['pass'];
  if(empty($_GET['id'])||empty($_GET['pass'])) {
    header("location: ../dlogin.html");
  }
  $fn=null;
  $con =mysqli_connect("localhost","root","","hospital");
  if ($con -> connect_error) {
    echo "error";
  }
  $q=null;
  $q="select fname from docter where did in ($id) and pass in ('$pass')";
  $fname=$con->query($q);
  while ($row = $fname->fetch_assoc()) {
    $fn = implode("",$row);
  }
  if($fn!='')
    header("location: docterlogin.php");
  else {
    header("location: ../dlogin.html");
  }
    mysqli_close($con);
?>
