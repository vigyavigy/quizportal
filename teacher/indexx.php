<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/mormalise.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>excel file</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
	<!-- <div class="col-sm-12"> -->
		<!-- <div class="col-sm-4"></div> -->
		<!-- <div class="col-sm-4"> -->
			<form id="excelform">
				<div class="">
					<input type="file" name="excel_file" id="excel_file">
				</div>
				<div class="">
					<input type="submit" name="submit" id="submit" onclick="sendfile();">
				</div>
			</form>
		<!-- </div> -->
		<!-- <div class="col-sm-4"></div> -->
	<!-- </div> -->
</body>
	<script type="text/javascript">
		function sendfile()
		{
			var excelform = document.getElementById('excelform');
			var data = new FormData(excelform);
			// var token='<?php echo password_hash("hello", PASSWORD_DEFAULT);?>';
			$.ajax(
			{
				type:'POST',
				url:"excel.php",
			    data:data,
			    processData:false,
				contentType:false,
				success:function(data)
				{
					alert(data);
				}
			});
		}
	</script>

<script type="text/javascript">
  $('form').submit(function(e) { 
    e.preventDefault(); 
  });
</script>
</html>