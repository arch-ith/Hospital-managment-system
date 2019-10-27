<?php
  session_start();
    $aid=$_GET['aid'];
    $adate=$_GET['adate'];
    $atime=$_GET['atime'];
    echo "aid".$aid."<br>atime".$atime ;
   //if(empty($_GET['aid'])||empty($_GET['adate'])||$_GET['atime']) {
    //header("location:up.php");
  //}
  echo "<br>adate".$adate;
  $con =mysqli_connect("localhost","root","","hospital");
  //update appointment set atime='9'where aid=0
  $q="UPDATE appointment SET atime='$atime' ,adate='$adate' WHERE aid=$aid";
  if ($con->query($q) === TRUE) {
  $_SESSION["flag"]=0;
 } header("location:up.php");
 ?>
