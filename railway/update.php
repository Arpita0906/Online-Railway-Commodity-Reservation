<?php
session_start();
require('firstimport.php');
			if(!isset($_SESSION['aname']))
			 {
				header("location:login1.php");
			 }
			$id= $_GET['pid'];
            $pst="delivered on ";
            $pd=date('Y-m-d',time()-60*60*24*365*18);
            $status=$pst.$pd;
            echo $status;
    $usql="UPDATE booking SET dstatus='$status' WHERE bid='$id' ";
    $uresult=mysqli_query($conn,$usql);
	header("location:updatestatus.php");
			 

?>