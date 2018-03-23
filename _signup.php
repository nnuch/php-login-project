<?php
session_start();
require_once '_classes-user.php';

$reg_user = new USER();

//check if user is logged in 
if($reg_user->is_logged_in()!="")
{
 	$reg_user->redirect('Home.php');
}
else 
{
	 $reg_user->redirect('Index.php');
}

if(isset($_POST['btn-signup']))
{
 $uname = trim($_POST['txtuname']);
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtpass']);
 $firstname = trim($_POST['txtufname']);
 $lastname = trim($_POST['txtulname']);
 $code = md5(uniqid(rand()));
 
 $stmt = $reg_user->runQuery("SELECT * FROM assign2_myusers WHERE userEmail=:email_id");
 $stmt->execute(array(":email_id"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
	//check if there is email_id in database
	if($stmt->rowCount() > 0)
	{
		//TRUE -- then say it ALREADY EXISTS
		$msg = 	"
					<div class='col-lg-6'>
					<div class='alert alert-error'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email already exists , Please Try another one
					</div>
					</div>
				";
	}
	//FALSE -- then send the email with the id and code via email using PHPmailer
	 else
	{	
			if($reg_user->register($uname,$email,$upass,$firstname,$lastname, $code))
			{   
				$id = $reg_user->lasdID();  
				$key = base64_encode($id);
				$id = $key;
				//message template
				$message = "     
							Hello Admin,
							<br /><br />

							A new account has been sign up to the website. Here are the details 
							<br /><br />

							<strong>Username : </strong>  $uname 
							<br/>
							<strong>Email Address : </strong> $email 
							<br/>
							<strong>Firstname : </strong>  $firstname 
							<br/>
							<strong>Lastname : </strong> $lastname 
							
							<br /><br />

							To complete the new user registration please , Click Approve or Deny link
							<br /><br />

							<a  href='http://localhost:8080/PHPloginProject/verify.php?id=$id&code=$code' class='btn btn-success'>Approve</a>
							<br /><br />
							<a  href='http://localhost:8080/PHPloginProject/Deny.php?id=$id&code=$code' class='btn btn-warning'>Deny</a>
							<br /><br />
							Thank you!
							";

				//subject template 
				$subject = "Confirm Registration";

				//SEND EMAIL here 
				$reg_user->send_mail_Admin($message,$subject); 
				$msg = 	"
							<div class='col-lg-6'>
							<div class='alert alert-success'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<strong>Success!</strong>  We've sent an email to $email.
							</div>
							</div>
						";
			}
			else
			{
				echo "sorry , Query could no execute...";
			}  
	}
}
?>