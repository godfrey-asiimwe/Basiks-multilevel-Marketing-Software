<?php
// Change this to your connection info.
function db_connection(){
	// Change this to your connection info
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'basiks';

	// Try and connect using the info above.
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
		exit('Failed to connect to MySQL: ' . mysqli_connect_error());
	}

	return $con;
}

/*save admin if he doesnt exist*/
function findAdmin(){
    $check=mysqli_query(db_connection(),"SELECT firstname, lastname FROM admin") or die(mysqli_error());
    if(mysqli_num_rows($check)==0){
        $firstname='admin';
        $lastname='admin';
        $email='admin@gmail.com';
        $password=sha1('Pass=123');
        $country='Uganda';
        $adminID=uniqid();
        @mysqli_query(db_connection(),"INSERT INTO admin(admin_id,firstname,lastname,email,password,county) VALUES('$adminID','$firstname','$lastname','$email','$password','$country')") OR die(mysqli_error());
    }
}

//function to append 256 to a number 
function phoneNumberUg($phone){
  $len=strlen($phone);
  if($len==10 and substr($phone,0,1)==0){
    $phone='256'.substr($phone,1);
  } else if($len==9){
    $phone='256'.$phone;
  } else{
    $phone=$phone;
  }
  return $phone; 
}

function phoneNumberKe($phone){
  $len=strlen($phone);
  if($len==10 and substr($phone,0,1)==0){
    $phone='254'.substr($phone,1);
  } else if($len==9){
    $phone='254'.$phone;
  } else{
    $phone=$phone;
  }
  return $phone; 
}

function phoneNumberTz($phone){
  $len=strlen($phone);
  if($len==10 and substr($phone,0,1)==0){
    $phone='255'.substr($phone,1);
  } else if($len==9){
    $phone='255'.$phone;
  } else{
    $phone=$phone;
  }
  return $phone; 
}

function phoneNumberRw($phone){
  $len=strlen($phone);
  if($len==10 and substr($phone,0,1)==0){
    $phone='250'.substr($phone,1);
  } else if($len==9){
    $phone='250'.$phone;
  } else{
    $phone=$phone;
  }
  return $phone; 
}

/*return the total number of members in the system*/
function getAllUsers(){
  $users=mysqli_query(db_connection(),"SELECT COUNT(*) AS totalusers FROM accounts");
  $d=mysqli_fetch_assoc($users);
  return $d['totalusers'];
}

/*return the total number of active users*/
function getActiveUsers(){
  $users=mysqli_query(db_connection(),"SELECT COUNT(*) AS totalusers FROM accounts WHERE activation_code='active'");
  $d=mysqli_fetch_assoc($users);
  return $d['totalusers'];
}

/*return the total number of active users*/
function getActiveUsers2(){

  $users=mysqli_query(db_connection(),"SELECT COUNT(*) AS totalusers FROM accounts INNER JOIN purchase ON accounts.gid= purchase.user_no ");
  $d=mysqli_fetch_assoc($users);
  return $d['totalusers'];
}

//returning users who signed up in a month
function getAllUsersForAmonth(){

  $d2 = date('Y-m-d', strtotime('first day of this month'));

  $users=mysqli_query(db_connection(),"SELECT COUNT(*) AS totalusers FROM accounts WHERE entry_date>='$d2'");
  
  $d=mysqli_fetch_assoc($users);
  return $d['totalusers'];
}

//function to filter out specific user 
function getUsersforFilter(){
   $sql4 ="SELECT * FROM accounts ";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        ?>
        <option value="<?php echo $row2["id"];?> "><?php echo $row2["lastname"];?></option>
        <?php

      }
   } 
}

