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
        <a href="#"><li>Home</li></a>
        <a href="ch.php"><li>Check appointment</li></a>
        <a href="up.php">  <li>Update an appintment</li></a>
        <a href="ire.php"><li>Insert Records</li></a>
        <a href="../index.html"><li>Log out</li> </a>
      </ul>
      <br><br>
      <h2>hey Dr.<?php echo "".$fn; ?> !</h2>
      <div class="gid">
        <div class="g">
          <img src="../images/cala.jpg" ><br><br>
          <h3>Check Appointment</h3><hr><br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="g">
          <img src="../images/up.png" ><br><br>
            <h3>Update Appointment</h3><hr><br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="g">
          <img src="../images/insert.jpg" ><br><br>
          <h3>Insert Medical record</h3><hr><br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
    <br><br><hr><br><br>
    <div class="foot">
      &copy DBMS Mini project
      <br>Archith 1CR17CS019 <br>Anshu 1CR17CS012
    </div>
  </body>
</html>
