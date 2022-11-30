<?php
session_start();
require('firstimport.php');
			if(!isset($_SESSION['aname']))
			 {
				header("location:login1.php");
			 }
			$bid= $_GET['bid'];
			$pid=$_GET['pid'];
    $usql1="UPDATE booking SET pstatus='amount received' WHERE bid='$bid' ";
    $usql2="UPDATE payment SET pstatus='accepted' WHERE pid='$pid' ";
	$iresult=mysqli_query($conn,$usql1);
    $uresult=mysqli_query($conn,$usql2);
	header("location:paymentaccept.php");
			 

?>