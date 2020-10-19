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

              $email=$_GET['email'];

              if(isset($_POST['submit'])){

                     $password=md5($_POST['password']);

                    
				     $sql="UPDATE accounts SET password='$password' WHERE email='$email'";

				     mysqli_query($con, $sql);

				    header('Location:login.php');
                }

             ?>
            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME'].'?email='.$email; ?>" class="needs-validation" novalidate="">
              <div class="form-group">
                  <div class="form-group col-12">
                      <label for="password" class="d-block">New Password</label>
                      <input  id="txtNewPassword" name="password" placeholder="Create Password" id="txtConfirmPassword" onChange="checkPasswordMatch();" type="password" class="form-control pwstrength" data-indicator="pwindicator" >
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-12">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input type="password" id="txtConfirmPassword" class="form-control" placeholder="Confirm Password" class="registrationFormAlert" onChange="checkPasswordMatch();">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                     <div class="registrationFormAlert" id="divCheckPasswordMatch">
                    </div>
                    </div>
                  </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Reset
                </button>
              </div>
            </form>

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
