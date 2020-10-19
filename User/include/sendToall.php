<?php

// Change this to your connection info.
include_once 'DB.php';

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