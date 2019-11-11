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
    <title>feedback</title>
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
            <h3>Rate your Doctor</h3><hr><br><br>
              <form action="star.php" method="get">
              Appointment ID <input type="text" name="aid" value=""><br><br>
              Number of stars <br><br>
              <input type="radio" name="st" value=1>One&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="st" value=2>Two&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="radio" name="st" value=3>Three <br><br>
                <input type="radio" name="st" value=4>Four&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="radio" name="st" value=5 checked>Five<br><br><br><br>
                <button type=submit>Provide feedback</button>
              </form>
          <?php if ($flag==6): ?>
          <h5>Thanks . Feedback Given<h5>
          <?php endif; ?>
      </div>
    </div>
  </body>
</html>
