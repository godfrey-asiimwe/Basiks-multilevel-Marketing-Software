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

$id=$_POST['id'];
$email=$_POST['email'];
$shipping=$_POST['shipping'];
$address=$_POST['address'];
$bio=$_POST['bio'];



$sql ="UPDATE account SET email='$email',shipping='$shipping',address='$address', bio='$bio' WHERE gid='$id')";

// execute query
if (mysqli_query($con, $sql)) {

	header('Location:../profile.php');

}else{
	echo '';
} 

$con->close();

?>