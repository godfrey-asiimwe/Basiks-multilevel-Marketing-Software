<?php
include '../../include/functions.php';
// Change this to your connection info.
include_once 'DB.php';
$billnumber =$_POST['billno'];
$user_no=$_POST['user_no'];
$product_id=$_POST['productId'];
$name=getProductById($product_id,'name');
$amount=getProductById($product_id,'price');
$time=time();
 $date=date("Y-m-d H:i:s",$time); 

$sql ="INSERT INTO purchase (bill_no,name,product_id,amount,user_no,entry_date) VALUES ('$billnumber','$name','$product_id','$amount','$user_no','$date')";
  
  	// execute query
  	mysqli_query($con, $sql);

    getUpline($user_no);
 
    header('Location:../product.php');


$con->close();

?>