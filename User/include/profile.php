<?php

// Change this to your connection info.
include_once 'DB.php';

$id=$_POST['id'];
$email=$_POST['email'];
$shipping=$_POST['shipping'];
$address=$_POST['address'];


$sql ="UPDATE accounts SET email='$email',shipping='$shipping',address='$address' WHERE gid='$id'";

// execute query
mysqli_query($con, $sql);


header('Location:../profile.php');

$con->close();

?>