/*returning users for display*/
function getAllUsersForDisplay(){
   $sql4 ="SELECT * FROM accounts";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {

                ?>

                  <tr>
                    <td class="text-left"><?php echo $row2["firstname"];?></td>
                    <td><?php echo $row2["lastname"];?></td>
                    <td><?php echo $row2["email"];?></td>
                    <td><?php echo $row2["phone"];?></td>
                    <td><?php echo $row2["country"];?></td>
                    <td><?php echo $row2["address"];?></td>
                    <td><?php echo $row2["activation_code"];?></td>
                    <td><a href="index.php?activateUser=<?php echo $row2["id"];?>" class="btn btn-primary modal-trigger"  ><small>Deactivate</small></a></td>
                  </tr>
                <?php

              }
           } 
}

//returning all active members
function getAllActiveUsers(){
   $sql4 ="SELECT * FROM accounts WHERE activation_code='activated'";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {

                ?>

                  <tr>
                    <td class="text-left"><?php echo $row2["firstname"];?></td>
                    <td><?php echo $row2["lastname"];?></td>
                    <td><?php echo $row2["email"];?></td>
                    <td><?php echo $row2["phone"];?></td>
                    <td><?php echo $row2["country"];?></td>
                    <td><?php echo $row2["address"];?></td>
                  </tr>
                <?php

              }
           } 
}

//returning phone numbers to select
function phone_numbers(){

	$sql = "SELECT phone,firstname,lastname FROM accounts";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

           echo "<option value=".$row["phone"].">".$row["phone"]."&nbsp;".$row["firstname"]."&nbsp;".$row["lastname"]."</option>";
        }
    } else {
        echo "0 results";
    }

}

//get emails for users for selection
function getEmailUser(){
  $sql4 ="SELECT * FROM accounts ";
  $result2 = mysqli_query(db_connection(), $sql4);

  if (mysqli_num_rows($result2) > 0) {

    while($row2 = mysqli_fetch_assoc($result2)) {

        ?>

        <option value="<?php echo $row2["email"];?> "><?php echo $row2["firstname"];?>  <?php echo $row2["lastname"];?></option>

        <?php

    }
  } 
}

//returning user Ids
function getUserId(){
  $sql4 ="SELECT * FROM accounts ";
  $result2 = mysqli_query(db_connection(), $sql4);

  if (mysqli_num_rows($result2) > 0) {

    while($row2 = mysqli_fetch_assoc($result2)) {

        ?>

        <option value="<?php echo $row2["id"];?> "><?php echo $row2["firstname"];?>  <?php echo $row2["lastname"];?></option>

        <?php

    }
  } 
}

//connecting a user to the their upline
function save_downline($phone,$gid){

	$sql ="SELECT * FROM accounts WHERE phone='$phone'";
    $result =mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
        	$id=$row["id"];

        $sql2 = "INSERT INTO relationship (upline, downline, linelevel) VALUES ($id,$gid, '1')";

        @mysqli_query(db_connection(), $sql2);
 
        }

    } else {
        echo "";
    }  
}

//returning account information by unic Id
function getAccountInfoBygid($itemID,$info){

  $sql = "SELECT $info FROM accounts WHERE  gid='$itemID'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data=$row["$info"];
           return $data;
        }
    } else {
        echo "";
    }

}

//returning account information by Id
function getAccountInfoById($itemID,$info){

  $sql = "SELECT $info FROM accounts WHERE  id='$itemID'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data=$row["$info"];
           return $data;
        }
    } else {
        echo "";
    }
}


//returning account infromation by phone
function getAccountInfoByPhone($itemID,$info){

  $sql = "SELECT $info FROM accounts WHERE  phone='$itemID'";
  $result = mysqli_query(db_connection(), $sql);

  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          $data=$row["$info"];
         return $data;
      }
  } else {
      echo "";
  } 

}

//get account information by sponder Id
function getAccountInfoBySponserid($itemID,$info){
  $sql = "SELECT $info FROM accounts WHERE  gid='$itemID'";
  $result = mysqli_query(db_connection(), $sql);

  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          $data=$row["$info"];
         return $data;
      }
  } else {
      echo "";
  }   
}

