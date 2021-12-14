<?php
     session_start();
         // if(isset($_SESSION['name'])){
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
	<link rel="stylesheet" href="css/dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
	
</head>

<body>

		 
 <div class="sidenavbar">
     <p style="color: black;"> Welcome! <?php echo $datarow['name']; ?></p>
                 <!-- <p>WELCOME! <?php echo $datarow['name'];?></p> -->
   <ul>
    <li><a href="addstudent.php">Add Student</a></li>
    <li><a href="addtest.php">Add Test</a></li>
    <li><a href="addquestion.php">Add Question</a></li>
    <!-- <li><a href="logout.php">Log Out</a></li> -->
    <li><a href="logout.php">Log Out</a></li>
   
  </ul>
 </div>

<script type="text/javascript">
  $('form').submit(function(e) { 
    e.preventDefault(); 
  });
</script>

</body>
</html>