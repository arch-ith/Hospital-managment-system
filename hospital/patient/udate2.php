<?php
  $_SESSION["flag"]="4";
  echo " ".$aid;
  $con =mysqli_connect("localhost","root","","hospital");
  $q="UPDATE appointment SET atime=$atime adate=$adate WHERE aid=$aid";
  $fname=$con->query($q);
 ?>
