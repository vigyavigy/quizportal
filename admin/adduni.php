
<?php
     session_start();
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
   <ul>
    <li><a href="addteacher.php">Add Teacher</a></li>
    <li><a href="adduni.php">Add University</a></li>
    <li><a href="addclass.php">Add Class</a></li>
    <li><a href="logout.php" id="logout">Log Out</a></li>
    <!-- <li><a href="#">contact</a></li> -->
  </ul>
 </div>
 <section>
 <div class="adduniversity">
      <form id="form3" action="ajax/adduniversity.php" method="post">
        <div class="col-sm-12">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="ferm_container">
              <h1>Add University</h1>
              <div class="control">
                <label for="university">Add University:</label>
                <input type="text" placeholder="Enter University" class="form-control" name="university"
                id="uniname">
              </div>
              <br>
              <div class="control">
                <input type="submit" class="btn" value="submit" name="submit" onclick="adduniversity();">
              </div>
            </div>
          </div>
          <div class="col-sm-4"></div>
        </div>
        <div class="box-footer">
          <div class="tabledesign">
            <div class="list2" id="list2"></div>
          </div>
        </div>
      </form>
    </div>
  </section>
</body>
<script type="text/javascript">
  function adduniversity(){
  var uniname=document.getElementById('uniname').value;
  var token = "<?php echo password_hash("unitoken", PASSWORD_DEFAULT);?>"
  
  if(uniname!=""){

    $.ajax(
    {
      type:'POST',
      url:"ajax/adduniversity.php",
      data:{uniname:uniname,token:token},
      success:function(data){

        if(data == 0){
          // alert("yeeee");
          alert("university added");
          window.location="dashboard.php";
        }
      }
    });
  }
  else{
    alert("please fill all fields");
  }
 }
gettable();
 function gettable()
 {
  var token = "<?php echo password_hash("showuniversity", PASSWORD_DEFAULT);?>";
  $.ajax(
  {
    type:'POST',
    url:"ajax/showteacher.php",
    data:{token:token},
    success:function (data) {
      $('#list1').html(data);
    }
  });
 }
  function deleted(i)
 {
  // alert(i);
  var token='<?php echo password_hash("deleteuniversity", PASSWORD_DEFAULT);?>';
  $.ajax(
  {
    type:'POST',
    url:"ajax/deleteuniversity.php",
    data:{
      token:token,
      id:i
    },
    success:function(data)
    {
      if(data==0)
      {
        alert("university deleted successfully");
        window.location="adduniversity.php";
      }    
    }

  });
 }

</script>
</html>