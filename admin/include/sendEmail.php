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

$to =$_POST['emai'];
$subject = $_POST['subject'];
$message =$_POST['message']; 
$from = 'agtumusiime@gmail.com';
 
// Sending email
if(mail($to, $subject, $message)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
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