<?php
  session_start();
    $_SESSION["flag"] = "3";
    if (!isset($upc)) {
      header("location:update1.php");
    }
    $q="DELETE appointment WHERE aid=$aid";
    $fname=$con->query($q);
?>
