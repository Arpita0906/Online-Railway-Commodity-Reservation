<?php
session_start();

$uid=$_POST['user'];
$pass=$_POST['psd'];

require('firstimport.php');

$tbl_name="admin"; // Table name


$sql="SELECT * FROM $tbl_name WHERE aid='$uid' and password='$pass'";


$result=mysqli_query($conn,$sql);

//$row=mysql_fetch_array($result);

//echo "\n\n ..nam..".$row['f_name']."\n\n ..pass..".$row['password'];

if(mysqli_num_rows($result) < 1)
{
	echo " .... LOGIN TRY  ....";
	$_SESSION['error'] = "1";
	header("location:alogin.php"); //
}
else
{
    $DataRow=mysqli_fetch_array($result);
	$_SESSION['aname'] = $DataRow["aname"]; // Make it so the username can be called by $_SESSION['name']    //
	echo " ....   LOGIN  ....";
	echo $_SESSION['aname'];
	header("location:admin.php");    //
}

?>

	