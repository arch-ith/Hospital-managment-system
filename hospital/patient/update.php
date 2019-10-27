<?php
  session_start();
    $_SESSION["flag"] = "2";
    if (!isset($upc)) {
      header("location:update1.php");
    }
    $upc=$_GET['upc'];
    if ($upc=='Cancle') {
    $_SESSION["flag"] = "1";
    }
    else if($upc=='Update'){
      $_SESSION["flag"] = "0";
    }
    //header("location: update1.php");
?>
