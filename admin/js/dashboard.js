
 const navToggle = document.querySelector(".nav-toggle");
 const nav = document.querySelector(".nav");
 const navOverlay = document.querySelector(".nav-overlay");
 const closeNav = document.querySelector(".close");

 navToggle.addEventListener("click",() =>{
 	navShow();
 })
 closeNav.addEventListener("click",() =>{
 	hideNav();
 })
 
 // hide nav after clicked outside of nav
 navOverlay.addEventListener("click",(e) =>{
   hideNav();
 })

 function navShow(){
    navOverlay.style.transition = "all 0.5s ease";
    navOverlay.classList.add("open");
    nav.style.transition = "all 0.3s ease 0.5s";
    nav.classList.add("open");
 }

 function hideNav(){
   nav.style.transition = "all 0.3s ease";
   nav.classList.remove("open");
   navOverlay.style.transition = "all 0.5s ease 0.3s";
   navOverlay.classList.remove("open");
 }


// var tea = document.getElemenetById('tea'),
// var uni = document.getElemenetById('uni'),
// var clas = document.getElemenetById('clas'),
// var form1 = document.getElemenetById('form1'),
// var form2 = document.getElemenetById('form2'),
// var form3 = document.getElemenetById('form3')


 
//  tea.addEventListener("click",function(){
//  	form3.classList.remove('show');
//  	form2.classList.remove('show');
//     form1.classList.remove('hidden');

//     form1.classList.add('show');
//     form2.classList.add('hidden');
//     form3.classList.add('hidden');
//  });

//  uni.addEventListener("click",function(){
//  	form3.classList.remove('show');
//  	form1.classList.remove('show');
//     form2.classList.remove('hidden');

//     form2.classList.add('show');
//     form1.classList.add('hidden');
//     form3.classList.add('hidden');
//  });

//  clas.addEventListener("click",function(){
//  	form2.classList.remove('show');
//  	form1.classList.remove('show');
//     form3.classList.remove('hidden');

//     form3.classList.add('show');
//     form1.classList.add('hidden');
//     form2.classList.add('hidden');
//  });

//  function adduser()
//  {
//  	var firstname = document.getElementById('firstname').value;
//  	var lastname = document.getElementById('lastname').value;
//  	var email = document.getElementById('email').value;
//  	var university = document.getElementById('university').value;
//  	// var token = "<?php echo password_hash("addteacher", PASSWORD_DEFAULT);?>"
//  	var token

//  	if(email!="" && university!="")
//  	{
//  		if(validateEmail(email))
//  		{
//  			$.ajax( 
//  			{ 
//  				type:'POST', 
//  				url:"ajax/addteacher.php", 
//  				data:{firstname:firstname,lastname:lastname,email:email,university:university,token:token}, 
//  				success:function(data) 
//  				{ 
//  					if(data == 0)
//  					{
//  						alert('user added');
//  						window.location="teacher/dashboard.php";
//  					}
//  				} 
//  			}
//  			);
//  		}
//  		else
//  		{
//  			alert('invalid emailid');
//  		}

//  	}
//  	else
//  	{
//  		alert('please fill all fields');

//  	}
//  }

 