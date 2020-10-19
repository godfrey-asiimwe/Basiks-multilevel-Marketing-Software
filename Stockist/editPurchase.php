<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Stockist </h6>
    </div>
    <div class="card-body">
        <?php

        $del=$_GET['editPurchase'];
        $stockist=$_SESSION['id'];

        if(isset($_GET['c']) && $_GET['c']=='y'){

          $sql ="UPDATE purchase SET status='bought',stockist='$stockist' WHERE tid='$del'";

          mysqli_query(db_connection(),$sql);       

          ?>
            <script type="text/javascript">
             window.location='index.php';
            </script> 
          <?php
        }

        ?>
        <h4>Are you sure you want to Mark this product picked?</h4>
        <a href="index.php?editPurchase=<?php echo $del;?>&c=y" class="btn btn-danger" style="margin-bottom:10px;">Yes</a>&nbsp;&nbsp;
        <a href="index.php" class="btn" style="margin-bottom:10px;">No</a>
    </div>
</div>