<?php
session_start();
require "../models/DB.php";
require "../config.php";
require "../models/user.php";
$user=new User;
if(isset($_SESSION['user'])){
     header("Location: ../admin/");
}
$mess="";
if(isset($_POST['user'])&&$_POST['password']){
     $getUserByID=$user->getUserByID($_POST['user'],$_POST['password']);
     if($getUserByID!=null){
               $_SESSION['user'] = $getUserByID;
               header("Location: ../admin/");
          }else{
               $mess = "Tài khoản hoặc mật khẩu không đúng !";
          }      
          echo "<script> alert('$mess') </script>";   
     }

?>
<!DOCTYPE html>
<html>
<head>
 <!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegant Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme  -->
<link rel="stylesheet" href="css/style.css">
   <!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  </head>
  <body>
<div class="login-form w3_form">
  <!--  Title-->
      <div class="login-title w3_title">
           <h1>Admin Manager</h1>
      </div>
           <div class="login w3_login">
                <h2 class="login-header w3_header">Log in</h2>
				    <div class="w3l_grid">
                        <form class="login-container" action="" method="post">
                             <input type="text" placeholder="Username" Name="user" required="" >
                             <input type="password" placeholder="Password" Name="password" required="">
                             <input type="submit" value="Submit">
                        </form>
<div class="second-section w3_section">
     <br>
</div>
                 
<div class="bottom-text w3_bottom_text">
      <p>No account yet?<a href="../Login/dangki.php">Signup</a></p>
      <h4> <a href="#">Forgot your password?</a></h4>
</div>

                  </div>
       </div>
  
</div> 
<div class="footer-w3l">
		
</div>
</body>
</html>