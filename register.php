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
              	
              	 <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Basiks</span> Please fill in your credentials to become part of us</h4>
              </div>

              <div class="card-body">
                <form method="POST" action="include/register.php">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="firstname" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="lastname">
                    </div>
                  </div>
                  <div class="row">
                      
                      <div class="form-group col-6">
                          <label for="email">Email</label>
                          <input id="email" type="email" class="form-control" name="email">
                          <div class="invalid-feedback"></div>
                      </div>

                      <div class="form-group col-6">
                          <label>Date of Birth</label>
                          <input type="date" class="form-control selectric" name="dateofbirth" id="dateofbirth" placeholder="">
                      </div>
                  </div>

                  <div class="form-divider">
                    Your Home
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Gender</label>
                      <select class="form-control selectric" name="gender">
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
                      <input type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Shipping Number</label>
                      <input type="text" name="shipping" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Your Phone Number</label>
                      <input  type="text" class="form-control" name="phone" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label>Sponser Phone Number</label>
                      <input  type="text"  name="sponsorNumber" id="sponsor" class="form-control" autofocus>
                    </div>
                  </div>

                    <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input  id="txtNewPassword" name="password" placeholder="Create Password" id="txtConfirmPassword" onChange="checkPasswordMatch();" type="password" class="form-control pwstrength" data-indicator="pwindicator" >
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
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

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
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
<!--   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
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
