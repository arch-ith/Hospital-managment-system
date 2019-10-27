<!DOCTYPE html>
<?php
  session_start();
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
    <link rel="stylesheet" href="style.css">
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
    <div class="apint">
      <h3>Update or Cancle</h3><hr><br><br>
        <form class="" action="update.php" method="get" >
          Would u like to update or cancel an appointment ?<br><br>
          &nbsp&nbsp&nbsp&nbsp<input type="radio" name="upc" value="Update">Update&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="upc" value="Cancle">Cancle<br><br>
          <button type="submit">&nbsp&nbsp&nbsp&nbspOk&nbsp&nbsp&nbsp&nbsp</button>
        </form>
      </div>
      <div class="phpdisp">
        <div class="apint">
          <?php
            $flag=$_SESSION["flag"];
            $action="cancle.php";
            $method="get";
            $n1="aid";
            $n2="atime";
            $n3="adate";
            $e="";
            if ($flag==1) {
              echo"
              <h3>Update</h3><hr><br><br>
                <form class= action=".$action." method=".$method.">
                Appointment ID <input type=number name=".$n1." value=".$e."><br><br>
                  <button type=submit>Cancle</button>
                </form>";
            if ($flag==3) {
              echo "<h3>Appointment Canceled!<h3>";
            }
            }
          ?>
        </div>
      </div>
      <div class="apint">
          <?php
            $flag=$_SESSION["flag"];
            $action="udate2.php";
            $method="get";
            $n1="aid";
            $n2="atime";
            $n3="adate";$min="08:00:00";$max="22:00:00";
            $e="";
            if ($flag==0) {
              echo"
              <h3>Update</h3><hr><br><br>
                <form class= action=".$action." method=".$method.">
                Appointment ID <input type=number name=".$n1." value=".$e."><br><br>
                 New Appointment time <input type=time name=".$n2." value=".$e." min=".$min." max=".$max."><br><br>
                 New Appointment date <input type=date name=".$n3." value=".$e."><br><br>
                  <button type=submit>Update</button>
                </form>";
            }
            if ($flag==4) {
              echo "<h3>Appointment Updated!<h3>";
            }
          ?>
      </div>
  </body>
</html>
