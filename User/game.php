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
                  <div class="card-header">
                  </div>
                  <div class="card-body p-0" style="padding: 50px;padding-left: 20px;">

                    <?php

                    $curl =curl_init();
                    $response ="";

                    curl_setopt_array($curl, array(
                      CURLOPT_URL =>"https://www.multiplayergameserver.com/xmlapi7/xmlapi.php?site_id=889&password=R6Kz2x7yT1&nocompress=true&action=register_player&nick=".$nick."&msisdn=".$msisdn."&player_password=".$player_password."&email=".$email."&gender=".$gender."&date_of_birth=".$dateofbirth."&skillpod_player_id=".$skillpod_player_id."",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "GET",
                      CURLOPT_HTTPHEADER => array(
                        "Cookie: PHPSESSID=3grtbm62n0mt1kouqb50a73f21"
                      ),
                    ));


                    $url="";

                    //curl_setopt($curl, CURLOPT_URL,$url);

                    curl_setopt($curl,CURLOPT_TIMEOUT,10);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)');

                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //disable ssl check

                    $response = curl_exec($curl);

                    //var_dump($response,curl_error($curl));
                    $xml_str = $response;
                    $xml=simplexml_load_string($xml_str);
                    //var_dump($xml);


                      $nick="Nick already used";
                      $email="Email already used";

                      if($xml->error_message==$nick){
?>

                        <form method="POST" action="playgame.php">
                          <div class="form-group col-6">
                              <label>Select a Game</label>
                               <select name="game" class="form-control selectric" required>
                                  <option value="107487">Run Pixie Run</option>
                                </select>
                            </div>

                            <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                              Play
                            </button>
                          </div>
                        </form>

                      <?php

                      }elseif($xml->error_message==$email){

                        ?>

                        <a href="game.php" class="btn btn-primary btn-lg btn-block btn-icon-split col-4"><i class="fas fa-rocket"></i>
                                  You are successfuly registered go ahead and play games
                                </a><br>

                        <form method="POST" action="playgame.php">
                            <div class="form-group col-6">
                              <label>Select a Game</label>
                               <select name="game" class="form-control selectric" required>
                                  <option value="107487">Run Pixie Run</option>
                                </select>
                            </div>

                            <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                              Play
                            </button>
                          </div>

                        </form>


                      <?php

                      }

                    ?>
                 
                  </div>
                </div>
            </div>
          </div>
        </section>
  </div>
   <?php include 'footer.php'?>
<html>