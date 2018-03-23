<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SignUp</title>
	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 
</head>

<body class="homeBG">
	
<!-- bootstrap-Navigation bar-->
<?php
    include "Header.php";
?>	

<div class="start-page">
	<div class="container ">
		<div class="row">

<?php if(isset($msg)) echo $msg;  ?>

	<div class="col-lg-12  ">
	  <div class="myform">
			<!-- connect to _signup.php to do the work. -->
			<form " action="_signup.php" method="post">
					<input type="text"  placeholder="Username" name="txtuname" required />
					<input type="text"  placeholder="First name" name="txtufname" required />
					<input type="text"  placeholder="Last name" name="txtulname" required />
					<input type="email"  placeholder="Email address" name="txtemail" required />
					<input type="password"  placeholder="Password" name="txtpass" required />
					<hr />
					<button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button>
					<br><br>
					<p>Already registered? <a href="Index.php">Sign In</a></p>
			</form>
		</div>
	</div>
</div>


	<footer>
	  	<hr><center><h6 style="color:white"> 2017 Created By Nuch Phromsorn </h6></center> 
	</footer> 


</div>
</div>  
    <script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.js"></script> 
    <script src="content/js/bootstrap.min.js"></script> 
</body>
</html>