      <?php 
          include 'header.php';
      ?>

          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index.php">User Dashboard</a></li>
                </ul>
              </li>
             <!--  <li class="menu-header">Starter</li> -->
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Account</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="product.php">Buy a Product</a></li>
                  <li class="active"><a class="nav-link" href="income.php">Payments</a></li>
                  <li><a class="nav-link" href="account.php">accounts</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="network.php"><i class="far fa-square"></i> <span>Net Work</span></a></li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="http://demo.basiksservices.com/" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> See the Website
              </a>
            </div>
        </aside>
      </div>



      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Your Income</h1>
          </div>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detailed Income</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive" style="padding: 30px;">
                      <table class="table table-striped table-md"  id="dataTable">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>From</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php getincomeByUser($id)?>
                         </tbody>
                    </table>
                   </div>
                 </div>
              </div>
            </div>
          </div>
   </section>
  </div>
   <?php include 'footer.php'?>