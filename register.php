<?php 
    include 'include/registration_functions.php';
    include 'include/DB.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Basiks</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets2/css/style.css">
  <link rel="stylesheet" href="assets2/css/components.css">
  <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>



  <script>
      function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

          if (password != confirmPassword)
              $("#divCheckPasswordMatch").html("Passwords do not match!");
          else
              $("#divCheckPasswordMatch").html("Passwords match.");
      }

      $(document).ready(function () {
         $("#txtNewPassword, #txtConfirmPassword").keyup(checkPasswordMatch);
      });
  </script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.ajaxcomplete.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery.ajaxcomplete.css" /> 
  <script>
      $(document).ready(function(){

       $("#sponsor").autocomplete("ajaxcomplete.php", {
          selectFirst: true
        });
      });
  </script>
</head>

<body >
  <div id="app" >
    <section class="section" style="margin-top: -50px !important;">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="assets2/img/logo.jpeg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
              	
              	 <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Basiks</span> <br>Please fill in your credentials to become part of us</h4>
              </div>

              <div class="card-body">
                <?php

              if(isset($_POST['submit'])){

                if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
                  exit(' <a class="btn btn-primary btn-lg btn-block btn-icon-split" >Password must be between 5 and 20 characters long!
                          </a><br><br>');
                }

                // We need to check if the account with that email exists.
                if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ? OR phone=?')) {

                  // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
                    $stmt->bind_param('ss',$_POST['email'],$_POST['phone']);

                  $stmt->execute();
                  $stmt->store_result();
                  // Store the result so we can check if the account exists in the database.
                  if ($stmt->num_rows > 0) {
                    // Username already exists
                    echo ' <a href="login.php" class="btn btn-primary btn-lg btn-block btn-icon-split">User Exists, click to Log In
                          </a><br><br>';
                  } else {
                    // Insert new account
                    // Username doesnt exists, insert new account
                  
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

                      if(empty($_POST['sponsorNumber'])){

                        makeAdminSponser($firstname,$lastname,$address,$shipping,$country,$sponder,$dateofbirth,$gender,$phone2,$password,$email,$uniqid,$gid,$date);

                      }else{

                        registerUpline($firstname,$lastname,$address,$shipping,$country,$sponder,$dateofbirth,$gender,$phone2,$password,$email,$uniqid,$gid,$date);
                      }

                      $from= 'noreply@basiksservices.com';
                            $subject = 'Account Activation Required';

                      $activate_link = 'http://demo.basiksservices.com/include/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;

                      $message = 'Please click the following link to activate your account:   ' . $activate_link . '';

                      mail($_POST['email'], $subject, $message);

                      echo ' <a class="btn btn-primary btn-lg btn-block btn-icon-split">User Sucessfully registration, Check your email to activate your Account.
                          </a>';
                 
                  }

                  $stmt->close();

                } 
              }

              $con->close();

              ?>
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="firstname" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="lastname" required>
                    </div>
                  </div>
                  <div class="row">
                      
                      <div class="form-group col-6">
                          <label for="email">Email</label>
                          <input id="email" type="email" class="form-control" name="email">
                          <div class="invalid-feedback" required></div>
                      </div>

                      <div class="form-group col-6">
                          <label>Date of Birth</label>
                          <input type="date" class="form-control selectric" name="dateofbirth" id="dateofbirth" placeholder="" required>
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Gender</label>
                      <select class="form-control selectric" name="gender" required>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                    </div>
                     <div class="form-group col-6">
                      <label>Select Country</label>
                     <select name="country" class="form-control selectric" required>
                        <option value="">Select Country</option>
                       <option value="Kenya" >Kenya</option>
                        <option value="Uganda">Uganda</option>
                         <option value="Rwanda">Rwanda</option>
                        <option value="Tanzania">Tanzania</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="form-group col-6">
                      <label>Shipping Number</label>
                      <input type="text" name="shipping" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Your Phone Number</label>
                      <input  type="text" class="form-control" name="phone" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label>Sponser Phone Number</label>
                      <input  type="text"  name="sponsorNumber" id="sponsor" class="form-control" autofocus>
                    </div>
                  </div>

                    <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input  id="txtNewPassword" name="password" placeholder="Create Password" id="txtConfirmPassword" onChange="checkPasswordMatch();" type="password" class="form-control pwstrength" data-indicator="pwindicator" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input type="password" id="txtConfirmPassword" class="form-control" placeholder="Confirm Password" class="registrationFormAlert" onChange="checkPasswordMatch();" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                     <div class="registrationFormAlert" id="divCheckPasswordMatch" style="font-size:15px;">
                    </div>
                    </div>
                  </div>
                   
                    <div class="form-group col-12">
                      <label style="font-size:15px;">Terms and conditions</label>
                      <input type="checkbox" name="checkbox" class="form-control" style="height:23px;margin-left: -290px;" required><br>
                       <label style="font-size:15px;">
                          If you dont have an upline or Sponser, the system will automatically place under the admin. And if you have a Sponser, you will be directly under him/her.
                        </label>
                    </div>

                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block col-4" style="margin-top: 0!important;">
                      Register
                    </button>
                  </div>
                </form>
              </div>
             <div class="mt-5 text-center">
             You have an account? <a href="login.php">Log in here</a> 
             </div>
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">You have registered Sucessfully. </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Check you Email and Activate your Account</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Log In</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; Basiks 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="assets2/js/scripts.js"></script>
  <script src="assets2/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets2/js/page/auth-register.js"></script>

  <script type="text/javascript">
    $('.datepicker').datepicker();
  </script>
</body>
</html>
