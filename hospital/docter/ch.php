<?php
  session_start();
  $id=$_SESSION['id'];
  $_SESSION["flag"] = "2";
  $con =mysqli_connect("localhost","root","","hospital");
  $q="select fname from docter where did in ($id)";
  $fname=$con->query($q);
  $fn=null;
  while ($row = $fname->fetch_assoc()) {
    $fn = implode("",$row);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div class="patient">
      <h1>Hospital mangment system</h1>
       <ul>
         <a href="docterlogin.php"><li>Home</li></a>
         <a href="ch.php"><li>Check appointment</li></a>
         <a href="up.php">  <li>Update an appintment</li></a>
         <a href="ire.php"><li>Insert Records</li></a>
         <a href="../index.html"><li>Log out</li> </a>
      </ul><br><br>
      <h2>hey Dr.<?php echo "".$fn; ?> !</h2>
    </div>
    <br><br>
    <div class="apint">
      <h3>Appointment's List</h3><hr>
      </div>
      <br>
      <?php
           $con =mysqli_connect("localhost","root","","hospital");
           $count=1;
           if ($con -> connect_error) {
             echo "error";
           }
           $q="select aid,pid,did,atime,adate from appointment where did=$id ORDER BY  adate desc,atime asc";
           $result=$con->query($q);

        ?>
          <div class="disp">
            <?php while ($row = $result->fetch_assoc()):  ?>

            <div class="d">
              <div class="count">
                <?php echo $count ?>
                <?php $count=$count+1 ?>
              </div>
              <?php
               echo "<br>Appointment id : ".$row['aid']."<br>Patient id : ".$row['pid']."<br>Doctor id : ".$row['did']."<br>Appointment time : ".$row['atime']."<br>Appointment date : ".$row['adate']."<br><br>";
             ?>
           </div>
             <?php endwhile; ?>
         </div>
         <br><br><br><br><br><br>
      <div class="tab">
        <table  rules="none">
          <tr><th>Appointment id&nbsp&nbsp</th><th>&nbsp&nbspPatient id&nbsp&nbsp</th><th>&nbsp&nbsp&nbsp&nbsp&nbspDoc id&nbsp&nbsp</th><th>&nbsp&nbspAppointment time&nbsp&nbsp</th><th>&nbsp&nbspAppointment date</th></tr><br>
         <?php
              $con =mysqli_connect("localhost","root","","hospital");
              if ($con -> connect_error) {
                echo "error";
              }
              $q="select aid,pid,did,atime,adate from appointment where did=$id";
              $result=$con->query($q);
              while ($row =$result->fetch_assoc()) {
                echo "<tr><td>".$row['aid']."</td><td>".$row['pid']."</td><td>".$row['did']."</td><td>".$row['atime']."</td><td>".$row['adate']."</td></tr>";
              }
              mysqli_close($con);
          ?>
        </table>
      </div>
    <br><br><br><br>
  </body>
</html>
