<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
if($username=="admin")
    header("location:adminlogin.php");
else
{
    $con=mysqli_connect('localhost','root');
    mysqli_select_db($con,'onlinetest');
    $q="select * from user where username='$username' && password='$password'";
    $result=mysqli_query($con,$q);
    $row_count=mysqli_num_rows($result);
    echo $row_count;
    if($row_count==1)
    {
        $row=mysqli_fetch_array($result);
        $_SESSION['username']=$row['username'];
        header("location:home.php");
    }
    else
    {
        header("location:userlogin.php");
    }
}

?>