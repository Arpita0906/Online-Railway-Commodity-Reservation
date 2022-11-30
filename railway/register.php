<?php
session_start();
require('firstimport.php');

$tbl_name="users"; // Table name

$userid=$_POST['uid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pass=$_POST['psd'];
$mail=$_POST['eid'];
$gender=$_POST['gnd'];
$marital=$_POST['mrt'];
$dob=$_POST['dob'];
$mobile=$_POST['mobile'];
$ques=$_POST['ques'];
$ans=$_POST['ans'];

$sql2="select * from $tbl_name";
$result2=mysqli_query($conn,$sql2);
$flag=0;
while($row=mysqli_fetch_array($result2)){
	if($row['user_id']==$userid){
		echo ""."matched";
		$flag=1;
		break;
	}
}
if($flag==1){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='signup.php?value=1';
    </SCRIPT>");
	die("");
	// echo "oh yes";
	}
else{
	// echo "yes im in";
	$sql="INSERT INTO $tbl_name (user_id,f_name,l_name,password,email,gender,marital,dob,mobile,ques,ans)
	VALUES ('$userid','$fname','$lname','$pass','$mail','$gender','$marital','$dob','$mobile','$ques','$ans')";
	$result=mysqli_query($conn,$sql);

	$_SESSION['name']=$userid;
	header("location:index.php");
	
}
//echo "f_name ".$f_name."... ".$l_name."... ".$email.".... ".$password.",,, ".$gender.",,,,".$marital."..... ".$dob.".... ".$mobile."....".$ques.",,,,".$ans;
?>