//get number of Rows
function getNoofRows($upline){

    $canceledsum=mysqli_query(db_connection(),"SELECT COUNT(*) AS totalcanceled FROM relationship WHERE upline='$upline'");
    $d=mysqli_fetch_assoc($canceledsum);
    return $d['totalcanceled'];

}

//get downline level 2
function getDownlinelevel2($id){
    $sql3 ="SELECT * FROM relationship WHERE upline='$id'";
     $result = mysqli_query(db_connection(), $sql3);

     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $downline=$row["downline"];
           
           $sql4 ="SELECT * FROM accounts WHERE gid='$downline'";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {

                $SponsorNo=$row2["sponsorNumber"];
                $upline1=getAccountInfoByPhone($SponsorNo,'firstname');
                $upline2=getAccountInfoByPhone($SponsorNo,'lastname');
                ?>

                    <tr style="margin-left:20px !important;background-color: purple !important;color: white !important;">
                     
                    <td>
                      <?php echo $row2["firstname"];?>  <?php echo $row2["lastname"];?>
                    </td>
                    <td>2</td>
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

              }
           } 
        }
     }
}

//
function getTheLastgestNoofDownline($id2){
    $sql4 ="SELECT * FROM relationship WHERE upline='$id2'";
     $result = mysqli_query(db_connection(), $sql4);

     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $downline=$row["downline"];
           
            $upline=getAccountInfoBygid($downline,'id');

            $canceledsum=mysqli_query(db_connection(),"SELECT COUNT(*) AS totalcanceled FROM relationship WHERE upline='$upline'");
            $d=mysqli_fetch_assoc($canceledsum);

            if($d['totalcanceled']<1){
                echo $d['totalcanceled'];
                echo '<br>';
                echo $upline;
                break;
            }/*elseif($d['totalcanceled']<2){

                echo $d['totalcanceled'];
                echo $upline;
                break;
            }elseif($d['totalcanceled']<3){
                echo $d['totalcanceled'];
                echo $upline;
                break;
            }*/
        }
    } else {
        echo " ..0 results 1";
    }
}

//returning the downline
function getDownline($id){

     $sql3 ="SELECT * FROM relationship WHERE upline='$id'";
     $result = mysqli_query(db_connection(), $sql3);

     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $downline=$row["downline"];
           
           $sql4 ="SELECT * FROM accounts WHERE gid='$downline'";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {
                $id=$row2["id"];
                $firstname=$row2["firstname"];
                $lastname=$row2["lastname"];
                  ?>
                   <option value="<?php echo $row2["id"];?> "><?php echo $row2["firstname"];?>  <?php echo $row2["lastname"];?></option>
                   <?php
               
              }
           } else {
              echo "0 results";
           }
        }
     } else {
        echo "0 results";
     }
}

//pay an upline level 1
function PaytheUpline1($downline){

     $sql3 ="SELECT * FROM relationship WHERE downline='$downline'";
     $result = mysqli_query(db_connection(), $sql3);

     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

          $upline=$row["upline"];
          $time=time();
          $date=date("Y-m-d H:i:s",$time); 

          $amount=getlevelAmount('3');

          $userno=getAccountInfoById($upline,'gid');

          $userStatus=getPurchasesForaUserinamonth($userno);

          if($userStatus==1){
          
          $sql ="INSERT INTO payments(userid,amount,reciever,entry_date) VALUES ('$downline','$amount','$upline','$date')";

           mysqli_query(db_connection(),$sql);

          }

          getUplineleve2($userno);
     } 
   }else{
    echo 'user doesnt have an upline';
   }
}

