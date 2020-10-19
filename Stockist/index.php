<?php
include '../include/functions.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../login.html');
  exit;
}

include '../include/DB.php';

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password,email,firstname,lastname FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email,$firstname,$lastname);
$stmt->fetch();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Stockist &mdash; Basiks</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../admin/assets3/css/style.css">
  <link rel="stylesheet" href="../admin/assets3/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../admin/assets3/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Stockist</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <div class="dropdown-divider"></div>
              <a  href="#" data-toggle="modal" data-target="#logoutModal2" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
        <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">STOCKIST </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">ST</a>
          </div>

           <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
             
            </ul>

        </aside>
      </div>

      <div class="main-content">
          <section class="section">

            <div class="section-body" style="margin-top: 100px;">
              <h2 class="section-title">Products</h2>
              <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                    <?php 
                     if(isset($_GET['editPurchase'])){
                        include_once 'editPurchase.php';
                     }else{
                       ?>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="padding: 20px !important;">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Bill No</th>
                                <th>Buyer</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Date Purchased</th>
                                <th>Mark Bought</th>
                              </tr>
                            </thead>
                            <tbody>
                             <?php getAllPurchasesForStockist() ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <?php
                      }
                    ?>
                  </div>
              </div>
            </div>
            
          </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div>Basiks </a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="../admin/assets3/js/scripts.js"></script>
  <script src="../admin/assets3/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../admin/assets3/js/page/index.js"></script>

   <!-- Page level plugins -->
  <script src="../admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../admin/js/demo/datatables-demo.js"></script>

   
</body>
</html>
