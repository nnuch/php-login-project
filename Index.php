<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<link rel="icon" href="images/favicon.ico">
  	<link rel="shortcut icon" href="images/favicon.ico">

	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 	
	<link href="content/css/bootstrap-social.css" rel="stylesheet" media="screen"/> 
</head>
<body class="homeBG">

<!-- bootstrap-Navigation bar-->
<?php
    include "Header.php";
?>		

<div class="start-page">
	<div class="container ">
	<div class="row">
	<div class="col-lg-12  ">


	  <div class="myform">
			
			<form class="login-form" action="_login.php" method="post">

<!-- Check if account is activated or not-->
<?php 
  if(isset($_GET['inactive']))
  {
?>
	<div class="alert alert-dismissible alert-danger">
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Sorry!</strong> This Account is not Activated.<br>Please,check the confirmation email in your inbox. 
	</div>
	
<?php
  }
?>

<!-- Check if email and password are matching (method from _login.php)-->
				<?php
					if(isset($_GET['error']))
					{
				?>
					<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Invalid Username or Password!</strong> 
					</div>

				<?php
					}
				?>
				<!-- form -->
				<input type="email"  placeholder="Email address" name="txtemail" required />
				<input type="password"  placeholder="Password" name="txtupass" required />
				<hr />
				<button class="btn btn-large btn-primary" type="submit" name="btn-login">login</button>
				<p> OR </p>

				<!-- this section for next implementing OAUTH Google API-->
				<a href="#" class="btn btn-block btn-social btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);">
				<span class="fa fa-google"></span> Sign in with Google</a>
				
				<br>
				<p>Not registered? <a href="Signup.php">Create an account</a></p>
				
			</form>
	  	</div>
	  </div>	  
	</div>
	 
	<footer>
	  	//<hr><center><h6 style="color:white">/h6></center> 
	</footer> 

</div>
</div>
    
    <script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.js"></script> 
    <script src="content/js/bootstrap.min.js"></script> 
</body>
</html>
