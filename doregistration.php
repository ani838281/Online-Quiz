<?php
  
$username=$_POST['username'];
$password=$_POST['password'];
 $con=mysqli_connect('localhost','root');
 mysqli_select_db($con,'onlinetest');
$q="insert into user(username,password) values('$username','$password')";
$result=mysqli_query($con,$q);

mysqli_close($con);
header("location:userlogin.php");
?>