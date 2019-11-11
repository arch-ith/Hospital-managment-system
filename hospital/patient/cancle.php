<?php
  session_start();
    $_SESSION["flag"] = 3;
    $aid=$_GET['aid'];
    $con =mysqli_connect("localhost","root","","hospital");
  /*  if (empty($upc)) {
      header("location:update1.php");
    }*/
    $q="DELETE from appointment WHERE aid=$aid";
    if($result=$con->query($q)==true)
    echo "true";

    header("location:update1.php");
?>
