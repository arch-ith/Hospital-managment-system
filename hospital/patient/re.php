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
      <h3>Medical Report</h3><hr><br><br></div></div>
      <div class="tab">
        <table>
          <tr><th>Appointment ID</th><th>Medname</th><th>  Used for </th></tr>
          <?php
               $con =mysqli_connect("localhost","root","","hospital");
               $count=1;
               if ($con -> connect_error) {
                 echo "error";
               }
               $q="select p.aid,m.medname,m.usedfor from medicine m,prescribed p where p.pid=$id and p.medid=m.medid";
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
                  echo "<br>Appointment ID : ".$row['aid']."<br>Medicine Name : ".$row['medname']."<br>Used for : ".$row['usedfor']."<br><br>";
                 ?>
               </div>
                 <?php endwhile; ?>
             </div>
             <br><br><br><br><br><br>
          <?php
              $con =mysqli_connect("localhost","root","","hospital");
              if ($con -> connect_error) {
                echo "error";
              }
              $q="select p.aid,m.medname,m.usedfor from medicine m,prescribed p where p.pid=$id and p.medid=m.medid";
              $result=$con->query($q);
              while ($row =$result->fetch_assoc()) {
                echo "<tr><td>".$row['aid']."</td><td>".$row['medname']."</td><td>".$row['usedfor']."</td></tr>";
              }
              mysqli_close($con);
          ?>
        </table>
      </div>
    <br><br><br><br>
  </body>
</html>
