<?php
session_start();
require_once '_classes-user.php';
$user_home = new USER();

//check if user is logged in --> session method from _class.user.php
if(!$user_home->is_logged_in())
{
  $user_home->redirect('index.php');
}

?>

<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Member Tutorials</title>
	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 	
</head>


<body >
<?php include "Header.php";?>

	<!--START HERE-->
	<div class="container">
	<div class="page-header" id="banner">

	<h1 class="textheader"> Welcome to Training Tutorials </h1>
	<br>
	<table class="table table-striped table-hover ">
	<tbody>
		<tr class="active">
			<tr>
			<td>1</td>
			<td><iframe 
					
					 src="https://www.youtube.com/embed/ZLNO2c7nqjw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</iframe></td>
      
			<td class="center"><strong>Published on Jun 29, 2017</strong><BR>
			This Android Studio tutorial video will help you learn the basics of Android App development. It is ideal for both beginners and professionals who wants to learn or brush up the basics of Android.</td>
		</tr>
	
	<tr class="active">
			<tr>
			<td>2</td>
			<td><iframe 

				 src="https://www.youtube.com/embed/haZmF3ZYIYc" frameborder="0" encrypted-media" allowfullscreen>
				
				</iframe></td>
     
			<td class="center"><strong>Published on Jan 16, 2017</strong><BR>
				In this tutorial you are going to create a very simple 3D Game and learn the basics of Scene Kit.</td>
			</tr>
	
	<tr class="active">
			<tr>
			<td>3</td>
			<td><iframe 
				 src="https://www.youtube.com/embed/VqfB1DchijU" frameborder="0"  encrypted-media" allowfullscreen>
				
				</iframe></td>
     
			<td class="center"><strong>Published on Jan 13, 2017</strong><BR>
				In this video tutorial you learn how to make smoke dispersion effect and learn how to use mask layer and effect.Learn more about photo filter and color tone adjustment and selection in photoshop cc.</td>
			</tr>
	
	<tr class="active">
			<tr>
			<td>4</td>
			<td><iframe  
				src="https://www.youtube.com/embed/ziBXNeXQzhU" frameborder="0" allowfullscreen>
				</iframe>
     
			<td class="center"><strong>Published on Feb 20, 2017</strong><BR>
				What are scopes in OOP - Learn OOP PHP backend programming. In this video we will learn about the three different scopes in OOP. 
				These scopes are public, private and protected.</td>
			</tr>
	</tbody>
	</table>

		

</div>
<?php include "footer.php"; ?>	
</div>

	<script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.js"></script> 
    <script src="content/js/bootstrap.min.js"></script> 

</body>
</html>