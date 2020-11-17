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
        <li><a class="nav-link" href="network.php"><i class="fas fa-network-wired"></i><span>Net Work</span></a></li>

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
      <h2 class="section-title" style="text-transform: capitalize;">Messages</h2>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">

              <div>
                <p class="section-lead">
                  Send someone a message
                </p>
              </div>
         
            </div>
            <div class="card-body p-0">
               <div class="row mt-sm-4"  >
                <div class="col-12 col-md-12 col-lg-7" id="message" style="display: none;">
                  <div class="card">
                    <form method="post" action="include/message.php" class="needs-validation" novalidate="">
                      <div class="card-header">
                        <h4>Send a message</h4>
                      </div>
                      <div class="card-body">
                          <div class="row">
                                <div class="form-group col-md-6 col-12">
                                  <label>Address</label>
                                  <select name="user" required>
                                    <?php
                                      echo getadmin();
                                      $id=$_SESSION['id'];
                                      echo getDownline($id);
                                     ?>
                                  </select>
                                </div>   
                          </div>
                          <div class="row">
                            <div class="form-group col-12">
                              <label>Message</label>
                              <textarea class="form-control summernote-simple" name="message" required></textarea>
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12" style="display: none;"> 
                              <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" required> 
                          </div>
                      </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-10 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Recent messages</h4>
                      <button onclick="message()" class="btn btn-primary" type="submit" name="submit">New Message</button>
                    </div>
                    <div class="card-body">
                      <ul class="list-unstyled list-unstyled-border">
                            <?php
                               $id=$_SESSION['id'];
                              echo getMessagesForAuser($id);
                            ?>
                      </ul>
                    </div>
                  </div>
                </div>
          </div><br><br>
           </div>
        </div>
      </div>
    </div>
</section>
</div>
<?php include 'footer.php'?>