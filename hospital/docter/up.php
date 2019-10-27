<!DOCTYPE html>
<?php
  session_start();
  $id=$_SESSION['id'];
  $flag=$_SESSION['flag'];
  $con =mysqli_connect("localhost","root","","hospital");
  $q="select fname from docter where did in ($id)";
  $fname=$con->query($q);
  $fn=null;
  while ($row = $fname->fetch_assoc()) {
    $fn = implode("",$row);
  }
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

              <h3>Update</h3><hr><br><br>
                <form action="up2.php" method="get">
                Appointment ID <input type=number name="aid" value="" min="0"><br><br>
                 New Appointment time <input type=time name="atime" value="" min="08:00:00" max="22:00:00"><br><br>
                 New Appointment date <input type=date name="adate" value=""><br><br>
                  <button type=submit>Update</button>
                </form>
                <?php
                  if ($flag==0) {
                    echo "<h4>Update Succesfull!</h4>";
                  }
                 ?>
      </div>
  </body>
</html>
