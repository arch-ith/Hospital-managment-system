<?php
  session_start();
  $id=$_SESSION['id'];
  $_SESSION["flag"] = "2";
  $con =mysqli_connect("localhost","root","","hospital");
  $q="select fname from patient where pid in ($id)";
  $fname=$con->query($q);
  $fn=null;
  while ($row = $fname->fetch_assoc()) {
    $fn = implode("",$row);
  }
  mysqli_close($con);
?>
<script type="text/javascript">
  var today = new Date();
</script>
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
        <a href="patientlogin.php"><li>Home</li></a>
        <a href="pma.php"><li>Make an appointment</li></a>
        <a href="update1.php">  <li>Update an appintment</li></a>
        <a href="re.php"><li>Records</li></a>
        <a href="../index.html"><li>Log out  </li> </a>
      </ul><br><br>
      <h2>hey <?php echo "".$fn; ?>!</h2>
    </div>
    <br><br>
    <div class="apint">
      <h3>Make an appointment</h3><hr><br><br>
        <form class="" action="create.php" method="get" >
          Date for the appointment <input type="date" name="adate" placeholder="Date" ><br><br><br>
          Time for the appointment <input type="time" style='width:80px' name="atime" min="08:05:00" max="22:00:00" ><br><br><br>
          Doctors Specialization <br><br>
          <input type="radio" name="sp" value="Allergists">Allergists &nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="sp" value="Cardiologists">Cardiologists&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="sp" value="Dermatologists">Dermatologists  <br><br>
          <input type="radio" name="sp" value="Gastroenterologists" > Gastroenterologists&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="sp" value="Infectious Disease S">Infectious Disease Specialists&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="sp" value="Neurologists"> Neurologists<br><br>
          <input type="radio" name="sp" value="pediatrician">pediatrician<br><br><br>
          <button type="submit" >Book an Appointment</button><br><br>
        </form>
          <h3>Your Appointments</h3><hr>
      </div>
        <?php
             $con =mysqli_connect("localhost","root","","hospital");
             $count=1;
             if ($con -> connect_error) {
               echo "error";
             }
             $q="select aid,pid,did,atime,adate from appointment where pid=$id ORDER BY  adate desc,atime asc";
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
                 echo "<br>Appointment id : ".$row['aid']."<br>Patient id : ".$row['pid']."<br>Doc id : ".$row['did']."<br>Appointment time : ".$row['atime']."<br>Appointment date : ".$row['adate']."<br><br>";
               ?>
             </div>
               <?php endwhile; ?>
           </div>
           <br><br><br><br><br><br>
      <div class="tab">
        <table >
          <tr><th>Appointment id&nbsp&nbsp</th><th>&nbsp&nbspPatient id&nbsp&nbsp</th><th>&nbsp&nbsp&nbsp&nbsp&nbspDoc id&nbsp&nbsp</th><th>&nbsp&nbspAppointment time&nbsp&nbsp</th><th>&nbsp&nbspAppointment date</th></tr><br>
         <?php
              $con =mysqli_connect("localhost","root","","hospital");
              if ($con -> connect_error) {
                echo "error";
              }
              $q="select aid,pid,did,atime,adate from appointment where pid=$id";
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
