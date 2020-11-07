<?php
session_start();
// Change this to your connection info.

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Password Reset &mdash; Basiks</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets2/css/style.css">
  <link rel="stylesheet" href="assets2/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
        </div>
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3 text-left">
            <img src="assets2/img/logo.jpeg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">

            <?php

              include 'include/DB.php';

              if(isset($_POST['submit'])){

                  $email=$_POST['email'];

                   $sql4 ="SELECT * FROM accounts WHERE email='$email'";
                   $result2 = mysqli_query($con, $sql4);

                   if (mysqli_num_rows($result2) > 0) {

                        $from    = 'noreply@basiksservices.com';
                        $subject = 'Password Reset';

                        $activate_link = 'http://demo.basiksservices.com/passwordReset.php?email=' . $_POST['email'];

                        $message = '<p>Please click the following link to reset your account:<br><br> <a href="' . $activate_link . '">Click Here to reset your password</a></p>';

                        mail($_POST['email'], $subject, $message);

                        echo "Check your email to reset your password";

                  }else{

                      echo "User does not exist in the System";
                  }
                
                }

             ?>
            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']?>" class="needs-validation" novalidate="">
              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Recovery Email</label>
                </div>
                <input id="email" type="email" class="form-control" name="email" tabindex="2" required>
                <div class="invalid-feedback">
                  Please fill in your recovery email
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Reset
                </button>
              </div>
            </form>

            <div class="mt-5 text-center">
                Don't have an account? <a href="register.php">Create new one</a> <br><a href="login.php">Back to Login</a>
              </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets2/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets2/js/scripts.js"></script>
  <script src="assets2/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
