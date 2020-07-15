<?php

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'basiks';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
   $msg = "";
 // Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($con, $_POST['image_text']);

  	// image file directory
  	$target = "../upload/".basename($image);

  	$uniqid = uniqid();
  	$name=$_POST['name'];
  	$detail=$_POST['detail'];
  	$price=$_POST['price'];
  	$category=$_POST['category'];

  	$sql ="INSERT INTO products (product_id,name,info,image,price,category) VALUES ('$uniqid','$name','$detail','$image','$price','$category')";
  
  	// execute query
  	mysqli_query($con, $sql);

  	echo $image;

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		header('Location:../product.php');
  	}else{
  		$msg = "Failed to upload image";
  		//echo $msg;
  	}
// Insert new account
// Username doesnt exists, insert new account
//if ($stmt = $con->prepare('INSERT INTO products (product_id,name,info,price,category) VALUES (?,?,?,?,?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	//$uniqid = uniqid();
	//$stmt->bind_param('sssss',$uniqid,$_POST['name'],$_POST['detail'],$_POST['price'],$_POST['category']);
	//$stmt->execute();

	//header('Location:../products.php');
//} 

$con->close();

?>