<?php
  session_start();
  $pid=$_SESSION['id'];
  $con =mysqli_connect("localhost","root","","hospital");
  if (empty($sp)||empty($adate)||empty($atime)) {
    header("location:pma.php");
  }
  $sp=$_GET['sp'];
  $adate=$_GET['adate'];
  $atime=$_GET['atime'];
  $atime .= ":00";
   $idoc="select d.did from docter d,workingtime w where d.spec  in ('$sp') and '$atime' BETWEEN w.stime and w.etime AND w.did=d.did";
  $didarr=$con->query($idoc);
  $did=0;
  while ($row = $didarr->fetch_assoc()) {
    $did= implode("",$row);
  }
  $max="select max(aid) from appointment";
  $rmax=$con->query($max);
  while ($row = $rmax->fetch_assoc()) {
    $aid= implode("",$row);
  }
  $aid=$aid+1;
    echo " ".$aid." ".$pid." ".$did." ".$adate." ".$atime;
 $q="INSERT INTO appointment(aid,pid,did,atime,adate)values($aid,$pid,$did,'$atime','$adate')";
  $result=$con->query($q);
  if ($con->query($q) === TRUE) {
    header('location: index.html');
 }
 else {
     echo "Error: " . $q . "<br>" . $con->error;
   }
  mysqli_close($con);
?>
