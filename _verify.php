<?php
require_once '_classes-user.php';
$user = new USER();
//Get the id and code
if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('index.php');
}
//check if id and code
if(isset($_GET['id']) && isset($_GET['code']))
{
 $id = base64_decode($_GET['id']);
 $code = $_GET['code'];

 //declare variables
 $statusY = "Y";
 $statusN = "N";

 //run the query check if id = uID and code = tokenCode in the database
 $stmt = $user->runQuery("SELECT userID,userStatus,userEmail,userFname FROM assign2_myusers WHERE userID=:uID AND tokenCode=:code LIMIT 1");
 $stmt->execute(array(":uID"=>$id,":code"=>$code));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);

 //if true
 if($stmt->rowCount() > 0)
 {
	//and status = N
	if($row['userStatus']==$statusN)
	{
		//so then update it status to Y as active
		$stmt = $user->runQuery("UPDATE assign2_myusers SET userStatus=:status WHERE userID=:uID");
		$stmt->bindparam(":status",$statusY);
		$stmt->bindparam(":uID",$id);
		$stmt->execute(); 
   
		$msg = 	"
					<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Completed!</strong>  The New Account is Now Activated!
					</div>
				"; 

		//Set the variables
		$email =$row['userEmail'];
		$ufname =$row['userFname'];
		
		//message template to send to user's email
		$message = "     
						Hello $ufname,
						<br /><br />
						Welcome to our website, now you have been accepted. 
						Please, login to your account <br /> 
						<a  href='http://localhost:8080/assignment2/index.php'>Login here</a>
						<br/><br/>
						Thank you!";

		//subject template to send to user's email
		$subject = "Congratulations";
		//SEND approve email to user
		$user->send_mail($email,$message,$subject);  
	} 	  
		  
	else
	{
		//CASE: When Admin click approve again so, tell admin this accout is already approved
		$msg = 	"
					<div class='alert alert-error'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>sorry !</strong>  The Account is already Activated!<br>
						We've sent an email to the user.
					</div>
				";
	}
 }
 else
 {
	//CASE: When Admin click approve AFTER deny it. 
	$msg = 	"
				<div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>sorry !</strong>  No Account Found : <a href='signup.php'>Signup here</a>
				</div>
			";
 } 
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Confirm Registration</title>
    <!-- Bootstrap -->
    <link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 
</head>
  
<body id="login">

	<div class="container">
	<?php if(isset($msg)) { echo $msg; } ?>
	</div> <!-- /container -->
	
	<script src="content/js/jquery-1.9.1.min.js"></script>
    <script src="content/js/bootstrap.min.js"></script>
  </body>
</html>