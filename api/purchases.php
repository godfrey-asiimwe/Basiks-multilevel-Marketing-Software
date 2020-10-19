
<?php
 
	// Create connection
	include "../include/DB.php";
	include "../include/functions.php";

	 $id=$_GET['id'];
	
	// Select all of our stocks from table 'stock_tracker'
	$sql = "SELECT * FROM purchase WHERE userId='$id'";
	$result2 = mysqli_query($con, $sql);
	 
	// Confirm there are results
	  if (mysqli_num_rows($result2) > 0) {
            while($row = mysqli_fetch_assoc($result2)) {

		 	$name=$row['name'];
		 	$amount=$row['amount'];
		 	$status=$row['status'];
		 	$billnow=$row['bill_no'];
		 	$date=$row['entry_date'];
		 	$user_no=$row['user_no'];
		 	$stockist=$row['stockist'];

		 	$stockist2=getStockistInfo($stockist,'name');

		 	 $dataArr[] = array('name' =>$name, 'amount' => $amount,'bill_no'=>$billnow,'status'=>$status,'entry_date'=>$date,'stockist'=>$stockist2,'user_no'=>$user_no);
		 }

	   $json = json_encode($dataArr);
       echo $json; 
		 
	}

// Close connections
mysqli_close($con);
?>