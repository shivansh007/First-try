<html>

<head>
   <!--- basic page needs
   ================================================== -->
   <!-- <meta charset="utf-8"> -->
	<title>First Try - Fashion Store</title>

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <!-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" crossorigin="anonymous"> -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">    

   <!-- <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous"> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="bootstrap/w3.css">  

   <style>
      .mySlides {display:none}
      .w3-left, .w3-right, .w3-badge {cursor:pointer}
      .w3-badge {height:13px;width:13px;padding:0}
   </style>
<body>

</head>
<body style="padding-top:43px;">
      <?php
            $con=mysqli_connect("localhost","root","","ft") or die("Database Connection Error");
         ?>
         <!-- Navigation Bar -->
         <ul class="w3-navbar w3-collapse w3-black w3-large w3-top">
            
            <li class="w3-hide-medium w3-hide-large w3-black w3-opennav w3-left">
             <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
           </li>
            
            <?php 
               session_start();
               if(!isset($_SESSION["user"]))
               {
            ?>
               <li class='w3-hide-small w3-xlarge w3-margin-left'>FirstTry.com</li>
               <li class='w3-right w3-hide-small'><a class='w3-hover-yellow' onclick="document.getElementById('signup').style.display='block'"><i class='glyphicon glyphicon-lock'></i> Create an Account</a></li>
               <li class='w3-right w3-hide-small'><a class='w3-hover-yellow' onclick="document.getElementById('login').style.display='block'"><i class='glyphicon glyphicon-user'></i> Login</a></li>
            <?php
                  }
                  else
                  {
                     $name=$_SESSION['name'];
            ?>
                  <li class='w3-hide-small w3-xlarge w3-margin-left'>Welcome, <?php echo "$name"; ?></li>
                  <li class="w3-hide-small"></li>
                  <li class='w3-right w3-hide-small'><a href='logout.php' class='w3-hover-yellow'><i class='glyphicon glyphicon-user'></i> Logout</a></li>
                  <li class='w3-right w3-hide-small'><a class='w3-hover-yellow' onclick="cart()"><i class='glyphicon glyphicon-shopping-cart'></i> Cart</a></li>
            <?php
                  }
            ?>
            <li class='w3-right'><a href="women.php" class="w3-hover-yellow w3-hide-small">Women</a></li>
            <li class='w3-right'><a href="men.php" class="w3-hover-yellow w3-hide-small">Men</a></li>
            <li class='w3-right'><a href="index.php" class="w3-hover-yellow w3-hide-small">Home</a></li>
         </ul>

      <!--Navbar for small scren -->

      <div id="demo" class="w3-hide w3-hide-large w3-hide-medium">
        <ul class="w3-navbar w3-left-align w3-large w3-black">
        <center>
          <li><a href="men.php">Men</a></li>
          <li><a href="women.php">Women</a></li>
          <?php 
               if(!isset($_SESSION["user"]))
               {
            ?>
               <li><a class='w3-hover-yellow' onclick="document.getElementById('signup').style.display='block'"><i class='glyphicon glyphicon-lock'></i> Create an Account</a></li>
               <li><a class='w3-hover-yellow' onclick="document.getElementById('login').style.display='block'"><i class='glyphicon glyphicon-user'></i> Login</a></li>
            <?php
                  }
                  else
                  {
            ?>
                  <li><a href='logout.php' class='w3-hover-yellow'><i class='glyphicon glyphicon-user'></i> Logout</a></li>
                  <li><a class='w3-hover-yellow' onclick="cart()"><i class='glyphicon glyphicon-shopping-cart'></i> Cart</a></li>
            <?php
                  }
            ?>
         </center>
        </ul>
      </div>
      <section class="w3-container" style="background-image:url('images/intro-bg.jpg');height:100%">
         <center>
            <h1 class="w3-text-pink w3-animate-opacity">First Try</h1>
            <h3 class="w3-text-white w3-animate-opacity">The perfect way to select your perfect dress.</h3> 
         </center><br>
         <div class="w3-content">
            <img class="mySlides w3-animate-right" src="images/1.jpg" style="width:125%;margin-left:-13%;">
            <img class="mySlides w3-animate-right" src="images/2.jpg" style="width:125%;margin-left:-13%;">              
            <img class="mySlides w3-animate-right" src="images/3.jpg" style="width:125%;margin-left:-13%;">
            <img class="mySlides w3-animate-right" src="images/4.jpg" style="width:125%;margin-left:-13%;">              
            <img class="mySlides w3-animate-right" src="images/5.jpg" style="width:125%;margin-left:-13%;">

            <div class="w3-center w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
               <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
               <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
               <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
               <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
               <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(5)"></span>
            </div>
         </div> 

         <!-- Login Modal -->

   <div id="login" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:400px">
        <header class="w3-container w3-yellow">
          <h1>Login</h1>
          <div class="w3-center"><br>
            <span onclick="document.getElementById('login').style.display='none'" class="w3-closebtn w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
          </div>
      </header>

        
          <div class="w3-section w3-container">
              <label><b>Email</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" id="username" required>
              <label><b>Password</b></label>
              <div class="w3-row">
              <input class="w3-input w3-border w3-col" type="password" placeholder="Enter Password" id="password" style="width:90%;" required>
              <button class="w3-white w3-input w3-border w3-rest" style="width:10%; height:7.5%;"  onmousedown="down();" onmouseup="up();"><i id="eye" class="glyphicon glyphicon-eye-open"></i></button></div>
              <div id="loginpass"></div>
              <button class="w3-btn-block w3-green w3-section w3-padding" name="login" onclick="logincheck();">Login</button>
          </div>
      

    </div>
  </div>

   <!-- Signup Modal -->

   <div id="signup" class="w3-modal">
      <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">
         <header class="w3-container w3-yellow">
            <h1>Sign Up</h1>
             <div class="w3-center"><br>
             <span onclick="document.getElementById('signup').style.display='none'" class="w3-closebtn w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
             </div>
         </header>
          <form class="w3-container" action="signup.php" method="post">
             <div class="w3-section">
                 <label><b>First Name</b></label>
                 <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter First Name" name="firstname" required>

                 <label><b>Last Name</b></label>
                 <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Last Name" name="lastname" required>

                 <label><b>Email</b></label>
                 <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" name="email" required>

                 <label><b>Password</b></label>
                 <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>

                 <button class="w3-btn-block w3-green w3-section w3-padding" name="signup" type="submit">Create Account</button>
             </div>
          </form>

      </div>
   </div>
      <!-- Cart Modal -->

   <div id="cart" class="w3-modal">
      <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:500px">
          <header class="w3-container w3-yellow w3-margin-bottom">
            <h1>Cart</h1>
             <div class="w3-center"><br>
               <span onclick="document.getElementById('cart').style.display='none'" class="w3-closebtn w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
             </div>
            </header>
         <div id="cartx" class="w3-container w3-large"></div>
         <center><button class="w3-btn w3-xlarge w3-green w3-margin w3-round">Check Out</button></center>
      </div>
   </div>

            <script>
               var slideIndex = 1;
               showDivs(slideIndex);
               carousel();
               function carousel() 
               {
                   var i;
                   var x = document.getElementsByClassName("mySlides");
                   for (i = 0; i < x.length; i++) {
                     x[i].style.display = "none"; 
                   }
                   slideIndex++;
                   if (slideIndex > x.length) {slideIndex = 1} 
                   x[slideIndex-1].style.display = "block"; 
                   setTimeout(carousel, 3000); // Change image every 3 seconds
                   currentDiv(slideIndex);
               }
               function plusDivs(n) 
               {
                 showDivs(slideIndex += n);
               }

               function currentDiv(n) 
               {
                 showDivs(slideIndex = n);
               }

               function showDivs(n) 
               {
                 var i;
                 var x = document.getElementsByClassName("mySlides");
                 var dots = document.getElementsByClassName("demo");
                 if (n > x.length) {slideIndex = 1}
                 if (n < 1) {slideIndex = x.length}
                 for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                 }
                 for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-white", "");
                 }
                 x[slideIndex-1].style.display = "block";
                 dots[slideIndex-1].className += " w3-white";
               }
            </script>
                           

      </section> <!-- /intro -->
      <section class="w3-container w3-pale-green w3-row" style="height:100%">
        <div class="w3-row-padding w3-margin-top">
          <div class="w3-half w3-margin-bottom">
            <img src="images/men.jpg" class="w3-left" style="width:50%;height:90%;">
            <ul class="w3-ul w3-left w3-border w3-center w3-hover-shadow" style="width:50%;height:90%;">
              <li class="w3-green w3-display-container" style="height:15%;"><p class="w3-xlarge w3-center">Shop for Men</p></li>
              <li class="w3-light-grey w3-padding-medium">T-shirt</li>
              <li class="w3-light-grey w3-padding-medium">Casual Shirt</li>
              <li class="w3-light-grey w3-padding-medium">Jeans</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
            </ul>
          </div>
          <div class="w3-half w3-margin-bottom ">
            <img src="images/women.jpg" class="w3-left" style="width:50%;height:90%;">
            <ul class="w3-ul w3-right w3-border w3-center w3-hover-shadow" style="width:50%;height:90%;">
              <li class="w3-green w3-display-container" style="height:15%;"><p class="w3-xlarge w3-center">Shop for Women</p></li>
              <li class="w3-light-grey w3-padding-medium">Kurta</li>
              <li class="w3-light-grey w3-padding-medium">Shirt</li>
              <li class="w3-light-grey w3-padding-medium">T-shirt</li>
              <li class="w3-light-grey w3-padding-medium">Saree</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
              <li class="w3-light-grey w3-padding-medium">-</li>
            </ul>
          </div>
        </div>
      </section>

   <section class="w3-container w3-yellow w3-display-container" style="height:50%">

      <div class="w3-row-padding w3-center">

         <div class="w3-third w3-hover-red" style="height:100%;">
               <h2>Where to Find Us</h2>

               <p>
               Techno India NJR Institute of Technology<br>
               Kaladwas, Udaipur(Rajasthan)<br>
               India
               </p>
         </div>
         <div class="w3-third w3-hover-red" style="height:100%;">
            <h2>Get In Touch</h2>
            <p>shivanshnalwaya@gmail.com<br>
               manasipandya@gmail.com<br>
               nayandepra@gmail.com<br>
               apeksha.maheshwari@gmail.com
            </p>
         </div>
         <div class="w3-third w3-hover-red" style="height:100%;">
            <h2>Contribute</h2>
            <p>Please support our website</p>
            </div> <!-- /footer-info-wrap -->
         </div>
   </section>


   <div id="go-top">
      <a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-long-arrow-up"></i></a>
   </div>

   <!-- preloader
   ================================================== -->
   <div id="preloader"> 
      <div id="loader"></div>
   </div> 
   <script>
   function down()
  {
    document.getElementById('password').type='text';
    document.getElementById('eye').className='glyphicon glyphicon-eye-close';
  }
  function up()
  {
    document.getElementById('password').type='password';
    document.getElementById('eye').className='glyphicon glyphicon-eye-open';
  }
   function myFunction() 
   {
       var x = document.getElementById("demo");
       if (x.className.indexOf("w3-show") == -1) 
       {
           x.className += " w3-show";
       } 
       else 
       {
           x.className = x.className.replace(" w3-show", "");
      }
   }
   function cart(crt) 
  {
   document.getElementById('cart').style.display='block';
      xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
      {
        document.getElementById("cartx").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","showfromcart.php",true);
    xmlhttp.send();
   }
   function remove(itemid) 
   {
      xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
      {
        document.getElementById(""+itemid).innerHTML = "";
        document.getElementById("total").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","removefromcart.php?id="+itemid,true);
    xmlhttp.send();
   }

   function logincheck()
   {
      var name=document.getElementById('username').value;
      var pass=document.getElementById('password').value;
      xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function()
       {
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         {
           if(xmlhttp.responseText=="Wrong Email or Password")
           {   
            document.getElementById("loginpass").style="color:red;";
            document.getElementById("loginpass").innerHTML = xmlhttp.responseText;
            }
            else
               window.location="index.php";
         }
       };
       xmlhttp.open("POST","login.php",true);
       xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xmlhttp.send("username="+name+"&password="+pass);
   }
   </script>

</body>

</html>