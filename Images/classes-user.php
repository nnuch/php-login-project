<?php

require_once 'include/dbconfig.php';

class USER
{ 
	private $conn;
	//create instance 
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}
	//run query- connect and prepare query
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
	return $stmt;
	}
	//last insert ID
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
	return $stmt;
	}
	//register method for create new user 
	public function register($uname,$email,$upass,$firstname,$lastname, $code)
	{
		try
		{       
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO assign2_myusers(userName,userEmail,userPass,userFname, userLname, tokenCode) 
													VALUES(:user_name, :user_mail, :user_pass, :user_fname, :user_lname, :active_code)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":user_fname",$firstname);
			$stmt->bindparam(":user_lname",$lastname);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute(); 
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	//login method
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM assign2_myusers WHERE userEmail=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']=="Y")
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['userID'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				} 
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}  
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
 
	//Session method
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	//redirect method
	public function redirect($url)
	{
		header("Location: $url");
	}
	//logout method
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
  // Send email to Admin method (Setup A admin email address as violin-n@hotmail.com
 function send_mail_Admin($message,$subject)
 {      
  require_once('PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 1;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;             
  $mail->AddAddress("violin-n@hotmail.com");
  $mail->Username="nuch.phromsorn@gmail.com";  
  $mail->Password="rainbow123??";            
  $mail->SetFrom('nuch.phromsorn@gmail.com','Admin Assignment-2');
  $mail->AddReplyTo("nuch.phromsorn@gmail.com","Admin test");
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 } 

 // Send email to Users
 function send_mail($email,$message,$subject)
 {      
  require_once('PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 1;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;             
  $mail->AddAddress($email);
  $mail->Username="nuch.phromsorn@gmail.com";  
  $mail->Password="rainbow123??";            
  $mail->SetFrom('nuch.phromsorn@gmail.com','User Assignment-2');
  $mail->AddReplyTo("nuch.phromsorn@gmail.com","Assignment2 test");
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 } 
}
?>