//pay upline level 2
function getUplineleve2($downline){

     $sql3 ="SELECT * FROM relationship WHERE downline='$downline'";
     $result = mysqli_query(db_connection(), $sql3);

     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

          $upline=$row["upline"];
          $time=time();
          $date=date("Y-m-d H:i:s",$time); 

          $amount=getlevelAmount('2');

          $userno=getAccountInfoById($upline,'gid');

          $userStatus=getPurchasesForaUserinamonth($userno);

          if($userStatus==1){
          
          $sql ="INSERT INTO payments(userid,amount,reciever,entry_date) VALUES ('$downline','$amount','$upline','$date')";

           mysqli_query(db_connection(),$sql);

          }
     } 
   }else{
    echo 'user doesnt have an upline';
   }
}

//returning the admin
function getadmin(){

  $sql = "SELECT id,firstname,lastname FROM accounts WHERE email='admin@gmail.com'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

           echo "<option value=".$row["id"].">".$row["firstname"]."&nbsp;".$row["lastname"]."</option>";
        }
    } else {
        echo "0 results";
    }

}


/* _____________________Functions to deal with products*/

/*returning users for display*/
function getAllProductsForDisplay(){
   $sql4 ="SELECT * FROM products ";
           $result2 = mysqli_query(db_connection(), $sql4);
   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {
        $id=$row2["id"];

        ?>

          <tr>
            <td class="text-left"><img src="upload/<?php echo $row2["image"];?>" style="width:100px;"></td>
            <td><?php echo $row2["name"];?></td>
            <td><?php echo $row2["info"];?></td>
            <td><?php echo $row2["price"];?></td>
            <td><?php echo $row2["category"];?></td>
            <td>
               <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="product.php?editLevel=<?php echo $row2["id"];?>"><i class="fas fa-pencil-alt"></i></a>
            </td>

             <td>

              <a href="product.php?deleteproduct=<?php echo $row2["id"];?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"  data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>

             </td>
          </tr>
        <?php

      }
   } 
}

/*returning users for display*/
function getAllProductsForDisplayUser(){
   $sql4 ="SELECT * FROM products ";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {
                $id=$row2["id"];

                ?>

                  <tr>
                    <td class="text-left"><img src="../admin/upload/<?php echo $row2["image"];?>" style="width:100px;"></td>
                    <td><?php echo $row2["name"];?></td>
                    <td><?php echo $row2["info"];?></td>
                    <td><?php echo number_format($row2["price"]);?></td>
                    <td><?php echo $row2["category"];?></td>
                  <!--   <td><input type="button" name="edit" value="Buy" id="" class="btn btn-info btn-xs edit_data" /></td> -->
                    <td>
                <a href="product.php?purchase=<?php echo $row2["id"]; ?>" class="btn btn-success modal-trigger"  ><small>Buy</small></a></a>
             </td>
                  </tr>
                <?php

              }
           } 
}

//return product by Id
function getProductById($itemID,$info){

    $sql = "SELECT $info FROM products WHERE  id='$itemID'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data=$row["$info"];
           return $data;
        }
    } else {
        echo "";
    }
    
}

//return products
function getProducts(){

   $sql4 ="SELECT * FROM products";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {

                ?>

                  <div class="col-lg-4 mb-4">
                       <!-- Illustrations -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo $row2['name'] ?> ::<?php echo $row2['price'] ?>=</h6>
                      </div>
                      <div class="card-body">
                        <div class="text-center">
                          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="upload/<?php echo $row2['image'] ?>" alt="">
                        </div>
                        <p><?php echo $row2['info'] ?></p>
                        <a target="_blank" rel="nofollow" href=""><?php echo $row2['category'] ?></a>
                      </div>
                    </div>
                </div>
                <?php

              }
            }

  
}

/*......................end of products functions*/

/*Purchases functions*/
//return purchases
function getAllPurchases(){
   $sql4 ="SELECT * FROM purchase ";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $id=$row2["tid"];
        $billno=$row2["bill_no"];
        $productName=$row2["name"];
        $userno=$row2["user_no"];
        $amount=$row2["amount"];
        $date=$row2["entry_date"];

        $firstname=getAccountInfoBygid($userno,'firstname');
        $lastname=getAccountInfoBygid($userno,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>
          <tr>
            <td class="text-left"><?php echo $billno;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $productName;?></td>
            <td><?php echo number_format($amount);?></td>
            <td><?php echo $date;?></td>
          </tr>
        <?php

      }
   } 
}

