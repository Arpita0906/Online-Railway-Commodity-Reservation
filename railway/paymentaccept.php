<?php
session_start();
require('firstimport.php');
			if(!isset($_SESSION['aname']))
			 {
				header("location:aogin.php");
			 }
			 

?>
<!DOCTYPE html>
<html>
<head>
	<title> booking history </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	</link>
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			var x=(($(window).width())-1024)/2;
			$('.wrap').css("left",x+"px");
		});

	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	
</head>
<body>
<div class="wrap">
		<!-- Header -->
		<div class="header">
			<div style="float:left;width:150px;">
				<img src="images/logo.jpg"/>
			</div>		
			<div>
			<div style="float:right; font-size:20px;margin-top:20px;">
			
			<?php  
			 if(isset($_SESSION['aname']))
			 {
				echo "Welcome, ".$_SESSION['aname']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 else
			 {
				$_SESSION['error']=15;
				header("location:alogin.php")
			 ?>  
			<?php   } ?>
			
			</div>
			<div id="heading">
				<a href="index.php" style="font-size: 25px !important;">Railway Commodity Reservation System</a>
			</div>
			</div>
		</div>
		
		<!-- Navigation bar -->
		<div class="navbar navbar-inverse" >
			<div class="navbar-inner">
				<div class="container" >
				<a class="brand" href="index.php" >HOME</a>
				<a class="brand" href="admin.php" >ADD TRAIN</a>
                <a class="brand" href="trainlist.php" >TRAIN LIST</a>
				<a class="brand " href="paymentaccept.php">PAYMENT REQUEST</a>
                <a class="brand" href="paymenthistory.php">PAYMENT HISTORY</a>
				<a class="brand" href="abooking.php">BOOKING HISTORY</a>
				<a class="brand" href="updatestatus.php">Update Status</a>
				</div>
			</div>
		</div>
		<div class="span12 well" id="boxh">
		<h1> Payment Request List</h1>
		</div>
<!-- display result -->
		<div class="span12 well">
			<div class="display" style="height:30px;">
				<table class="table" border="5px">
				<tr>
				<th style="width:70px;border-top:0px;"> Sr. No.</th>
				<th style="width:55px; border-top:0px;"> Payment Id</th>
					<th style="width:70px;border-top:0px;"> Payment Date</th>
					<th style="width:70px;border-top:0px;"> Payment Status</th>
					<th style="width:70px;border-top:0px;"> Amount</th>
					<th style="width:65px;border-top:0px;"> User Id </th>
					<th style="width:120px;border-top:0px;"> Booking Id</th>
				</tr>
				</table>
			</div>
			<div class="display" style="margin-top:11px;overflow:auto;">
				<table class="table" border="5px">
				<?php 
				$tbl_name="payment";
						$ViewQuery="SELECT * FROM $tbl_name WHERE pstatus='requested'";
						$SrNo=0;
						$Execute=mysqli_query($conn,$ViewQuery);
						while ($DataRow=mysqli_fetch_array($Execute)) 
						{
							$no=$DataRow["pid"];
                            $date=$DataRow["pdate"];
                            $pstatus=$DataRow["pstatus"];
							$amt=$DataRow["amount"];
							$pname=$DataRow["user_id"];
                            $bid=$DataRow["bid"];
							$SrNo++;
					?>
					<tr>
					<td style="width:65px;border-top:0px;"><?php echo $SrNo; ?></td>
					<td style=" width:56px;border-top:0px;"><?php echo $no; ?></td>
					
					<td style="width:65px;border-top:0px;"><?php echo $date; ?></td>
					<td style="width:65px;border-top:0px;"><a lass="text-info" href="accept.php?pid=<?php echo $no; ?>&bid=<?php echo $bid; ?>"><?php echo $pstatus; ?> </a></td>
					<td style="width:65px;border-top:0px;"><?php echo $amt; ?></td>
                        <td style="width:65px;border-top:0px;"><?php echo $pname; ?></td>
                        <td style="width:100px !important;border-top:0px;"><?php echo $bid; ?></td>
					
				</tr>
			<?php } ?>
			</table>
			</div>
		</div>
		
		<footer >
		<div style="width:100%;">
			<div style="float:left;">
			<p class="text-right text-info">  &copy; 2022 Copyright </p>	
			</div>
			<div style="float:right;">
			<p class="text-right text-info">	Desinged By : Arpita Saha</p>
			</div>
		</div>
		</footer>	</div>
</body>
</html>