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

$level=$_POST['level'];
$amount=$_POST['amount'];
$time=time();
$date=date("Y-m-d H:i:s",$time); 

$sql ="INSERT INTO comp_amount (level,amount,entry_date) VALUES ('$level','$amount','$date')";

// execute query
mysqli_query($con, $sql);

header('Location:../compensation.php');


$con->close();

?>