//return all daily purcahses
function getAllDailyPurchases(){

  $time=time();
  $date=date("Y-m-d",$time); 

   $sql4 ="SELECT * FROM purchase WHERE entry_date='$date' ";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $id=$row2["tid"];
        $billno=$row2["bill_no"];
        $productName=$row2["name"];
        $userno=$row2["user_no"];
        $amount=$row2["amount"];
        $date=$row2["entry_date"];

        $firstname=getAccountInfoBygid($userno,'firstname');
        $lastname=getAccountInfoBygid($userno,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>
          <tr>
            <td class="text-left"><?php echo $billno;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $productName;?></td>
            <td><?php echo number_format($amount);?></td>
            <td><?php echo $date;?></td>
          </tr>
        <?php

      }
   } 
}

//get total purchases
function getTotalPurchases(){

  $totalPurchases=mysqli_query(db_connection(),
    "SELECT SUM(amount) AS total FROM purchase");

  $d=mysqli_fetch_assoc($totalPurchases);

  return $d['total'];

}

//return total purcahses for a month
function getAllPurchasesForMonth(){
 $d2 = date('Y-m-d', strtotime('first day of this month'));

  $totalPurchases=mysqli_query(db_connection(),
    "SELECT SUM(amount) AS total FROM purchase WHERE entry_date>='$d2'");

  $d=mysqli_fetch_assoc($totalPurchases);

  return $d['total'];
}

//return all purchases for a month
function getPurchasesForamonth(){
  $d2 = date('Y-m-d', strtotime('first day of this month'));

   $sql4 ="SELECT * FROM purchase WHERE entry_date>='$d2'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $userno=$row2["user_no"];

        getAllUsersForDisplay2($userno);

      }
   } 
}

//get purchases for a user in a month
function getPurchasesForaUserinamonth($userno){
   $d2 = date('Y-m-d', strtotime('first day of this month'));

   $sql4 ="SELECT * FROM purchase WHERE entry_date>='$d2' AND user_no='$userno'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        return true;

      }
   }

}

/*returning users for display*/
function getAllUsersForDisplay2($user_no){
    $sql4 ="SELECT * FROM accounts WHERE gid='$user_no'";
    $result2 = mysqli_query(db_connection(), $sql4);

     if (mysqli_num_rows($result2) > 0) {
        while($row2 = mysqli_fetch_assoc($result2)) {

          ?>

            <tr>
              <td class="text-left"><?php echo $row2["firstname"];?></td>
              <td><?php echo $row2["lastname"];?></td>
              <td><?php echo $row2["email"];?></td>
              <td><?php echo $row2["phone"];?></td>
              <td><?php echo $row2["country"];?></td>
              <td><?php echo $row2["address"];?></td>
              <td><a href="index.php?activateUser=<?php echo $row2["id"];?>" class="btn btn-warning modal-trigger"  ><small>Deactivate</small></a></td>
            </tr>
          <?php

        }
     } 
}

//get all purchases for a user in a month
function getAllPurchasesByUser($user_no){
   $sql4 ="SELECT * FROM purchase WHERE user_no='$user_no'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $id=$row2["tid"];
        $billno=$row2["bill_no"];
        $productName=$row2["name"];
        $userno=$row2["user_no"];
        $amount=$row2["amount"];
        $date=$row2["entry_date"];
        $date2=date("F j",strtotime("$date"));

        $phoneNumber=getAccountInfoBygid($userno,'phone');

        $firstname=getAccountInfoBygid($userno,'firstname');
        $lastname=getAccountInfoBygid($userno,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>
          <tr>
            <td class="text-left"><?php echo $date2;?></td>
            <td><?php echo $amount;?></td>
            <td><?php echo $billno;?></td>
            <td><?php echo $phoneNumber;?></td>
           <td><div class="badge badge-success">Success</div></td>
          </tr>
        <?php

      }
   } 
}

