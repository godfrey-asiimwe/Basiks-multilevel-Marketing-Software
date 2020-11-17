    <?php include 'header.php' ?>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
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
            <li>
              <a class="nav-link" href="network.php"><i class="fas fa-network-wired"></i>
              <span>Net Work</span></a>
            </li>
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
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Members in Your Net Work</h4>
                  </div>
                  <div class="card-body">
                    <?php echo getAllUsers(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>

                      <?php

                          $time=time();
                          $currentMonth=date("F", $time);

                            echo ' Qualified Members for '.$currentMonth;

                      ?>
                           
                    </h4>
                  </div>
                  <div class="card-body">
                       <?php echo getAllUsers(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Amount Earned so Far</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                
                <div class="card-wrap" style="padding:32px;">
                   <a  href="#" data-toggle="modal" data-target="#registerstockist" class="btn btn-primary">
                <i class="fas fa-sign-out-alt"></i> Register as Stockist
              </a>
                </div>
              </div>
            </div>
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
                            <tr style="font-weight:bold;">
                              <th>Name</th>
                              <th>Level</th>
                              <th>Up Line</th>
                              <th>Sponsor</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Address</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                
                  <tbody>
                    <?php
                         $id=$_SESSION['id'];
                         $sql3 ="SELECT * FROM relationship WHERE upline='$id'";
                         $result = mysqli_query($con, $sql3);

                         if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                              $downline=$row["downline"];
                               
                               $sql4 ="SELECT * FROM accounts WHERE gid='$downline' ";
                               $result2 = mysqli_query($con, $sql4);

                               if (mysqli_num_rows($result2) > 0) {
                                  while($row2 = mysqli_fetch_assoc($result2)) {
                                    $id=$row2["id"];
                                    $SponsorNo=$row2["sponsorNumber"];
                                    $upline1=getAccountInfoByPhone($SponsorNo,'firstname');
                                    $upline2=getAccountInfoByPhone($SponsorNo,'lastname');
                                    ?>

                                        <tr>
                                         
                                        <td>
                                          <?php echo $row2["firstname"];?>  <?php echo $row2["lastname"];?>
                                        </td>
                                        <td>1</td>
                                        <td><?php echo $upline1;?>  <?php echo $upline2;?></td>
                                         <td>
                                           <?php $sponser=$row2["sponsorId"]; 

                                           if($sponser ==null){
                                              echo 'N/A';
                                           }else{
                                              echo getAccountInfoBySponserid($sponser,'firstname').''.getAccountInfoBySponserid($sponser,'lastname');
                                           }

                                           ?>
                                        </td>
                                        <td>
                                           <?php echo $row2["phone"];?>
                                        </td>
                                        <td>
                                           <?php echo $row2["email"];?>
                                        </td>
                                        <td>
                                           <?php echo $row2["address"];?>
                                        </td>
                                        <td>
                                           <?php $status=$row2["status"]; 

                                           if($status ==null){
                                              echo 'N/A';
                                           }else{
                                              echo $status;
                                           }

                                           ?>
                                        </td>
                                      </tr>
                                    <?php

                                     getDownlinelevel2($id);

                                  }
                               } else {
                                  echo "";
                               }
                            }
                         } else {
                            echo "";
                         }

                      ?>
                  </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </section>
      </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="inviteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Invite New User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="invite_form">  
            <div class="form-group row">
                <div class="col-sm-12 mb-12 mb-sm-0">
                  <input type="email" id="email" name="email" class="form-control form-control-user" placeholder="Enter Email" required>
                </div>
            </div>
               <input type="hidden" name="id" id="id" value=" <?php echo $id; ?>" /> 
              <input type="submit" name="invite" id="invite" value="Invite" class="btn btn-success" />  
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="registerstockist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you are registering as Stockist?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="register_stockist">  
            <div class="form-group row">
              <div class="col-sm-12 mb-12 mb-sm-0">
                <input type="text" id="county" name="county" class="form-control form-control-user" placeholder="Enter County" required><br>
                <input type="text" id="location" name="location" class="form-control form-control-user" placeholder="Enter Location" required>
              </div>
            </div>
            <input type="hidden" name="id2" id="id2" value="<?php echo $gid; ?>" /> 
            <input type="submit" name="register" id="register" value="Register" class="btn btn-success"/>  
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php';?>