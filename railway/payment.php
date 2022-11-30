<?php
session_start();
require('firstimport.php');
			if(!isset($_SESSION['name']))
			 {
				header("location:login1.php");
			 }
			$id= $_GET['bid'];
			$amt=$_GET['pay'];
            $uid=$_SESSION['name'];
            $pst="requested";
            $pd=date('Y-m-d',time()-60*60*24*365*18);
			$isql="INSERT INTO payment (pdate,pstatus,amount,user_id,bid)
	VALUES ('$pd','$pst',$amt,'$uid','$id')";
    $usql="UPDATE booking SET pstatus='$pst' WHERE bid='$id' ";
	$iresult=mysqli_query($conn,$isql);
    $uresult=mysqli_query($conn,$usql);
	header("location:booking.php");
			 

?>