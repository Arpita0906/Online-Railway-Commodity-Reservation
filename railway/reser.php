<?php


session_start();
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}

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
	<link href="css/bootstrap.min.css" rel="stylesheet" ></link>
	<link href="css/bootstrap.css" rel="stylesheet" ></link>
	<link href="css/Default.css" rel="stylesheet" >	</link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			//alert($(window).width());
			var x=(($(window).width())-1024)/2;
			//alert(x);
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
		
		<!-- Navigation bar -->
		<div class="navbar navbar-inverse">
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
		
		<div class="span12 well">
		
		
		<div class="display" style="margin-top:0px;height:30px;">
		
		
		
		
		<form method="post" action="booking.php">
				
				<table class="table" style="border-style:ridge;">
				<col width="99">
				<col width="50">
				<col width="50">
				<col width="80">
				<col width="80">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="90">
				<tr>
					<th style="border-top:0px;">Journey date:</th>
					<th style="border-top:0px;"> Train No./Name:</th>
					<th style="border-top:0px;">From Station:</th>
					<th style="border-top:0px;">To Station:</th>
					<th style="border-top:0px;">Available Capacity(Kg)</th>
				</tr>
				<tr>
					<td style="border-top:0px;"> <?php echo $_GET['doj'];?> </td>
					<input type="text" name="jdate" style="display:none;"  value="<?php echo $_GET['doj'];?>">
					<td style="border-top:0px;"> <?php echo $_GET['tno'];?> </td>
					<input type="text" name="trainno" style="display:none;"  value="<?php echo $_GET['tno'];?>"> </td>
					
					<td style="border-top:0px;"><?php echo $_GET['fromstn'];?></td>
					<input type="text" name="fromst" style="display:none;"  value="<?php echo $_GET['fromstn'];?>"> </td>
					
					<td style="border-top:0px;"><?php echo $_GET['tostn'];?></td>
					<input type="text" name="tost" style="display:none;"  value="<?php echo $_GET['tostn'];?>"> </td>
		
					<td style="border-top:0px;"><?php echo $_GET['weight'];?></td>
		
					</tr>
				</table>
				
				</div>
					<div class="display" style="height:50px;">
				
				</div>
				<br /><br />
				<div class="display" style="margin-top:0px;height:415px;">
				<h2><font color="blue">Commodity Detail</font></h2>
					<table class="table">
						<tr>
					<th style="width:100px;border-top:0px;">SNo.</th>
					<th style="width:200px;border-top:0px;"> Name of Commodity</th>
					<th style="width:200px;border-top:0px;"> Quantity</th>
					<th style="width:200px;border-top:0px;"> Commodity description</th>
					<th style="width:100px;border-top:0px;"> Weight of Commodity(Kg) </th>
					<th style="width:100px;border-top:0px;"> Amount</th>
						</tr>
					<tr>
					<td > 1</td>
					
					<td ><input type="text" name="cName" class="input-small"></td>
					<td ><input type="number" name="quantity" class="input-small"></td>
					<td ><input type="text" name="comoditydesc" ></td>
					<td ><input type="number" name="weight" class="input-small" id="weight" onblur="calculateAmt()"></td>
					<td><input name="rent" type="number" class="input-small" id="amt" readonly="readonly" > </td>
				</tr>
				
				
				<tr>
					<td style="border-top:0px;"><input class="btn btn-info" type="submit" name="subb" value="Submit" id="subb" ></td>
					<td style="border-top:0px;"><input class="btn btn-info"type="reset" value="Reset"></td>
				</tr>	
				
				</table>
			</form>
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