//get all messages for a user in a month
function getMessagesForAuser($id){
   $sql4 ="SELECT * FROM message WHERE receiver='$id'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $sender=$row2["sender"];
        $message=$row2["message"];
        $date=$row2["date_entry"];
        $date2=date("F j Y ",strtotime("$date"));

        $firstname=getAccountInfoById($sender,'firstname');
        $lastname=getAccountInfoById($sender,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>

         <li class="media">
            <img class="mr-3 rounded-circle" width="50" src="assets2/img/avatar/avatar-1.png" alt="avatar">
            <div class="media-body">
              <div class="float-right text-primary"><?php echo $date2; ?></div>
              <div class="media-title"><?php echo $name; ?></div>
              <span class="text-small text-muted"><?php echo $message; ?></span>
            </div>
          </li>
        <?php

      }
   } 
}

//get all messages sent by the Admin
function getMessagesSentByAdmin($id){
   $sql4 ="SELECT * FROM message WHERE sender='$id'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $sender=$row2["receiver"];
        $message=$row2["message"];
        $date=$row2["date_entry"];
        $date2=date("F j Y ",strtotime("$date"));

        $firstname=getAccountInfoById($sender,'firstname');
        $lastname=getAccountInfoById($sender,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>

         <li class="media">
            <img class="mr-3 rounded-circle" width="50" src="assets3/img/avatar/avatar-1.png" alt="avatar">
            <div class="media-body">
              <div class="float-right text-primary"><?php echo $date2; ?></div>
              <div class="media-title"><?php echo $name; ?></div>
              <span class="text-small text-muted"><?php echo $message; ?></span>
            </div>
          </li>
        <?php

      }
   } 
}

//get all messages for the admin
function getMessagesForAdmin($id){
   $sql4 ="SELECT * FROM message WHERE receiver='$id'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $sender=$row2["sender"];
        $message=$row2["message"];
        $date=$row2["date_entry"];
        $date2=date("F j Y ",strtotime("$date"));

        $firstname=getAccountInfoById($sender,'firstname');
        $lastname=getAccountInfoById($sender,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>

         <li class="media">
            <img class="mr-3 rounded-circle" width="50" src="assets3/img/avatar/avatar-1.png" alt="avatar">
            <div class="media-body">
              <div class="float-right text-primary"><?php echo $date2; ?></div>
              <div class="media-title"><?php echo $name; ?></div>
              <span class="text-small text-muted"><?php echo $message; ?></span>
            </div>
          </li>
        <?php

      }
   } 
}

//get new messages for a user
function getNewMessagesForAuser($id){
   $sql4 ="SELECT * FROM message WHERE receiver='$id'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $sender=$row2["sender"];
        $message=$row2["message"];
        $date=$row2["date_entry"];
        $date2=date("F j Y ",strtotime("$date"));

        $firstname=getAccountInfoById($sender,'firstname');
        $lastname=getAccountInfoById($sender,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>

        <a href="#" class="dropdown-item dropdown-item-unread">
          <div class="dropdown-item-avatar">
            <img alt="image" src="assets2/img/avatar/avatar-1.png" class="rounded-circle">
            <div class="is-online"></div>
          </div>
          <div class="dropdown-item-desc">
            <b><?php echo $name; ?></b>
            <p><?php echo $message; ?></p>
            <div class="time"><?php echo $date2; ?></div>
          </div>
        </a>
        <?php

      }
   } 
}

