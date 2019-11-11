<?php
  $id=$_GET['id'];
  $fname=$_GET['fname'];
  $lname=$_GET['lname'];
  $pass=$_GET['pass'];
  $con =mysqli_connect("localhost","root","","hospital");
  //echo "id :".$id."<br> lname: ".$lname."<br>fname : ".$fname;
  if ($con -> connect_error) {
    echo "error";
  }
  //////check if it is empty field
  if(empty($_GET['id'])||empty($_GET['id'])||empty($_GET['lname'])||empty($_GET['pass']))
  {
     header('location: ../signup.html');
   }
   //INSERT INTO table_name (column1, column2, column3, ...)
//VALUES (value1, value2, value3, ...);
  $q = "INSERT INTO patient (pid,fname,lname,pass) VALUES ($id, '$fname', '$lname','$pass')";
     if ($con->query($q) === TRUE) {
       header('location: ../index.html');
    }
    else {
         header('location: ../signup.html');
      }
$con->close();
  /*
  $q="insert into patient() values()";
  $result=$con->query($q);
  while ($row = res->fetch_assoc()) {
    echo "<tr><td>".$row[did]."</td><td>".$row[doname]."</td><td>".$row[s_time]."</td><td>".$row[e_time]."</td></tr>";
  }*/
?>
