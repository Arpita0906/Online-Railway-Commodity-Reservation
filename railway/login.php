<?php
session_start();

$uid=$_POST['user'];
$pass=$_POST['psd'];

require('firstimport.php');

$tbl_name="users"; // Table name


$sql="SELECT * FROM $tbl_name WHERE user_id='$uid' and password='$pass'";


$result=mysqli_query($conn,$sql) ;

//$row=mysql_fetch_array($result);

//echo "\n\n ..nam..".$row['f_name']."\n\n ..pass..".$row['password'];

if(mysqli_num_rows($result) < 1)
{
	echo " .... LOGIN TRY  ....";
	$_SESSION['error'] = "1";
	header("location:login1.php"); //
}
else
{
	$_SESSION['name'] = $uid; // Make it so the username can be called by $_SESSION['name']    //
	echo " ....   LOGIN  ....";
	echo $_SESSION['name'];
	header("location:index.php");    //
}

?>

	