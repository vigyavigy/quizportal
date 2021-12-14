
<?php
$servername = "localhost";
$fname = "root";
$lname = "";


    $db = new PDO("mysql:host=$servername;dbname=tesst", $fname, $lname);
   
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


?>