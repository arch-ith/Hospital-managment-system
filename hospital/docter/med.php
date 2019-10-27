<?php
  session_start();
  $did=$_SESSION['id'];
  $aid=$_GET['aid'];
  $medid=$_GET['medid'];
  $con =mysqli_connect("localhost","root","","hospital");
  //select pid from appointment where aid in (0) and did in (101);
  $q="select pid from appointment where aid in ($aid) and did in ($did)";
  $pidarr=$con->query($q);
  $pid=null;
  while ($row = $pidarr->fetch_assoc()) {
    $pid = implode("",$row);
  }
  //select medname from medicine where medid in (101)
  $q="select medname from medicine where medid in ($medid)";
  $medarr=$con->query($q);
  $medname=null;
  while ($row = $medarr->fetch_assoc()) {
    $medname = implode("",$row);
  }
  echo " aid ".$aid." medid ".$medid." pid ".$pid." medname ".$medname." did ".$did;
  $q="INSERT INTO prescribed (aid,pid,did,medid,medname) values($aid,$pid,$did,'$medid','$medname')";
  if ($con->query($q) === TRUE) {
  $_SESSION["flag"]=3;
 }
 ?>
