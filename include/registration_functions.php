<?php

include 'functions.php';
include 'DB.php';

function makeAdminSponser($firstname,$lastname,$address,$shipping,$country,$sponder,$dateofbirth,$gender,$phone2,$password,$email,$uniqid,$gid,$date){

	$id=getAccountInfoByUserName('Admin','id');

	$sponser=getAccountInfoById($id,'gid');
	
	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','Admin','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$sponser')";

	mysqli_query(db_connection(),$query);

    $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$id','$gid','1')";
        
    mysqli_query(db_connection(), $sql2);
}


function registerUpline($firstname,$lastname,$address,$shipping,$country,$sponder,$dateofbirth,$gender,$phone2,$password,$email,$uniqid,$gid,$date){

    $id2=getAccountInfoByUserName($sponder,'id');
	$sponser=getAccountInfoById($id2,'gid');
	
	$no=getNoofRows($id2);

    if ($no<7) {

    	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$sponder','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$sponser')";

    	mysqli_query(db_connection(),$query);

	        $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$id2','$gid','1')";
	        
        if(mysqli_query(db_connection(), $sql2)){
		    echo "Records added successfully.";
		} else{
		    echo "ERROR: Could not able to execute sql. " . mysqli_error(db_connection());
		}

    }else{

	     $sql4 ="SELECT * FROM relationship WHERE upline='$id2'";
	     $result = mysqli_query(db_connection(),$sql4);

	     if (mysqli_num_rows($result) > 0) {
	        while($row = mysqli_fetch_assoc($result)) {

	            $downline=$row["downline"];

	            $upline=getAccountInfoBygid($downline,'id');
	            $gid2=getAccountInfoBygid($downline,'gid');

	            $Downphone=getAccountInfoBygid($downline,'phone');

	            $canceledsum=mysqli_query(db_connection(),"SELECT COUNT(*) AS totalcanceled FROM relationship WHERE upline='$upline'");
	            $d=mysqli_fetch_assoc($canceledsum);

	            if($d['totalcanceled']==0){
	            	echo 'here';
	            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

    	              mysqli_query(db_connection(),$query);

	            	$sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
			        @mysqli_query(db_connection(), $sql2);

	                break;
	            }elseif($d['totalcanceled']==1){

	            	echo 'here 2';

	            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$sponder','$dateofbirth','$gender','$Downphone','$password','$email','$uniqid','$gid','$date','$gid2')";

    	              mysqli_query(db_connection(),$query);

	                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
			        @mysqli_query(db_connection(), $sql2);
	                break;

	            }elseif($d['totalcanceled']==2){

	            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

    	              mysqli_query(db_connection(),$query);

	                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
			        @mysqli_query(db_connection(), $sql2);
	                break;

	            }elseif($d['totalcanceled']==3){

	            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

    	              mysqli_query(db_connection(),$query);

	                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
			        @mysqli_query(db_connection(), $sql2);
	                break;

	            }elseif($d['totalcanceled']==4){

	            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

    	              mysqli_query(db_connection(),$query);

	                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
			        @mysqli_query(db_connection(), $sql2);
	                break;

	            }elseif($d['totalcanceled']==5){

	            $query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

    	              mysqli_query(db_connection(),$query);

	                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
			        @mysqli_query(db_connection(), $sql2);
	                break;

	            }elseif($d['totalcanceled']==6){

	            $query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

    	              mysqli_query(db_connection(),$query);

	                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
			        @mysqli_query(db_connection(), $sql2);
	                break;
	            }
	        }
	    } else {
	        echo " ..0 results 1";
	    }
    }

}



?>