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
  }////create trigger a_made_date_Trigger after insert on appointment for each row insert into appointment_made_on(aid,amdate) values (new.aid,CURDATE())
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
        <a href="pma.php"><li>Make an appointment</li></a>
        <a href="update1.php"><li>Update an appintment</li></a>
        <a href="re.php"><li>Records</li></a>
        <a href="../index.html"><li>Log out</li> </a>
      </ul>
      <br><br>
      <h2>hey <?php echo "".$fn; ?>!</h2>
      <div class="gid">
        <div class="g">
          <img src="../images/cala.jpg" ><br><br>
          <h3>Appointment</h3><hr><br>
          1)Patient can make or view his
          appointments.<br><br>
          2)Make an appointment he can fill
          out the date and time he will vistit
          and the specilaist he needs.<br><br>
          3)appoints which are arranged
          in latest date wise order.
        </div>
        <div class="g">
          <img src="../images/up.png" ><br><br>
            <h3>Update or Cancle</h3><hr><br>
            1)Patient can cancle or update
            his appointment.<br><br>
            2)If he wishes to update then
            he/she fill out the new time
            and date .<br><br>
            3)He/she may cancle an apointment
            by  entering the appointment id.
        </div>
        <div class="g">
          <img src="../images/re.png" ><br><br>
          <h3>Medical record</h3><hr><br>
          1)He can check the medicine name
          and for what it is used.<br><br>
          2)Can uniqely identefy which
          appointment he has been given
          which medicine.
        </div>
      </div>
    </div>
    <br><br>
    <img src="../images/feed.png" style="position:fixed;width:130px;top:20%;right:2%;opacity:.7">
    <a href="feedback.php"
     style="padding:10px;position:fixed;top:38%;right:0%;background:red;border-radius:5%;color:white;">Provide Feedback</a>
    <br><br>
    <div class="foot">
      &copy DBMS Mini project
      <br>Archith 1CR17CS019<br>Anshu 1CR17CS012
    </div>
  </body>
</html>
