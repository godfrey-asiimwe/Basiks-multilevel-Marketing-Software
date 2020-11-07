<?php
include 'functions.php';
// Change this to your connection info.
include 'DB.php';


// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['phone'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}

// Make sure the submitted registration values are not empty.
if (empty($_POST['phone']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}
// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ? and phone=?')) {

	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('ss',$_POST['email'],$_POST['phone']);

	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'User exists, please login!';
	} else {
		// Insert new account
		// Username doesnt exists, insert new account
		if ($stmt = $con->prepare('INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password = md5($_POST['password']);
			$uniqid = uniqid();
			$gid=uniqid();

			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$address=$_POST['address'];
			$shipping=$_POST['shipping'];
			$country=$_POST['country'];
			$sponder=$_POST['sponsorNumber'];
			$dateofbirth=$_POST['dateofbirth'];
			$gender=$_POST['gender'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];

			$time=time();
            $date=date("Y-m-d H:i:s",$time); 

			if($country=="Uganda"){
				$phone2=phoneNumberUg($phone);
			}elseif($country=="Kenya"){
				$phone2=phoneNumberKe($phone);
			}elseif($country=="Tanzania"){
				$phone2=phoneNumberTz($phone);
			}elseif($country=="Rwanda"){
				$phone2=phoneNumberRw($phone);
			}

			

			/*	$stmt->bind_param('sssssssssssss',$_POST['firstname'],$_POST['lastname'],$_POST['address'],$_POST['shipping'],$_POST['country'],$_POST['sponsorNumber'],$_POST['dateofbirth'],$_POST['gender'],$_POST['phone'], $password, $_POST['email'], $uniqid,$gid);*/

		
			//$stmt->execute();

			$phone=$_POST['sponsorNumber'];

			$id2=getAccountInfoByPhone($phone,'id');
			$sponser=getAccountInfoByPhone($phone,'gid');
			
			$no=getNoofRows($id2);

			    if ($no<7) {

			    	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$sponder','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$sponser')";

			    	mysqli_query($con,$query);

	     	        $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$id2','$gid','1')";
	     	        
			        if(mysqli_query($con, $sql2)){
					    echo "Records added successfully.";
					} else{
					    echo "ERROR: Could not able to execute sql. " . mysqli_error($con);
					}

			    }else{


		  	         $sql4 ="SELECT * FROM relationship WHERE upline='$id2'";
				     $result = mysqli_query(db_connection(), $sql4);

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

			    	              mysqli_query($con,$query);

				            	$sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
						        @mysqli_query($con, $sql2);

				                break;
				            }elseif($d['totalcanceled']==1){

				            	echo 'here 2';

				            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$sponder','$dateofbirth','$gender','$Downphone','$password','$email','$uniqid','$gid','$date','$gid2')";

			    	              mysqli_query($con,$query);

				                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
						        @mysqli_query($con, $sql2);
				                break;

				            }elseif($d['totalcanceled']==2){

				            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

			    	              mysqli_query($con,$query);

				                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
						        @mysqli_query($con, $sql2);
				                break;

				            }elseif($d['totalcanceled']==3){

				            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

			    	              mysqli_query($con,$query);

				                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
						        @mysqli_query($con, $sql2);
				                break;

				            }elseif($d['totalcanceled']==4){

				            	$query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

			    	              mysqli_query($con,$query);

				                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
						        @mysqli_query($con, $sql2);
				                break;

				            }elseif($d['totalcanceled']==5){

				            $query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

			    	              mysqli_query($con,$query);

				                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
						        @mysqli_query($con, $sql2);
				                break;

				            }elseif($d['totalcanceled']==6){

				            $query="INSERT INTO accounts (firstname,lastname,address,shipping,country,sponsorNumber,dateofbirth,gender,phone,password,email, activation_code,gid,entry_date,sponsorId) VALUES ('$firstname','$lastname','$address','$shipping','$country','$Downphone','$dateofbirth','$gender','$phone2','$password','$email','$uniqid','$gid','$date','$gid2')";

			    	              mysqli_query($con,$query);

				                $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ('$upline','$gid','1')";
						        @mysqli_query($con, $sql2);
				                break;

				            }
				        }
				    } else {
				        echo " ..0 results 1";
				    }
			  }

			//save_downline($phone,$gid);

			$from    = 'noreply@basiksservices.com';
            $subject = 'Account Activation Required';

			$activate_link = 'http://demo.basiksservices.com/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;

			$message = 'Please click the following link to activate your account:   ' . $activate_link . '';

			mail($_POST['email'], $subject, $message);
			header('Location:../login.php');
		} else {
			// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			echo 'Could not prepare statement!';
		}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>