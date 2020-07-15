<?php

// Change this to your connection info.
include_once 'DB.php';

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