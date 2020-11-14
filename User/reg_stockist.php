<?php

    include_once 'include/DB.php';
    include_once '../include/functions.php';

  	
  	$id=$_POST['id'];
  	
  	$firstname=getAccountInfoBygid($id,'firstname'); //firstname
    $lastname=getAccountInfoBygid($id,'lastname');

    $phone=getAccountInfoBygid($id,'phone');//phone

    $name=$firstname.'  '.$lastname;
  	
  	$location=$_POST['location'];

    $county=$_POST['county'];

    $status='active';

    $sql = "SELECT * FROM Stockist WHERE  stockist_id='$id'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
           
        }

    } else {

    	$sql="INSERT INTO Stockist (stockist_id,name,info,phone,status,address) VALUES ('$id','$name','$county','$phone','$status','$location')";

	    // execute query
	    @mysqli_query($con, $sql);
        
    }
	
    $con->close();
?>
