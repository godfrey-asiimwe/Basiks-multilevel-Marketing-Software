<?php
	$q=$_GET['q'];
	$my_data=$q;

	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'basiks';

	$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

	if (mysqli_connect_errno()) {
	  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
	}

	$sql="SELECT * FROM accounts WHERE phone LIKE '%$my_data%' ORDER BY id LIMIT 1";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo ''.$row['firstname'].'  '.$row['lastname'].'';
		}
	}
?>