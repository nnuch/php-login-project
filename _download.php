<?php
session_start();
require_once '_classes-user.php';
//require_once 'include/dbconfig_images.php'; //this home page is connected from 2 database assign2_myusers and assign2_images
$user_home = new USER();

//check if user is logged in --> session method from class.user.php
if(!$user_home->is_logged_in())
{
 $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM assign2_myusers WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<div class="container ">
	<h1 class="textheader"> Download Image</h1>
	<p>
	You can find the best and most beautiful hd nature wallpapers of Pexels on this page. 
	Feel free to download all of these desktop background pictures of nature for free. 
	</p>


<!--START HERE-->

<?php
 
 $stmt = $user_home->runQuery('SELECT imageID, imageName, imagePic FROM assign2_images ORDER BY imageID DESC');
 $stmt->execute();
 
 if($stmt->rowCount() > 0)
 {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
   extract($row);
?>
	   	
			<div class="col-lg-4  ">	
			<p class="page-header"><strong><?php echo $imageName?></strong></p>
			
			<a href="Images/DB-images/<?php echo $row['imagePic']; ?>" download>
				<img src="Images/DB-images/<?php echo $row['imagePic']; ?>"  width="300px" height="200px" />
			</a>
			
			</div>
		
     


<?php
  }
 }
 else
 {
  ?>
	<div class="col-xs-12">
		<div class="alert alert-warning">
		<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
		</div>
	</div>
<?php
 }
?>


</div>

