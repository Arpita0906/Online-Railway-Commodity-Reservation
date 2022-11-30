<?php
session_start();
require('firstimport.php');
			if(!isset($_SESSION['name']))
			 {
				header("location:login1.php");
			 }
			 if(isset($_POST['subb']) )
			 {
			$doj= $_POST['jdate'];
			$tno=$_POST['trainno'];
			$fromstn=$_POST['fromst'];
			$tostn=$_POST['tost'];
			$cName=$_POST['cName'];
			$quantity=$_POST['quantity'];
			$comodityDesc=$_POST['comoditydesc'];
			$weight=$_POST['weight'];
			$rent=$_POST['rent'];
			$pstatus="not paid";
			$dstatus="not delivered";
			$userid=$_SESSION['name'];
			$t=time();
			$bid=rand(100,999).time().date("d",$t);
			
			$isql="INSERT INTO booking (bid,user_id,Tnumber,doj,fromstn,tostn,pstatus,dstatus,rent,pname,pquantity,pdesc,pweight)
	VALUES ('$bid','$userid','$tno','$doj','$fromstn','$tostn','$pstatus','$dstatus',$rent,'$cName',$quantity,'$comodityDesc','$weight')";
	$result=mysqli_query($conn,$isql);
	$csql="SELECT capacity FROM train_list WHERE Number=$tno";
	$cresult=mysqli_query($conn,$csql);
	$row = $cresult->fetch_assoc();
	$capacity=($row['capacity'] - $weight );
	echo $capacity;
	$usql="UPDATE train_list SET capacity=$capacity WHERE Number=$tno";
	$uresult=mysqli_query($conn,$usql);
	$usql="UPDATE interlist SET capacity=$capacity WHERE Number=$tno";
	$uresult=mysqli_query($conn,$usql);
	
	header("location:booking.php");
			 
			}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Find Train </title>
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
			 if(isset($_SESSION['name']))
			 {
			 echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 ?>
			
			</div>
			<div id="heading">
			<a href="index.php" style="font-size: 25px !important;">Railway Commodity Reservation System</a>
			</div>
			</div>
		</div>
		<div class="navbar navbar-inverse" >
			<div class="navbar-inner">
				<div class="container" >
				<a class="brand" href="index.php" >HOME</a>
				<a class="brand" href="train.php" >FIND TRAIN</a>
				<a class="brand" href="reservation.php">RESERVATION</a>
				<a class="brand" href="profile.php">PROFILE</a>
				<a class="brand" href="booking.php">BOOKING HISTORY</a>
				</div>
			</div>
		</div>
		
		<div class="span12 well" id="boxh">
		<h1>Booking History</h1>
		</div>
<!-- display result -->
		<div class="span12 well">
			<div class="display" style="height:30px;">
				<table class="table" border="5px">
				<tr>
				<th style="width:70px;border-top:0px;"> Sr. No.</th>
				<th style="width:120px;border-top:0px;"> Booking Id</th>
					<th style="width:70px;border-top:0px;"> Train No.</th>
					<th style="width:70px;border-top:0px;"> Product Name</th>
					<th style="width:70px;border-top:0px;"> Product Quantity</th>
					<th style="width:70px;border-top:0px;"> Product weight(kg)</th>
					<th style="width:65px;border-top:0px;"> Booking Date </th>
					<th style="width:55px;border-top:0px;"> Payment </th>
					<th style="width:60px;border-top:0px;"> Payment Status </th>
					<th style="width:65px;border-top:0px;"> Delivery Status </th>
				</tr>
				</table>
			</div>
			<div class="display" style="margin-top:11px;overflow:auto; ">
				<table class="table" border="5px">
				<?php 
						
				$name=$_SESSION['name'];
				$tbl_name="booking";
						$ViewQuery="SELECT * FROM $tbl_name WHERE user_id='$name' ";
						$SrNo=0;
						$Execute=mysqli_query($conn,$ViewQuery);
						while ($DataRow=mysqli_fetch_array($Execute)) 
						{
							$no=$DataRow["Tnumber"];
                            $date=$DataRow["doj"];
                            $pstatus=$DataRow["pstatus"];
							$dstatus=$DataRow["dstatus"];
							$pname=$DataRow["pname"];
                            $pqty=$DataRow["pquantity"];
                            $prent=$DataRow["rent"];
							$pweight=$DataRow["pweight"];
							$bid=$DataRow["bid"];
							$SrNo++;
					?>
					<tr>
					<td style="width:70px;border-top:0px;"><?php echo $SrNo; ?></td>
					<td style="width:100px !important; border-top:0px;"><?php echo $bid; ?></td>
					<td style="width:70px;border-top:0px;">
					<?php 
					echo $no; 
					?></td>
					<td style="width:70px;border-top:0px;"><?php echo $pname; ?></td>
					<td style="width:70px;border-top:0px;"><?php echo $pqty; ?></td>
					<td style="width:70px;border-top:0px;"><?php echo $pweight; ?></td>
                        <td style="width:65px;border-top:0px;"><?php echo $date; ?></td>
                        <td style="width:55px;border-top:0px;">
                            <?php 
					echo $prent; 
					?></td>
					<td style="width:60px;border-top:0px;"><a class="text-info" href="payment.php?bid=<?php echo $bid?>&pay=<?php echo $prent?>"><?php echo $pstatus; ?></a></td>
					<td style="width:65px;border-top:0px;"><?php echo $dstatus; ?></td>
					
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
			<p class="text-right text-info">Desinged By : Arpita Saha</p>
			</div>
		</div>
		</footer>	</div>
</body>
</html>