<?php
 include_once 'include/DB.php';

 if (isset($_POST['user'])) {

	$id=$_POST['id'];
	$user=$_POST['user'];
	$message=$_POST['message'];

	$time=time();
	$date=date("Y-m-d H:i:s",$time); 

	$sql ="INSERT INTO message (sender,receiver,message,date_entry) VALUES ('$id','$user','$message','$date')";
	// execute query
	mysqli_query($con, $sql);

}

?>