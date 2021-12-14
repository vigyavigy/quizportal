<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>login page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/loginform.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
</head>
<body>
	<section>
		<div class="col-sm-12">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="form-container">
				    <h1 style="color: white;">Login form</h1>
					<form action="ajax/login.php" method="post" class="loginform" id="form2">
						<div class="control">
							<label for="email">Email:</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="enter email">
						</div>
						<br>
						<div class="control">
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="enter password">
						</div>
						<br>
<!-- 						<div class="control">
							<span><input type="checkbox">Remember me.</span>
						</div>
 -->						<!-- <div class="control">
							<button type="submit" value="Submit" name="submit" class="bttn" onclick="sendlogin();">Log In</button>
						</div -->>
						<div class="control">
							<input type="submit" class="btn" value="Login" onclick="sendlogin();">
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</section>
</body>
<script type="text/javascript">
	function sendlogin(){
        	var email = document.getElementById('email').value;
        	var password = document.getElementById('password').value;
        	var token="<?php echo password_hash("login", PASSWORD_DEFAULT);?>";
        	       	
        	if(email!=="" && password!=="")
        	{
        		$.ajax( 
        			{ 
        				type:'POST', 
        			    url:"ajax/login.php", 
        			    data:{email:email,password:password,token:token}, 
        			    success:function(data) 
        			    { 
        			    	// alert(data);
        			    	if(data==0)
        			    	{
        			    		// alert(data);
                      alert('login successfull');
        			    		window.location = "dashboard.php";
        			    	}
        			    	else
                    {
        			    		alert('wrong');
        			    	}
        			    } 
              });
        	  }
            else
            {
        	    alert('please fill all the required fields');
            }
        };

</script>
<script type="text/javascript">
	$('form').submit(function(e) { 
		e.preventDefault(); 
	});
	</script>
<!-- 	<script type="text/javascript">
  $('form').submit(function (e) 
  {
    e.preventDefault();
  });
</script>
 --></html>
