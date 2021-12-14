<!DOCTYPE html>
<html lang="en">
<head>
	<title>project</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
</head>

<body>
	<section>
		<form action="ajax/login.php" method="post" class="loginform" id="form2">
			<div class="col-sm-12">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="form_container">
						<h1 style="color: white;">Login form</h1>
						<div class="control">
							<label for="email">Teacher's email</label>
							<input type="email" name="username" id="email" class="form-control" placeholder="enter email">
						</div>
						<br>
						<div class="control">
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="enter password">
						</div>
						<br>

						<div class="control">
							<input type="submit" class="btn" value="login" name="submit" onclick="sendlogin1();">
							<!-- <input type="submit" value="Submit" name="submit" class="sub" onclick="sendlogin1();"> -->
						</div>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</form>
	</section>
</body>
<script type="text/javascript">
	function sendlogin1(){
        	var email = document.getElementById('email').value;
        	var password = document.getElementById('password').value;
        	var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);?>";
        	if(email!="" && password!="")
        	{
        		$.ajax( 
        			{ 
        				type:'POST', 
        			    url:"ajax/login.php", 
        			    data:{email:email,password:password,token:token}, 
        			    success:function(data) 
        			    { 
        			    	// alert(data);
        			    	if(data == 0)
        			    	{
        			    		alert('Login Successful');
                                 window.location = "dashboard.php";
        			    	}
        			    	// else{
        			    	//       alert(data);
                //                  
        			    	// }
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
</html>

