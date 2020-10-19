
<?php
 
	// Create connection
	include "../include/DB.php";
  include "../include/functions.php";

   $id=$_GET['id'];
 
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
              $email=$row2["email"];
              $phone=$row2["phone"];
               
              $dataArr[] = array('id' =>$id, 'firstname' => $firstname,'lastname'=>$lastname,'email'=>$email,'phone'=>$phone);

            }   
         }
      }
       $json = json_encode($dataArr);
       echo $json; 
   } 
?>