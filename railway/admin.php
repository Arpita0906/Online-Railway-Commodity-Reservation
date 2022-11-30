<?php  
session_start();
if(!isset($_SESSION['aname'])){
    header("location:alogin.php");
}
	
require('firstimport.php');
$tbl_name="interlist";
$tostn = '';
$fromstn = '';
$doj = '';
$weight=0.0;
if(isset($_POST['from']) && isset($_POST['to']))
{	$k=1;
	$tostn = $_POST['to'];
	$fromstn = $_POST['from'];
	$doj = $_POST['date'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$from=strtoupper($from);
	$tostn=strtoupper($tostn);
	$fromstn=strtoupper($fromstn);
	$to=strtoupper($to);
	$day=date("D",strtotime("".$doj));
	//echo $day."</br>";

	
	$sql="SELECT * FROM $tbl_name WHERE (Ori='$from' or st1='$from' or st2='$from' or st3='$from' or st4='$from' or st5='$from') and (st1='$to' or st2='$to' or st3='$to' or st4='$to' or st5='$to' or Dest='$to') and ($day='Y') and ( capacity > 1)";
	$result=mysqli_query($conn,$sql);
}
else if((!isset($_POST['from'])) && (!isset($_POST['to'])))
{	$k=0;
	$from="";
	$to="";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title> admin</title>
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
				<a class="brand" href="admin.php" >ADD TRAIN</a>
                <a class="brand" href="trainlist.php" >TRAIN LIST</a>
				<a class="brand " href="paymentaccept.php">PAYMENT REQUEST</a>
                <a class="brand" href="paymenthistory.php">PAYMENT HISTORY</a>
				<a class="brand" href="abooking.php">BOOKING HISTORY</a>
				<a class="brand" href="updatestatus.php">Update Status</a>
				</div>
			</div>
		</div>
		
		<div class="row" align="center">
        <div class="span12 well">
        <div style="font-size:30px;"> Add New Train</div>
        <br>
        <div class="table">
		
		<form name="addtrain"  method="post" action="addtrain.php"">
		<table>
		<tr>
			<td style="border-top:0px;"> train no <font color=red>* </font></td>
			<td style="border-top:0px;">
			<input type="number" name="tno" class="input-block-level" placeholder="Enter the Train No"  required><span id="fn"></span></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Train Name <font color=red>* </font></td>
			<td style="border-top:0px;"><input type="text" name="tname" class="input-block-level" placeholder="Enter the Train name" required><span id="fn"></span></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Origin <font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="text" name="ori" class="input-block-level" placeholder="Enter Origin name" required></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Destination <font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="text" class="input-block-level" name="dst" placeholder="Enter the Destination Name" required></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Arrival Time<font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="time" class="input-block-level" name="at" placeholder="Enter the Arrival time" required> <span id="ps" ></span></td>
		</tr>
		
		<tr>
			<td style="border-top:0px;"> Depreature Time <font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="time" class="input-block-level" name="dt" placeholder="Enter the Depreature time" required> <span id="cps" ></span></td>
		</tr>
		
		<tr>
			<td style="border-top:0px;"> select avialble day <font color=red>* </font> </td>
            <td style="border-top:0px;"></td>
			<td style="border-top:0px;">
            <label for="mon"> Mon</label>
            <input type="checkbox" id="mon" name="mon" value="Y">
             </td>
             <td style="border-top:0px;">
            <label for="tue"> Tue</label>
            <input type="checkbox" id="tue" name="tue" value="Y">
            </td>
            <td style="border-top:0px;">
            <label for="wed"> Wed</label>
            <input type="checkbox" id="wed" name="wed" value="Y">
            </td>
            <td style="border-top:0px;">
            <label for="thu"> Thu</label>
            <input type="checkbox" id="thu" name="thu" value="Y">
            </td>
            <td style="border-top:0px;">
            <label for="fri"> Fri</label>
            <input type="checkbox" id="fri" name="fri" value="Y">
            </td>
            <td style="border-top:0px;">
            <label for="sat"> Sat</label>
            <input type="checkbox" id="sat" name="sat" value="Y">
            </td>
            <td style="border-top:0px;">
            <label for="sun"> Sun</label>
            <input type="checkbox" id="sun" name="sun" value="Y">
			</td>
		</tr>
		
		
		<tr>
			<td style="border-top:0px;"> Commodity Capacity(Kg.) <font color=red>*</font> </td>
			<td style="border-top:0px;">
            <input type="number" class="input-block-level"  name="weight" placeholder="enter capacity" required > <span id="mn"></span></td>
		</tr>
		
		<tr>
			<td style="border-top:0px;"><input class="btn btn-info"type="submit" value="submit" id="subb" ></td>
			<td style="border-top:0px;"><input class="btn btn-info"type="reset" value="Reset"></td>
		</tr>
		
		</table>
		</form>
             </div>
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