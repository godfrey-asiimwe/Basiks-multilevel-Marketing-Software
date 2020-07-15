<!-- Page Heading -->
          <!-- Page Heading -->
<?php
$edit=$_GET['editLevel'];
?>
<?php

  if(isset($_POST['submit'])){
      $amount=$_POST['amount'];
      
     $sql="UPDATE comp_amount SET amount='$amount' WHERE tid='$edit'";

      mysqli_query($con, $sql);

    }
 ?>

 <h4>Edit level Amounts</h4>
    <h4>List of Compensation Levels</h4>
                  <div class="card-header-action">
                       
                      </div>
                </div>
<form action="<?php echo $_SERVER['SCRIPT_NAME'].'?editLevel='.$edit; ?>" method="post" enctype='multipart/form-data' class="user col-sm-6 mb-sm-0" style="padding: 20px;">

  <div class="form-group row">
     <div class="col-sm-6">
   <h2 style="font-weight: bolder;">  Level  <?php echo getComp_amountInfo($edit,'level'); ?></h2>
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="text" name="amount" class="form-control form-control-user" id="exampleFirstName" value="<?php echo getComp_amountInfo($edit,'amount'); ?>">
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
    Submit
  </button>
  
</form>
                   