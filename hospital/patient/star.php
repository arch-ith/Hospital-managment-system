<?php
  session_start();
    $id=$_SESSION['id'];
    $aid=$_GET['aid'];
    $st=$_GET['st'];
    echo "st".$st." <br>";
    $con =mysqli_connect("localhost","root","","hospital");
    $q="Select d.star from docter d,appointment a where a.aid=$aid and a.did=d.did";
    $dstar=$con->query($q);
    $dst=null;
    while($row = $dstar->fetch_assoc()){
      $dst = implode("",$row);
    }
    ////
    $q="Select d.did from docter d,appointment a where a.aid=$aid and a.did=d.did";
    $did_=$con->query($q);
    $did=null;
    while($row = $did_->fetch_assoc()){
      $did= implode("",$row);
    }
    echo "<br> dst".$dst;
    $newst=($st+$dst)/2;
    echo "<br> newst".$newst;
    echo " <br>id".$did;
    $q=" CALL `update_star`($newst,$did)";
    if($result=$con->query($q)==true)
    $_SESSION["flag"] =6;
    header("location:feedback.php");
?>
