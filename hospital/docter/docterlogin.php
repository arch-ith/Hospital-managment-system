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
  $q="select star from docter where did in ($id)";
  $star=$con->query($q);
  $st=null;
  while($row = $star->fetch_assoc()) {
    $st= implode("",$row);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <h2>hey Dr.<?php echo "".$fn; ?> !</h2><br><br>
      <h3 style="margin-left:120px;display:inline;margin-right:30px;">Star Rating</h3>
      <?php if($st>=1):?>
      <span class="fa fa-star"style="color: orange;"></span>
      <?php else:?>
      <span class="fa fa-star"></span>
      <?php endif;?>
        <?php if ($st>=2):?>
        <span class="fa fa-star"style="color: orange;"></span>
        <?php else: ?>
        <span class="fa fa-star"></span>
      <?php endif; ?>
        <?php if ($st>=3):?>
        <span class="fa fa-star"style="color: orange;"></span>
        <?php else: ?>
        <span class="fa fa-star"></span>
      <?php endif; ?>
        <?php if ($st>=4):?>
        <span class="fa fa-star"style="color: orange;"></span>
        <?php else: ?>
        <span class="fa fa-star"></span>
      <?php endif; ?>
        <?php if ($st>=5):?>
        <span class="fa fa-star"style="color: orange;"></span>
        <?php else: ?>
        <span class="fa fa-star"></span>
      <?php endif; ?>
      <div class="gid">
        <div class="g">
          <img src="../images/cala.jpg" ><br><br>
          <h3>Check Appointment</h3><hr><br>
          1)he can check his appointment
          list, in  day
          wise order.
        </div>
        <div class="g">
          <img src="../images/up.png" ><br><br>
            <h3>Update Appointment</h3><hr><br>
            1)If he unavailable on a preticular
            day then he can update an appointment
            which will reflect in patient side also.
        </div>
        <div class="g">
          <img src="../images/insert.jpg" ><br><br>
          <h3>Insert Medical record</h3><hr><br>
          1)he has to inset medical record of
          the patient.<br><br>
          2)Insert the medicin id and the
          appointment id
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
