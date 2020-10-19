<?php 

  $product_id=$_GET['purchase'];
  $user_no=$gid;

  $phone_no=getAccountInfoBygid($gid,'phone');
  $email=getAccountInfoBygid($gid,'email');

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
           