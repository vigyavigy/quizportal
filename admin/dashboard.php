<?php
     session_start();
         // if(isset($_SESSION['name'])){

?>
<!DOCTYPE html>
<html>
<head>
  <title>admin dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
</head>
<body>
 
 <div class="sidenavbar">
     <!-- <p style="color: white;">Welcome! $datarow['name'];</p> -->
                 <p style="color: white;">WELCOME! <?php echo $datarow['name'];?></p>


   <ul>
    <li><a href="addteacher.php">Add Teacher</a></li>
    <li><a href="adduni.php">Add University</a></li>
    <li><a href="addclass.php">Add Class</a></li>
    <!-- <li><a href="logout.php">Log Out</a></li> -->
    <li><a href="logout.php">Log Out</a></li>
   
  </ul>
 </div>
  
 
 <section>
 
 </section>
 

<!-- <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script type="text/javascript">
  $('form').submit(function(e) { 
    e.preventDefault(); 
  });
</script>

</body>
</html>







 
 