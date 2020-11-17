      <?php 
          include 'header.php';
      ?>

       <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="index.php">User Dashboard</a></li>
                </ul>
              </li>
             <!--  <li class="menu-header">Starter</li> -->
              <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Account</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="product.php">Buy a Product</a></li>
                  <li><a class="nav-link" href="income.php">Payments</a></li>
                  <li><a class="nav-link" href="account.php">accounts</a></li>
                </ul>
              </li>
              <li class="active"><a class="nav-link" href="network.php"><i class="fas fa-network-wired"></i><span>Net Work</span></a></li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="game.php" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>Play Game
              </a>
            </div>
        </aside>
      </div>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Your Net Work</h1>
          </div>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detailed Net work</h4>
                  </div>
                  <div class="card-body p-0" style="margin-left: 40px;">
                    
                      <p style="font-weight: bolder;"> Your Upline</p>

                      <p><span> <img class="img-profile rounded-circle" src="img/avatar-2.png" width="30" style="margin-right: 20px;">
                       <?php

                          $phone=$sponsorNumber;

                          $firstname=getAccountInfoByPhone($phone,'firstname');
                          $lastname=getAccountInfoByPhone($phone,'lastname');

                          echo $firstname.'  '.$lastname;
                        ?></span></p><br>

                      <p style="font-weight: bolder;">Your Downline</p>
                      <ul id="myUL">
                         <?php 
                         $id=$_SESSION['id'];
                         echo getDownlineForTree($id); 

                         ?>
                      </ul>
                 </div>
              </div>
            </div>
          </div>
   </section>
  </div>
   <?php include 'footer.php'?>