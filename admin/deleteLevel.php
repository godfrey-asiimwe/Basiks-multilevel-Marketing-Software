<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Level Amount</h6>
    </div>
    <div class="card-body">
        <?php
        $del=$_GET['deleteLevel'];
        if(isset($_GET['c']) && $_GET['c']=='y'){

          mysqli_query(db_connection(),"DELETE FROM comp_amount WHERE tid='$del'");

          ?>
            <script type="text/javascript">
             window.location='compensation.php';
            </script> 
          <?php
        }
        ?>
        <h4>Are you sure you want to delete this level amount?</h4>
        <a href="compensation.php?deleteLevel=<?php echo $del;?>&c=y" class="btn btn-danger" style="margin-bottom:10px;">Yes</a>&nbsp;&nbsp;
        <a href="compensation.php" class="btn" style="margin-bottom:10px;">No</a>
    </div>
</div>