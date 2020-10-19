


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Basiks</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets2/css/style.css">
  <link rel="stylesheet" href="../assets2/css/components.css">
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
         <div class="col-lg-4 col-md-4 col-12 order-lg-1 min-vh-100 order-2 bg-white" >
         </div>
        <div class="col-lg-8 col-md-12 col-12 order-lg-1 min-vh-100 order-2 bg-white" >
          <div class="p-4 m-3" style="">
            <?php 

             include '../include/functions.php';
             // Change this to your connection info.
             include_once '../include/DB.php';

            $product_id=$_GET['id'];
            $gid=$_GET['userid'];

            $phone_no=getAccountInfoById($gid,'phone');
            $email=getAccountInfoById($gid,'email');


            $oid=$product_id;
            $amount=getProductById($product_id,'price');

             
            $fields = array("live"=> "1",
                              "oid"=> $oid,
                              "inv"=> $oid,
                              "ttl"=> $amount,
                              "tel"=> $phone_no,
                              "eml"=> $email,
                              "vid"=> "bservices",
                              "curr"=> "KES",
                              "p1"=> "mpesa",
                              "p2"=> "020102292999",
                              "p3"=> "",
                              "p4"=> "",
                              "cbk"=> $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],
                              "cst"=> "1",
                              "crl"=> "0"
                              );
              /*
              The datastring IS concatenated from the data above
              */

              $datastring =  $fields['live'].$fields['oid'].$fields['inv'].$fields['ttl'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['p1'].$fields['p2'].$fields['p3'].$fields['p4'].$fields['cbk'].$fields['cst'].$fields['crl'];
              $hashkey ="trF9wqE55xzba";//use "demoCHANGED" for testing where vid is set to "demo"

              /********************************************************************************************************
              * Generating the HashString sample
              */
              $generated_hash = hash_hmac('sha1',$datastring , $hashkey);

              ?>
            <img src="../assets2/img/logo.jpeg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Basiks</span></h4>
            <p class="text-muted"> You are about to make Payments for a Product</p>

                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                  
                    <div class="card-wrap" style="padding: 40px;">
                         <FORM action="https://payments.ipayafrica.com/v3/ke">
                            <?php  
                                 foreach ($fields as $key => $value) {
                                
                                     echo '<input name="'.$key.'" type="hidden" value="'.$value.'">';
                                 }
                            ?>
                            <INPUT name="hsh" type="hidden" value="<?php echo $generated_hash ?>">
                            <button type="submit"  class="btn btn-primary">  Comfirm  </button>
                        </FORM>
                    </div>
                    <h4 style="padding:40px;">To finish the purchase</h4>
                  </div>
                </div>

          </div>
        </div>

      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets2/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets2/js/scripts.js"></script>
  <script src="../assets2/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>

           