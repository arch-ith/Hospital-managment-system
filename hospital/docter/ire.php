<?php
  session_start();
  $id=$_SESSION['id'];
  $flag=$_SESSION["flag"];
  $flag=5;
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
      </ul>
      <br><br>
      <h2>hey Dr.<?php echo "".$fn; ?> !</h2>
    </div>
    <div class="apint">

            <h3>Insert Records</h3><hr><br><br>
            <form class="" action="med.php" method="get">
              Appointment ID &nbsp&nbsp&nbsp&nbsp<input type="number" name="aid" value="" min="0"><br><br>
              Medicine ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="number" name="medid" value=""><br><br>
              <button type="submit">Insert</button>
            </form>
            <br><br><br>
            <?php
              if ($flag==3) {
                echo "<h4>Value inserted</h4>";
              }
             ?>
             <br><br><br>
             <h3>Unfinished Records</h3><hr><br><br>
             <?php
                  $con =mysqli_connect("localhost","root","","hospital");
                  $count=1;
                  if ($con -> connect_error) {
                    echo "error";
                  }
                  $q="select a.aid,a.pid from prescribed p, appointment a where a.aid not in (p.aid) and a.did=$id ORDER BY  adate,atime asc";
                  $result=$con->query($q);

               ?>
                 <div class="disp">
                   <?php while ($row = $result->fetch_assoc()):  ?>

                   <div class="d">
                     <div class="count">
                       <?php echo $count ?>
                       <?php $count=$count+1 ?>
                     </div>
                     <?php  echo "<br>Appointment ID : ".$row['aid']."<br>Patient ID : ".$row['pid']."<br><br>";
                    ?>
                  </div>
                    <?php endwhile; ?>
                </div>
                <br><br><br><br><br><br>
              <h3>Finished Records</h3><hr><br><br>
              <?php
                   $con =mysqli_connect("localhost","root","","hospital");
                   $count=1;
                   if ($con -> connect_error) {
                     echo "error";
                   }
                   $q="select a.aid,a.pid from prescribed p, appointment a where a.aid in (p.aid) and a.did=$id ORDER BY  adate desc";
                   $result=$con->query($q);

                ?>
                  <div class="disp">
                    <?php while ($row = $result->fetch_assoc()):  ?>

                    <div class="d">
                      <div class="count">
                        <?php echo $count ?>
                        <?php $count=$count+1 ?>
                      </div>
                      <?php  echo "<br>Appointment ID : ".$row['aid']."<br>Patient ID : ".$row['pid']."<br><br>";
                     ?>
                   </div>
                     <?php endwhile; ?>
                 </div>
                 <br><br><br>


    </div>
  </body>
</html>
