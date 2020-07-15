<?php

 include_once 'include/DB.php';

 if (isset($_POST['name'])) {

    $msg = "";
 // Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($con, $_POST['image_text']);

  	// image file directory
  	$target = "upload/".basename($image);

  	$uniqid = uniqid();
  	$name=$_POST['name'];
  	$detail=$_POST['detail'];
  	$price=$_POST['price'];
  	$category=$_POST['category'];

  	$sql ="INSERT INTO products (product_id,name,info,image,price,category) VALUES ('$uniqid','$name','$detail','$image','$price','$category')";
  
  	// execute query
  	mysqli_query($con, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		//header('Location:product.php');
  	}else{
  		$msg = "Failed to upload image";
  		//echo $msg;
  	}
}
?>