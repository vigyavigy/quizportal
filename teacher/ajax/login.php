<?php
include('connection.php');
session_start(); 
if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
{
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$check = $db->prepare('SELECT * FROM techaer WHERE email=?');
	$data=$check->execute($data);
	if($check->rowcount()>0)
	{
		while($datarow=$check->fetch())
		{
			if(password_verify($password,$datarow['password']))
			{
				$_SESSION['id']=$datarow['id'];
				$_SESSION['fname']=$datarow['fname'];
				echo 0;
			}
			else
			{
				echo "incorrect password";
			}
		}
	}
	else
	{
		echo "something went wrong";
	}
}
else
{
	echo "server error";
}
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>