<?php

    include_once 'DB.php';

  	$uniqid = uniqid();
  	$name=$_POST['name'];
  	$detail=$_POST['detail'];
  	$amount=$_POST['amount'];
  	$address=$_POST['address'];
    $phone=$_POST['phone'];
    $status='active';
    $id=$_POST['id'];

    if(isset( $_POST['submit'] )){

      $sql ="INSERT INTO Stockist (stockist_id,name,info,phone,amount,status,address) VALUES ('$uniqid','$name','$detail','$phone','$amount','$status','$address')";
    
      // execute query
      if(mysqli_query($con, $sql)){
          header('Location:../stockist.php');
      }else{
        echo 'error';
      }

    }elseif(isset( $_POST['edit'] )){

      $sql ="UPDATE Stockist SET name='$name',info='$detail',phone='$phone',amount='$amount',address='$address' WHERE id='$id'";
    
      // execute query
      if(mysqli_query($con, $sql)){
          header('Location:../stockist.php');
      }else{
        echo 'error';
      }
    }

  	

    $con->close();
?>