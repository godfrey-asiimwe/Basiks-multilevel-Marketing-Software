<?php
	// Create connection
    include "../include/DB.php";
    include "../include/functions.php";

    $users=getAllUsers();

	$myObj->totalmembers =$users;
	$myObj->income = 30;
	$myObj->city = "New York";

	$myJSON = json_encode($myObj);

	echo $myJSON;
?>