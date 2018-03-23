<?php
session_start();
require_once'_classes-user.php';
$user = new USER();

//check if user is logged in --> session method from _classes.user.php
if(!$user->is_logged_in())
{
 $user->redirect('index.php');
}
//logout method from _class.user.php
if($user->is_logged_in()!="")
{
 $user->logout(); 
 $user->redirect('index.php');
}
?>