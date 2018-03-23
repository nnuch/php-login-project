<?php
session_start();

 error_reporting( ~E_NOTICE ); // avoid notice
 require_once '_classes-user.php';
 $user_image = new USER();

 if(isset($_POST['btnsave']))
 {
  $imageName = $_POST['image_name'];// Image Name
  
  $imgFile = $_FILES['image_pic']['name'];
  $tmp_dir = $_FILES['image_pic']['tmp_name'];
  $imgSize = $_FILES['image_pic']['size'];
  
  
  if(empty($imageName)){
   $errMSG = "Please Enter Username.";
  }
  else if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
  }
  else
  {
   $upload_dir = 'Images/DB-images/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $imagePic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$imagePic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }
  
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $user_image->runQuery('INSERT INTO assign2_images(imageName,imagePic) VALUES(:iname,:ipic)');
   $stmt->bindParam(':iname',$imageName);
   $stmt->bindParam(':ipic',$imagePic);
   
   if($stmt->execute())
   {
    $successMSG = "new record succesfully inserted!";
    //header("refresh:5;index.php"); // redirects image view page after 5 seconds.
   }
   else
   {
    $errMSG = "error while inserting!";
   }
  }
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Images</title>
	<link href="content/css/style.css" rel="stylesheet" media="screen"/>
	<link href="content/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="content/css/bootstrap-cerulean.css" rel="stylesheet" media="screen"/> 
</head>

<body>
<?php
    include "Header.php";
?>	

<div class="start-page">
<div class="container ">
  <div class="container background">
<h4 class="textheader"> Add image</h4>
	<form method="post" enctype="multipart/form-data" class="form-horizontal" >   
		<table class="table table-bordered table-responsive">
 
			<tr>
			 <td><label class="control-label">Image Name..</label></td>
				<td><input class="form-control" type="text" name="image_name" /></td>
			</tr>

    
			<tr>
			 <td><label class="control-label">Images.</label></td>
				<td><input class="input-group" type="file" name="image_pic" accept="image/*" /></td>
			</tr>
    
			<tr>
				<td colspan="2"><button  type="submit" name="btnsave" class="btn btn-success"> save </button>
				</td>
			</tr>
    
		</table>
    
		<h6 class="alert" style="color: green"><?php echo $successMSG; ?> </h6>
 
	</form>
</div><br>
<?php include "_download.php"; ?>
<?php include "Footer.php"; ?>  

</div>
</div>
</body>
</html>