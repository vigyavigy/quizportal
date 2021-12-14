<?php
start_session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>project</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="css/index.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
</head>

<body>
	<section>
		<div class="col-sm-12 paddoff">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="con">
					<p>quiz portal</p> 
				</div>

				<div>
					<div class="col-sm-6">
						<!-- <a href="#"> -->
							<button type="submit" class="bttn" id="btun" value="As A Student" style="float: right;">As A Student</button>
							<!-- <p class="btn" id="btn" style="float: right;">SIGN UP</p> -->
							<!-- </a> -->
					</div>
					<div class="col-sm-6">
						<!-- <a href="#"> -->
							<button type="submit" class="bttn" id="bton" value="As A Teacher">As A Teacher</button>
							<!-- <p class="btn" id="bton">LOG IN</p> -->
							<!-- </a> -->
					</div>
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>

		<div class="loginpage">
			<div class="signuppage">
				<form action="ajax/logi.php" method="post" class="signupform" id="form1">
					<div class="col-sm-12">
						<div class="col-sm-4"></div>
						<div class="col-sm-4">
							<div class="form_container">
								<h1 style="color: white;">Login form</h1>
								<div class="control">
									<label for="email">Student's Email:</label>
									<input type="email" name="email" id="email" class="form-control" placeholder="enter email">
								</div>
								<br>
								<div class="control">
									<label for="password">Password:</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="enter password">
								</div>
								<br>
								<!-- <div class="control">
									<span><input type="checkbox">Remember me.</span>
								</div>
 -->
								<div class="control">
									<input type="submit" class="btn" value="login" name="submit" onclick="sendlogin();">
								</div>
							</div>
						</div>
						<div class="col-sm-4"></div>
					</div>
				</form>  

				<form action="ajax/login.php" method="post" class="loginform" id="form2">
					<div class="col-sm-12">
						<div class="col-sm-4"></div>
						<div class="col-sm-4">
							<div class="form_container">
								<h1 style="color: white;">Login form</h1>
								<div class="control">
									<label for="email">Teacher's Email:</label>
									<input type="email" name="email" id="myemail" class="form-control" placeholder="enter email">
								</div>
								<br>
								<div class="control">
									<label for="password">Password:</label>
									<input type="password" name="password" id="mypassword" class="form-control" placeholder="enter password">
								</div>
								<br>
								<!-- <div class="control">
									<span><input type="checkbox">Remember me.</span>
								</div> -->

								<div class="control">
									<input type="submit" class="btn" value="login" name="submit" onclick="tealogin();">
									<!-- <input type="submit" value="Submit" name="submit" class="sub" onclick="sendlogin1();"> -->
								</div>
							</div>
						</div>
						<div class="col-sm-4"></div>
					</div>
				</form>
			</div>
		</div>
    </section>

    <script type="text/javascript">
    	const btun = document.getElementById('btun'),
    	      bton = document.getElementById('bton'),
              form2 = document.getElementById('form2'),
              form1 = document.getElementById('form1')

        btun.addEventListener('click', function(){
        	form2.classList.remove('show');
        	form1.classList.remove('hidden');

        	form2.classList.add('hidden');
        	form1.classList.add('show');
        });

        bton.addEventListener('click', function(){
        	
        	form2.classList.remove('hidden');
        	form1.classList.remove('show');

        	form2.classList.add('show');
        	form1.classList.add('hidden');
        });

        function sendlogin(){
        	var email = document.getElementById('email').value;
        	var password = document.getElementById('password').value;
        	var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);?>";
        	if(email!="" && password!="")
        	{
        		$.ajax( 
        			{ 
        				type:'POST', 
        			    url:"ajax/logi.php", 
        			    data:{email:email,password:password,token:token}, 
        			    success:function(data) 
        			    { 
        			    	// alert(data);
        			    	if(data == 0)
        			    	{
        			    		alert(data);
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
function tealogin()
        {
            var email = document.getElementById('myemail').value;
            var password = document.getElementById('mypassword').value;
            
            var token = "<?php echo password_hash("teatoken", PASSWORD_DEFAULT);?>";
            if(email!="" && password!="")
            {
                $.ajax(
                {
                    type:'POST',
                    url:"ajax/teacherlogin.php",
                    data:{email:email,password:password,token:token},
                    success:function(data)
                    {
                        // alert(data);
                        if(data == 0)
                        {
                            window.location="dashboard.php";
                        }
                    }
                });
            }
            else
            {
                alert('please fill all the details.');
            }
};
       
</script>

<script type="text/javascript">
	$('form').submit(function(e) { 
		e.preventDefault(); 
	});
</script>

</body>
<html>