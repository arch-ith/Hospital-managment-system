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
<!DOCTYPE html>
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
         <a href="#"><li>Home</li></a>
         <a href="pma.php"><li>Make an appointment</li></a>
         <a href="update1.php">  <li>Update an appintment</li></a>
         <a href="re.php"><li>Records</li></a>
         <a href="../index.html"><li>Log out</li> </a>
      </ul><br><br>
      <h3>Medical Report</h3><hr><br><br>
      <div class="tab">
        <table>
          <tr><th>Appointment ID</th><th>Medname</th><th>  Used for </th></tr>
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
