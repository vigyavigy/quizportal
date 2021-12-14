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
  <div class="Addteacher">
      <form action="ajax/addteacher.php" method="post" id="form1">
        <div class="col-sm-12">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="form_container">
              <h1 style="color: white;">Add Teacher</h1>
              <div class="control">
                <label for="fname">Firstname:</label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="enter firstname">
              </div>
              <br>
              <div class="control">
                <label for="lname">Lastname:</label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="enter lastname">
              </div>
              <br>
              <div class="control">
                <label for="text">Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="enter email">
              </div>
              <br>
              <div class="control">
                <label for="university">University:</label>
             
                <div class="contain-input">
                  <div class="list" id="list" style="width: 100%; float: left;"></div>
                </div>
                
              </div>
              <br>
              <div class="control">
                <label for="class">Class:</label>
                
                <div class="contain-input">
                  <div class="list1" id="list1" style="width: 100%; float: left;"></div>
                </div>
                <!-- <select name="classs" id="list1" class="form-control" >
                 <option value="0">SELECT CLASS</option> 
               </select> -->
              </div>
              <br>
              <br>
              <div class="control">
                <input type="submit" class="btn" value="submit" name="submit" onclick="addteacher();">
              </div>
            </div>
          </div>
          <div class="col-sm-4"></div>
        </div>
        <div class="box-footer">
          <div class="tabledesign" style="color: pink; width: 100%;">
            <div class="list2" id="list2"></div>
          </div>
        </div>
      </form>
    </div>

  </section>
</body>
<script type="text/javascript">
 //  const tea = document.getElementById('tea'),
 // uni = document.getElementById('uni'),
 // clas = document.getElementById('clas'),
 // form1 = document.getElementById('form1'),
 // form2 = document.getElementById('form2'),
 // form3 = document.getElementById('form3')

 // tea.addEventListener("click",function(){
 //  form3.classList.remove('show');
 //  form2.classList.remove('show');
 //    form1.classList.remove('hidden');

 //    form1.classList.add('show');
 //    form2.classList.add('hidden');
 //    form3.classList.add('hidden');
 // });

 // uni.addEventListener("click",function(){
 //  form2.classList.remove('show');
 //  form1.classList.remove('show');
 //    form3.classList.remove('hidden');

 //    form3.classList.add('show');
 //    form1.classList.add('hidden');
 //    form2.classList.add('hidden');
 // });

 // clas.addEventListener("click",function(){
 //  form3.classList.remove('show');
 //  form1.classList.remove('show');
 //    form2.classList.remove('hidden');

 //    form2.classList.add('show');
 //    form1.classList.add('hidden');
 //    form3.classList.add('hidden');
 // });
// addteacher();
   function addteacher()
 {
  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var email = document.getElementById('email').value;
  var uid = document.getElementById('university').value;
  var classid = document.getElementById('class').value;
  var token = "<?php echo password_hash("teachtoken", PASSWORD_DEFAULT);?>";
  
  if(fname!="" && lname!="" && email!="")
  {
    // if(validateEmail(email))
    // {
      $.ajax( 
      { 
        type:'POST', 
        url:"ajax/addteacher.php", 
        data:{fname:fname,lname:lname,email:email,uid:uid,classid:classid,token:token}, 
        success:function(data) 
        { 
          // if(data == 0)
          // {
          // alert("yepeee");
            alert(data);
            // window.location="dashboard.php";
          // }
        } 
      });
    // }
    // else
    // {
    //   alert('invalid emailid');
    }
  };
  // else
  // {
  //   alert("please fill all fields");
  // }
 // }

 getuni();
 function getuni(){
  var token = "<?php echo password_hash("getunitoken",PASSWORD_DEFAULT);?>";
  $.ajax(
  {
    type:'POST',
    url:"ajax/cgetuni.php",
    data:{token:token},
    success:function (data) {
      $('#list').html(data);
    }
  });
 }

 // getclass();
 function getclass(){
   var uid = document.getElementById('university').value;
  var token = "<?php echo password_hash("getclasstoken", PASSWORD_DEFAULT);?>";
 
  // alert(uid);
  $.ajax(
  {
    type:'POST',
    url:"ajax/getclass.php",
    data:{uid:uid,token:token},
    success:function (data) {
      $('#list1').html(data);
    }
  });
 }
 gettable();
 function gettable()
 {
  var token = "<?php echo password_hash("showteacher", PASSWORD_DEFAULT);?>";
  $.ajax(
  {
    type:'POST',
    url:"ajax/showteacher.php",
    data:{token:token},
    success:function (data) {
      $('#list2').html(data);
    }
  });
 }
 function deleted(i)
 {
  // alert(i);
  var token='<?php echo password_hash("deleteteacher", PASSWORD_DEFAULT);?>';
  $.ajax(
  {
    type:'POST',
    url:"ajax/deleteteacher.php",
    data:{
      token:token,
      id:i
    },
    success:function(data)
    {
      alert(data);
      if(data==0)
      {
        alert("teacher deleted successfully");
        window.location="addteacher.php";
      }    
    }

  });
 }
</script>
<script type="text/javascript">
  $('form').submit(function (e) 
  {
    e.preventDefault();
  });
</script>
</html>