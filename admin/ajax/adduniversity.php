<?php
include('connection.php'); 
session_start();
if(isset($_POST['token']) && password_verify("unitoken",$_POST['token']))
{
	$uniname=test_input($_POST['uniname']);
	// $uid=test_input($_POST['uid']);
	// if(validate_input($email,1) && validate_input($university,2))
	// {
	if($uniname!="")
	{
		$check=$db->prepare("insert into university(uniname) values(?)");
		$data=array($uniname);
		$execute=$check->execute($data);
		if($execute)
		{
     		echo "0";
        }
     	else{
     			echo "something went wrong";
     	}		
	// 	else{
	// 		"heeeee";
	// 	}
	// }
	// else{
	// 	echo "yeeee";
 	// }
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