//get new messages for admin
function getNewMessagesForAdmin($id){
   $sql4 ="SELECT * FROM message WHERE receiver='$id'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $sender=$row2["sender"];
        $message=$row2["message"];
        $date=$row2["date_entry"];
        $date2=date("F j Y ",strtotime("$date"));

        $firstname=getAccountInfoById($sender,'firstname');
        $lastname=getAccountInfoById($sender,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>

        <a href="#" class="dropdown-item dropdown-item-unread">
          <div class="dropdown-item-avatar">
            <img alt="image" src="assets3/img/avatar/avatar-1.png" class="rounded-circle">
            <div class="is-online"></div>
          </div>
          <div class="dropdown-item-desc">
            <b><?php echo $name; ?></b>
            <p><?php echo $message; ?></p>
            <div class="time"><?php echo $date2; ?></div>
          </div>
        </a>
        <?php

      }
   } 
}

//get Downline to display in a tree
function getDownlineForTree($id){

   $sql3 ="SELECT * FROM relationship WHERE upline='$id'";
   $result = mysqli_query(db_connection(), $sql3);

   if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $downline=$row["downline"];
         
         $sql4 ="SELECT * FROM accounts WHERE gid='$downline' ";
         $result2 = mysqli_query(db_connection(), $sql4);

         if (mysqli_num_rows($result2) > 0) {
            while($row2 = mysqli_fetch_assoc($result2)) {
              $id=$row2["id"];
              $firstname=$row2["firstname"];
              $lastname=$row2["lastname"];
              ?>
               <li style="margin-bottom: 30px !important;"><span class="box"> <img class="img-profile rounded-circle" src="img/avatar-2.png" width="30" style="margin-right: 20px;"><?php echo $firstname.'  '.$lastname; ?></span>
                <ul class="nested">
                <?php  getDownlineForTreelevel2($id);?>
                </ul>
              </li>
              <?php

            }
         }
      }
   } 
}

// get level 2 for the downline to display in a tree
function getDownlineForTreelevel2($id){
    $sql3 ="SELECT * FROM relationship WHERE upline='$id'";
     $result = mysqli_query(db_connection(), $sql3);

     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $downline=$row["downline"];
           
           $sql4 ="SELECT * FROM accounts WHERE gid='$downline'";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {

              $id=$row2["id"];
              $firstname=$row2["firstname"];
              $lastname=$row2["lastname"];

              ?>


                   <li style="margin-top:30px;margin-left: 30px; "><span> <img class="img-profile rounded-circle" src="img/avatar-2.png" width="30" style="margin-right: 20px;"><?php echo $firstname.'  '.$lastname; ?></span>

                <?php

              }
           } 
        }
     }
}

//get all compensation amount
function getAllCompensationAmount(){
   $sql4 ="SELECT * FROM comp_amount ";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {
        $id=$row2["tid"];

        ?>

          <tr>
            <td><?php echo $row2["level"];?></td>
            <td><?php echo $row2["amount"];?></td>
           

            <td>
                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="compensation.php?editLevel=<?php echo $row2["tid"];?>"><i class="fas fa-pencil-alt"></i></a>

                <a href="compensation.php?deleteLevel=<?php echo $row2["tid"];?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"  data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php

      }
   } 
}

//returning information for  the compansation amounts
function getComp_amountInfo($itemID,$info){

  $sql = "SELECT $info FROM comp_amount WHERE  tid='$itemID'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data=$row["$info"];
           return $data;
        }
    } else {
        echo "0 results";
    }

}

//get level amounts
function getlevelAmount($level){

  $sql = "SELECT * FROM comp_amount WHERE  level='$level'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data=$row["amount"];
           return $data;
        }
    } else {
        echo "0 results";
    }

}

//returning the amounts earned by the user
function getincomeByUser($id){
   $sql4 ="SELECT * FROM payments WHERE reciever='$id'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $id=$row2["pid"];
        $userid=$row2["userid"];
        $amount=$row2["amount"];
        $date=$row2["entry_date"];
        $date2=date("F j",strtotime("$date"));

        $firstname=getAccountInfoBygid($userid,'firstname');
        $lastname=getAccountInfoBygid($userid,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>
          <tr>
            <td class="text-left"><?php echo $date2;?></td>
            <td><?php echo $amount;?></td>
            <td><?php echo $name;?></td>
            <td><div class="badge badge-info">Not Paid Out</div></td>
          </tr>
        <?php

      }
   } 
}

