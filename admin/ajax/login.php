<?php 
include('connection.php');
session_start();
// echo "hello";
if(isset($_POST['token']) && password_verify("login",$_POST['token']))
{
	$email=test_input($_POST['email']);
	$password=test_input($_POST['password']);

	$query = $db->prepare('SELECT * FROM user_details WHERE email=?');
	$data=array($email);
	$execute = $query->execute($data);
	if($query->rowcount()>0)
	{
		// echo "hii";
		while($datarow=$query->fetch())
		{
			if(password_verify($password,$datarow['password']))
			{
				// $_SESSION['id'] =$datarow['name'];
				// $_SESSION['mail'] =$datarow['email'];
				 // $_SESSION['id'] = $datarow['id'];
                // $_SESSION['name'] = $datarow['name'];
				echo 0;
				        	// var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);
				        	 // password_hash("logintoken", PASSWORD_DEFAULT)				
			}
			else{
				echo "yooo";
			}
		}
	}
	else
	{
		echo "please signup no data found.";
	}
}
else
{
	echo "server error";
}
?>