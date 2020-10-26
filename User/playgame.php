      <?php 
        include 'header.php';
      ?>

      <?php

      $site_id="889";
      $password="R6Kz2x7yT1";

      $nick=getAccountInfoBygid($gid,'firstname'); //firstname
      $msisdn=uniqid();
      $player_password=getAccountInfoBygid($gid,'lastname');
      $email=getAccountInfoBygid($gid,'email');//email
      $date=getAccountInfoBygid($gid,'dateofbirth');//date of birth

      $createDate = new DateTime($date);

      $dateofbirth = $createDate->format('Y-m-d');

      $skillpod_player_id=$gid; //gid

      $gender=getAccountInfoBygid($gid,'gender');

      if($gender=='male'){
        $gender='M';
      }else{
        $gender='F';
      }


      $gameid=$_POST['game'];
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
            <h1>Games</h1>
          </div>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body p-0" style="padding: 50px;padding-left: 20px;">
                    <?php
                    
                    echo '<iframe src="https://www.multiplayergameserver.com/xmlapi7/rdf.playgame.php?skillpod_siteid=889
                    &skillpod_userid='.$skillpod_player_id.'
                    &gameid='.$gameid.'
                    &fullscreen=true" style="width: 100%;height: 400px;" ></iframe>';


                    ?>

                    <script type="text/javascript">
                   
                    </script>
                  </div>
                </div>
            </div>
          </div>
        </section>
  </div>
   <?php include 'footer.php'?>
<html>