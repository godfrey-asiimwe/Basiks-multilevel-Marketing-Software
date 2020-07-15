<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
    <?php
    $del=$_GET['activateUser'];
    if(isset($_GET['c']) && $_GET['c']=='y'){

      mysqli_query(db_connection(),"UPDATE accounts SET activation_code='inactive' WHERE id='$del'");

      ?>
        <script type="text/javascript">
         window.location='index.php';
        </script> 
      <?php
    }
    ?>
    <h4>You are about to deactivate this account?</h4>
    <a href="index.php?activateUser=<?php echo $del;?>&c=y" class="btn btn-danger" style="margin-bottom:10px;">Yes</a>&nbsp;&nbsp;
    <a href="index.php" class="btn" style="margin-bottom:10px;">No</a>
</div>