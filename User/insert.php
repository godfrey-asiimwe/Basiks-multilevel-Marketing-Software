 
  <?php  
  // Change this to your connection info.
   $connect = mysqli_connect("localhost", "root", "", "basiks");  


 if(!empty($_POST))  
 {  
      $message = '';  
      $billno = mysqli_real_escape_string($connect, $_POST["billno"]);

      $user_no='5eeef09023c46';
      $product_id=$_POST['product_id'];

      /*$name=getProductById($product_id,'name');
      $amount=getProductById($product_id,'price');*/

      $time=time();
      $date=date("Y-m-d H:i:s",$time); 

      if($_POST["product_id"] != '')  
      {  
           $sql ="INSERT INTO purchase (bill_no,product_id,user_no,entry_date) VALUES ('$billno','$product_id','$user_no','$date')";
  
            // execute query
            mysqli_query($connect, $sql);

            //getUpline($user_no);

           $message = 'Data Inserted';

      }  
 }  
 ?>
 