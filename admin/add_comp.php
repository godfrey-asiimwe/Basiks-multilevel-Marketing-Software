<?php
 include_once 'include/DB.php';

 if (isset($_POST['amount'])) {

		$level=$_POST['level'];
		$amount=$_POST['amount'];
		
		$time=time();
		$date=date("Y-m-d H:i:s",$time); 

		$sql ="INSERT INTO comp_amount (level,amount,entry_date) VALUES ('$level','$amount','$date')";

		// execute query
		mysqli_query($con, $sql);

}

?>