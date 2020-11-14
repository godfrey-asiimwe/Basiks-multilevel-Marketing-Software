<?php

include '../include/functions.php';
// Change this to your connection info.
include_once '../include/DB.php';

$billnumber =uniqid();
$user_no=$gid;

$product_id=$_GET['id'];
$name=getProductById($product_id,'name');
$amount=getProductById($product_id,'price');

$phone=$_GET['phone'];
$user_no=getAccountInfoByPhone($phone,'gid');

$time=time();
$date=date("Y-m-d H:i:s",$time); 

$sql ="INSERT INTO purchase (bill_no,name,product_id,amount,user_no,entry_date) VALUES ('$billnumber','$name','$product_id','$amount','$user_no','$date')";
  
//execute query
mysqli_query($con,$sql);

echo 'successfully paid';

PaytheUpline1($user_no);
header('Location:../login.php');
$con->close();

?>          