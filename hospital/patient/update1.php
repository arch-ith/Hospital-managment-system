<!DOCTYPE html>
<?php
  session_start();
  $flag=$_SESSION["flag"];
  $id=$_SESSION['id'];
  $con =mysqli_connect("localhost","root","","hospital");
  $q="select fname from patient where pid in ($id)";
  $fname=$con->query($q);
  $fn=null;
  while ($row = $fname->fetch_assoc()) {
    $fn = implode("",$row);
  }
  mysqli_close($con);
?>
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
        <a href="#">  <li>Update an appintment</li></a>
        <a href="re.php"><li>Records</li></a>
        <a href="../index.html"><li>Log out </li> </a>
      </ul><br><br>
      <h2>hey <?php echo "".$fn; ?>!</h2>
    </div>
    <br><br>
      <div class="phpdisp">
        <div class="apint">
              <h3>Cancle</h3><hr><br><br>
                <form action="cancle.php" method="get">
                Appointment ID <input type=number name="aid" value=""><br><br>
                  <button type=submit>Cancle</button>
                </form>
            <?php if ($flag==3): ?>
            <h5>Appointment Canceled!<h5>
            <?php endif; ?>
        </div>
      </div>
      <div class="apint">
              <h3>Update</h3><hr><br><br>
                <form class= action="udate2.php" method="get">
                Appointment ID <input type=number name="aid" value=""><br><br>
                 New Appointment time <input type=time name="atime" value="" min='08:05:00' max='21:59:00'><br><br>
                 New Appointment date <input type=date name="adate" value=""><br><br>
                  <button type=submit>Update</button>
                </form>
            <?php if ($flag===4): ?>
            <h5 >Appointment Updated!<h5>
              <?php endif; ?>
      </div>
  </body>
</html>
