<?php
session_start();
require_once '_classes-user.php';
$user_login = new USER();

//check if user is logged in --> session method from class.user.php
if($user_login->is_logged_in()!="")
{
 $user_login->redirect('home.php');

}

//check if email and password are match
if(isset($_POST['btn-login']))
{
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtupass']);
 
 if($user_login->login($email,$upass))
 {
  $user_login->redirect('home.php');
 }
}
?>