<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Stockist </h6>
    </div>
    <div class="card-body">
        <?php

        $del=$_GET['deleteStockist'];

        if(isset($_GET['c']) && $_GET['c']=='y'){

          mysqli_query(db_connection(),"DELETE FROM Stockist WHERE id='$del'");

          ?>
            <script type="text/javascript">
             window.location='stockist.php';
            </script> 
          <?php
        }

        ?>
        <h4>Are you sure you want to delete this Stockist?</h4>
        <a href="stockist.php?deleteStockist=<?php echo $del;?>&c=y" class="btn btn-danger" style="margin-bottom:10px;">Yes</a>&nbsp;&nbsp;
        <a href="stockist.php" class="btn" style="margin-bottom:10px;">No</a>
    </div>
</div>