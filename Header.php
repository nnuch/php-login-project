
<?php

require_once '_classes-user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
  //$user_home->redirect('index.php');
} 

$stmt = $user_home->runQuery("SELECT * FROM assign2_myusers WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<body>
<!-- bootstrap-Navigation bar-->
    <div class="navbar navbar-inverse navbar-fixed-top bg-primary">

        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Home.php"><img src="images/logo-np-green.png" class="img-head" style="height: 30px;"></a>
                <a class="navbar-brand" href="Home.php">  <?php // echo $_SESSION['userSession']; ?>  Web Technologies</a>
            </div>

<!-- bootstrap-Navigation bar right and Dropdown for logout-->
			<div class="collapse navbar-collapse" >
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Home.php">Tutorials</a></li> 
				<li><a href="Images.php">Images</a></li> 
				<li><a href="About.php">About</a></li>  
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					 <?php echo $row['userEmail']; ?> <span class="caret"></span> 
					</a>
					<!-- JQUERY library @ jquery-1.9.1.min.js -->	

						<ul class="dropdown-menu" role="menu">
							<?php if(isset($_SESSION['userSession']) == null) { ?>
									 	<li> <a href="Index.php">Login            </a></li>
							<?php } else { ?>		
										<li> <a href="_logout.php">Logout            </a></li>
							<?php } ?>

						</ul> 
                </li>
            </ul>
          
				</div>
			</div>
		</div>		

	<script src="content/js/jquery-1.9.1.min.js"></script>	
</body>

