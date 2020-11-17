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
                  <li class="active"><a class="nav-link" href="product.php">Buy a Product</a></li>
                  <li><a class="nav-link" href="income.php">Payments</a></li>
                  <li><a class="nav-link" href="account.php">accounts</a></li>
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
            <h1>Products</h1>
          </div>
          <div class="row">
          
            <?php 
                if(isset($_GET['purchase'])){
                    include_once 'purchase.php';
                }if(isset($_GET['purchasefinal'])){
                    include_once 'purchasefinal.php';
                }else{

             ?>
           
          </div>
           <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Your New Work</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive" style="padding: 30px;">
                      <table class="table table-striped table-md"  id="dataTable">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Information</th>
                              <th>Price</th>
                              <th>Category</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php getAllProductsForDisplayUser() ?>
                          </tbody>
                    </table>
                   </div>
                 </div>
              </div>
            </div>
          </div>
        <?php
          }
        ?>
   </section>
  </div>
   <!-- Logout Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buy Product?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          
           <form method="post" id="insert_form">  
              <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" id="billno" name="billno" class="form-control form-control-user" placeholder="Enter Bill Number" required>
                  </div>
                   <div class="col-sm-6 mb-3 mb-sm-0" >
                    <input name="productId" id="productId"   class="form-control form-control-user" type="hidden">
                  </div>
              </div>
                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
           </form> 

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          
        </div>
      </div>
    </div>
  </div>

   <?php include 'footer.php'?>