      <?php 
          include 'header.php';
      ?>

      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index.php">User Dashboard</a></li>
            </ul>
          </li>
         <!--  <li class="menu-header">Starter</li> -->
          <li class="nav-item dropdown ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Account</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="product.php">Buy a Product</a></li>
              <li><a class="nav-link" href="income.php">Payments</a></li>
              <li ><a class="nav-link" href="account.php">accounts</a></li>
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
            <h2 class="section-title" style="text-transform: capitalize;">Hi, <?php echo $firstname;?>  <?php echo $lastname; ?></h2>
          </div>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">

                    <div>
                      <p class="section-lead">
                        Change information about yourself on this page.
                      </p>
                    </div>
               
                  </div>
                  <div class="card-body p-0">
                      <div class="row mt-sm-4">
                  <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                      <div class="profile-widget-header">
                        <img alt="image" src="img/avatar-2.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                          <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Upline</div>
                            <div class="profile-widget-item-value">7</div>
                          </div>
                          <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Downline</div>
                            <div class="profile-widget-item-value">14</div>
                          </div>
                        </div>
                      </div>
                      <div class="profile-widget-description">
                        <h5 class="section-title"> <b>Phone: </b> <?php echo getAccountInfoBygid($gid,'phone'); ?></h5><br>
                        <h5 class="section-title"> <b>Country: </b><?php echo getAccountInfoBygid($gid,'country'); ?></h5><br>

                      </div>
                      
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                      <form method="post" action="include/profile.php" class="needs-validation" novalidate="">
                        <div class="card-header">
                          <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Shipping Address</label>
                                <input type="text" class="form-control" name="shipping" value="<?php echo getAccountInfoBygid($gid,'shipping'); ?>" required="">
                                
                              </div>
                             <!--  <div class="form-group col-md-6 col-12">
                                <label>Upload Photo</label>
                                <input type="file" class="form-control" name="image" required="">
                                
                              </div> -->
                            </div>
                            <div class="row">
                              <div class="form-group col-md-7 col-12">
                                <label>Email</label>
                                <input type="email" name="email"  class="form-control" value="<?php echo getAccountInfoBygid($gid,'email'); ?>" required="">
                              </div>
                              <div class="form-group col-md-5 col-12">
                                <label>Address</label>
                                <input type="tel" class="form-control" name="address" value="<?php echo getAccountInfoBygid($gid,'address'); ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-6 col-12" style="display: none;"> 
                                <input type="text" class="form-control" name="id" value="<?php echo $gid; ?>" required=""> 
                            </div>
                        </div>
                        <div class="card-footer text-right">
                          <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>  
                 </div>
              </div>
            </div>
          </div>
   </section>
  </div>
   <?php include 'footer.php'?>