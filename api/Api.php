<?php 

	require_once 'DbConnect.php';
	
	$response = array();
	
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
			
			case 'signup':
				if(isTheseParametersAvailable(array('firstname','email','password','gender'))){
					$firstname = $_POST['firstname']; 
					$email = $_POST['email']; 
					$password = md5($_POST['password']);
					$gender = $_POST['gender']; 
					
					$stmt = $conn->prepare("SELECT id FROM accounts WHERE firstname = ? OR email = ?");
					$stmt->bind_param("ss", $firstname, $email);
					$stmt->execute();
					$stmt->store_result();
					
					if($stmt->num_rows > 0){
						$response['error'] = true;
						$response['message'] = 'User already registered';
						$stmt->close();
					}else{
						$stmt = $conn->prepare("INSERT INTO accounts (firstname, email, password, gender) VALUES (?, ?, ?, ?)");
						$stmt->bind_param("ssss", $firstname, $email, $password, $gender);

						if($stmt->execute()){
							$stmt = $conn->prepare("SELECT id, id, firstname, email, gender FROM accounts WHERE firstname = ?"); 
							$stmt->bind_param("s",$firstname);
							$stmt->execute();
							$stmt->bind_result($userid, $id, $firstname, $email, $gender);
							$stmt->fetch();
							
							$user = array(
								'id'=>$id, 
								'firstname'=>$firstname, 
								'email'=>$email,
								'gender'=>$gender
							);
							
							$stmt->close();
							
							$response['error'] = false; 
							$response['message'] = 'User registered successfully'; 
							$response['user'] = $user; 
						}
					}
					
				}else{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available'; 
				}
				
			break; 
			
			case 'login':
				
				if(isTheseParametersAvailable(array('email', 'password'))){
					
					$email = $_POST['email'];
					$password = md5($_POST['password']); 
					
					$stmt = $conn->prepare("SELECT id, firstname, email, gender FROM accounts WHERE email = ? AND password = ?");
					$stmt->bind_param("ss",$email,$password);
					
					$stmt->execute();
					
					$stmt->store_result();
					
					if($stmt->num_rows > 0){
						
						$stmt->bind_result($id, $firstname, $email, $gender);
						$stmt->fetch();
						
						$user = array(
							'id'=>$id, 
							'firstname'=>$firstname, 
							'email'=>$email,
							'gender'=>$gender
						);
						
						$response['error'] = false; 
						$response['message'] = 'Login successfull'; 
						$response['user'] = $user; 
					}else{
						$response['error'] = false; 
						$response['message'] = 'Invalid email or password';
					}
				}
			break; 

			case 'products':
				
					
					$stmt = $conn->prepare("SELECT id, name, info, price FROM products");
					
					$stmt->execute();
					
					if($stmt->num_rows > 0){
						
						$stmt->bind_result($id, $name, $info, $price);
						$stmt->fetch();
						
						$user = array(
							'id'=>$id, 
							'name'=>$name, 
							'info'=>$info,
							'price'=>$price
						);
						
						$response['error'] = false; 
						$response['message'] = 'Products Returned'; 
						$response['user'] = $user; 
					}else{
						$response['error'] = false; 
						$response['message'] = 'no products';
					}
			break; 
			
			default: 
				$response['error'] = true; 
				$response['message'] = 'Invalid Operation Called';
		}
		
	}else{
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	echo json_encode($response);
	
	function isTheseParametersAvailable($params){
		
		foreach($params as $param){

			if(!isset($_POST[$param])){

				return false; 
				
			}

		}

		return true; 

	}