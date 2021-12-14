<?php
include('connection.php'); 
session_start();
// echo "yeee";
if(isset($_POST['token']) && password_verify("teachtoken",$_POST['token']))
{
// echo "hiufhriuhg";
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$uid = $_POST['uid'];
	$classid = $_POST['classid'];
	
     	if($fname!="" && $lname!="" && $email!="" && $uid!="" && $classid!="")
     	{
     		$password1_hash=password_hash(substr($fname,0,4)."9876",PASSWORD_DEFAULT);
     		$check=$db->prepare("INSERT into teacher(fname,lname,email,password,uid,classid) values(?,?,?,?,?,?)");
     		$data=array($fname, $lname, $email, $password1_hash, $uid, $classid);
     		$execute=$check->execute($data);
     		if($execute)
     		{
     			echo "teacher added";
     		}
     		else
     		{
     			echo "something went wrong";
     		}
     	}
	
}
else
{
	echo "server error";
}
function test_input($data) 
{ 
	$data = trim($data); 
	$data = stripslashes($data); 
	$data = htmlspecialchars($data); 
	return $data; 
}

?>