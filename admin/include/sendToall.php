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

$subject = $_POST['subject'];
$message =$_POST['message']; 
$from = 'agtumusiime@gmail.com';

$sql4 ="SELECT * FROM accounts ";
  $result2 = mysqli_query(db_connection(), $sql4);

  if (mysqli_num_rows($result2) > 0) {

    while($row2 = mysqli_fetch_assoc($result2)) {

    	$to=$row2["email"];

    	mail($to, $subject, $message);
    }
  } 
 
 header('Location:../email.php');


$con->close();

?>