<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>About</title>
	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 
	<link href="content/css/bootstrap-social.css" rel="stylesheet" media="screen"/> 
</head>


<body class="background">

<?php include "Header.php";?>

<div class="about-page">
<div class="container">

	
	<div class="row">
		<div class="col-lg-6  ">
			<h1 class="textheader">About</h1><br><br>
			<h4>Highlights</h4>
				<h5>PHP Script with MySQL database to enable content moderation.</h5>
				<br>
				<ul>
					<li> PHP Login / Logout System  </li>
						<ul> 
							<li> New user registration</li>
							<li>Send new user info to admin by email, include approve and deny buttons
								<li> If approved - notify new user by email and allow them to login</li>
								<li> If denied - notify new user by email and DO NOT allow them to login</li>
						</ul>
					<li> PHP Session for logged-in user </li>
					<li> Create PHP Script for The Upload, Display , Download File </li>
					<li> Mobile friendly and responsive</li>
					<li> Bonus: Integrate an oAuth Login </li>
					
				</ul>	
		</div>

		<div class="col-lg-6  ">
			<div class="space"></div>
			<p><center><img border="0" alt="" src="Images/php.png" width="80%"></center></p>
		</div>
	</div>


	<div class="space"></div>	

<?php include "Footer.php"; ?>	

</div>	
</div>

	<script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.js"></script> 
    <script src="content/js/bootstrap.min.js"></script> 
</body>
</html>