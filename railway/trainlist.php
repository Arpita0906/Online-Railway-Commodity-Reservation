<?php  
session_start();
if(!isset($_SESSION['aname'])){
    header("location:alogin.php");
}
	
require('firstimport.php');
$tbl_name="train_list";
	$sql="SELECT * FROM $tbl_name";
	$result=mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title> Reservation </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet"></link>
	<link href="css/Default.css" rel="stylesheet"></link>
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
				<a class="brand" href="addtrain.php" >ADD TRAIN</a>
                <a class="brand" href="trainlist.php" >TRAIN LIST</a>
				<a class="brand " href="paymentaccept.php">PAYMENT REQUEST</a>
                <a class="brand" href="paymenthistory.php">PAYMENT HISTORY</a>
				<a class="brand" href="abooking.php">BOOKING HISTORY</a>
				</div>
			</div>
		</div>
		<!-- display result -->
		<div class="span12 well">
			<div class="display" style="height:30px;">
				<table class="table" border="5px">
				<tr>
					<th style="width:70px;border-top:0px;"> Train No.</th>
					<th style="width:210px;border-top:0px;"> Train Name </th>
					<th style="width:65px;border-top:0px;"> Orig. </th>
					<th style="width:55px;border-top:0px;"> Des. </th>
					<th style="width:60px;border-top:0px;"> Arr. </th>
					<th style="width:65px;border-top:0px;"> Dep. </th>
					<th style="width:20px;border-top:0px;"> M </th>
					<th style="width:25px;border-top:0px;"> T </th>
					<th style="width:29px;border-top:0px;"> W </th>
					<th style="width:25px;border-top:0px;"> T </th>
					<th style="width:25px;border-top:0px;"> F </th>
					<th style="width:25px;border-top:0px;"> S </th>
					<th style="border-top:0px;"><font color=red> S </font></th>
				</tr>
				</table>
			</div>
			<div class="display" style="margin-top:0px;overflow:auto;">
				<table class="table" >
				<?php
					$n=0;
					while($row=mysqli_fetch_array($result)){
					if($n%2==0)
					{
				?>
				<tr class="text-error">
                <td style="width:80px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:210px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:65px;"> <?php echo $row['Origin']; ?> </td>
					<td style="width:60px;"> <?php echo $row['Destination']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
					<td style="width:55px;"> <?php echo $row['Departure']; ?> </td>
					<td style="width:20p;"><?php echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <?php echo $row['Wed']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Sat']; ?> </td>
					<td> <?php echo $row['Sun']; ?> </td>
				</tr>
				<?php
					}
					else
					{
				?>
				<tr class="text-info">
					<td style="width:80px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:210px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:65px;"> <?php echo $row['Origin']; ?> </td>
					<td style="width:60px;"> <?php echo $row['Destination']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
					<td style="width:55px;"> <?php echo $row['Departure']; ?> </td>
					<td style="width:20p;"> <?php echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <?php echo $row['Wed']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Sat']; ?> </td>
					<td> <?php echo $row['Sun']; ?> </td>				</tr>
				<?php
					}
					$n++;
					}
				
				mysqli_close($conn);
				?>
				</table>
			</div>
		</div>
		
		<footer >
		<div style="width:100%;">
			<div style="float:left;">
			<p class="text-right text-info">  &copy; 2022 Copyright</p>	
			</div>
			<div style="float:right;">
			<p class="text-right text-info">	Desinged By : Arpita Saha</p>
			</div>
		</div>
		</footer>	
		</div>
</body>
</html>