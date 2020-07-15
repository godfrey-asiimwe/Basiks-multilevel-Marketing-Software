<?php

// Change this to your connection info.
include_once 'DB.php';

$id=$_POST['id'];
$user=$_POST['user'];
$message=$_POST['message'];
$time=time();
 $date=date("Y-m-d H:i:s",$time); 

$sql ="INSERT INTO message (sender,receiver,message,date_entry) VALUES ('$id','$user','$message','$date')";
// execute query
//mysqli_query($con, $sql);
if(mysqli_query($con, $sql)){

}else{

	die(mysqli_error($con));
}

header('Location:../message.php');

$con->close();

?>