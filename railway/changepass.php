<?php

session_start();
$pass=$_GET['pass'];
$name=$_SESSION['name'];

require('firstimport.php');
$tbl_name="users"; // Table name


$sql="UPDATE users SET password=$pass WHERE user_id='$name'"; 


$result=mysqli_query($conn,$sql);

$_SESSION['error']=6;

//echo "name : ".$name."  Pass : ".$pass;
header('location:profile.php');
?>