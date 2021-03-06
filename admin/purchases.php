<?php  include 'header.php' ?>

          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li class=""><a class="nav-link" href="index.php"><i class="fas fa-bars"></i><span>Report Dashboard</span></a></li>
                  <li class=""><a class="nav-link" href="compensation.php"><i class="fas fa-dollar-sign"></i><span>Default Amounts</span></a></li>
                  <li><a class="nav-link" href="activeusers.php"><i class="fas fa-dollar-sign"></i><span>Active Members</span></a></li>
                </ul>
              </li>
              <li class="menu-header">Products</li>
             
              <li><a class="nav-link" href="product.php"><i class="fas fa-shopping-bag"></i> <span>Products</span></a></li>
              <li class="active"><a class="nav-link" href="purchases.php"><i class="fas fa-archive"></i> <span>Purchases</span></a></li>
              <li class=""><a class="nav-link" href="dailypurchases.php"><i class="fas fa-archive"></i> <span> Daily Purchases</span></a></li>

              
              <li class="menu-header ">Messages</li>
               <li><a class="nav-link" href="sent.php"><i class="fas fa-envelope"></i> <span>Sent Messages</span></a></li>
              <li ><a class="nav-link" href="received.php"><i class="fas fa-envelope"></i> <span>Received Messages</span></a></li>
             
            </ul>

        </aside>
      </div>

        <div class="main-content">
            <section class="section">

              <div class="section-body" style="margin-top: 100px;">
                <h2 class="section-title">Purchases</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>
              </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>List of Purchases</h4>
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive" style="padding: 20px !important;">
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Bill No</th>
                              <th>Name</th>
                              <th>Product</th>
                              <th>Amount</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>Bill No</th>
                              <th>Name</th>
                              <th>Product</th>
                              <th>Amount</th>
                              <th>Date</th>
                            </tr>
                          </tfoot>
                          <tbody>
                           <?php getAllPurchases()?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
             </div>
          </section>
        </div>
      <!-- End of Main Content -->

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
  <script src="assets3/js/scripts.js"></script>
  <script src="assets3/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets3/js/page/index.js"></script>

   <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
