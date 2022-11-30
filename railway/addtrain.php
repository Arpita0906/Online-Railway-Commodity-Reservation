<?php
session_start();
require('firstimport.php');

$tbl_name="train_list"; // Table name

$tno=$_POST['tno'];
$tname=$_POST['tname'];
$ori=$_POST['ori'];
$dst=$_POST['dst'];
$at=$_POST['at'];
$dt=$_POST['dt'];
$weight=$_POST['weight'];
$mo="N";
$tu="N";
$wed="N";
$thu="N";
$fri="N";
$sat="N";
$sun="N";
if(isset($_POST["mon"]))
$mo="Y";
if(isset($_POST["tue"]))
$tu="Y";
if(isset($_POST["wed"]))
$wed="Y";
if(isset($_POST["thu"]))
$thu="Y";
if(isset($_POST["fri"]))
$fri="Y";
if(isset($_POST["sat"]))
$sat="Y";
if(isset($_POST["sun"]))
$sun="Y";
$sql2="select * from $tbl_name";
$result2=mysqli_query($conn,$sql2);
	$sql="INSERT INTO $tbl_name (Number,Name,Origin,Destination,Arrival,Departure,Mon,Tue,Wed,Thu,Fri,Sat,Sun,capacity)
	VALUES ($tno,'$tname','$ori','$dst','$at','$dt','$mo','$tu','$wed','$thu','$fri','$sat','$sun',$weight)";
	$result=mysqli_query($conn,$sql);
	header("location:trainlist.php");
	

//echo "f_name ".$f_name."... ".$l_name."... ".$email.".... ".$password.",,, ".$gender.",,,,".$marital."..... ".$dob.".... ".$mobile."....".$ques.",,,,".$ans;
?>