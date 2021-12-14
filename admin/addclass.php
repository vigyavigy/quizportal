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
    <li><a href="logout.php">Log Out</a></li>
    <!-- <li><a href="#">contact</a></li> -->
  </ul>
 </div>
 <section>
  <div class="addclass">
      <form id="form2" action="ajax/addclass.php" method="post">
        <div class="col-sm-12">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="ferm_container">
              <h1>Add Class</h1>
              <div class="control">
                <label for="university">University:</label>
                <!-- <input type="text" name="university" id="university" class="form-control" placeholder="enter university"> -->
                <div class="contain-input">
                  <div class="list" id="list" style="width: 100%; float: left;"></div>
                </div>
              </div>
              <br>
              <div class="control">
                <label for="class">Add Class:</label>
                <input type="text" placeholder="Enter Class" class="form-control" name="class"
                id="classname">
              </div>
              <br>
              <div class="control">
                <input type="submit" class="btn" value="submit" name="submit" onclick="addclass();">
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
  getuni();
 function getuni(){
  var token = "<?php echo password_hash("getunitoken", PASSWORD_DEFAULT);?>"
  $.ajax(
  {
    type:'POST',
    url:"ajax/getuni.php",
    data:{token:token},
    success:function (data) {
      $('#list').html(data);
    }
  });
 }

 function addclass(){
  var classname = document.getElementById('classname').value;
  var uid=document.getElementById('university').value;
  var token = "<?php echo password_hash("classtoken", PASSWORD_DEFAULT);?>"
  if(classname!=""){
    $.ajax(
    {
      type:'POST',
      url:"ajax/addclass.php",
      data:{classname:classname,uid:uid,token:token},
      success:function(data){
        if(data == 0){
          alert("class added");
          window.location="dashboard.php";
        }
      }
    });
  }
  else{
    alert("please fill all fields");
  }
 }
 // gettable();
 // function gettable()
 // {
 //  var token = "<?php echo password_hash("showclass", PASSWORD_DEFAULT);?>";
 //  $.ajax(
 //  {
 //    type:'POST',
 //    url:"ajax/showteacher.php",
 //    data:{token:token},
 //    success:function (data) {
 //      $('#list2').html(data);
 //    }
 //  });
 // }
//      function showclass() {
//     var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>";
//     $.ajax({
//         type: 'POST',
//         url: "ajax/getallclass.php",
//         data: {
//             token: token
//         },
//         success: function(data) {
//             $('#listclass').html(data);
//         }
//     });
// }

gettable();
 function gettable()
 {
  var token = "<?php echo password_hash("showclass", PASSWORD_DEFAULT);?>";
  $.ajax(
  {
    type:'POST',
    url:"ajax/showclass.php",
    data:{token:token},
    success:function (data) {
      $('#list3').html(data);
    }
  });
 }

function deleted(i){
    // alert(i)
    var token='<?php echo password_hash("deleteclass", PASSWORD_DEFAULT);?>';
    $.ajax({
        type: 'POST',
        url: "ajax/deleteclass.php",
        data: {
            token: token,
            id:i
        },
        success: function(data) {
            if (data == 0) {
                alert('class deleted successfully');
                window.location = "addclass.php";
                }
        }
    });
}

</script>
</html>