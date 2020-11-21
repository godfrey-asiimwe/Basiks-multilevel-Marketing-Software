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

			//$phone=$_POST['sponsorNumber'];

			if(empty($_POST['sponsorNumber'])){

				makeAdminSponser($firstname,$lastname,$address,$shipping,$country,$sponder,$dateofbirth,$gender,$phone2,$password,$email,$uniqid,$gid,$date,$sponser);

			}else{

				registerUpline($firstname,$lastname,$address,$shipping,$country,$sponder,$dateofbirth,$gender,$phone2,$password,$email,$uniqid,$gid,$date,$sponser);
			}

			//save_downline($phone,$gid);

			$from    = 'noreply@basiksservices.com';
            $subject = 'Account Activation Required';

			$activate_link = 'http://demo.basiksservices.com/include/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;

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