//get all the earnings in a month
function getAllEarningsForMonth(){
 $d2 = date('Y-m-d', strtotime('first day of this month'));

  $totalPurchases=mysqli_query(db_connection(),
    "SELECT SUM(amount) AS total FROM payments WHERE entry_date>='$d2'");

  $d=mysqli_fetch_assoc($totalPurchases);

  return $d['total'];
}


/*Stockist*/

/*returning users for display*/
function getAllStockists(){
   $sql4 ="SELECT * FROM Stockist ";
           $result2 = mysqli_query(db_connection(), $sql4);

           if (mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {
                $id=$row2["id"];

                ?>

                  <tr>
                  
                    <td><?php echo $row2["name"];?></td>
                    <td><?php echo $row2["phone"];?></td>
                    <td><?php echo $row2["address"];?></td>
                    <td><?php echo $row2["amount"];?></td>
                    <td><?php echo $row2["info"];?></td>
                      <td>
                       <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="<?php echo $row2["status"];?>" href="stockist.php?disableStockist=<?php echo $row2["id"];?>"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td>
                       <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="stockist.php?editStockist=<?php echo $row2["id"];?>"><i class="fas fa-pencil-alt"></i></a>
                    </td>

                     <td>

                      <a href="stockist.php?deleteStockist=<?php echo $row2["id"];?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"  data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>

                     </td>
                  </tr>
                <?php

              }
           } 
}

//get stockist information
function getStockistInfo($itemID,$info){

  $sql = "SELECT $info FROM Stockist WHERE  id='$itemID'";
    $result = mysqli_query(db_connection(), $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data=$row["$info"];
           return $data;
        }
    } else {
        
    }

}


/*returning users for display*/
function getAllProductsForStockist(){
   $sql4 ="SELECT * FROM products ";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {
        $id=$row2["id"];

        ?>

          <tr>
            <td class="text-left"><img src="../admin/upload/<?php echo $row2["image"];?>" style="width:100px;"></td>
            <td><?php echo $row2["name"];?></td>
            <td><?php echo $row2["info"];?></td>
            <td><?php echo $row2["price"];?></td>
            <td><?php echo $row2["category"];?></td>
            <td>
               <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="product.php?editLevel=<?php echo $row2["tid"];?>"><i class="fas fa-pencil-alt"></i></a>
            </td>
          </tr>
        <?php

      }
   } 
}

//return purchases for a given stockist
function getAllPurchasesForStockist(){
   $sql4 ="SELECT * FROM purchase WHERE status='new'";
   $result2 = mysqli_query(db_connection(), $sql4);

   if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {

        $id=$row2["tid"];
        $billno=$row2["bill_no"];
        $productName=$row2["name"];
        $userno=$row2["user_no"];
        $amount=$row2["amount"];
        $date=$row2["entry_date"];

        $firstname=getAccountInfoBygid($userno,'firstname');
        $lastname=getAccountInfoBygid($userno,'lastname');
        $name=$firstname. "  ".$lastname;

        ?>
          <tr>
            <td class="text-left"><?php echo $billno;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $productName;?></td>
            <td><?php echo number_format($amount);?></td>
            <td><?php echo $date;?></td>
             <td>
               <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Mark Bought" href="index.php?editPurchase=<?php echo $row2["tid"];?>"><i class="fas fa-pencil-alt"></i></a>
            </td>
          </tr>
        <?php

      }
   } 
}


//network Json output
function getDownlineJson($id){

   $sql3 ="SELECT * FROM relationship WHERE upline='$id'";
   $result = mysqli_query(db_connection(), $sql3);

   if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $downline=$row["downline"];

        echo $downline.'<br>';
      }
   }  
}

?>
