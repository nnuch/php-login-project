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
 
 //declare / set variables
 $statusY = "Y";
 $statusN = "N";

 //run the query check if id = uID and code = tokenCode in the database
 $stmt = $user->runQuery("SELECT userID,userStatus,userEmail,userName FROM assign2_myusers WHERE userID=:uID AND tokenCode=:code LIMIT 1");
 $stmt->execute(array(":uID"=>$id,":code"=>$code));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);

  //if true
 if($stmt->rowCount() > 0)
 {

	//and status = N
  if($row['userStatus']==$statusN)
	{
		
		//Set the variables
		$email =$row['userEmail'];
		$uname =$row['userName'];
		$msg = 	"
					<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Completed!</strong>  This Account is denied, and Sent email to user already
					</div>
				";  
	  
		//message template to send email to the users
		$message = "     
					Hello $uname,
					<br /><br />
					Thank you for create an account with us.<br>
					Unfortunately we cannot accept the new user at the moment <br /> 
					please try again next time <br/>
					<br/>
					Thanks,";

		//subject template to send to user's email 
		$subject = "Cancel Registration";
		//SEND deny email to user 
		$user->send_mail($email,$message,$subject);  
	} 
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Cancel Registration</title>
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